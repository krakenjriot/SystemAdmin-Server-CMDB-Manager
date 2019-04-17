     Param(
        [Parameter(Mandatory=$True,Position=1)]
            [string]$hostname,
        [switch]$force = $false
     )
    
     
     #gwmi win32_bios -ComputerName  $hostname | fl SerialNumber 
     #write-host $hostname;


    $BIOSInfo = Get-WmiObject win32_BIOS -ComputerName $hostname #Get Network Information
    $sn = $BIOSInfo.SerialNumber
	
	$CompSystem = Get-WmiObject Win32_Computersystem -ComputerName $hostname #Get Network Information
    $model = $CompSystem.model
    $tab = [char]9
    
    #$header = "Hostname" + $tab + "Serial Number" + $tab + $tab + "Model"
    #$str = $hostname + $tab + $sn + $tab + $model
    
    $table = @( @{Hostname=$hostname; SerialNumber=$sn; Model=$model}) 
    
    #$table.ForEach({[PSCustomObject]$_}) | Format-Table -AutoSize
    $table | % { new-object PSObject -Property $_} | Format-Table -AutoSize
    
    #$(foreach ($ht in $table)
    #{new-object PSObject -Property $ht}) | Format-Table -AutoSize

    #Write-Host $header;
    #Write-Host $str;
    #Write-Host $table;