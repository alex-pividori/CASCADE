!CALMET:ARPA FVG - CRMA:CODE NAME        
!
! By Dario B. Giaiotti
! ARPA FVG - CRMA
! First version  26 Oct, 2016
! Lasst revision 02 Nov, 2016
!

PROGRAM simple_statistics

!<DESCRIPTION>
!
! This program reads a time series from the standard inpot and computes simple
! statistics estimators. By default average, standard deviation, min value and
! max value are computed. Activatin the flag for order statistics median, moda
! and percentile are computed. Verbose can be activated. The format for data
! reading can be given as command line flag otherwise the first column value is
! read. Missing value string can be given.
!
! input data:
!     The code reads from standard input and options from command line.
!     Se help function for more details.
!
! outputs:
!     The minimal output is a row with statistics on the standard outpu, non
!     comments or headers.      
!     More information are available avtivating the verbose
!
!  NOTE
!     If you get a warning such that: "Warning: iee_inexact is signaling"
!     it is the copiler PGI that warns you about inconsistencies on IEEE
!     standards. To avoid that you can comment the STOP statement at the bottom
!     or to set the environmental variable NO_STOP_MESSAGE=yes by means of
!     export.
!
!     This code was generate in the frame of Nausica project.
!
!  Modified on date 12/04/2017 by Dario B. Giaiotti 
!     Included the option to use the same missing data string both for output 
!     and input in case the missing data is defined for inputs, otherwise use NaN.
!
!

