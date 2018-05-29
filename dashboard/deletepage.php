<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/28/2018
 * Time: 4:37 PM
 */if(isset($_GET['id'])){
    require_once("../MysqlConnect.php");
    MysqlConnect::instance()->deletePage($_GET['id']);
    header("Location: page.php");
}