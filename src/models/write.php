<?php
namespace stormwind\hw3\models;

require_once('model.php');

class WriteModel extends Model{
	//controller will sanatize the variables
	public function insertStoryIntoDatabase($title, $author, $identifier, $genre, $description){
		mysqli_query($this->mysql, "INSERT INTO story VALUES(null, '" . session_id() . "', '" . $title . "', '" . $author  . "', '" . $identifier  . "', '" . $genre  . "', '" . $description . "', current_timestamp, 0);");

		mysqli_query($this->mysql, "INSERT INTO rating VALUES('" . session_id() . "', " . mysqli_insert_id($this->mysql) .", 0, 0)");

	}
	public function getStoryFromDatabaseWithIdentifier($identifier){
		$story = [];
		$query =  "SELECT * FROM story WHERE identifier = '" . $identifier . "'";
		$result = mysqli_query($this->mysql, $query);
		//we will only get the first identifier
		$getFirst = false;
		while($row = mysqli_fetch_assoc($result)){
			if($getFirst == false){
				$story['title'] = $row['title'];
				$story['author'] = $row['author'];
				$story['identifier'] = $row['identifier'];
				$story['genre'] = $row['genre'];
				$story['description'] = $row['content'];
				$getFirst = true;
			}

		}
		$result->free();

		if($getFirst == false){
				$story['title'] = "";
				$story['author'] = "";
				$story['identifier'] = "";
				$story['genre'] = "";
				$story['description'] = "";
		}

		return $story;

	}


}

?>