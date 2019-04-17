     Param(
        [Parameter(Mandatory=$True,Position=1)]
            [string]$hostname,
        [switch]$force = $false
       )


$admins = Gwmi win32_groupuser –computer $hostname   
$admins = $admins | ? {$_.groupcomponent –like '*"Administrators"'}  
  
$admins | % {  
$_.partcomponent –match “.+Domain\=(.+)\,Name\=(.+)$” > $nul  
$matches[1].trim('"') + “\” + $matches[2].trim('"')  
}  

#
#
#$tmp1  = Invoke-Command -ComputerName $thostname -ScriptBlock {   
#    #$Computer = "aproscomms704"
#
#          
#    $KeyName = "SOFTWARE\Microsoft\Virtual Machine\Guest\Parameters"            
#    $ValueName = "PhysicalHostNameFullyQualified"          
#
#            
#    $CompObj = Get-WMIObject -Class Win32_ComputerSystem -ComputerName $thostname -ErrorAction Stop            
#  
#    $BaseKeyObj = [Microsoft.Win32.RegistryKey]::OpenRemoteBaseKey("LocalMachine", $thostname)            
#    $KeyObj = $BaseKeyObj.OpenSubKey($KeyName)            
#    $tmp = $KeyObj.GetValue($ValueName)            
# 
#    #write-host $tmp
#  
#      
#  
#      
#
#      return $tmp
#    
#    } ### Invoke-Command