<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/8/2018
 * Time: 2:25 PM
 */

require_once('MysqlConnect.php');

class Profile
{
    public static function setUserInformation(){


        $result = ' <p class="page-title">' . MysqlConnect::instance()->getUsernameById($_SESSION['id']) . '</p>'.
            '<center>'.
            '<div class="row">'.
            '<div class="col border-right">'.
            '<p class="login-form-information">Role</p>'.
            '<p class="login-form-information">' . MysqlConnect::instance()->getRoleById($_SESSION['id']) . '</p>'.
            '</div>'.
            '<div class="col border-right">'.
            '<p class="login-form-information">Number of posts</p>'.
            '<p class="login-form-information">' . MysqlConnect::instance()->getTotalPostsById($_SESSION['id']) . '</p>'.
            '</div>'.
            '<div class="col">'.
            '<p class="login-form-information">Registration Date</p>'.
            '<p class="login-form-information">' . MysqlConnect::instance()->getRegistratorDateById($_SESSION['id']) . '</p>'.
            '</div>'.
            '</div>'.
            '</center>';

        echo $result;

    }

    public static function setUserProfileActivity(){
        $result = '<div class="row margin-bottom-20 profile-top-border">'.
            '<div class="col-md-12 padding-bottom-50 padding-top-20">'.
            '<p><span class="activity-message">Profile Activity</span></p>';

        $res = MysqlConnect::instance()->getUserContentById($_SESSION['id']);

        if(sizeof($res) > 0){
            foreach ($res as $val){
                $result .= '<a href="post.php?id=' . $val['id']. '"><div class="container" style="margin-top: 10px">'.
                            '<div class="row justify-content-md-center">'.
                                '<div class="col-md-2" style="border: 1px solid #393939; border-right: none; border-left: none;">'.
                                    '<p class="login-form-information text-center">' . $val['id'] .'</p>'.
                                '</div>'.
                                '<div class="col-md-5" style="border: 1px solid #393939; border-right: none; border-left: none;">'.
                                    '<p class="login-form-information text-center">' . $val['title'] .'</p>'.
                                '</div>'.
                                '<div class="col-md-2" style="border: 1px solid #393939; border-right: none; border-left: none;">'.
                                    '<p class="login-form-information text-center">' . $val['date'] .'</p>'.
                                '</div>'.
                            '</div>'.

                        '</div></a>';
            }

        }
        else {
            $result .= '<center><p class="login-form-information">Nici o activitate la profil</p></center>';
        }

        $result .= '</div>'.
            '</div>';

        echo $result;

    }

    public static function setAvatar(){
        echo MysqlConnect::instance()->getAvatarById($_GET['id'])[0]['avatar'];
    }




}