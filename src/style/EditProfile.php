<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/9/2018
 * Time: 12:07 PM
 */

require_once 'MysqlConnect.php';

class EditProfile
{
    public static function setAccountForm()
    {
        $result = '<form method="post" action="">' .
            '<p class="login-form-information">Schimba Email</p>' .
            '<p><input class="width-340" type="email" name="edit_email"></input></p>' .
            '<p class="login-form-information">Schimba Parola</p>' .
            '<p><input class="width-340" type="password" name="edit_password"></input></p>' .
            '</center><input type="submit" name="edit_submit" class="submit-button">' .
            '</form>';

        echo $result;
    }

    public static function checkAccountForm(){
        if(isset($_POST['edit_submit'])){
            if(!empty($_POST['edit_email'])){
                if(!MysqlConnect::instance()->checkEmailInDatabase($_POST['edit_email'])){
                    MysqlConnect::instance()->updateUserEmailById($_SESSION['id'], $_POST['edit_email']);
                }
            }
        }
    }

    public static function setPersonalDataForm()
    {
        $result = '<form method="post" action="" enctype="multipart/form-data">' .
            '<p class="login-form-information">Schimba Avatar</p>' .
            '<p><label class="btn btn-default loadbutton">' .
            'Browse <input type="file" name="group_image" style="display:none"' .
            'onchange="$(\'#upload-file-info\').html(this.files[0].name)"' .
            'name="edit_avatar">' .
            '</label> <span class="label label-info color-white" id="upload-file-info"></span></p>' .
            '<input type="submit" name="avatar_change" class="submit-button">'.
            '</form>';

        echo $result;
    }

    public static function changeAvatar(){
        if(isset($_POST['avatar_change'])){
            $img = getimagesize($_FILES["group_image"]["tmp_name"]);
            if( $img !== false) {
                $data = base64_encode(file_get_contents($_FILES["group_image"]["tmp_name"]));
                $encrypImg = "data:" . $img["mime"] . ";base64," . $data;
                MysqlConnect::instance()->updateAvatarByUserId($_GET['id'],$encrypImg);
            }
        }
    }


}