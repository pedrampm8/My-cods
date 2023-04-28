<?php
class News {


    function byId($id){
        $preparedSql = $GLOBALS["db"]->prepare("SELECT * FROM `news` WHERE `id` = ?");

        $preparedSql->bind_param("i",$id);

        $result = $preparedSql->execute();

        if($result){
            return $preparedSql->get_result()->fetch_assoc();
        }else{
            return false;
        }
    }
    function getAll(){
        $result = $GLOBALS["db"]->query("SELECT * FROM `news`");

        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return [];
        }
    }


    function create($data){
        $preparedSql = $GLOBALS["db"]->prepare("INSERT INTO `news` (`title`,`short_description`,`description`,`image`) VALUES (?,?,?,?)");

        $preparedSql->bind_param("ssss",$data["title"],$data["short_description"],$data["description"],$data["image"]);

        return $preparedSql->execute();
    }

    function delete($id){

        $preparedSql = $GLOBALS["db"]->prepare("DELETE FROM `news` WHERE `id` = ?");

        $preparedSql->bind_param("i",$id);

        return $preparedSql->execute();
    }

    function update($data,$id){

        if(isset($data["image"])){
            $preparedSql = $GLOBALS["db"]->prepare("UPDATE `news` SET `title` = ?,`short_description` = ?,`description` = ?,`image` = ? WHERE `id` = ?");

            $preparedSql->bind_param("ssssi",$data["title"],$data["short_description"],$data["description"],$data["image"],$id);
        }else{
            $preparedSql = $GLOBALS["db"]->prepare("UPDATE `news` SET `title` = ?,`short_description` = ?,`description` = ? WHERE `id` = ?");

            $preparedSql->bind_param("sssi",$data["title"],$data["short_description"],$data["description"],$id);
        }

        return $preparedSql->execute();
    }


    function search($keyword){
        $preparedSql = $GLOBALS["db"]->prepare("SELECT * FROM `news` WHERE `title` LIKE ?");

        $q = "%".$keyword."%";

        $preparedSql->bind_param("s",$q);

        $result = $preparedSql->execute();

        if($result){
            return $preparedSql->get_result()->fetch_all(MYSQLI_ASSOC);
        }else{
            return [];
        }
    }

}