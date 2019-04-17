<?php
require_once 'php/db.php';

	// Display 10 most recent search items
	$query = "SELECT * FROM tbl_machine c INNER JOIN query_data q ON c.fqdn = q.fqdn ORDER BY querycount DESC LIMIT 10";
	#$query = "SELECT * FROM tbl_machine ORDER BY id DESC LIMIT 5";
	
	// The search
	$result = $test_db->query($query);
	
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}
	
	foreach ($result_array as $result) {
			// The output
			echo '<tr>';			
			echo '<td class="small">'.$result['id'].'</td>';
			echo '<td class="small">'.$result['fqdn'].'</td>';
			echo '<td class="small">'.$result['rdpipv4'].'</td>';			
			echo '</tr>';	
	}
	
?>	