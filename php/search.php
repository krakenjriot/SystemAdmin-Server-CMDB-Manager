<?php
/*******************************************/
//initialize session
set_time_limit (600);
session_start();

if(!isset($_SESSION['u_email'])) {	
  header("location: login1.php?header=Session&msg=\"Please Login\"");
  exit();
}
if($_SESSION['user_stat']==0) {
  header("location: login1.php?header=Session&msg=\"Account is not Active!\"");
  exit();
}

if($_SESSION['access_lvl']==0) {
  header("location: login1.php?header=Session&msg=\"Access Denied, Please Contact! The Administrator (4169)\"");
  exit();
}
?>

<?php
 $access_lvl = $_SESSION['access_lvl'];
?>



<?php
require_once 'db.php';
// Output HTML formats

$html = "";	
$html = '<tr>';
$html .= '<td class="small">tag_id</td>';
$html .= '<td class="small"><a href="serverdet.php?id=tag_id&query=tag_fqdn2&domain_suffix=tag_domainname" target="_blank" >tag_fqdn1</a></td>';
$html .= '<td class="small">tag_hostfqdn</td>';
$html .= '<td class="small">tag_rdpipv4</td>';
$html .= '<td class="small">tag_mac</td>';
$html .= '<td class="small">tag_serialnumber</td>';
$html .= '<td class="small">tag_model</td>';
$html .= '<td class="small">tag_osname</td>';
//$html .= '<td class="small"><a href="sendNow.php?id=tag_id&query=tag_fqdn2&domain_suffix=tag_domainname">Send</a></td>';
//$html .= '<td class="small"><a href="deleteserver.php?id=tag_id&query=tag_fqdn2">Delete</a></td>';
$html .= '</tr>';


//

//$osname = $_SESSION['osname'];
// Get the Search
$search_string = preg_replace("/[^A-Za-z0-9.:-]/", " ", $_POST['query']);
$search_string = $test_db->real_escape_string($search_string);



// Check if length is more than 1 character
if (strlen($search_string) >= 1 && $search_string !== ' ') {
	
	// Query
	$query = 'SELECT * FROM tbl_machine WHERE
	      fqdn LIKE "%'.$search_string.'%"
	OR rdpipv4 LIKE "%'.$search_string.'%"
	OR rdpipv4mac LIKE "%'.$search_string.'%"
	OR serialnumber LIKE "%'.$search_string.'%"
	OR model LIKE "%'.$search_string.'%"
	OR osname LIKE "%'.$search_string.'%"
	OR hostfqdn LIKE "%'.$search_string.'%"
	';
	

	
	
	

	//Timestamp entry of search for later display
	//$time_entry = $test_db->query($time);
	//Count how many times a query occurs
	//$query_count = $test_db->query($query_count);
	// Do the search
	$result = $test_db->query($query);
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}

	// Check for results
	if (isset($result_array)) {
		foreach ($result_array as $result) {
		// Output strings and highlight the matches
		 $d_fqdn1 = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['fqdn']);
		 $d_fqdn2 = $result['thostname'];
		 $d_id = $result['id'];
		 $d_domainname = $result['domainname'];
		 $d_rdpipv4 = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['rdpipv4']);
		 $d_rdpipv4mac = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['rdpipv4mac']);
		 $d_serialnumber = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['serialnumber']);
		 $d_model = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['model']);
		 $d_osname = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['osname']);
		 $d_hostfqdn = preg_replace("/".$search_string."/i", "<b>".$search_string."</b>", $result['hostfqdn']);
		// Replace the items into above HTML
		$o = str_replace('tag_fqdn1', $d_fqdn1, $html);
		$o = str_replace('tag_fqdn2', $d_fqdn2, $o);
		$o = str_replace('tag_hostfqdn', $d_hostfqdn, $o);
		$o = str_replace('tag_id', $d_id, $o);
		$o = str_replace('tag_rdpipv4', $d_rdpipv4, $o);
		$o = str_replace('tag_mac', $d_rdpipv4mac, $o);
		$o = str_replace('tag_serialnumber', $d_serialnumber, $o);
		$o = str_replace('tag_model', $d_model, $o);
		$o = str_replace('tag_osname', $d_osname, $o);
		$o = str_replace('tag_domainname', $d_domainname, $o);
		// Output it
		echo($o);		
			}
		}else{
		// Replace for no results
		$o = str_replace('tag_fqdn1', '<span class="label label-danger"> Match Not Found (click here to add new machine)</span>', $html);
		$o = str_replace('tag_fqdn2', $search_string, $o);
		$o = str_replace('tag_hostfqdn', 'NA', $o);
		$o = str_replace('tag_id', 'NA', $o);
		$o = str_replace('tag_rdpipv4', 'NA', $o);
		$o = str_replace('tag_mac', 'NA', $o);
		$o = str_replace('tag_serialnumber', 'NA', $o);
		$o = str_replace('tag_model', 'NA', $o);
		$o = str_replace('tag_osname', 'NA', $o);
		// Output
		echo($o);
	}
}
?>
