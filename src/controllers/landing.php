<?php
namespace stormwind\hw3\controllers;

require_once('controller.php');
class LandingController extends Controller
{
	public function handleRequest($data) {
		$model = new \stormwind\hw3\models\LandingModel();
		$view = new \stormwind\hw3\views\LandingView();
		$data = [];
		$filter = "";
		$genre = "";
		if(isset($_GET['genre'])){
			$data['selectedGenre'] = $_GET['genre'];
			$_SESSION['selectedGenre'] = $_GET['genre'];
		}else{
			if(isset($_SESSION['selectedGenre'])){
				$data['selectedGenre'] = $_SESSION['selectedGenre'];
				$genre = $data['selectedGenre'];
			}

		}

		if(isset($_GET['filter'])){
			$data['appliedFilter'] = $_GET['filter'];
			$_SESSION['appliedFilter'] = $_GET['filter'];
		}else{
			if(isset($_SESSION['appliedFilter'])){
			$data['appliedFilter'] = $_SESSION['appliedFilter'];
			$filter = $data['appliedFilter'];
		}
			
		}
		$model->initConnection();
		if(strlen($filter) > 0 && strlen($genre) > 0){
			$data['newest'] = $model->getNewestStories($filter, $genre);
			$data['most_viewed'] = $model->getMostViewedStories($filter, $genre);
			$data['highest_rated'] = $model->getHighestRatedStories($filter, $genre);
		}else{
			$data['newest'] = $model->getNewestStories($this->filterGet('filter'), $this->filterGet('genre'));
			$data['most_viewed'] = $model->getMostViewedStories($this->filterGet('filter'), $this->filterGet('genre'));
			$data['highest_rated'] = $model->getHighestRatedStories($this->filterGet('filter'), $this->filterGet('genre'));
		}


		//title and id


		$view->render($data);
	}
}
?>