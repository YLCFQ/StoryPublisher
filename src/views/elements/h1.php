<?php
namespace stormwind\hw3\elements;

require_once('element.php');

class h1 extends Element{
	public function render($data){
		return "<h1>" . $data . "</h1>";
	}
}

?>