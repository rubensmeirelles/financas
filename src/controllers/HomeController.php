<?php
namespace src\controllers;

use \core\Controller;

class HomeController extends Controller {

    public function index() {
        $this->render('home');
    }

    public function lancamentos() {
        $this->render('lancamentos');
    }

}