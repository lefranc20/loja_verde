<?php

use Application\core\Controller;

class UsuarioController extends Controller{
	public function index(){
		$this->view('login/index');   
		
	}   
}
?>