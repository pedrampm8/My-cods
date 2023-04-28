<?php
require_once "Model/Category.php";

class CategoryController {

    function delete(){

        if(isset($_GET["id"])){
            $categoryModel = new Category();
            $result = $categoryModel->delete($_GET["id"]);

            if($result){
                $_SESSION["success"] = "دسته بندی حذف شد";
                header("Location:/dashboard/category");
            }else{
                $_SESSION["error"] = "حذف دسته بندی با مشکل مواجه شد";
                header("Location:/dashboard/category");
            }
        }

    }

    function index(){

        $categoryModel = new Category();
        $category = $categoryModel->getAll();

        include_once "View/dashboard/category/index.php";
    }

    function create(){

        $categoryMdel = new Category();

        $categories = $categoryMdel->getAll();

        include_once "View/dashboard/category/create.php";

    }

    function store(){

        if(isset($_POST["submit"])){


            $categoryModel = new Category();
            if(empty($_POST["parent_id"]) || !is_numeric($_POST["parent_id"])){
                $_POST["parent_id"] = null;
            }
            $result = $categoryModel->create($_POST);

            if($result){
                $_SESSION["success"] = "دسته بندی اضافه شد";
                header("Location:/dashboard/category");
            }else{
                $_SESSION["error"] = "افزودن دسته بندی با مشکل مواجه شد";
                header("Location:/dashboard/category/create");
            }


        }

    }
}