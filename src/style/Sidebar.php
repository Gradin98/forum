<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/4/2018
 * Time: 10:27 PM
 */

require_once('MysqlConnect.php');

class Sidebar
{
    public static function setLatestPosts(){
        $result = '<div class="category-title d-none d-lg-block padding-left-15">'.
                    '<div class="row justify-content-between justify-content-none">'.
                        '<div class="col-md-12">'.
                            '<p class="category-title-text "><i class="far fa-comments icon-color"></i> Latest Posts</p>'.
                        '</div>'.
                    '</div>'.
                '</div>'.

                '<div class="category-title d-md-none margin-top-50 padding-left-15">'.
                    '<div class="row justify-content-between justify-content-none">'.
                        '<div class="col-md-12">'.
                            '<p class="category-title-text "><i class="far fa-comments icon-color"></i> Latest Posts</p>'.
                        '</div>'.
                    '</div>'.
                '</div>';

        foreach (MysqlConnect::instance()->getLatestPosts(5) as $res){
            $result .= '<div class="category-content">'.
                '<div class="row no-margin">'.
                    '<div class="col-md-3 col-sm-3 col-3">'.
                        '<img class="category-last-post-image"'.
                             'src="' . $res['avatar'] . '">'.
                    '</div>'.
                    '<div class="col-md-9 col-sm-9 col-9">'.
                        '<p class="category-content-title">' . $res['title'] . '</p>'.
                        '<p class="category-content-description">By ' . $res['username'] . 'at ' . $res['date'] . '</p>'.
                    '</div>'.
                '</div>'.
            '</div>';
        }

        echo $result;
    }

    public static function setUserInfo(){

        $result = '<div class="category-title  padding-left-15 margin-top-50">'.
                '<div class="row justify-content-between justify-content-none">'.
                    '<div class="col-md-12">'.
                        '<p class="category-title-text "><i class="far fa-comments icon-color"></i> User Info</p>'.
                    '</div>'.
                '</div>'.
            '</div>';

        $res = MysqlConnect::instance()->getInfoAboutUser($_SESSION['id']);

        $result .= '<div class="content-color" style="padding-bottom: 50px">'.
                    '<div class="row no-margin">'.
                        '<div class="col-md-12 col-sm-12 col-12">'.
                            '<center><img class="user-profile-widget"'.
                                    'src="' . $res[0]['avatar'] . '">'.
                            '</center>'.
                            '<center>'.
                                '<p class="category-content-title">' . $res[0]['username'] . '</p>'.
                                '<p class="category-content-description">Total posts: ' . $res[0]['count'] . '</p>'.
                            '</center>'.
                        '</div>'.
                    '</div>'.
                '</div>';

        echo $result;
    }
}
