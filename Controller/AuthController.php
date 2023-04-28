<?php
require_once "Model/User.php";

class AuthController {

    function logout(){
        unset($_SESSION["userData"]);
        header("Location:/login");
    }

    function login(){

        require_once "View/auth/login.php";
    }

    function loginStore(){
//        var_dump($_POST);

        if(isset($_POST["submit"])){

            $mobile = $_POST["mobile"];
            $password = $_POST["password"];

            $userModel = new User();
            $result = $userModel->checkLogin($mobile,$password);

            if(!$result){
                $_SESSION["error"] = "خطا در اتصال پایگاه داده";
                header("Location:/login");
            }else{

                if($result->num_rows == 1){
                    $_SESSION["success"] = "با موفقیت وارد شدید";
                    $_SESSION["userData"] = $result->fetch_assoc();
                    header("Location:/dashboard");
                }else{
                    $_SESSION["error"] = "عدم تطابق نام کاربری  و گذرواژه";
                    header("Location:/login");
                }

            }

        }

    }

    function register(){

        require_once "View/auth/register.php";
    }
}