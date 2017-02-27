<?php
namespace stormwind\hw3\helpers;
require_once('helper.php');

class writeForm extends Helper{
	public function render($data) {

		if(isset($data['writeform'])){
			echo "<form action='index.php?c=write&action=post_write' method='post' id='userform'>";
			echo "<select name='c' style='display:none;'>";
			echo "<option value='write'>Go to write</option>";
			echo "</select>";
			echo "<select name='m' style='display:none;'>";
			echo "<option value='writeform'>Go to write</option>";
			echo "</select>";
			echo "<label>Title <input type='text' name ='title' value='" . $data['writeform']['title'] . "'/> </label><br>";
			echo "<label>Author <input type='text' name ='author' value='" . $data['writeform']['author'] . "'/> </label><br>";
			echo "<label>Identifier <input type='text' name = 'identifier' value='" . $data['writeform']['identifier'] ."'/></label><br>";
			echo "<label>Genre <select multiple name='genre'>";
			for ($i = 0 ; $i < sizeof($GLOBALS['genres']) ; $i++) {
				if($data['writeform']['genre'] == $GLOBALS['genres'][$i]){
					echo "<option selected value='" . $GLOBALS['genres'][$i] . "'>" . $GLOBALS['genres'][$i]. "</option>";
				}else{
					echo "<option value='" . $GLOBALS['genres'][$i] . "'>" . $GLOBALS['genres'][$i]. "</option>";
				}
				
			}
			echo "</select></label><br>";
			echo "<textarea name='description' id='userform' row='4' cols='50' maxlength = '5000'placeholder='Enter text here...'>" . $data['writeform']['description'] . "</textarea><br>";
			echo "<input type='reset' value = 'Reset'>";
			echo "<input type='submit' value ='Save'>";
			echo "</form>";
		}else{
			echo "<form action='index.php?c=write&action=post_write' method='post' id='userform'>";
			echo "<select name='c' style='display:none;'>";
			echo "<option value='write'>Go to write</option>";
			echo "</select>";
			echo "<select name='m' style='display:none;'>";
			echo "<option value='writeform'>Go to write</option>";
			echo "</select>";
			echo "<label>Title <input type='text' name ='title' value=''/> </label><br>";
			echo "<label>Author <input type='text' name ='author' value=''/> </label><br>";
			echo "<label>Identifier <input type='text' name = 'identifier' value=''/></label><br>";
			echo "<label>Genre <select name='genre'>";
			for ($i = 0 ; $i < sizeof($GLOBALS['genres']) ; $i++) {
				echo "<option value='" . $GLOBALS['genres'][$i] . "'>" . $GLOBALS['genres'][$i]. "</option>";
			}
			echo "</select></label><br>";
			echo "<textarea name='description' form='userform' row='4' cols='50' maxlength = '5000' placeholder='Enter text here...'></textarea><br>";
			echo "<input type='reset' value = 'Reset'>";
			echo "<input type='submit' value ='Save'>";
			echo "</form>";
		}



	}
}

?>