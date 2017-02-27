<?php
namespace stormwind\hw3\models;

require_once('model.php');

class LandingModel extends Model{

	public function getNewestStories($filter, $genre){

		$query = "SELECT * FROM story WHERE title LIKE '%" . $filter . "%' AND genre LIKE '%". $genre . "%' ORDER BY date DESC LIMIT 10";
		if($genre == "allgenres"){
			$query = "SELECT * FROM story WHERE title LIKE '%" . $filter . "%' ORDER BY date DESC LIMIT 10";
		}
		$result = mysqli_query($this->mysql, $query);
		$result_array = array();
		while($row = mysqli_fetch_assoc($result)){
			$story['id'] = $row['storyID'];
			$story['title'] = $row['title'];
			array_push($result_array, $story);
		}
		$result->free();

		return $result_array;

	}
	public function getMostViewedStories($filter, $genre){
		$query = "SELECT * FROM story WHERE title LIKE '%" . $filter . "%' AND genre LIKE '%" . $genre . "%' ORDER BY views LIMIT 10";
		if($genre =="allgenres"){
			$query = "SELECT * FROM story WHERE title LIKE '%" . $filter . "%' ORDER BY views LIMIT 10";
		}
		$result = mysqli_query($this->mysql, $query);
		$result_array = array();
		while($row = mysqli_fetch_assoc($result)){
			$story['id'] = $row['storyID'];
			$story['title'] = $row['title'];
			array_push($result_array, $story);
		}
		$result->free();

		return $result_array;
	}



	public function getHighestRatedStories($filter, $genre){
		$query = "SELECT * FROM story JOIN rating ON story.storyID = rating.storyID WHERE story.title LIKE '%" . $filter . "%' AND story.genre LIKE '%" . $genre . "%' ORDER BY rating.SUM_OF_RATINGS_SO_FAR DESC LIMIT 10";
		if($genre =="allgenres"){
			$query = "SELECT * FROM story JOIN rating ON story.storyID = rating.storyID WHERE story.title LIKE '%" . $filter . "%' ORDER BY rating.SUM_OF_RATINGS_SO_FAR DESC LIMIT 10";
		}
		$result = mysqli_query($this->mysql, $query);
		$result_array = array();
		while($row = mysqli_fetch_assoc($result)){
			$story['id'] = $row['storyID'];
			$story['title'] = $row['title'];
			array_push($result_array, $story);
		}
		$result->free();

		return $result_array;
	}

}

?>