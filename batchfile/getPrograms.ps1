       Param(
        [Parameter(Mandatory=$True,Position=1)]
            [string]$hostname,
        [switch]$force = $false
       )

    

    Invoke-Command -cn $hostname -ScriptBlock {Get-ItemProperty HKLM:\Software\Microsoft\Windows\CurrentVersion\Uninstall\* | select DisplayName, Publisher, InstallDate, DisplayVersion }

