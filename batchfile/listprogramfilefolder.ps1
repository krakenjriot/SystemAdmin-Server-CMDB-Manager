Param(
                [Parameter(Mandatory=$True,Position=1)]
                [string]$hostname,                
                [switch]$force = $false
                )

            #Write-Host "`n`r"
            Write-Host "Program Files"
            Get-ChildItem -Path "\\$hostname\c$\Program Files" -Directory -Force -ErrorAction SilentlyContinue | Select-Object FullName | Format-Table -AutoSize

            Write-Host "Program Files (x86)"
            Get-ChildItem -Path "\\$hostname\c$\Program Files (x86)" -Directory -Force -ErrorAction SilentlyContinue | Select-Object FullName | Format-Table -AutoSize
            
            
        

