<?php
	use Application\core\Controller;
	
	class ProdutoController extends Controller{
		public function index(){
			$this->view('produto/index');	
		}	
	}

?>