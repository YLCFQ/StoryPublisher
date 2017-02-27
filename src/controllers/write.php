<?php
namespace stormwind\hw3\controllers;

require_once('controller.php');
class WriteController extends Controller
{

	private function loadFromSession(){
		echo "called";

	}
	public function handleRequest($data){
		$model = new \stormwind\hw3\models\WriteModel();
		$view = new \stormwind\hw3\views\WriteView();
		$data = [];
		if(isset($_GET['action'])){
			if($_GET['action'] == "post_write"){
				//save it into a session
				if(empty($_POST['title']) &&  empty($_POST['author']) && 
					empty($_POST['genre']) && !empty($_POST['identifier']) 
					&& empty($_POST['description'])){
					$model->initConnection();
					$story = $model->getStoryFromDatabaseWithIdentifier($_POST['identifier']);

					$_SESSION['title'] = $story['title'];
					$_SESSION['author'] = $story['author'];
					$_SESSION['genre'] = $story['genre'];
					$_SESSION['identifier'] = $story['identifier'];
					$_SESSION['description'] = $story['description'];
					$_SESSION['saved'] = true;
					header("Location: index.php?c=write&action=retrieve");
					die();


				}
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['author'] = $_POST['author'];
				$_SESSION['genre'] = $_POST['genre'];
				$_SESSION['identifier'] = $_POST['identifier'];
				$_SESSION['description'] = $_POST['description'];
				$_SESSION['saved'] = true;

				if(!empty($_POST['title']) &&  !empty($_POST['author']) && 
					!empty($_POST['genre']) && !empty($_POST['identifier']) 
					&& isset($_POST['description'])){
						$dir = basename(getcwd());
						if($dir == "htdocs" || $dir == "www"){
							$dir = "";
						}
					if($_POST['description'].length > 5000 || empty($_POST['description'])){

						header("Location: index.php?c=write&action=error&id=length");
						die();
					}
					//post into the database
					$model->initConnection();
					$model->insertStoryIntoDatabase($this->filterPost("title"), $this->filterPost("author"), $this->filterPost("identifier"), $this->filterPost("genre"), $this->filterPost("description"));


					header("Location: index.php?c=write&action=confirmation");
					die();

				}else{
					header("Location: index.php?c=write&action=error&id=missing");
					die();
				}
			}else if ($_GET['action'] == "confirmation"){
				echo "Story has been posted!";
				

			}else if($_GET['action'] == "error"){
				if(isset($_GET['id'])){
					if($_GET['id'] == "length"){
						echo "Length of story exceeds 5000 characters or is empty!";
					}else if ($_GET['id'] == "missing"){
						echo "Missing some fields to post story!";
					}
	

				}
			}
			$data['writeform']['title'] = $_SESSION['title'];
			$data['writeform']['author'] = $_SESSION['author'];
			$data['writeform']['genre'] = $_SESSION['genre'];
			$data['writeform']['identifier'] = $_SESSION['identifier'];
			$data['writeform']['description'] = $_SESSION['description'];
			$data['writeform']['saved'] = $_SESSION['saved'];


		}


		$view->render($data);


		
	}
}
?>