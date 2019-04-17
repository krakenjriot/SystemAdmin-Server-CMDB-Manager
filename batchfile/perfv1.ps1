 Param(
                [Parameter(Mandatory=$True,Position=1)]
                [string]$hostname,                
                [switch]$force = $false
                )
         
        #Clear out variables 
            $catch_error = $null 
            $CPULoad = $null
            $MemLoad = $null
            $CDrive = $null

                    $ping = Test-Connection -ComputerName $hostname -BufferSize 16 -quiet -count 2

                    <#######################################################################################################################################>   
                    $AVGProc = Get-WmiObject -ComputerName $hostname win32_processor | 
                    Measure-Object -property LoadPercentage -Average | Select Average
                    $OS = gwmi -Class win32_operatingsystem -ComputerName $hostname |
                    Select-Object @{Name = "MemoryUsage"; Expression = {“{0:N2}” -f ((($_.TotalVisibleMemorySize - $_.FreePhysicalMemory)*100)/ $_.TotalVisibleMemorySize) }}
                    $vol = Get-WmiObject -Class win32_Volume -ComputerName $hostname -Filter "DriveLetter = 'C:'" |
                    Select-object @{Name = "C PercentFree"; Expression = {“{0:N2}” -f  (($_.FreeSpace / $_.Capacity)*100) } }

                    #$ServerName = "$computername"
                    $CPULoad = "$($AVGProc.Average)%"
                    $MemLoad = "$($OS.MemoryUsage)%"
                    $CDrive = "$($vol.'C PercentFree')%"  
                    <#######################################################################################################################################>                      
                                   
        <#######################################################################################################################################>   
 
                #Create and display object 
                $temp = "" | Select ComputerName,"CPU Load", "MEM Load", "C: Drive Free Space", Ping 
                $temp.ComputerName = $hostname 
                $temp."CPU Load" = $CPULoad 
                $temp."MEM Load" = $MemLoad 
                $temp."C: Drive Free Space" = $CDrive 
                $temp.ping = $ping                 
                $temp 
 