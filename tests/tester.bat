@echo off
%CD%\..\vendor\bin\tester.bat %CD%\LatteEmail -s -j 40 -log %CD%\latte-email.log %*
rmdir %CD%\tmp /Q /S
