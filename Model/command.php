<?php
class command {
    function createcom($addres,$name,$comm,$number){

        $preparedSql = $GLOBALS["db"]->prepare("INSERT INTO `command`(`addres`, `name`, `command`, `number`) VALUES (?,?,?,?)");

        $preparedSql->bind_param("sssi",$addres,$name,$comm,$number);

        return $preparedSql->execute();
    }
    function liker($comid){
        $sql ="SELECT `likes`, `dislike` FROM `command` WHERE `id`=?";
        $preparedSql = $GLOBALS["db"]->prepare($sql);

        $preparedSql->bind_param("i",$comid);

        $result = $preparedSql->execute();

        if($result){
            $like_dis = $preparedSql->get_result()->fetch_assoc();
        }else{
            return false;
        }
        $lik = $like_dis["likes"] + 1;
        $dis = $like_dis["dislike"];

        $preparedSql = $GLOBALS["db"]->prepare("UPDATE `command` SET `likes`=?,`dislike`=? WHERE `id`=?");
        $preparedSql->bind_param("ssi",$lik,$dis,$comid);

        return $preparedSql->execute();
    }
    function disliker($comid){
        $sql ="SELECT `likes`, `dislike` FROM `command` WHERE `id`=?";
        $preparedSql = $GLOBALS["db"]->prepare($sql);

        $preparedSql->bind_param("i",$comid);

        $result = $preparedSql->execute();

        if($result){
            $like_dis = $preparedSql->get_result()->fetch_assoc();
        }else{
            return false;
        }
        $lik = $like_dis["likes"] ;
        $dis = $like_dis["dislike"] + 1;

        $preparedSql = $GLOBALS["db"]->prepare("UPDATE `command` SET `likes`=?,`dislike`=? WHERE `id`=?");
        $preparedSql->bind_param("iii",$lik,$dis,$comid);

        return $preparedSql->execute();
    }
}
?>