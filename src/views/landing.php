<?php
namespace stormwind\hw3\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/Link.php');
require_once('helpers/form.php');
require_once('helpers/h3_orderedlist.php');

echo "<link rel='stylesheet' href='/styles/mystyle.css' type='text/css'>";

class LandingView extends View{
	public function render($data){
		//Declare the classes I will be using here
		$h1 = new \stormwind\hw3\elements\h1();
		$link = new \stormwind\hw3\elements\Link();
		$genreForm = new \stormwind\hw3\helpers\genreForm();
		$h3orderedList = new \stormwind\hw3\helpers\h3orderedList();

		$linkToWrite = array("index.php?c=write", "Write Something!");

		echo $h1->render("Five Thousand Characters") . 
		$link->render($linkToWrite) .
		"<br><h2> Check out what people are writing</h2>";

		
		$genreForm->render($data);

	
		//Most Viewed
		$highestRated['title'] = "Highest Rated";
		$highestRated['list'] = $data['highest_rated'];
		$h3orderedList->render($highestRated);

		$mostViewed['title'] = "Most Viewed";
		$mostViewed['list'] = $data['most_viewed'];
		$h3orderedList->render($mostViewed);
		//Newest

		$newest['title'] = "Newest";
		$newest['list'] = $data["newest"];
		$h3orderedList->render($newest);



	}
}
?>