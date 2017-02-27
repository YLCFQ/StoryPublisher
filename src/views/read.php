<?php
namespace stormwind\hw3\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/Link.php');

class ReadView extends View{
	public function render($data){

		$h1 = new \stormwind\hw3\elements\h1();
		$link = new \stormwind\hw3\elements\Link();
		$linkToWrite = array("index.php?c=landing", "Five Thousand Characters");

		$r1 = array("index.php?c=read&m=rate&storyId=$data[4]&arg1=1" , " 1 ");
		$r2 = array("index.php?c=read&m=rate&storyId=$data[4]&arg1=2" , " 2 ");
		$r3 = array("index.php?c=read&m=rate&storyId=$data[4]&arg1=3" , " 3 ");
		$r4 = array("index.php?c=read&m=rate&storyId=$data[4]&arg1=4" , " 4 ");
		$r5 = array("index.php?c=read&m=rate&storyId=$data[4]&arg1=5" , " 5 ");

		echo $h1->render($link->render($linkToWrite) . " - $data[0]");
		echo "<div>";
		echo "<h4>Author: $data[1]</h4><br>";
		echo "<h4>Date: $data[2]</h4><br>";
		if ($data[5]==-1){
		echo "<p>Your Rating: ".$link->render($r1).$link->render($r2).$link->render($r3).$link->render($r4).$link->render($r5)."</p><br>";
		} else {
			echo "<p>Your Rating: ";
			for ($i = 1 ; $i < 6; $i++) {
				if ($i == $data[5]) {
					echo "<b> $i </b>";
				} else {
					echo " $i ";
				}
			}
			echo "</p><br>";
		}
		echo "</div>";
		echo "<textarea readonly>$data[3]</textarea>";
		
	}
}
?>