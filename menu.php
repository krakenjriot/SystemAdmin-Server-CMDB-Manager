<?php 
$menu_reachable = 
"<ul>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=getdetailinventory&fqdn=$fqdn' target='_blank'>Show Live Data (Realtime)</a></li>						
<!--<li><a href='showData1.php?thostname=$thostname&domainname=$domainname&osname=$osname' target='_blank'>Show Static Data (Database)</a></li>-->
<li><a href='http://$urlip/kraken/livedata.php?urlpage=listprogramfilefolder&fqdn=$fqdn' target='_blank'>Show Program Files Dir.</a></li>
<!--<li><a href='http://$urlip/kraken/livedata.php?urlpage=getPrograms&fqdn=$fqdn' target='_blank'>Get Program Installed</a></li>-->
<li><a href='http://$urlip/kraken/livedata.php?urlpage=perfv1&fqdn=$fqdn' target='_blank'>Show Machine Performance</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=getLocalAdmin&fqdn=$fqdn' target='_blank'>Get Local Admins</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=getlastbootuptime&fqdn=$fqdn' target='_blank'>Get Last Reboot</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=getserialnumber&fqdn=$fqdn' target='_blank'>Get Serial Number</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=lastuserlogintime&fqdn=$fqdn' target='_blank'>Last logged User</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=alluserlogintime&fqdn=$fqdn' target='_blank'>List All Logged Users</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=currentloggedusers&fqdn=$fqdn' target='_blank'>Currently Logged Users</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=getscreenmonitor&fqdn=$fqdn' target='_blank'>Get Screen Monitor Det.</a></li>
<li><a href='http://$urlip/kraken/livedata.php?urlpage=getdiskdetails&fqdn=$fqdn' target='_blank'>Get Disk Details</a></li>
<li><a href='sendNow.php?thostname=$thostname&domainname=$domainname&osname=$osname' target='_blank'>Get/Share/Export CSV</a></li>

<!--<li><a href='#'>Show Disk Details</a></li>
<li><a href='#'>Show Owners</a></li>-->
<li><a href='$rdp_path/remotepc.$fqdn.bat'>Manage Remotely (RDP)</a></li>
</ul>";

$menu_unreachable = 
"<ul>
<li><a href='showData1.php?thostname=$thostname&domainname=$domainname&osname=$osname' target='_blank'>Show Static Data (Database)</a></li>
</ul>";

$menu_showdatabaselink = 
"<ul>
<li><a href='deleteserver.php?thostname=$thostname&domainname=$domainname&osname=$osname'>Permanently Delete Records</a></li>
<li><a href='showData1.php?thostname=$thostname&domainname=$domainname&osname=$osname' target='_blank'>Show Static Data (Database)</a></li>
</ul>";



$menu_showdata = 
"<ul>

<li><a href='showData1.php?thostname=$thostname&domainname=$domainname&osname=$osname' target='_blank'>Show Static Data (Database)</a></li>
</ul>";

$menu_deleterecord = 
"<ul>
<li><a href='deleteserver.php?thostname=$thostname&domainname=$domainname&osname=$osname'>Permanently Delete Records</a></li>

</ul>";