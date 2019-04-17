 Param(
                [Parameter(Mandatory=$True,Position=1)]
                [string]$hostname,
                [switch]$force = $false
                )


###############################################################################################################################
$size = Get-ChildItem \\$hostname\c$\Users\* -Include *.iso, *.vhd -Recurse -ErrorAction SilentlyContinue |
Sort Length -Descending |
Select-Object Name, Directory,
@{Name="Size (GB)";Expression={ "{0:N2}" -f ($_.Length / 1GB) }} |
Format-Table -AutoSize | Out-String


$before = Get-WmiObject Win32_LogicalDisk -ComputerName $hostname | Where-Object { $_.DriveType -eq "3" } | Select-Object SystemName,
@{ Name = "Drive" ; Expression = { ( $_.DeviceID ) } },
@{ Name = "Size (GB)" ; Expression = {"{0:N1}" -f( $_.Size / 1gb)}},
@{ Name = "FreeSpace (GB)" ; Expression = {"{0:N1}" -f( $_.Freespace / 1gb ) } },
@{ Name = "PercentFree" ; Expression = {"{0:P1}" -f( $_.FreeSpace / $_.Size ) } } |
Format-Table -AutoSize | Out-String



Get-Service -Name wuauserv | Stop-Service -Force -verbose -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\Windows\SoftwareDistribution\*" -Recurse -Force -verbose -ErrorAction    SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\Windows\Temp\*" -Recurse -Force -verbose -ErrorAction SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\Windows\prefetch\*" -Recurse -Force -verbose -ErrorAction SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\inetpub\logs\LogFiles\*" -Recurse -Force -verbose -ErrorAction SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\Users\*\AppData\Local\Temp" -Force -verbose -ErrorAction SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\Users\*\AppData\Local\Microsoft\Windows\Temporary Internet Files" -Recurse -Force -verbose -ErrorAction SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\Users\*\AppData\Local\Microsoft\Windows\History\*" -Recurse -Force -verbose -ErrorAction SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

Get-ChildItem "\\$hostname\c$\Users\*\AppData\Local\Microsoft\Windows\INetCookies\*" -Recurse -Force -verbose -ErrorAction SilentlyContinue | Remove-Item -Force -Verbose -Recurse -ErrorAction SilentlyContinue

$after = Get-WmiObject Win32_LogicalDisk -ComputerName $hostname | Where-Object { $_.DriveType -eq "3" } | Select-Object SystemName,
@{ Name = "Drive" ; Expression = { ( $_.DeviceID ) } },
@{ Name = "Size (GB)" ; Expression = {"{0:N1}" -f( $_.Size / 1gb)}},
@{ Name = "FreeSpace (GB)" ; Expression = {"{0:N1}" -f( $_.Freespace / 1gb ) } },
@{ Name = "PercentFree" ; Expression = {"{0:P1}" -f( $_.FreeSpace / $_.Size ) } } |
Format-Table -AutoSize | Out-String

#Get-RecycleBinSize -ComputerName $hostname -Drive C: -Empty


Get-Service -Name wuauserv | Start-Service -Verbose

$hostname ; Get-Date | Select-Object DateTime
Write-Host "Before: $before"
Write-Host "After: $after"
#Write-Host $size
