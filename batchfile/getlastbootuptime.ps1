     Param(
        [Parameter(Mandatory=$True,Position=1)]
            [string]$hostname,
        [switch]$force = $false
       )


Get-WmiObject win32_operatingsystem -ComputerName $Hostname | select csname, @{LABEL='LastBootUpTime'; 
EXPRESSION={$_.ConverttoDateTime($_.lastbootuptime)}} | Format-Table -Wrap -AutoSize