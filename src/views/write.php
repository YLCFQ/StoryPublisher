<?php
namespace stormwind\hw3\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/Link.php');
require_once('helpers/writeform.php');

class WriteView extends View{
	public function render($data){
		//['writeform']['title']


		$h1 = new \stormwind\hw3\elements\h1();
		$link = new \stormwind\hw3\elements\Link();
		$linkToWrite = array("index.php?c=landing", "Five Thousand Characters");

		echo $h1->render($link->render($linkToWrite) . " - Write Something");

		$writeForm = new \stormwind\hw3\helpers\writeForm();


		$testGenre = ["hello", "world"];
		$writeForm->render($data);



		
	}
}
?>