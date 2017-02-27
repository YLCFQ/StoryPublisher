<?php
namespace stormwind\hw3\models;

require_once('model.php');

class ReadModel extends Model{

	public function readStoryfromDatabase($storyID) {
		$arr=[];
		//$sql = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS, DB_USE);
		$statement = "SELECT author, date, content, title FROM STORY WHERE storyID = $storyID";
		$result = mysqli_query($this->mysql, $statement) or die(mysql_error());
		while($row = mysqli_fetch_assoc($result)){
			array_push($arr, $row['title']);
			array_push($arr, $row['author']);
			array_push($arr, $row['date']);
			array_push($arr, $row['content']);

		}
		return $arr;
	}

	public function updateRating($storyID, $rating) {
		$result = mysqli_query($this->mysql, "SELECT SUM_OF_RATINGS_SO_FAR, NUMBER_OF_RATINGS_SO_FAR FROM RATING WHERE storyID = $storyID");

		if (!$result) {
			mysqli_query($this->mysql, "INSERT INTO RATING Values(0, $storyID, $rating, 1 )");
		} else {
			$arr1=[];
			$arr2=[];
			while($row = mysqli_fetch_assoc($result)){
			array_push($arr1, $row['SUM_OF_RATINGS_SO_FAR']);
			array_push($arr2, $row['NUMBER_OF_RATINGS_SO_FAR']);
			$sum = $arr1[0] + $rating;
			$number = $arr2[0] + 1;
			mysqli_query($this->mysql, "UPDATE RATING SET SUM_OF_RATINGS_SO_FAR=$sum, NUMBER_OF_RATINGS_SO_FAR=$number WHERE storyID=$storyID");
		}
	}
	}

	public function checkExist($storyId){
	$checkExist = mysqli_query($this->mysql, "SELECT * FROM rating_exist WHERE userID = '" . session_id() . "' and storyID = " . $storyId);
	$found = -1;
	if($checkExist){	
		while($row = mysqli_fetch_assoc($checkExist)){
			$found = $row['ratedNumber'];
		}
		$checkExist->free();
	}
	return $found;
}
	public function updateExist($storyId, $rating) {
		mysqli_query($this->mysql, "INSERT INTO rating_exist Values('".session_id()."', $storyId, $rating)");
	}
	
	
}

?>