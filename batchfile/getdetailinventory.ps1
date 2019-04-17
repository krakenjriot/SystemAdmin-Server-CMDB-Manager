     Param(
        [Parameter(Mandatory=$True,Position=1)]
            [string]$thostname,[string]$domainname,[string]$reportname,
        [switch]$force = $false
       )
     
    
     #$thostname = "aproscomms701"
     #$domainname = "nwc.com.sa"
     #$reportname = "test.csv"

     
     ##################################################################################         
     #$reportname = "t_serverdet_tmp"   
     $upload = "t_serverdet_tmp.csv"   
     $error1 = "error.csv"
     $pingfailed = "failed.csv" 
     
     $header = ""
     $rowdata_csv = ""

     ##################################################################################
     #Remove-Item "C:\xampp\htdocs\kraken\batchfile\raw\*.*" | Where { ! $_.PSIsContainer }    
     #Remove-Item "C:\xampp\htdocs\kraken\batchfile\report\*.*" | Where { ! $_.PSIsContainer }    
     
     $checkrep = Test-Path "C:\xampp\htdocs\kraken\batchfile\report\$upload"
 
     If ($checkrep -like "True") 
         { 
            Remove-Item "C:\xampp\htdocs\kraken\batchfile\report\$upload" -Force
         }
            #New-Item "C:\xampp\htdocs\kraken\batchfile\report\$upload" -type file

     ##################################################################################
          ##################################################################################
     
     $checkrep = Test-Path "C:\xampp\htdocs\kraken\batchfile\raw\header.h"
 
     If ($checkrep -like "True") 
         { 
            Remove-Item "C:\xampp\htdocs\kraken\batchfile\raw\header.h" -Force
         }
            #New-Item "C:\xampp\htdocs\kraken\batchfile\raw\header.h"  -type file

     ##################################################################################

     $checkrep = Test-Path "C:\xampp\htdocs\kraken\batchfile\raw\$pingfailed"
 
     If ($checkrep -like "True") 
         { 
            Remove-Item "C:\xampp\htdocs\kraken\batchfile\raw\$pingfailed" -Force
         }
            #New-Item "C:\xampp\htdocs\kraken\batchfile\raw\$pingfailed" -type file
     
     ##################################################################################
     ##################################################################################
     $checkrep = Test-Path "C:\xampp\htdocs\kraken\batchfile\raw\$error1"
 
     If ($checkrep -like "True") 
         { 
            Remove-Item "C:\xampp\htdocs\kraken\batchfile\raw\$error1" -Force
         }
            #New-Item "C:\xampp\htdocs\kraken\batchfile\raw\$error1" -type file
     
    ##################################################################################
  

            
    ######################################################################################################################################################### 
	#########################################################################################################################################################
	#########################################################################################################################################################
	#########################################################################################################################################################
	#########################################################################################################################################################
	#########################################################################################################################################################
	
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='A:'" | Select-Object Size #,FreeSpace
    $DriveA = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='B:'" | Select-Object Size #,FreeSpace
    $DriveB = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='C:'" | Select-Object Size #,FreeSpace
    $DriveC = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='D:'" | Select-Object Size #,FreeSpace
    $DriveD = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='E:'" | Select-Object Size #,FreeSpace
    $DriveE = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='F:'" | Select-Object Size #,FreeSpace
    $DriveF = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='G:'" | Select-Object Size #,FreeSpace
    $DriveG = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='H:'" | Select-Object Size #,FreeSpace
    $DriveH = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='I:'" | Select-Object Size #,FreeSpace
    $DriveI = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='J:'" | Select-Object Size #,FreeSpace
    $DriveJ = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='K:'" | Select-Object Size #,FreeSpace
    $DriveK = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='L:'" | Select-Object Size #,FreeSpace
    $DriveL = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='M:'" | Select-Object Size #,FreeSpace
    $DriveM = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='N:'" | Select-Object Size #,FreeSpace
    $DriveN = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='O:'" | Select-Object Size #,FreeSpace
    $DriveO = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='P:'" | Select-Object Size #,FreeSpace
    $DriveP = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='Q:'" | Select-Object Size #,FreeSpace
    $DriveQ = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='R:'" | Select-Object Size #,FreeSpace
    $DriveR = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='S:'" | Select-Object Size #,FreeSpace
    $DriveS = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='T:'" | Select-Object Size #,FreeSpace
    $DriveT = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='U:'" | Select-Object Size #,FreeSpace
    $DriveU = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='V:'" | Select-Object Size #,FreeSpace
    $DriveV = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='W:'" | Select-Object Size #,FreeSpace
    $DriveW = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='X:'" | Select-Object Size #,FreeSpace
    $DriveX = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='Y:'" | Select-Object Size #,FreeSpace
    $DriveY = [Math]::Round($disk.Size / 1GB)
    
    $disk = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='Z:'" | Select-Object Size #,FreeSpace
    $DriveZ = [Math]::Round($disk.Size / 1GB)


    $wmiOS = Get-WmiObject -ComputerName $thostname -Class Win32_OperatingSystem;
    $OSname = $wmiOS.Caption;


    
    $BIOSInfo = Get-WmiObject win32_BIOS -ComputerName $thostname  #Get Network Information
    $SerialNumber = $BIOSInfo.SerialNumber

    $OS = Get-WmiObject Win32_Computersystem -ComputerName $thostname  #Get Network Information
    $totalphysicalmemory =   [math]::round($OS.TotalPhysicalMemory / 1MB, 2)

    $CompSystem_TotalVirtualMemorySize = [math]::round($OS.TotalVirtualMemorySize / 1MB, 2)
    $CompSystem_TotalVisibleMemorySize = [math]::round(($OS.TotalVisibleMemorySize / 1MB), 2) 
    
    $CompSystem = Get-WmiObject Win32_Computersystem -ComputerName $thostname  #Get Network Information

    $model = $CompSystem.model
     

    $domainname = $CompSystem.Domain    
    $CompSystem_Description = $CompSystem.Description
    $CompSystem_Caption = $CompSystem.Caption
    $CompSystem_OSArchitecture = $CompSystem.OSArchitecture
    $CompSystem_ServicePackMajorVersion = $CompSystem.ServicePackMajorVersion
    
     

    $CPUInfo = Get-WmiObject Win32_Processor -ComputerName $thostname  #Get CPU Information
    $CPUName = $CPUInfo.Name
    $CPUDescription = $CPUInfo.Description
    $CPUManufacturer = $CPUInfo.Manufacturer
    $CPUCurrentClockSpeed = $CPUInfo.CurrentClockSpeed
    $CPUNumberOfCores = $CPUInfo.NumberOfCores
    $CPUNumberOfLogicalProcessors = $CPUInfo.NumberOfLogicalProcessors

       
    $rdpIpv4 = (Get-WmiObject Win32_NetworkAdapterConfiguration -ComputerName $thostname  | where { (($_.IPEnabled -ne $null) -and ($_.DefaultIPGateway -ne $null)) } | select IPAddress -First 1).IPAddress[0]+","    
    
    $MAC = (Get-WmiObject Win32_NetworkAdapterConfiguration -ComputerName $thostname  | where { (($_.IPEnabled -ne $null) -and ($_.DefaultIPGateway -ne $null)) } | select MACAddress -First 1).MACAddress+","        
    $defaultgateway = (Get-WmiObject Win32_NetworkAdapterConfiguration -ComputerName $thostname  | where { (($_.IPEnabled -ne $null) -and ($_.DefaultIPGateway -ne $null)) } | select DefaultIPGateway -First 1).DefaultIPGateway[0]+","    
    $dns1 = (Get-WmiObject Win32_NetworkAdapterConfiguration -ComputerName $thostname  | where { (($_.IPEnabled -ne $null) -and ($_.DefaultIPGateway -ne $null)) } | select DNSServerSearchOrder -First 1).DNSServerSearchOrder[0]+","    
    $dns2 = (Get-WmiObject Win32_NetworkAdapterConfiguration -ComputerName $thostname  | where { (($_.IPEnabled -ne $null) -and ($_.DefaultIPGateway -ne $null)) } | select DNSServerSearchOrder -First 1).DNSServerSearchOrder[1]+","    
    $subnetmask = (Get-WmiObject Win32_NetworkAdapterConfiguration -ComputerName $thostname  | where { (($_.IPEnabled -ne $null) -and ($_.DefaultIPGateway -ne $null)) } | select ipsubnet -First 1).ipsubnet[0]+","    
           
    

    
    #################################################################################       
    #################################################################################  
    $header      = "fqdn,"    
    $fqdn = "$thostname.$domainname"
    $rowdata_csv = "$thostname.$domainname," #hostname        
    #Write-Host "FQDN: $fqdn"
    #################################################################################       
    #################################################################################  
    $header      += "tHostname,"    
    $rowdata_csv += "$thostname," #hostname
    #Write-Host "`n`rHostname: $thostname"
    #Write-Host "Hostname: $thostname"
    #################################################################################   
    #################################################################################  
    $header      += "DomainName,"
    $rowdata_csv += "$domainname," # domainname
    #Write-Host "Domain Name: $domainname"
    #################################################################################       
    ##################################################################################  
    
    $tmp1  = Invoke-Command -ComputerName $thostname -ScriptBlock {   
              
    $KeyName = "SOFTWARE\Microsoft\Virtual Machine\Guest\Parameters"            
    $ValueName = "PhysicalHostNameFullyQualified"  
            
    $CompObj = Get-WMIObject -Class Win32_ComputerSystem -ComputerName $thostname -ErrorAction Stop            
  
    $BaseKeyObj = [Microsoft.Win32.RegistryKey]::OpenRemoteBaseKey("LocalMachine", $thostname)            
    $KeyObj = $BaseKeyObj.OpenSubKey($KeyName)            
    $tmp = $KeyObj.GetValue($ValueName)            
 
    #write-host $tmp
    return $tmp
    
    } ### Invoke-Command
	
 
    $header      += "hostfqdn,"     
    if($model -like "Virtual Machine") #machinetype
        {				     
			$rowdata_csv += "$tmp1,"
        }
    else
        {   			
			$rowdata_csv += "na,"
        } 
  
     
    #################################################################################  
    $header      += "rdpIPv4,"    
    $rowdata_csv += "$rdpIPv4"
    #Write-Host "RDP IPv4: $rdpIPv4"
    ################################################################################# 
    $header      += "rdpIPv4Mac,"    
    $rowdata_csv += "$MAC"     
    #Write-Host "RDP IPv4 MAC: $MAC"
    ################################################################################# 
   #################################################################################  
    $header      += "DefaultGateway,"    
    $rowdata_csv += "$defaultgateway" 
    #Write-Host "Default Gateway: $defaultgateway"
    #################################################################################      
    #################################################################################  
    $header      += "DNS1,"    
    $rowdata_csv += "$dns1" 
    #Write-Host "DNS1: $dns1"
    #################################################################################      
    #################################################################################  
    $header      += "DNS2,"    
    $rowdata_csv += "$dns2"    
    #Write-Host "DNS2: $dns2"
    #################################################################################  
    ##################################################################################  
    $header      += "SubnetMask,"    
    $rowdata_csv += "$subnetmask"    
    #Write-Host "Subnet Mask: $subnetmask"
    #################################################################################  
    ################################################################################# 
    #$header      += "dhcpenabled,"
    #$IsDHCPEnabled = "false"            
    #If($NetInfo.DHCPEnabled) {            
    # $IsDHCPEnabled = "true"          
    #}          
    #$rowdata_csv += "$IsDHCPEnabled," #dhcpenabled     
    #################################################################################
    #################################################################################  
    $header      += "MachineType,"       
    if($model -like "Virtual Machine") #machinetype
        {
            $rowdata_csv += "Virtual,"  
        }
    else
        {    
            $rowdata_csv += "Physical,"
        }

	
    #Write-Host "Machine Type: $machinetype"
    #################################################################################          
    ################################################################################# 
    $header      += "SerialNumber,"
    $rowdata_csv += "$SerialNumber," #serialnumber    
    #Write-Host "SerialNumber: $SerialNumber"
    #################################################################################  
    $header      += "Model,"    
    $rowdata_csv += "$model," #model
    #Write-Host "Model: $model"
    #################################################################################  
    $header      += "OSname,"    
    $rowdata_csv += "$OSname,"
    #Write-Host "Operating System: $OSname"
    #################################################################################  
    #$header      += "oscaption,"
    #$rowdata_csv += "$CompSystem_Caption," #oscaption
    #################################################################################  
    #$header      += "osarch,"
    #$rowdata_csv += "$CompSystem_OSArchitecture," #osarch
    #################################################################################  
    #$header      += "ossp,"
    #$rowdata_csv += "$CompSystem_ServicePackMajorVersion," #ossp
    #################################################################################  
    $header      += "TotalPhysicalMemoryMB,"
    $rowdata_csv += "$totalphysicalmemory," #totalvisiblememory CompSystem_TotalVirtualMemorySize
    #Write-Host "Total Physical Memory (MB): $totalphysicalmemory"
    #################################################################################  
    $header      += "CPUname,"    
    $rowdata_csv += "$CPUName," #cpuname
    #Write-Host "CPU Name: $CPUName"
    ##################################################################################  
    #$header      += "cpudesc,"
    #$rowdata_csv += "$CPUInfo_Description," #cpudesc
    ##################################################################################  
    $header      += "CPUManufacturer,"
    $rowdata_csv += "$CPUManufacturer," #cpumanufacturer
    #Write-Host "CPU Manufacturer: $CPUManufacturer"
    #################################################################################  
    $header      += "CPUClockSpeed,"
    $rowdata_csv += "$CPUCurrentClockSpeed," #cpuclockspeed  
    #################################################################################  
    $header      += "CPUNumberOfCore,"
    $rowdata_csv += "$CPUNumberOfCores," #cpunumberofcore
    #Write-Host "CPU Number Of Core: $CPUNumberOfCores"
    #################################################################################  
    $header      += "CPUNumberOfLogicalProcessor,"
    $rowdata_csv += "$CPUNumberOfLogicalProcessors," #cpunumberoflogicalprocessor
    #Write-Host "CPU Number Of Logical Processor: $CPUNumberOfLogicalProcessors"
    #################################################################################  
    ##################################################################################  
    $InstalledDate = ([WMI] "").ConvertToDateTime((Get-WmiObject Win32_OperatingSystem -ComputerName $thostname).InstallDate)
	$header      += "InstalledDate,"    
    $rowdata_csv += "$InstalledDate,"    
    #Write-Host "Subnet Mask: $subnetmask"
    #################################################################################     
    ####################################################################################
    $header      += "DriveA,"
    $rowdata_csv += "$DriveA,"
    #################################################################################  
    ###################################################################################
    $header      += "DriveB,"
    $rowdata_csv += "$DriveB,"
    #################################################################################  
    ###################################################################################
    $header      += "DriveC,"
    $rowdata_csv += "$DriveC,"
    #################################################################################   
    ###################################################################################
    $header      += "DriveD,"
    $rowdata_csv += "$DriveD,"
    #################################################################################                 
    ###################################################################################
    $header      += "DriveE,"
    $rowdata_csv += "$DriveE,"
    ################################################################################# 
    ###################################################################################
    $header      += "DriveF,"
    $rowdata_csv += "$DriveF,"
    ###################################################################################
    $header      += "DriveG,"
    $rowdata_csv += "$DriveG,"
    #################################################################################   
    ###################################################################################
    $header      += "DriveH,"
    $rowdata_csv += "$DriveH,"
    ################################################################################# 
    ###################################################################################
    $header      += "DriveI,"
    $rowdata_csv += "$DriveI,"
    ################################################################################# 
    ###################################################################################
    $header      += "DriveJ,"
    $rowdata_csv += "$DriveJ,"
    ###################################################################################
    $header      += "DriveK,"
    $rowdata_csv += "$DriveK,"
    ###################################################################################
    $header      += "DriveL,"
    $rowdata_csv += "$DriveL,"
    ###################################################################################
    $header      += "DriveM,"
    $rowdata_csv += "$DriveM,"
    ###################################################################################
    $header      += "DriveN,"
    $rowdata_csv += "$DriveN,"
    ###################################################################################
    $header      += "DriveO,"
    $rowdata_csv += "$DriveO,"
    ###################################################################################
    $header      += "DriveP,"
    $rowdata_csv += "$DriveP,"
    ###################################################################################
    $header      += "DriveQ,"
    $rowdata_csv += "$DriveQ,"
    ###################################################################################
    $header      += "DriveR,"
    $rowdata_csv += "$DriveR,"
    ###################################################################################
    $header      += "DriveS,"
    $rowdata_csv += "$DriveS,"
    ###################################################################################
    $header      += "DriveT,"
    $rowdata_csv += "$DriveT,"
    ###################################################################################
    $header      += "DriveU,"
    $rowdata_csv += "$DriveU,"
    ###################################################################################
    $header      += "DriveV,"
    $rowdata_csv += "$DriveV,"
    ###################################################################################
    $header      += "DriveW,"
    $rowdata_csv += "$DriveW,"
    ###################################################################################
    $header      += "DriveX,"
    $rowdata_csv += "$DriveX,"
    ###################################################################################
    $header      += "DriveY,"
    $rowdata_csv += "$DriveY,"
    ###################################################################################
    $header      += "DriveZ,"
    $rowdata_csv += "$DriveZ,"
    #################################################################################  
    
    #$namef = $thostname.ToString().ToLower()
    $rowdata_csv = $rowdata_csv.ToString().ToLower()
    $header = $header.ToString().ToLower()

    

    #add-content -path "C:\xampp\htdocs\kraken\batchfile\raw\$namef.1" -value $rowdata_csv
    #Remove-Item "C:\xampp\htdocs\kraken\batchfile\report\*.*" | Where { ! $_.PSIsContainer }   
    #add-content -path "C:\xampp\htdocs\kraken\batchfile\raw\header.h" -value $header

    #################################################################################  

    <#######################################################################################################################################> 
    #$header = "fqdn,driveletter,drivename,totalsizegb,usedsizegb,freesspacegb,percentfreespace" 
    ################################################################################     
    ##$checkrep = Test-Path "C:\xampp\htdocs\kraken\batchfile\raw\*.1"
    ##If ($checkrep -like "True") 
    ##{ 
    ##    cat "C:\xampp\htdocs\kraken\batchfile\raw\*.1" | sc "C:\xampp\htdocs\kraken\batchfile\raw\rowdata.1"
    ##    $rowdata_csv1 = get-content "C:\xampp\htdocs\kraken\batchfile\raw\rowdata.1"          
    ##}
    #################################################################################################                        
    ##$date1 = get-date -f yyyy-MM-dd-hh-mm-ss    

    #$header = Get-Content -path "C:\xampp\htdocs\kraken\batchfile\raw\header.h" -Last 1      

    add-content -path "C:\xampp\htdocs\kraken\batchfile\report\$reportname" -value $header
    add-content -path "C:\xampp\htdocs\kraken\batchfile\report\$reportname" -value $rowdata_csv    

    Import-Csv C:\xampp\htdocs\kraken\batchfile\report\$reportname | Format-List

    ##$date = get-date -f yyyy-MM-dd-hh-mm-ss
    ##$thostname = $thostname.ToString().ToLower()
    #Copy-Item "C:\xampp\htdocs\kraken\batchfile\report\$reportname.csv" "C:\xampp\htdocs\kraken\_windows\uploads\$reportname-$thostname.csv"   
    
    
    
    
    ############################################################################### 
 
    ###########Define Variables######## 
     
    #$fromaddress = "donotreply@nwc.com.sa" 
    #$toaddress = "rolly@nwc.com.sa" 
    #$bccaddress = "rolly@nwc.com.sa" 
    #$CCaddress = "rolly@nwc.com.sa" 
    #$Subject = "Action Required" 
    #$body = "_" #get-content .\content.htm 
    #$attachment = "C:\xampp\htdocs\kraken\_windows\uploads\$reportname-$thostname.csv" 
    #$smtpserver = "smtp.nwc.com.sa" 
     
    #################################### 
     
    #$message = new-object System.Net.Mail.MailMessage 
    #$message.From = $fromaddress 
    #$message.To.Add($toaddress) 
    #$message.CC.Add($CCaddress) 
    #$message.Bcc.Add($bccaddress) 
    #$message.IsBodyHtml = $True 
    #$message.Subject = $Subject 
    #$attach = new-object Net.Mail.Attachment($attachment) 
    #$message.Attachments.Add($attach) 
    #$message.body = $body 
    #$smtp = new-object Net.Mail.SmtpClient($smtpserver) 
    #$smtp.Send($message) 
     
    #################################################################################
    
    
        
    #Copy-Item "C:\xampp\htdocs\kraken\batchfile\report\$reportname.csv" "C:\xampp\htdocs\kraken\uploads\$reportname.csv"       

    #add-content -path "C:\xampp\htdocs\kraken\batchfile\report\$upload" -value $rowdata_csv1
    #$date1 = get-date -f yyyy-MM-dd-hh-mm-ss
    #Copy-Item "C:\xampp\htdocs\kraken\batchfile\raw\$reportname" "\\scom3\scriptdata\$reportname-$date.csv"       
    ##################################################################################
    
    
    ###################################################################################     
    #$checkrep = Test-Path "C:\xampp\htdocs\kraken\batchfile\raw\*.2"
    #
    #If ($checkrep -like "True") 
    #{ 
    #    cat "C:\xampp\htdocs\kraken\batchfile\raw\*.2" | sc "C:\xampp\htdocs\kraken\batchfile\raw\rowdata.2"
    #    $rowdata_csv2 = get-content "C:\xampp\htdocs\kraken\batchfile\raw\rowdata.2"
    #    add-content -path "C:\xampp\htdocs\kraken\batchfile\raw\$pingfailed" -value $rowdata_csv2
    #        
    #}
    ##################################################################################

  ##################################################################################     
     #$checkrep = Test-Path "C:\xampp\htdocs\kraken\batchfile\raw\*.3"
     #
     #If ($checkrep -like "True") 
     #    { 
     #       cat "C:\xampp\htdocs\kraken\batchfile\raw\*.3" | sc "C:\xampp\htdocs\kraken\batchfile\raw\rowdata.3"
     #       $rowdata_csv3 = get-content "C:\xampp\htdocs\kraken\batchfile\raw\rowdata.3"
     #       add-content -path "C:\xampp\htdocs\kraken\batchfile\raw\$error" -value $rowdata_csv3
     #       
     #    }
  ##################################################################################
      
    #$table1 = @(     
    #@{ 
    #Hostname=$thostname;
    #OSname=$OSname;
    #rdpIPv4=$rdpIPv4;         
    #SerialNumber=$SerialNumber;
    #Model=$model;    
    #DriveC=$DriveC;
    #TotalPhysicalMemory=$totalphysicalmemory; 
    #}   
    #)  
    #$table1 | % { new-object PSObject -Property $_ } | Format-Table -Wrap -AutoSize `
    #Hostname, SerialNumber, Model
    ###################################################################################  
    
    
    ##################################################################################
    #$diskFreeSpace = Get-WmiObject Win32_LogicalDisk -ComputerName $thostname -Filter "DeviceID='C:'" | Select-Object FreeSpace     
    #$DriveCFree = [Math]::Round($diskFreeSpace.FreeSpace / 1GB)  
    #
    #$table2 = @(     
    #@{ 
    #OSname=$OSname;
    #DriveC=$DriveC;
    #TotalPhysicalMemory=$totalphysicalmemory; 
    #DriveCFree=$DriveCFree;
    #}   
    #)  
    #$table2 | % { new-object PSObject -Property $_ } | Format-Table -Wrap -AutoSize `
    #OSname, DriveC,DriveCFree,TotalPhysicalMemory
    ###################################################################################        

    ###################################################################################
    #$table3 = @(     
    #@{ 
    #RDPIPv4=$rdpIPv4;
    #RDPIPv4MAC=$rdpIPv4Mac;
    #DefaultGateway=$defaultgateway; 
    #DNS1=$dns1;
    #DNS2=$dns2;
    #}    
    #
    #)
    #$table3 | % { new-object PSObject -Property $_ } | Format-Table -Wrap -AutoSize `
    #rdpIPv4,rdpIPv4Mac, defaultgateway,dns1, dns2

    ###################################################################################
    #$table4 = @(     
    #@{ 
    #CPUName=$CPUName; 
    #CPUManufacturer=$CPUManufacturer; 
    #CPUCurrentClockSpeed=$CPUCurrentClockSpeed; 
    #CPUNumberOfCores=$CPUNumberOfCores; 
    #CPUNumberOfLogicalProcessors=$CPUNumberOfLogicalProcessors; 
    #}    
    #
    #)
    #$table4 | % { new-object PSObject -Property $_ } | Format-Table -Wrap -AutoSize `
    #CPUNumberOfCores, CPUNumberOfLogicalProcessors,CPUName
    
