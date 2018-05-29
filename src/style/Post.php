<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/28/2018
 * Time: 7:26 PM
 */

require_once('MysqlConnect.php');

class Post
{

    public function createPost(){
        if(isset($_POST['post_submit'])){
            if(!empty($_POST['post_title'])){
                MysqlConnect::instance()->insertPost($_SESSION['id'],$_GET['id'],$_POST['post_title'],$_POST['post_content']);
            }
        }
    }

    public function showPost($id){
        $result = MysqlConnect::instance()->getPostByID($id);
        if($result != null){
            $res = "<center><p class=\"page-title\">" . $result[0]['title'] . "</p></center>
                <center><div class=\"page-content-margin\"><p class=\"category-content-description\">" . $result[0]['date'] . " </p></center>
                <div class=\"row post-container no-margin\">
                        <div class=\"col-md-12 hide-avatar-mobile category-light-grey\">
                            <div class=\"row post-border-bottom-none\">
                                <div class=\"col-md-2 col-sm-2 col-2 margin-bottom-20\">
                                    <img class=\"category-last-post-image\"
                                         src=\"" . $result[0]['avatar'] . "\">

                                </div>
                                <div class=\"col-md-5 col-sm-5 col-5\">
                                    <p class=\"category-content-title\">" . $result[0]['username'] . "</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-2 post-border-container hide-avatar-small post-border-right-none category-light-grey\">
                            <center><img class=\"user-profile-widget\"
                                         src=\"" . $result[0]['avatar'] . "\">
                            </center>
                            <center>
                                <p class=\"category-content-title\">" . $result[0]['username'] . "</p>
                            </center>
                        </div>
                        <div class=\"col-xl-10 col-lg-10 col-md-12  col-sm-12 col-12 post-border-container \">

                            " .$result[0]['content'] . "
                        </div>
                    </div>";

            echo $res;
        }
    }

    public function showAnswers(){
        $result = MysqlConnect::instance()->getPostAnswers($_GET['id']);

        if($result != null){
            $res = "";
            foreach($result as $val){
                $res .= "<div class=\"row post-container no-margin\">
                        <div class=\"col-md-12 hide-avatar-mobile\">
                            <div class=\"row post-border-bottom-none\">
                                <div class=\"col-md-2 col-sm-2 col-2 margin-bottom-20\">
                                    <img class=\"category-last-post-image\"
                                         src=\"" . $val['avatar'] . "\">

                                </div>
                                <div class=\"col-md-5 col-sm-5 col-5\">
                                    <p class=\"category-content-title\">" .$val['username']."</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-2 post-border-container hide-avatar-small post-border-right-none\">
                            <center><img class=\"user-profile-widget\"
                                         src=\"" . $val['avatar'] . "\">
                            </center>
                            <center>
                                <p class=\"category-content-title\">" . $val['username'] . "</p>
                            </center>
                        </div>
                        <div class=\"col-xl-10 col-lg-10 col-md-12  col-sm-12 col-12 post-border-container \">
                            <div class=\"post-border-bottom margin-left-right--15 hide-avatar-small\">
                                <p class=\"post-date-message\">" . $val['date'] . "</p>
                            </div>

                            " . $val['content'] . "
                        </div>
                    </div>";
            }

            echo $res;
        }

    }

    public function insertAnswer(){
        if(isset($_POST['post_submit'])){
            MysqlConnect::instance()->insertPostAnswers($_GET['id'],$_SESSION['id'],$_POST['post_content']);
        }
    }

    public function deletePost(){
        if(isset($_GET['delete_post'])){
            MysqlConnect::instance()->deletePost($_GET{'id'});
        }
    }

    public function movePost(){
        if(isset($_GET['move_post'])){
            MysqlConnect::instance()->movePost($_GET{'id'},$_POST['category_move']);
        }
    }

    public function getCategoryNames()
    {
        $result = MysqlConnect::instance()->getCategoryNames();
        if ($result != null) {
            $res = '<script>$(document).ready(function(){';

            foreach ($result as $val) {
                $res .= '$(\'#category_move\').append(\'<option value="' . $val['id'] . '" >' . $val['name'] . '</option>\');';
            }

            $res .= '});' .
                '</script>';
            echo $res;
        }
    }

}