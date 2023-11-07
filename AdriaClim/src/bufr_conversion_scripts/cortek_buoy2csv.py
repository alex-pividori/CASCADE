from eccodes import *
import xml.etree.ElementTree as ET
import csv, argparse
import sys
import os

# =============================================================================
#  For more informations about 'eccodes' Python module let's consult:
#  http://download.ecmwf.int/test-data/eccodes/html/namespaceec_codes.html
#      
#  For more informations about the encoding process (BUFR from a csv) by Python, consult:
#  https://confluence.ecmwf.int/display/UDOC/How+do+I+create+BUFR+from+a+CSV+-+ecCodes+BUFR+FAQ
# =============================================================================

message = 0

input_dir  = sys.argv[1]
output_dir = sys.argv[2]
buoy       = sys.argv[3]
lat_buoy   = sys.argv[4]
lon_buoy   = sys.argv[5]

# read data from CSV file into a list
def csv_read(filename, sensor):
    data = []
    try:
        with open(filename) as csvfile:
            reader = csv.reader(csvfile, delimiter=';')
            read_mod = False
#=========================================
            for row in reader:
                if   ( read_mod and row != [] and row[0][0] != "<" ):
                    data.append(row)
                # used to skip xml format part and void lines
                elif ( len(row) == 1 ) and ( sensor in row[0] ) and ( row[0][0] == "<" ):
                    read_mod = True
                    continue
                elif ( read_mod ) and (( len(row) == 0 ) or ( row[0][0] == "<" )):
                    read_mod = False
#=========================================

    except IOError as error:
        print(error)
        sys.exit(1)
    else:
        csvfile.close()
        return data                                 # the first is the heading

# Encode the data from CSV into BUFR
def message_encoding( fout, coord, sensor):
    # reads the CSV file into a python list

        # dataIn is a list of lists containing only numerical data (not header)
        dataIn = csv_read( "cortek_data_row.txt", sensor)
        # bid = codes_bufr_new_from_samples('BUFR4')
        # loops over the rows of the csv file (one BUFR message for each row)

        global message
        if ( message == 0 ):                               # encode lat lon
            bid = codes_bufr_new_from_samples('BUFR4')
        
            bufr_encode(bid, [os.path.basename(output_dir), "000000", "0.0" ], coord, sensor)
            codes_write(bid, fout)
            codes_release(bid)
            message+=1
  
        for row in dataIn:
            bid = codes_bufr_new_from_samples('BUFR4')

            for ele in range(len(row)):
                # CLEANING remove extremes spaces. This loop doesn't launch the
                # encoding process. It only cleans row data
                row[ele] = row[ele].strip()
    
            # This is the check to convert the correct date only ( row[0]
            # indicate the date in the format YYYYMMDD )
            if ( row[2][0] != "[" ) and ( row[0] == os.path.basename(output_dir) ):
                try:
                    # PYTHON defined function; it encodes line by line
                    bufr_encode(bid, row, coord, sensor)
                    codes_write(bid, fout)
                except CodesInternalError as ec:
                    print(ec)
                codes_release(bid)
                message+=1
            else:
                 continue

# =============================================================================

def bufr_encode(ibufr, row, coord, sensor):
    # set header keys and values
    codes_set(ibufr, 'edition', 4)
    codes_set(ibufr, 'masterTableNumber', 0)
#    codes_set(ibufr, 'bufrHeaderCentre', 98)               # 98: centre is ecmf
#    codes_set(ibufr, 'bufrHeaderSubCentre', 0)
#    codes_set(ibufr, 'updateSequenceNumber', 0)
    codes_set(ibufr, 'dataCategory', 1)                     # 0: Surface data - land    1: Surface data - sea
#    codes_set(ibufr, 'internationalDataSubCategory', 7)    # 7: n-min obs from AWS stations
#    codes_set(ibufr, 'dataSubCategory', 7)
    codes_set(ibufr, 'masterTablesVersionNumber', 31)
