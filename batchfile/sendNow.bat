@echo off
Powershell -Command "& %~dp0sendNow.ps1 -email %1 -filename %2 -fqdn %3" -sender %4