!
!</DESCRIPTION>

      ! ================== 
      ! DECLARATION SESSION
      ! ================== 
   
      IMPLICIT NONE

      ! Command line variables and constants

      INTEGER :: numargs                             ! The number of arguments in the comand line
      CHARACTER (LEN=300) :: ag                      ! Argument string 
      CHARACTER (LEN=100) :: subarg                  ! Sub argument string       
      CHARACTER (LEN=100) :: fmtstr                  ! Character string storing the fmt to use during data reading
      CHARACTER (LEN=100) :: misstr                  ! Character string storing the missing value identification string 
      CHARACTER (LEN=2), PARAMETER :: fver = "-v"    ! Verbose flag activation           
      CHARACTER (LEN=2), PARAMETER :: ford = "-o"    ! Order statistics flag activation           
      CHARACTER (LEN=5), PARAMETER :: fhel = "-help" ! Help string identifier
      CHARACTER (LEN=2), PARAMETER :: ffmt = "-f"    ! Format usage activation flag
      CHARACTER (LEN=2), PARAMETER :: fmis = "-m"    ! Missing value usage activation flag

      INTEGER :: IARGC, help                         ! Integer functions to:
                                                     !         get the number of arguments, 
                                                     !         the arguments, write the help,

      INTEGER :: nend                                ! End of records flag

      REAL :: plow, phig                             ! Lower and higher percentile 

      ! Local variables
      LOGICAL :: goon  = .TRUE.                      ! Logical variable for program execution           
      LOGICAL :: verbo = .FALSE.                     ! Logical variable for verbose activation          
      LOGICAL :: order = .FALSE.                     ! Logical variable for order statistics            
      LOGICAL :: fmtok = .FALSE.                     ! Logical variable for format use in reading data  
      LOGICAL :: fmiss = .FALSE.                     ! Logical variable for missing valuer filter activation
     
      !
      ! General variables and parameters
      !
      !  INTEGERS
      !
      INTEGER :: i,j
      INTEGER :: n,nmax,nmod,nfilt,nmiss            
      INTEGER :: nsub,nsup,nsub0,nsub1               ! Start and end character position of data in records
                                                     ! when format option is activated
      !
      !  CHARACTER
      !
      CHARACTER (LEN=100) :: dfmt                    ! Default format to be used to read data
                                                     ! one column of floating point
      CHARACTER (LEN=50)   :: subrec                 ! The substring used to read data 
      CHARACTER (LEN=1000) :: recstr                 ! The string used to read data in case of missing values
      CHARACTER (LEN=1), PARAMETER :: sep = "-"      ! The character value separating the start and end position
                                                     ! od data records in the recstr
      !
      !  REAL         
      !
      REAL :: d,dmin,dmax,xmedian,xmoda,xlow,xhig    ! Default real scalars for simple statistics 
      REAL :: xtp  
      DOUBLE PRECISION ave,std,std2,summa            ! Default double precision real scalars for simple statistics 

      !
      !  Allocatable arrays 
      !
      REAL, ALLOCATABLE :: x(:), xtmp(:)             ! Real arrays to store records for order statistics
      INTEGER, PARAMETER :: nx = 100                 ! Default length of the x array
 
      ! ================== 
      ! EXECUTION SESSION
      ! ================== 
   
      ! ----------------------------
      ! --- Read command line arguments                                       
      ! ----------------------------
   
      numargs=IARGC()         ! Load the total number of arguments
      DO i = 1,numargs        ! Loop over all arguments
         CALL GETARG(i,ag)  
         SELECT CASE(ag)      ! Find proper arguments

         CASE (fhel)          ! Help request
              j=help()              ! Print help on standard output            
 
         CASE (fver)          ! Activate verbose 
              verbo = .TRUE.        ! Set logical variable for verbose to .TRUE.

         CASE (ford)          ! Activate order statistics
              CALL GETARG(i+1,subarg)                                ! Read lower and upper percentiles  
              READ (UNIT=subarg,FMT='(G)',ERR=905, END=905) plow  
              CALL GETARG(i+2,subarg)                                ! Read upper and upper percentiles  
              READ (UNIT=subarg,FMT='(G)',ERR=905, END=905)  phig  
              order = .TRUE.        ! Set logical variable for order statistics to .TRUE.
 
         CASE (ffmt)          ! Format usage information                              
               CALL GETARG(i+1,subarg)                               ! Read format string to use in reading inputs
               READ (UNIT=subarg,FMT='(A)',ERR=905, END=905) fmtstr  ! Read format string                 
               fmtok = .TRUE.                                        ! Set logical variable for format usage to .TRUE.
 
         CASE (fmis)          ! Missing value filter                     
               CALL GETARG(i+1,subarg)                               ! Read missing string to use in reading inputs
               READ (UNIT=subarg,FMT='(A)',ERR=905, END=905) misstr  ! Read format string                 
               fmiss = .TRUE.                                        ! Set logical variable for missing value to .TRUE.

         CASE DEFAULT         ! Nothing to do 
                     
         END SELECT
      END DO


      ! ----------------------------
      !
      ! Inizialize the upper and the lower percentile in needed
      !
      ! ----------------------------
   
      IF (order.NE..TRUE.) THEN
          plow = 0.0
          phig = 1.0
      END IF

      ! ----------------------------
      !
      ! Some information on the stdout in case of verbose
      !
      ! ----------------------------

      IF (fmiss.NE..TRUE.) misstr="NaN"
      IF (verbo.EQ..TRUE.) THEN
         IF (fmtok.NE..TRUE.) fmtstr="NONE"
         WRITE (UNIT=*,FMT=501) order,plow,phig,fmtok,fmtstr,fmiss,misstr
 501     FORMAT ("# program simple_statistics:",/,"#",/,"#    Order statistcs: ",L,/, &
                 "#               plow: ",G9.4,/, "#               phig: ",G9.4,/, &
                 "#        Data format: ",L,/, "#             format: ",A,/, &
                 "#       Data missing: ",L,/, "#             string: ",A)
      END IF 

      ! ----------------------------
      !
      ! Chech order consistency between percentiles 
      !
      ! ----------------------------
      IF (plow.GT.phig)THEN 
         WRITE (UNIT=*,FMT=907) 
 907     FORMAT (//,"ERROR in percentiles the input (plow =< phig . Please check your arguments and read the help")  
         STOP 1            
      END IF 
      ! ----------------------------
      !
      ! Set the data format if requested by the user
      !
      ! ----------------------------
      IF (fmtok.EQ..TRUE.) dfmt = TRIM(fmtstr)
      ! ----------------------------
      !
      ! Allocate required arrays if needed 
      !
      ! ----------------------------
      IF (order.EQ..TRUE.)  ALLOCATE (x(nx))   
      ! ----------------------------
      !
      ! Set to zero the variables to be increased each loop
      !
      ! ----------------------------
      ave   = 0.0
      std2  = 0.0
      nmiss = 0
      ! ================================================
      !
      ! Read data from the standard input up to the EOF
      !
      ! ================================================
     
      nend=0     ! Set default END OF FILEflag  to OK read record again
      n=1        ! Set counter to initial valuer
      DO WHILE(nend.EQ.0)
          READ(UNIT=*,FMT='(A)',IOSTAT=nend) recstr   ! Read one record as character 
          IF (nend.EQ.0) THEN
             !
             ! ----------------------------
             ! --- Activate substring selection if required                         
             ! ----------------------------
             !
             IF (fmtok.EQ..TRUE.) THEN
               nsub  = INDEX(dfmt,sep)           ! Get the position of the separator
               nsup  = LEN_TRIM(dfmt)            ! Get the length of the string          
               SELECT CASE (nsub)
                  CASE (0)                          ! There is no separator in the foprmat string
                     IF (verbo.EQ..TRUE.) THEN
                        WRITE(unit=*,FMT='(10X,"ERROR! There is no format separator -")')
                        STOP 2  
                     END IF 
                  CASE DEFAULT                            
                     IF (nsub.EQ.nsup) THEN              !  The separator is at the end   
                         READ(UNIT=dfmt(1:nsub-1),FMT='(I)') nsub0 
                         nsub1 = LEN_TRIM(recstr)
                     END IF
                     IF (nsub.EQ.1) THEN                  !  The separator is at the beginning
                         READ(UNIT=dfmt(2:nsup),FMT='(I)') nsub1 
                         nsub0 = 1
                     END IF
                     IF (nsub.GT.1.AND.nsub.LT.nsup) THEN              !  The separator is in the middle 
                         READ(UNIT=dfmt(1:nsub-1),FMT='(I)') nsub0 
                         READ(UNIT=dfmt(nsub+1:),FMT='(I)') nsub1 
                     END IF
               END SELECT
               IF (nsub0.GT.nsub1) THEN
                  WRITE(unit=*,FMT='(10X,"ERROR! Min character position > then max in defined format")')
                  STOP 2   
               END IF
               subrec = recstr(nsub0:nsub1)      ! Performe substring seòection
             ELSE
               subrec = TRIM(recstr)             ! No substring selection required so 
                                                 ! just remove the trailing blanks
             END IF
             !
             ! ----------------------------
             ! --- Activate missing value filter if required                        
             ! ----------------------------
             !
             nfilt=0                                          ! Set default filter flag to OK pass through
             IF (fmiss.EQ..TRUE.) THEN
                 IF (TRIM(ADJUSTL(subrec)).EQ.TRIM(ADJUSTL(misstr))) THEN       !----- Filter out missing values
                     nfilt=1                                                    ! Set missing value flag to KO NO pass through
                     nmiss = nmiss + 1                                          ! Increase missing values counter
                 END IF
             END IF
             !
             ! ----------------------------
             ! --- Read data from string and go on with statistics                  
             ! ----------------------------
             !
             IF (nfilt.EQ.0) THEN
                READ(UNIT=subrec,FMT=*) d           ! Read one record as number
                IF (n.EQ.1) dmin=d                               ! Min max values set to first value at first loop
                IF (n.EQ.1) dmax=d                               ! Min max values set to first value at first loop
                dmin  = MIN(d,dmin)                              ! Store the minimum value
                dmax  = MAX(d,dmax)                              ! Store the maximum value
                ave   = ave + d                                  ! Increase the sum of the records    
                std2  = std2 + d*d                               ! Increase the sum of the records    
                !
                ! ----------------------------
                ! --- Load data in the array because order statistics is required
                ! ----------------------------
                !
                IF (order.EQ..TRUE.) THEN
                   IF (MODULO(n,nx).EQ.0) THEN          ! Extend allocatable array
                       ALLOCATE (xtmp(SIZE(x)))         ! Allocate real temporary array for swap 
                       xtmp = x
                       DEALLOCATE (x)                   ! Deallocate real temporary array to free memory and 
                                                        ! let it suitable for extension 
                       ALLOCATE(x(SIZE(xtmp)+nx))       ! Allocate again the real array for ordered data analysis
                                                        ! extending its size of one nx slot
                       x(1:SIZE(xtmp)) = xtmp           ! Load again the temporary array in the extended array
                       DEALLOCATE (xtmp)                ! Deallocate real temporary array to free memory 
                   END IF
                   x(n) = d                             ! Load data in the array
                END IF 
                n = n +1 
             END IF
          END IF
      END DO
      n = n - 1      ! DECREASE ONE UNIT THE DATA COUNTER BECAUSE THE LAST RECORD WAS EOF 

      ! ================================================
      !
      ! Compute statistics in case of no order statistics was required
      !
      ! ================================================
     
      summa = ave                            ! --- SAVE THE SUM 
      ave = ave/FLOAT(n)                     ! --- COMPUTE AVERAGE                         
      std = SQRT(std2/FLOAT(n) - ave*ave)    ! --- COMPUTE STANDARD DEVIATION (biased 1/n not 1/(n-1)

      ! ================================================
      !
      ! Compute order statistics 
      !
      ! ================================================

      IF (order.EQ..TRUE..AND.n.GT.1) THEN
         ! ----------------------------
         ! --- Sort the time data in the time series                             
         ! ----------------------------
         CALL SORT(n,x)
         ! ----------------------------
         ! --- Select or compute the median                                      
         ! ----------------------------
         IF (MOD(n,2).EQ.1) THEN
            xmedian = x(n/2+1)      
         ELSE
            xmedian = 0.5*(x(n/2) + x(n/2+1))      
         END IF 
         ! ----------------------------
         ! --- Select the percentiles                                      
         ! ----------------------------
         nmax = NINT(plow*n)          ! Lower percentile 
         IF (nmax.le.0) nmax = 1
         xlow = x(nmax)
         nmax = NINT(phig*n)          ! Higher percentile
         IF (nmax.gt.n) nmax = n
         xhig = x(nmax)
      ELSE
         IF (verbo.EQ..TRUE.) THEN
             WRITE(UNIT=*,FMT=510) n
 510         FORMAT("#     Order statistics impossible to perform with: ",I," records")
         END IF
      END IF


      ! ----------------------------
      ! --- Some information of the dataset if verbose is active
      ! ----------------------------
           
      IF (verbo.EQ..TRUE.) THEN
         WRITE(UNIT=*,FMT=502) nmiss,n,n+nmiss
 502     FORMAT("#     Missing values: ",I,/,"#     Available data: ",I,/,"#      Total records: ",I)
         IF (order.NE..TRUE.) THEN
             WRITE(UNIT=*,FMT=503) "NTOT","NVAL","NMIS","AVE", "MIN","MAX","STD","SUM"
 503         FORMAT("#"3A10,5A15)
         ELSE
             WRITE(UNIT=*,FMT=504) "NTOT","NVAL","NMIS","AVE", "MIN","MAX","STD","MEDIAN","PLOW","PHIGH","SUM"
 504         FORMAT("#"3A10,8A15)
         END IF
      END IF

      ! ----------------------------
      ! --- Write statistics on the stdout                                    
      ! ----------------------------
      IF (order.NE..TRUE.) THEN
         IF (n.GT.0) THEN     
             WRITE(UNIT=*,FMT=505) n+nmiss,n,nmiss,ave,dmin,dmax,std,summa
 505         FORMAT(1X,3I10,5(2X,E13.5))
         ELSE
             WRITE(UNIT=*,FMT=506) n+nmiss,n,nmiss,TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)),&
                                                   TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr))
 506         FORMAT(1X,3I10,5A15)
         END IF
      ELSE
         SELECT CASE(n)           ! Write information on the stdout according to their availability
                CASE (0)          ! No data at all for any statistics
                     WRITE(UNIT=*,FMT=507) n+nmiss,n,nmiss,TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)) ,&
                                                           TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr))
 507                 FORMAT(1X,3I10,8A15)
                CASE (1)          ! Data available for default statistics only 
                     WRITE(UNIT=*,FMT=508) n+nmiss,n,nmiss,ave,dmin,dmax,std,TRIM(ADJUSTL(misstr)),TRIM(ADJUSTL(misstr)),&
                                                                             TRIM(ADJUSTL(misstr)),summa
 508                 FORMAT(1X,3I10,4(2X,E13.5),3A15,2X,E13.5)
                CASE DEFAULT      ! Data available for order statistics too
                     WRITE(UNIT=*,FMT=509) n+nmiss,n,nmiss,ave,dmin,dmax,std,xmedian,xlow,xhig,summa
 509                  FORMAT(1X,3I10,8(2X,E13.5))
         END SELECT
      END IF

      ! ----------------------------
      ! --- Errors and warnings  session                                                                
      ! ----------------------------

      IF (goon.eq..FALSE.) THEN
 905     WRITE (UNIT=*,FMT=906) 
 906     FORMAT (//,"ERROR in reading the input data format. Please check your arguments and read the help")  
         STOP 1            
      END IF
 999  CONTINUE      

      ! ================== 
      ! ENDING SESSION
      ! ================== 

      STOP 
END PROGRAM simple_statistics 


!     
!     
! ==================================================================================     
!     
!     FUNCTIONS HERE BELOW
!     
! ==================================================================================     
!     
INTEGER FUNCTION help()

!<DESCRIPTION>
!
! Function help writes the help on the stdout  
!
!</DESCRIPTION>


      ! ================== 
      ! DECLARATION SESSION
      ! ================== 
   
      IMPLICIT NONE
      help=0
   
  
      ! ================== 
      ! EXECUTION SESSION
      ! ================== 


      WRITE (UNIT=*,FMT=101)
 101  FORMAT (//,10x,"Program simple_statistics",//,                           &
             15x,"This program reads from the standard input a series of data and it computes simple statistics" &
             ,/,15x,"Default statistics is sum, average, standard deviation, min value and max value. Activating order " &
             ,/,15x,"statistics you get also meadian, lower and upper percentiles.",/ &
             ,/,15x,"Available options are: -v -o -f -m -help ",/ &
             ,/,20x,"-v                  ==> Verbose on the standard output and report details ",/ &
             ,/,20x,"-o plow phig        ==> activate order statistics and define the lower (plow) and the upper (phig)" &
             ,/,20x,"                        percentiles. Keep in mind that they are floating point 0 <= plow <= phig <1",/ &
             ,/,20x,"-f start-end        ==> Use the selector for part of input lines. Selection is made according to the following rules:" ,/ &
             ,/,20x,"                        start-        from start'th character to end of line." &
             ,/,20x,"                        start-end     from start'th to end'th character, extremes included." &
             ,/,20x,"                        -end          from first to end'th (included) character.",/ &
             ,/,20x,"-m misstr           ==> Use the missing data string to remove missing data from records",/ &
             ,/,20x,"-help               ==> This help" &
             ,//,15x,"By CRMA - ARPA FVG " &
             ,/,18x,"(Dario Blanchin dario.giaiotti@arpa.fvg.it - October 26, 2016)") 

      ! ================== 
      ! ENDING SESSION
      ! ================== 

      STOP 1
END FUNCTION  help

      SUBROUTINE SORT(N,RA)                                                     
      DIMENSION RA(N)                                                           
      L=N/2+1                                                                   
      IR=N                                                                      
10    CONTINUE                                                                  
        IF(L.GT.1)THEN                                                          
          L=L-1                                                                 
          RRA=RA(L)                                                             
        ELSE                                                                    
          RRA=RA(IR)                                                            
          RA(IR)=RA(1)                                                          
          IR=IR-1                                                               
          IF(IR.EQ.1)THEN                                                       
            RA(1)=RRA                                                           
            RETURN                                                              
          ENDIF                                                                 
        ENDIF                                                                   
        I=L                                                                     
        J=L+L                                                                   
20      IF(J.LE.IR)THEN                                                         
          IF(J.LT.IR)THEN                                                       
            IF(RA(J).LT.RA(J+1))J=J+1                                           
          ENDIF                                                                 
          IF(RRA.LT.RA(J))THEN                                                  
            RA(I)=RA(J)                                                         
            I=J                                                                 
            J=J+J                                                               
          ELSE                                                                  
            J=IR+1                                                              
          ENDIF                                                                 
        GO TO 20                                                                
        ENDIF                                                                   
        RA(I)=RRA                                                               
      GO TO 10                                                                  
      END                                  
