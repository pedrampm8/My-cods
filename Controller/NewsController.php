<?php
require_once "Model/News.php";
require_once "Model/Category.php";
require_once "Model/CategoryNews.php";

class NewsController {

    function delete(){

        if(isset($_GET["id"])){
            $newsModel = new News();

            $news = $newsModel->byId($_GET["id"]);


            if(file_exists("media/".$news["image"])){
                unlink("media/".$news["image"]);
            }


            $result = $newsModel->delete($_GET["id"]);

            if($result){
                $_SESSION["success"] = "خبر حذف شد";
                header("Location:/dashboard/news");
            }else{
                $_SESSION["error"] = "حذف خبر با مشکل مواجه شد";
                header("Location:/dashboard/news");
            }
        }

    }

    function index(){

        $newsModel = new News();
        $news = $newsModel->getAll();

        include_once "View/dashboard/news/index.php";
    }

    function create(){

        $categoryMdel = new Category();

        $categories = $categoryMdel->getAll();

        include_once "View/dashboard/news/create.php";

    }

    function store(){

//        echo "<pre>";
//        var_dump($_FILES);
//        die();

        $rand = time().rand(10000,999999);

        if(isset($_POST["submit"])){


            if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){

                if($_FILES["image"]["type"] != "image/jpeg"){
                    $_SESSION["error"] = "فقط فرمت jpg مورد قبول است";
                    header("Location:/dashboard/news/create");
                    die();
                }


                if($_FILES["image"]["size"] > 2000000){
                    $_SESSION["error"] = "محدودیت حجمی 2 مگ است";
                    header("Location:/dashboard/news/create");
                    die();
                }

                $fileNameExploded = explode(".",$_FILES["image"]["name"]); //dollar.png -> ["dollar","png"]

                if( !move_uploaded_file($_FILES["image"]["tmp_name"],"media/".$rand.".".end($fileNameExploded)) ){
                    $_SESSION["error"] = "افزودن تصویر با مشکل مواجه شد";
                    header("Location:/dashboard/news/create");
                    die();
                }

            }else{
                $_SESSION["error"] = "عکس یادت نره !";
                header("Location:/dashboard/news/create");
                die();
            }

            $newsData = $_POST;

            $newsData["image"] = $rand.".".end($fileNameExploded);

            $newsModel = new News();
            $result = $newsModel->create($newsData);

            $newsId = $GLOBALS["db"]->insert_id;

            $categoryNewsModel = new CategoryNews();

            foreach ($_POST["category_ids"] as $category_id) {
                $categoryNewsModel->create([
                    "category_id"=>$category_id,
                    "news_id"=>$newsId
                ]);
            }

            if($result){
                $_SESSION["success"] = "خبر اضافه شد";
                header("Location:/dashboard/news");
            }else{
                $_SESSION["error"] = "افزودن خبر با مشکل مواجه شد";
                header("Location:/dashboard/news/create");
            }


        }

    }

    function edit(){ // نمایش فرم

        $newsModel = new News();
        $result = $newsModel->byId($_GET["id"]);

        if(!$result){
            die("404 not found");
        }

        $categoryMdel = new Category();
        $categories = $categoryMdel->getAll();


        $categoryNewsModel = new CategoryNews();
        $categoryIdsTmp = $categoryNewsModel->getCatIdsByNewsId($result['id']);

        $categoryIds = [];

        foreach ($categoryIdsTmp as $item){
            $categoryIds[] += $item["category_id"];
        }

//        echo "<pre>";
//        var_dump($categoryIds); //[2,4]
//        die();

        include_once "View/dashboard/news/edit.php";

    }

    function update(){ // پراسس فرم

        if(isset($_POST["submit"]) && isset($_GET["id"])){

            $newsData = $_POST;

            $newsModel = new News();

            $rand = time().rand(10000,999999);

            if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){


                if($_FILES["image"]["type"] != "image/jpeg" && $_FILES["image"]["type"] != "image/png"){
                    $_SESSION["error"] = "فقط فرمت jpg , png مورد قبول است";
                    header("Location:/dashboard/news/edit?id=".$_GET["id"]);
                    die();
                }


                if($_FILES["image"]["size"] > 2000000){
                    $_SESSION["error"] = "محدودیت حجمی 2 مگ است";
                    header("Location:/dashboard/news/edit?id=".$_GET["id"]);
                    die();
                }

                $fileNameExploded = explode(".",$_FILES["image"]["name"]); //dollar.png -> ["dollar","png"]

                if( !move_uploaded_file($_FILES["image"]["tmp_name"],"media/".$rand.".".end($fileNameExploded)) ){
                    $_SESSION["error"] = "افزودن تصویر با مشکل مواجه شد";
                    header("Location:/dashboard/news/edit?id=".$_GET["id"]);
                    die();
                }

                $newsData["image"] = $rand.".".end($fileNameExploded);

                $newsOld = $newsModel->byId($_GET["id"]);

                if(file_exists("media/".$newsOld["image"])){
                    unlink("media/".$newsOld["image"]);
                }

            }



            $result = $newsModel->update($newsData,$_GET["id"]);


            $categoryNewsModel = new CategoryNews();

            $categoryNewsModel->deleteByNewsId($_GET["id"]); // delete old category relations

            foreach ($_POST["category_ids"] as $category_id) { // add new category relations
                $categoryNewsModel->create([
                    "category_id"=>$category_id,
                    "news_id"=>$_GET["id"]
                ]);
            }

            if($result){
                $_SESSION["success"] = "خبر ویرایش شد";
                header("Location:/dashboard/news");
            }else{
                $_SESSION["error"] = "ویرایش خبر با مشکل مواجه شد";
                header("Location:/dashboard/news/edit?id=".$_GET["id"]);
            }


        }

    }
}