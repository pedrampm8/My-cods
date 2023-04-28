<?php
require_once "Model/User.php";
require_once "Model/command.php";
class UserController {


    function index(){

        $userModel = new User();
        $users = $userModel->getAll();

        require_once "View/dashboard/users/index.php";
    }


    function create(){
        require_once "View/dashboard/users/create.php";
    }

    function commandstor(){
        $addres = $_GET['addres'];
        if(isset($_POST["submit"])){

            if(!is_numeric($_POST["number"])){
                $_SESSION["error"] = "موبایل باید عددی باشد";
                header("Location:$addres");
                die();
            }
            $userModel = new command();
            $result = $userModel->createcom($addres,$_POST["name"],$_POST["description"],$_POST["number"]);

            if($result){
                $_SESSION["success"] = "کامنت اضافه شد";
                header("Location:$addres");
            }else{
                $_SESSION["error"] = "افزودن کامنت با مشکل مواجه شد";
                header("Location:$addres");
            }
        }
    }
    function like(){
        if(isset($_POST["like"])){
            $addres = $_GET['addres'];
            $comid = $_GET['id'];
            $userModel = new command();
            $result = $userModel->liker($comid);
            if($result){
                $_SESSION["success"] = "شما کامنت را لایک کردین";
                header("Location:$addres");
            }else{
                $_SESSION["error"] = "شما کامنت را نتوانستین لایک کنید";
                header("Location:$addres");
            }
        }
    }
    function dislike(){
        if(isset($_POST["dislike"])){
            $addres = $_GET['addres'];
            $comid = $_GET['id'];
            $userModel = new command();
            $result = $userModel->disliker($comid);
            if($result){
                $_SESSION["success"] = "شما به کامنت دیسلایک  دادین";
                header("Location:$addres");
            }else{
                $_SESSION["error"] = "شما کامنت را نتوانستین دیسلایک کنید";
                header("Location:$addres");
            }
        }
    }
    function store(){
        if(isset($_POST["submit"])){

            if(!is_numeric($_POST["mobile"])){
                $_SESSION["error"] = "موبایل باید عددی باشد";
                header("Location:/dashboard/users/create");
                die();
            }

            if(strlen($_POST["mobile"]) != 11){
                $_SESSION["error"] = "موبایل باید 11 رقم باشد";
                header("Location:/dashboard/users/create");
                die();
            }

            $userModel = new User();
            $result = $userModel->create($_POST["mobile"],$_POST["password"]);

            if($result){
                $_SESSION["success"] = "خبرنگار اضافه شد";
                header("Location:/dashboard/users");
            }else{
                $_SESSION["error"] = "افزودن خبرنگار با مشکل مواجه شد";
                header("Location:/dashboard/users/create");
            }



        }
    }

    function edit(){

        $userModel = new User();
        $result = $userModel->byId($_GET["id"]);

        if(!$result){
            die("404 not found");
        }

        require_once "View/dashboard/users/edit.php";
    }


    function update(){

        if(isset($_POST["submit"]) && isset($_GET["id"])){

            $userModel = new User();
            $result = $userModel->update($_POST,$_GET["id"]);

            if($result){
                $_SESSION["success"] = "خبرنگار ویرایش شد";
                header("Location:/dashboard/users");
            }else{
                $_SESSION["error"] = "ویرایش خبرنگار با مشکل مواجه شد";
                header("Location:/dashboard/users/edit?id=".$_GET["id"]);
            }


        }

    }

    function delete(){

        $userModel = new User();
        $result = $userModel->delete($_GET["id"]);

        if($result){
            $_SESSION["success"] = "خبرنگار پاک شد";
        }else{
            $_SESSION["error"] = "حذف خبرنگار با مشکل مواجه شد";
        }

        header("Location:/dashboard/users");

    }
}