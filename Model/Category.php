<?php
class Category {
    function getAll(){
        $result = $GLOBALS["db"]->query("SELECT * FROM `categories`");

        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return [];
        }
    }


    function getRoot(){
        $result = $GLOBALS["db"]->query("SELECT * FROM `categories` WHERE `parent_id` IS NULL");

        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return [];
        }
    }


    function getRootCatsWithNews(){
        $result = $GLOBALS["db"]->query("SELECT * FROM `categories` WHERE `parent_id` IS NULL");


        $categories = $result->fetch_all(MYSQLI_ASSOC);

        $array = [];

        foreach ($categories as $key=>$category){

            $catId = $category['id'];
            $newsIdTmp = $GLOBALS["db"]->query("SELECT `news_id` FROM `category_news` WHERE `category_id` = $catId")->fetch_all();

            $newsId = [];

            foreach ($newsIdTmp as $item) {
                $newsId[] += $item[0];
            }

            if(count($newsId) > 0){
                //[12,13] ==> "12,13"

                $news = $GLOBALS["db"]->query("SELECT * FROM `news` WHERE `id` IN (".implode(",",$newsId).")");

                if($news){
                    $news = $news->fetch_all(MYSQLI_ASSOC);
                }else{
                    $news = [];
                }

            }else{
                $news = [];
            }

            $array[$key] = [
                "id"=>$category["id"],
                "title"=>$category["title"],
                "news"=>$news
            ];

        }

        return $array;

    }



    function getCatWithNews($catId){
        $result = $GLOBALS["db"]->query("SELECT * FROM `categories` WHERE `id` = $catId");


        $category = $result->fetch_assoc();


            $newsIdTmp = $GLOBALS["db"]->query("SELECT `news_id` FROM `category_news` WHERE `category_id` = $catId")->fetch_all();

            $newsId = [];

            foreach ($newsIdTmp as $item) {
                $newsId[] += $item[0];
            }

            if(count($newsId) > 0){
                //[12,13] ==> "12,13"

                $news = $GLOBALS["db"]->query("SELECT * FROM `news` WHERE `id` IN (".implode(",",$newsId).")");

                if($news){
                    $news = $news->fetch_all(MYSQLI_ASSOC);
                }else{
                    $news = [];
                }

            }else{
                $news = [];
            }



        return [
            "id"=>$category["id"],
            "title"=>$category["title"],
            "news"=>$news
        ];

    }


    function create($data){
        $preparedSql = $GLOBALS["db"]->prepare("INSERT INTO `categories` (`title`,`parent_id`) VALUES (?,?)");

        $preparedSql->bind_param("si",$data["title"],$data["parent_id"]);

        return $preparedSql->execute();
    }

    function delete($id){

        $preparedSql = $GLOBALS["db"]->prepare("DELETE FROM `categories` WHERE `id` = ?");

        $preparedSql->bind_param("i",$id);

        return $preparedSql->execute();

    }


    function getChildren($parentId){
        $result = $GLOBALS["db"]->query("SELECT * FROM `categories` WHERE `parent_id`  = $parentId");


        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }
}