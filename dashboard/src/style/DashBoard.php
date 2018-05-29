<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/24/2018
 * Time: 3:33 PM
 */

require_once("../MysqlConnect.php");

class DashBoard
{

    public function checkConnection(){
        session_start();
        if(!isset($_SESSION['id'])){
            header("location: ../login.php");
        }
        else if(MysqlConnect::instance()->checkPermission('acces_acp',$_SESSION['id']) == false){
            header("location: ../index.php");
        }

    }
}