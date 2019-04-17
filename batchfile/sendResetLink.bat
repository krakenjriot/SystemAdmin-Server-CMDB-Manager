@echo off
Powershell -Command "& %~dp0sendResetLink.ps1 -email %1 -hash %2" 


