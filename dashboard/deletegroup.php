<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/28/2018
 * Time: 4:36 PM
 */

if(isset($_GET['id'])){
    require_once("../MysqlConnect.php");
    MysqlConnect::instance()->deleteGroup($_GET['id']);
    header("Location: group.php");
}