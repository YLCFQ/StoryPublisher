<?php
namespace stormwind\hw3\controllers;

require_once('controller.php');
class ReadController extends Controller
{
	public function handlerRequest($data){
		$model = new \stormwind\hw3\models\ReadModel();
		$view = new \stormwind\hw3\views\ReadView();



		$model->initConnection();
		if (isset($_REQUEST['m'])){
			$method = $_REQUEST['m'];
			if ($method == 'rate') {
				$model->updateRating($this->filterGET("storyId"),$this->filterGET("arg1"));
				$model->updateExist($this->filterGET("storyId"),$this->filterGET("arg1"));
			}
		}
		$arr = $model->readStoryfromDatabase($this->filterGET("storyId"));
		$check = $model->checkExist($this->filterGET("storyId"));
		array_push($arr, $data['storyId']);
		array_push($arr, $check);
		$view->render($arr);


		
	}
}
?>