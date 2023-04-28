<?php
$uri = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/";

if($uri == "/"){
    require_once "Controller/HomeController.php";
    $Controller = new HomeController();
    $Controller->home();
}else if($uri == "/about"){
    require_once "Controller/AboutController.php";
    $Controller = new AboutController();
    $Controller->index();
}else if($uri == "/contactus"){
    require_once "Controller/AboutController.php";
    $Controller = new AboutController();
    $Controller->contact();
}else {
    echo "404 not found ".$uri;
}