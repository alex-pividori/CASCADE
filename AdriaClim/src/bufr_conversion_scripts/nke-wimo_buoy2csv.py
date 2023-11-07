from eccodes import *
import xml.etree.ElementTree as ET
import csv, argparse
import sys
import os
import fnmatch

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
path_gpx   = sys.argv[4]

def coord_extraction(filename_gpx ):                        # read xml format file
   
    tree = ET.parse( filename_gpx )
    root = tree.getroot()
    for child in root:
        return child.attrib                 
 
# read data from CSV file into a list
def csv_read(filename):
    data = []
    try:
        with open(filename) as csvfile:
            reader = csv.reader(csvfile, delimiter=',')
            for row in reader:
                # Used to skip xml format part and void lines
                if ( row == [] ) or ( row[0][0] == "#" ):
                    continue
                data.append(row)
    except IOError as error:
        print(error)
        sys.exit(1)
    else:
        csvfile.close()
        return data                        

# Encode the data from CSV into BUFR
def message_encoding(fout, coord):
        # reads the CSV file into a python list

        # dataIn is a list of lists containing only numerical data (not header)
        dataIn = csv_read( "nke_data_row.txt" )

        global message
        if ( message == 0 and coord != "NA_gps_var" ):
            bid = codes_bufr_new_from_samples('BUFR4')

            # col and dataIn[0] are dummy values
            bufr_encode(bid, dataIn[0], coord, 1)
            codes_write(bid, fout)
            codes_release(bid)
            message+=1
        elif ( message == 0 and coord == "NA_gps_var" ):
            message+=1
            

        # bid = codes_bufr_new_from_samples('BUFR4')
        # loops over the rows of the csv file (one BUFR message for each row)
        for col in [1,2,6,7,8]:
            for row in dataIn:
                bid = codes_bufr_new_from_samples('BUFR4')
                for ele in range(len(row)):
                    # CLEANING remove extremes spaces. This loop doesn't launch
                    # the encoding process. It only cleans row data
                    row[ele] = row[ele].strip()
                try:
                    if ( os.path.basename(output_dir) == row[0].split( sep=" " )[0].split( sep="-" )[0]+
                         row[0].split( sep=" " )[0].split( sep="-" )[1]+row[0].split( sep=" " )[0].split( sep="-" )[2]  ):
                        # PYTHON defined function. encodes line by line
                        bufr_encode(bid, row, coord, col)
                        codes_write(bid, fout)
                    else:
                        continue
                except CodesInternalError as ec:
                    print(ec)
                codes_release(bid)
#                global message
                message+=1

# =============================================================================

def bufr_encode(ibufr, row, coord, col):
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
    codes_set(ibufr, 'typicalYear',  int( row[0].split( sep=" " )[0].split( sep="-" )[0]  ))   # YYYY
    codes_set(ibufr, 'typicalMonth', int( row[0].split( sep=" " )[0].split( sep="-" )[1]  ))   # MM
    codes_set(ibufr, 'typicalDay',   int( row[0].split( sep=" " )[0].split( sep="-" )[2]  ))   # DD
    codes_set(ibufr, 'typicalHour',  int( row[0].split( sep=" " )[1].split( sep=":" )[0]  ))   # hh
    codes_set(ibufr, 'typicalMinute',int( row[0].split( sep=" " )[1].split( sep=":" )[1]  ))   # mm
    codes_set(ibufr, 'typicalSecond',int( row[0].split( sep=" " )[1].split( sep=":" )[2]  ))   # ss
    # set data keys and values
    
    if ( message == 0 and coord != "NA_gps_var" ):
        ivalues=( 301022 ) #  305002  table D code
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'latitude',  float( coord["lat"] ))     # read from an
                                                                 # xml file format
        codes_set(ibufr, 'longitude', float( coord["lon"] ))     # read from an
                                                                 # xml file format
        codes_set(ibufr, 'pack', 1)
        return 
    
    # pressure e oxygen concentration  ( 1 e 3 )
    if ( col == 1 ) and ( float(row[1]) >= 0.0 ) and ( float(row[3]) >= 0.0 ):
        ivalues=( 306037 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        # conversion from mg/L to umol/kg (Molar mass of O2 is 16*2=32 )
        codes_set(ibufr, 'oceanographicDissolvedOxygen', ( float(row[3])*1000 )/( 32 * 1.01 )  )
        # conversion from dbar to Pascal
        codes_set(ibufr, 'waterPressure', float(row[1]) * 10**4 )
        codes_set(ibufr, 'pack', 1)

    # pH e conductivity  ( 2 e 5 )
    if ( col == 2 ) and ( float(row[2]) >= 0.0 ):
        ivalues=( 305002 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'waterPh',           float(row[2])    )
        # conversion from mS/cm to S/m
        codes_set(ibufr, 'waterConductivity', float(row[5])/10 )
        codes_set(ibufr, 'pack', 1)

    if ( col == 6 ):          
        ivalues=( 302056 )
        codes_set(ibufr, 'unexpandedDescriptors'        , ivalues     )
        # conversion from degC to K
        codes_set(ibufr, 'oceanographicWaterTemperature', float(row[6]) + 273.15 )
        codes_set(ibufr, 'pack', 1)

    if ( col == 7 ):
        ivalues=( 306004 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'salinity',    float(row[7]))                 # PSU
        codes_set(ibufr, 'pack', 1)

    if ( col == 8 ) and ( float(row[8]) >= 0.0 ):
        ivalues=( 302056 )
        codes_set(ibufr, 'unexpandedDescriptors', ivalues)
        codes_set(ibufr, 'depthBelowWaterSurface', float(row[8]))
        codes_set(ibufr, 'pack', 1) 


# =============================================================================

def main():

    # Coord extraction  
    if ( path_gpx != "NA_gps_var" ):
        coord = coord_extraction( path_gpx.strip() )
    else:
        coord = path_gpx
    # Output file name creation
    # same name of csv file buth with the 'bufr' extension
    outFilename = output_dir+"/"+buoy+"_data_"+os.path.basename(output_dir)[2:]+'.bufr'
 
    fout = open(outFilename, "wb")
    message_encoding( fout, coord)
    fout.close()
    print("output file {0}".format(outFilename))
   
if __name__ == '__main__':
    main()
