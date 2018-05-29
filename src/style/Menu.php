<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/4/2018
 * Time: 9:50 PM
 */

require_once('MysqlConnect.php');

class Menu
{
    public static function checkSesion()
    {
        session_start();
        if(strpos($_SERVER['REQUEST_URI'],'index') == false && !isset($_SESSION['id'])){
            header("location: login.php");
        }

        if(!isset($_SESSION['id'])){
            echo '<ul class="navbar-nav">'.
                '<li class="nav-item nav-item-right">'.
                    '<a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Sign In</a>'.
                '</li>'.
                '<li class="nav-item nav-item-right">'.
                    '<a class="nav-link" href="#"><i class="fas fa-user-plus"></i> Sign Up</a>'.
                '</li>'.
            '</ul>';
        }
        else {
            $username = MysqlConnect::instance()->getUsernameById($_SESSION['id']);
            echo '<ul class="navbar-nav">'.
                '<li class="nav-item nav-item-left">'.
                    '<a class="nav-link" href="profile.php?id=' . $_SESSION['id']. '">' . $username . '</a>'.
                '</li>'.
                '<li class="nav-item nav-item-left">'.
                    '<a class="nav-link" href="dashboard/index.php"><i class="fas fa-tachometer-alt"></i> ACP</a>'.
                '</li>'.
                '<li class="nav-item nav-item-right">'.
                    '<a class="nav-link" href="disconect.php"><i class="fas fa-sign-out-alt"></i> Disconnect</a>'.
                '</li>'.
            '</ul>';
        }

    }

    public static function setPages(){
        $result = '<ul class="navbar-nav mr-auto">'.
                '<li class="nav-item nav-item-left">'.
                    '<a class="nav-link" href="index.php"><i class="fas fa-home icon-color"></i> Home</a>'.
                '</li>';
        $res2 = MysqlConnect::instance()->getAllPages();

        foreach($res2 as $res){
            $result .= '<li class="nav-item nav-item-left">'.
                    '<a class="nav-link " href="page.php?id=' . $res['id'] . '"><i class="fas fa-home icon-color"></i> ' . $res['showed_title'] . ' </a>'.
                '</li>';
        }

        $result .= '</ul>';

        echo $result;
    }
}