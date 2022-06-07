@echo off
   for /f "tokens=1-5 delims=/ " %%i in ("%date%") do (
     set va1=%%i
     set va2=%%j
     set va3=%%k
     set va4=%%l
        )
   for /f "tokens=1-5 delims=: " %%i in ("%time%") do (
     set va5=%%i
     set va6=%%j
     set va7=%%k
        )
   echo %date%
   echo %va1%
   echo %va2%
   echo %va3%
   echo %va4%
   echo %va5%
   echo %va6%
   set datestr=%va1%
   echo datestr is %datestr%
   set BACKUP_FILE=bk%datestr%
   echo Nome do arquivo backup = bk%datestr%

if not exist c:\Backup md c:\Backup   

"C:\xampp\mysql\bin\mysqldump" -u root db01 > c:\backup\%BACKUP_FILE%.sql 

rar a C:\BACKUP\%BACKUP_FILE%.rar  C:\backup\*.sql

copy C:\BACKUP\%BACKUP_FILE%.rar D:\BACKUP\

del C:\backup\*.sql

