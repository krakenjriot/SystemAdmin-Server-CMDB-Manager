@echo off
for /f %%i in ('ping -n 1 %1 ^| find /c "(0%% loss)"') do SET MATCHES=%%i
echo %MATCHES%

