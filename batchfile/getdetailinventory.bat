@echo off
Powershell -Command "& %~dp0getdetailinventory.ps1 -thostname %1 -domainname %2 -reportname %3"  


