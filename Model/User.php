<?php
class User {
    function checkLogin($mobile,$password){

        $sql = "SELECT `id`,`mobile`,`last_ip`,`last_login` FROM `users` WHERE `mobile` = ? AND `password` = ?";

        $preparedSql = $GLOBALS["db"]->prepare($sql);

        $preparedSql->bind_param("ss",$mobile,$password);

        $resultQuery = $preparedSql->execute();

        if($resultQuery){
            return $preparedSql->get_result();
        }

        return false;

    }


    function getAll(){

        $result = $GLOBALS["db"]->query("SELECT `id`,`mobile`,`last_login`,`last_ip`,`created_at` FROM `users`");

        if($result){
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];

    }


    function delete($id){

        $preparedSql = $GLOBALS["db"]->prepare("DELETE FROM `users` WHERE `id` = ?");

        $preparedSql->bind_param("i",$id);

        return $preparedSql->execute();

    }


    function create($mobile,$pass){

        $preparedSql = $GLOBALS["db"]->prepare("INSERT INTO `users` (`mobile`,`password`) VALUES (?,?)");

        $preparedSql->bind_param("ss",$mobile,$pass);

        return $preparedSql->execute();


    }



    function byId($id){
        $preparedSql = $GLOBALS["db"]->prepare("SELECT * FROM `users` WHERE `id` = ?");

        $preparedSql->bind_param("i",$id);

        $result = $preparedSql->execute();

        if($result){
            return $preparedSql->get_result()->fetch_assoc();
        }else{
            return false;
        }
    }


    function update($data,$id){
//        if($data["password"] == ""){
        if(empty($data["password"])){
            $preparedSql = $GLOBALS["db"]->prepare("UPDATE `users` SET `mobile` = ? WHERE `id` = ?");

            $preparedSql->bind_param("si",$data["mobile"],$id);
        }else{
            $preparedSql = $GLOBALS["db"]->prepare("UPDATE `users` SET `mobile` = ?,`password` = ? WHERE `id` = ?");

            $preparedSql->bind_param("ssi",$data["mobile"],$data["password"],$id);
        }

        return $preparedSql->execute();
    }
}