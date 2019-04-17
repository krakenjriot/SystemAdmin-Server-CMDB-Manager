@echo off
Powershell -Command "& %~dp0getdetailinventory1.ps1 -thostname %1 -domainname %2 -reportname %3"  


