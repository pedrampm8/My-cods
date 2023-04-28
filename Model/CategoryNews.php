<?php
class CategoryNews {
    function create($data){
        $preparedSql = $GLOBALS["db"]->prepare("INSERT INTO `Category_news` (`category_id`,`news_id`) VALUES (?,?)");

        $preparedSql->bind_param("ii",$data["category_id"],$data["news_id"]);

        return $preparedSql->execute();
    }

    function getCatIdsByNewsId($newsId){
        $result = $GLOBALS["db"]->query("SELECT `category_id` FROM `Category_news` WHERE `news_id` = $newsId");

        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return [];
        }
    }

    function deleteByNewsId($newsId){
        $preparedSql = $GLOBALS["db"]->prepare("DELETE FROM `Category_news` WHERE `news_id` = ?");

        $preparedSql->bind_param("i",$newsId);

        return $preparedSql->execute();
    }
}