@echo off
Powershell -Command "& %~dp0sendForgotLink.ps1 -email %1 -hash %2" 


