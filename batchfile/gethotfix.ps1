Function exportqfe {
BEGIN {}
PROCESS {
$server = "$_"
if ($_ -ne "") {
Write-host "Exporting installed hotfix details of $server, pasting output in c:\windows\temp"
$QFE = Get-hotfix -computername $server | select-object -property Description,HotFixID,InstalledBy,InstalledOn | export-csv c:\windows\temp\$server.csv

}
}
END {}
}
cls
$ScriptPath = Split-Path $MyInvocation.MyCommand.Path
$LogFile = $Scriptpath+"\windows\temp"
Get-Content $Scriptpath"\computers.txt" | exportqfe