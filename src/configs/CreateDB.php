<?php

class initDB{
function createDB(){
	//create DB
	$mysql = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS);
	if (!$mysql) {
    	die('Could not connect: ' . mysql_error());
	}

	$select = mysqli_select_db($mysql, DB_USE);

	if (!$select) {
	$sql = 'CREATE DATABASE '.DB_USE;
	if (!mysqli_query($mysql, $sql)) {
      echo 'Error creating database: '. DB_USE . mysql_error() . "\n";
  	}
	}
	mysqli_close($mysql);


	//create table
	$mysql2 = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS, DB_USE);
	$query = "SELECT storyID FROM STORY";
	$result = mysqli_query($mysql2, $query);

	if(empty($result)) {
        $query = "CREATE TABLE STORY (
                          storyID INT AUTO_INCREMENT,
                          userID VARCHAR(200),
                          title VARCHAR(255) NOT NULL,
                          author VARCHAR(255) NOT NULL,
                          identifier VARCHAR(255) NOT NULL,
                          genre VARCHAR(255) NOT NULL,	
                          content TEXT,
                          date TIMESTAMP,
                          views INT,
                          PRIMARY KEY (storyID)
                          )";
    $result = mysqli_query($mysql2, $query);
	}

	$query = "SELECT storyID FROM RATING";
	$result = mysqli_query($mysql2, $query);
	if(empty($result)) {
        $query = "CREATE TABLE RATING (
        				  userID VARCHAR(200),
                          storyID INT,
                          SUM_OF_RATINGS_SO_FAR INT,
                          NUMBER_OF_RATINGS_SO_FAR INT,
                          PRIMARY KEY  (userID, storyID)
                          )";
    $result = mysqli_query($mysql2, $query);
	}

  $query = "SELECT storyID FROM RATING_EXIST";
  $result = mysqli_query($mysql2, $query);
  if(empty($result)) {
        $query = "CREATE TABLE RATING_EXIST (
                  userID VARCHAR(200),
                          storyID INT,
                          ratedNumber INT,
                          PRIMARY KEY  (userID, storyID)
                          )";
    $result = mysqli_query($mysql2, $query);
  }




	$mysql2->close();

}


}
?>