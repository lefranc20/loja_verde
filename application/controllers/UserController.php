<?php

use Application\core\Controller;

class UserController extends Controller{

    public function index(){
        $this->view('login/index');
    }
}



?>