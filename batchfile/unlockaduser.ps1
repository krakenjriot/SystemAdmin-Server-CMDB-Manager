 Param(
                [Parameter(Mandatory=$True,Position=1)]
                [string]$username,                
                [switch]$force = $false
                )
				
Import-module Activedirectory

Unlock-ADAccount -Identity $username