<?php
namespace stormwind\hw4\models;

require_once('model.php');

class DrawModel extends Model{
	//controller will sanatize the variables

	public function readTitleFromDatabase($key){

		$result = mysqli_query($this->mysql, "SELECT title FROM CHARTTABLE WHERE md5='$key'");
		if (!$result) {
			echo "query error";
		} else {
			$row = mysql_fetch_array($result);
			$result = $row['title'];
		}
		return $result
	}
	public function readContentFromDatabase($key){

		$result = mysqli_query($this->mysql, "SELECT data FROM CHARTTABLE WHERE md5='$key'");
		if (!$result) {
			echo "query error";
		} else {
			$row = mysql_fetch_array($result);
			$result = $row['data'];
		}
		return $result
	}

}

?>