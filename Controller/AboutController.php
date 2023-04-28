<?php
require_once "Model/News.php";

class AboutController {
    function index(){
        $newsModel = new News();
        $result = $newsModel->getAll();
        require_once "View/about.php";
    }

    function contact(){
        require_once "View/contact.php";
    }
}