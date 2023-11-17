<?php

namespace Application\core;

class App{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $page404 = false;
    protected $params = [];

	// Método construtor
    public function __construct(){
        $URL_ARRAY = $this->parseUrl();
        $this->getControllerFromUrl($URL_ARRAY);
        $this->getMethodFromUrl($URL_ARRAY);
        $this->getParamsFromUrl($URL_ARRAY);
		
	// chama um método de uma classe passando os parâmetros
		call_user_func_array([$this->controller, $this->method], $this->params);    
	}
	
	public function parseUrl(){
		$REQUEST_URI = explode('/', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1));
		return $REQUEST_URI;
	}

	public function getControllerFromUrl($url){
		if(!empty($url[0]) && isset($url[0])){
			if(file_exists('../Application/controllers/'.ucfirst($url[0]). 'Controller.php') ){
				$this->controller = ucfirst($url[0]).'Controller';
			}else{
				$this->page404 = true;
			}
		}
		require_once '../Application/controllers/'. 
		$this->controller . '.php';
		$this->controller = new $this->controller();
	}

	private function getMethodFromUrl($url){
		if(!empty($url[1]) && isset($url[1])){
			if(method_exists($this->controller, $url[1]) && !$this->page404){
				$this->method = $url[1];
			}else{
				// caso a classe ou o método informado não exista, o método pageNotFound do controlador é chamado.
				$this->method = 'pageNotFound';
			}
		}
	}
	
	private function getParamsFromUrl($url){
		if(count($url) > 2){
			$this->params = array_slice($url, 2);
		}
	} 
	/* fim Class*/
}

?>