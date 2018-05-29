<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/28/2018
 * Time: 2:21 PM
 */

require_once("../MysqlConnect.php");

class User
{
    public function findUser(){
        if(isset($_GET['search_submit'])){
            if(!empty($_GET['search_user'])){
                $result = MysqlConnect::instance()->getAllUsers($_GET['search_user']);
                $res = "<div class=\"margin-top-50\">
                        <table class=\"table table-striped\">
                            <thead>
                            <tr>
                                <th>Users</th>
                                <th class=\"text-right\">Action</th>
                            </tr>
                            </thead>
                            <tbody>";

                foreach($result as $val){
                    $res .= '<tr>'.
                        '<td>' . $val['username'] . '</td>'.
                        '<td class="text-right"><a href="user.php?id=' . $val['id'] . '"><i class="fas fa-edit"></i></a> &nbsp '.
                        '<a href="deleteuser.php?id=' . $val['id'] . '"><i class="far fa-trash-alt"></i></a></td>'.
                        '</tr>';
                }

                $res .= "</tbody>
                        </table>
                    </div>";

                echo $res;
            }
        }
    }

    public function checkID(){
        $result = MysqlConnect::instance()->getUserByID($_GET['id']);
        if($result != null){
            $res = '<script>$(document).ready(function(){'.
                '$(\'#user_username\').text(\'' . $result[0]['username'] . '\');'.
                '$(\'#user_email\').text(\''. $result[0]['email'] . '\');'.
                '$("#user_birthday").text(\'' .  $result[0]['birthdate'] . '\');'.
                '$("#user_ip").text("' . $result[0]['ip'] . '");'.
                '$("#user_number_post").text("' . $result[0]['number'] . '");});</script>';

            echo $res;
        }
    }

    public function sendAction(){
        if(isset($_POST['submit_action'])){
            switch($_POST['action_value']){
                case "1":
                    MysqlConnect::instance()->deleteUserAvatar($_GET['id']);
                    break;
                case "2":
                    MysqlConnect::instance()->deleteAllPosts($_GET['id']);
                    break;
                case "3":
                    MysqlConnect::instance()->deleteUser($_GET['id']);
                    break;
            }
        }
    }

}