#    codes_set(ibufr, 'localTablesVersionNumber', 0)
#    codes_set(ibufr, 'observedData', 1)
    codes_set(ibufr, 'compressedData', 0)
    # The date/time format is: YYYY-MM-DD hh:mm:ss
    codes_set(ibufr, 'typicalYear',  int( row[0][0:4] ))   # YYYY
    codes_set(ibufr, 'typicalMonth', int( row[0][4:6] ))   # MM
    codes_set(ibufr, 'typicalDay',   int( row[0][6:8] ))   # DD
    codes_set(ibufr, 'typicalHour',  int( row[1][0:2] ))   # hh
    codes_set(ibufr, 'typicalMinute',int( row[1][2:4] ))   # mm
    codes_set(ibufr, 'typicalSecond',int( row[1][4:6] ))   # ss
#    print("Message:", message)
    # set data keys and values
    
    if ( message == 0 ):
        ivalues=( 301022 ) #  305002  table D code
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'latitude',  float( coord["lat"] ))    # read from an
                                                                # xml file format
        codes_set(ibufr, 'longitude', float( coord["lon"] ))    # read from an
                                                                # xml file format
        codes_set(ibufr, 'pack', 1)
        return

    if ( sensor == "0001" ) and ( float(row[2]) < 100000 ):
        ivalues=( 306030 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'batteryVoltage',   float(row[2]))
        codes_set(ibufr, 'pack', 1)    
          
    if ( sensor == "0002" ) and ( float(row[2]) < 100000 ):       
        ivalues=( 307054 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'temperature',   float(row[2]))
        codes_set(ibufr, 'pack', 1)

    if ( sensor == "1000" ) and ( float(row[2]) < 100000 ):       
        ivalues=( 302056 )
        codes_set(ibufr, 'unexpandedDescriptors'        , ivalues     )
        # Conversion from degC to K
        codes_set(ibufr, 'oceanographicWaterTemperature', float(row[2]) + 273.15 )
        codes_set(ibufr, 'pack', 1)

    if ( sensor == "1001" ) and ( float(row[2]) < 100000 ):
        ivalues=( 305002 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'waterConductivity',    float(row[2])/10 )
        codes_set(ibufr, 'pack', 1)

    if ( sensor == "1002" ) and ( float(row[2]) < 100000 ) and ( float(row[2]) > 0.0 ):
        ivalues=( 306004 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'salinity',    float(row[2]))
        codes_set(ibufr, 'pack', 1)

    if ( sensor == "1003" ) and ( float(row[2]) < 100000 ) and ( float(row[2]) > 0.0 ):
        ivalues=( 13084 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'turbidity', float(row[2]))
        codes_set(ibufr, 'pack', 1)

    if ( sensor == "1004" ) and ( float(row[2]) < 100000 ) and ( float(row[2]) > 0.0 ):
        ivalues=( 302056 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'depthBelowWaterSurface', float(row[2]))
        codes_set(ibufr, 'pack', 1) 

    if ( sensor == "2001" ) and ( float(row[2]) < 100000 ):
        ivalues=( 22184 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'waterColumnHeightDeviationFromReferenceValue', float(row[2]))
        codes_set(ibufr, 'pack', 1)

# ==============================================================================

def main():
    sensor_list = ["0001","0002","1001","1002","1003","1004","2001"]
    # 0001 Alimentazione stazione [V] 0002 Temperatura interna strumento [°C]
    # 1000 Temperatura Acqua [°C]
    # 1001 Conducibilità specifica a 25°C [mS/cm] 
    # 1002 Salinità (Non indicata. Presumibilmente si tratta di PSU)
    # 1003 Torbidità Acqua [NTU]
    # 1004 Profondità [m]
    # 2001 Differenza livello acqua [m]
    # 2002 Boolean check value bit [0 OK, 1 Error]

    # Output file name creation

    coord = { "lat":lat_buoy, "lon":lon_buoy }
    # Same name of csv file buth with the 'bufr' extension
    outFilename = output_dir+"/"+buoy+"_"+os.path.basename(output_dir)+'.bufr'

    print( "Latitude=", coord["lat"], "Longitude=", coord["lon"] )

    fout = open(outFilename, "wb")
    for sensor in sensor_list:             # loop on sensor list I wanna encode
        message_encoding( fout, coord, sensor)
    fout.close()

    print("output file {0}".format(outFilename))
   
if __name__ == '__main__':
    main()
