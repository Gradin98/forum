<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/26/2018
 * Time: 4:59 PM
 */

require_once("../MysqlConnect.php");

class Group
{

    public function createGroup(){
        if(isset($_POST["group_submit"])){
            if(!empty($_POST["group_name"])){

                $img = getimagesize($_FILES["group_image"]["tmp_name"]);
                if( $img !== false){

                    $data = base64_encode(file_get_contents( $_FILES["group_image"]["tmp_name"] ));

                    $encrypImg = "data:".$img["mime"].";base64,".$data;

                    MysqlConnect::instance()->insertGroup($_POST["group_name"],$encrypImg);

                    $this->insertPermissionGroup($_POST["group_name"]);
                }

            }
        }
    }

    private function insertPermissionGroup($name){
        $id = MysqlConnect::instance()->getIdByName($name);
        if($id !== null){

            $PermArray = [
                "move_post" => $_POST["optionsRadios1"],
                "create_post" => $_POST["optionsRadios2"],
                "delete_posts" => $_POST["optionsRadios3"],
                "acces_acp" => $_POST["optionsRadios4"]
            ];

            MysqlConnect::instance()->insertPermission($id,$PermArray);
        }
    }

    public function generateGroupList(){
        $result = MysqlConnect::instance()->getAllGroups();
        $res = "";
        foreach($result as $val){
            $res .= '<tr>'.
                '<td>' . $val['name'] . '</td>'.
                '<td class="text-right"><a href="editgroup.php?id=' . $val['id'] . '"><i class="fas fa-edit"></i></a> &nbsp '.
                '<a href="deletegroup.php?id=' . $val['id'] . '"><i class="far fa-trash-alt"></i></a></td>'.
                '</tr>';
        }

        echo $res;

    }

    public function editGroup($id){
        if(isset($_POST["group_submit"])) {
            if (!empty($_POST["group_name"])) {
                $img = getimagesize($_FILES["group_image"]["tmp_name"]);
                if( $img !== false){
                    $data = base64_encode(file_get_contents( $_FILES["group_image"]["tmp_name"] ));
                    $encrypImg = "data:".$img["mime"].";base64,".$data;

                    MysqlConnect::instance()->updateGroupWithImage($id,$_POST["group_name"],$encrypImg);

                }
                else {
                    MysqlConnect::instance()->updateGroupWithoutImage($id,$_POST["group_name"]);

                }

                MysqlConnect::instance()->deletePermission($id);
                $this->insertPermissionGroup($_POST["group_name"]);
            }
        }
    }

    public function checkID($id){
        $result = MysqlConnect::instance()->getGroupByID($id);
        if(sizeof($result) > 0){

            $res = '<script>'.
                '$(document).ready(function() { '.
                '$("#group_name").val("' .  $result[0]['name'] . '");'.
                '$("#group_image").attr("src",\'' .  $result[0]['avatar'] . '\');';

            $contor = 0;
            foreach($result as $val){
                if($val['permission_value']){
                    $res .= '$("#val' . $contor . '-t").prop(\'checked\',true);';
                }
                else {
                    $res .= '$("#val' . $contor . '-f").prop(\'checked\',true);';
                }
                $contor++;
            }
            $res .=  '});'.
                '</script>';

            echo $res;
        }
    }

    public function createDefaultGroup(){
		MysqlConnect::instance()->insertAdminGroup();
        MysqlConnect::instance()->insertDefaultGroup();
        MysqlConnect::instance()->insertModeratorGroup();
        MysqlConnect::instance()->insertAdminGroup();
    }



}