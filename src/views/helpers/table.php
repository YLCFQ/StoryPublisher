<?php
namespace stormwind\hw3\helpers;

require_once('helper.php');

class Table extends Helper{
	public function render($data){
		echo "<table>";
		for($i = 0; $i < sizeof($data); $i++){
			echo "<tr><td>" . $data[$i] . "</td></tr>";
		}
		echo "</table>";
	}
}

?>