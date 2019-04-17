 Param(
                [Parameter(Mandatory=$True,Position=1)]
                [string]$hostname,                
                [switch]$force = $false
                )
        
        Get-ChildItem "\\$hostname\c$\Users" | Sort-Object LastWriteTime -Descending | Select-Object Name, LastWriteTime, "`n" | Format-Table -AutoSize 

