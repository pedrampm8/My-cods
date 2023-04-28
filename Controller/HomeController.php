<?php
require_once "Model/News.php";
require_once "Model/Category.php";

class HomeController {

    function home(){

        $categoryModel = new Category();

        $categoriesRooWithNews = $categoryModel->getRootCatsWithNews();

        require_once "View/home.php";
    }

    function news(){

        if(isset($_GET["id"])){

            $newsModel = new News();
            $news = $newsModel->byId($_GET["id"]);
            require_once "View/news.php";
        }


    }


    function search(){

        if(isset($_GET['keyword']) && !empty($_GET['keyword'])){

            $newsModel = new News();
            $news = $newsModel->search($_GET['keyword']);

            require_once "View/search.php";

        }

    }

    function category(){

        if(isset($_GET["id"])){


            $categoryModel = new Category();

            $category = $categoryModel->getCatWithNews($_GET["id"]);

            require_once "View/category.php";
        }

    }

}