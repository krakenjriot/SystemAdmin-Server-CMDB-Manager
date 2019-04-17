 Param(
                [Parameter(Mandatory=$True,Position=1)]
                [string]$hostname,                
                [switch]$force = $false
                )
    Get-ChildItem "\\$hostname\c$\Users" | Sort-Object LastWriteTime -Descending | Select-Object Name, LastWriteTime -first 1 | Format-Table -AutoSize
    
    #$lastUser = Get-ChildItem "\\$hostname\c$\Users" | Sort-Object LastWriteTime -Descending | Select-Object Name, LastWriteTime -first 1 | format-table
    



    

    #Write-Host $lastUser 
    
    
    


