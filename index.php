<?php
//Landing mvc
include 'src/configs/Config.php';
include 'src/views/landing.php';
include 'src/controllers/landing.php';
include 'src/models/landing.php';
//Write mvc
include 'src/views/write.php';
include 'src/controllers/write.php';
include 'src/models/write.php';

//Read mvc

include 'src/views/read.php';
include 'src/controllers/read.php';
include 'src/models/read.php';
//GET and POST
include 'src/configs/CreateDB.php';



session_start();

$db = new initDB();
$db->createDB();

if(isset($_REQUEST['c'])){
	$controller = $_REQUEST['c'];
	if($controller == "read"){
		$readController = new stormwind\hw3\controllers\ReadController();
		$readController->handlerRequest($_REQUEST);

	}else if($controller == "write"){
		$writeController = new stormwind\hw3\controllers\WriteController();
		$writeController->handleRequest($_REQUEST);
	} else if ($controller == "landing") {
		$landingController = new stormwind\hw3\controllers\LandingController();
		$landingController->handleRequest($_REQUEST);
	}
}else{

$landingController = new stormwind\hw3\controllers\LandingController();
$landingController->handleRequest($_REQUEST);





}


?>


<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='src/styles/mystyle.css' type='text/css'>
<title></title>
</head>
<body>

</body>
</html>

