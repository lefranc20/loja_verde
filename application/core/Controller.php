<?php
namespace application\core;
class Controller{
	public function model($model){
		require '../application/models/'. $model. '.php';
			$classe = 'application/models\\' . $model;
			return new $classe();
	}
	public function view(string $view, $data = []){
		require '../application/views/'. $view . '.php';
	}
	
	public function pageNotFound(){
		$this->view('error404');
	}
}
?>