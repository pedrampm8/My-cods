<?php
define("HOST","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","mynews");

$GLOBALS["db"] = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);

if($GLOBALS["db"]->connect_error){
    die($GLOBALS["db"]->connect_error);
}

$GLOBALS["db"]->set_charset("utf8");