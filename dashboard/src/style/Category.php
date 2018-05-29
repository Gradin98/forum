<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/27/2018
 * Time: 7:10 PM
 */

require_once("../MysqlConnect.php");

class Category
{

    public function createCategory()
    {
        if (isset($_POST['group_submit'])) {
            if (!empty($_POST['category_name'])) {
                if (!empty($_POST['category_description'])) {
                    $img = getimagesize($_FILES["category_input"]["tmp_name"]);
                    if( $img !== false) {

                        $data = base64_encode(file_get_contents($_FILES["category_input"]["tmp_name"]));

                        $encrypImg = "data:" . $img["mime"] . ";base64," . $data;

                        MysqlConnect::instance()->insertCategory($_POST['category_name'],$_POST['category_description'],$encrypImg);

                        if(!empty($_POST['category_parent'])){
                            MysqlConnect::instance()->insertCategoryParent($_POST['category_parent']);
                        }
                    }
                }
            }
        }
    }

    public function getCategoryNames()
    {
        $result = MysqlConnect::instance()->getCategoryNames();
        if ($result != null) {
            $res = '<script>$(document).ready(function(){'.
                '$(\'#category_parent\').append(\'<option value="" selected="selected"></option>\');';

            foreach ($result as $val) {
                $res .= '$(\'#category_parent\').append(\'<option value="' . $val['id'] . '" >' . $val['name'] . '</option>\');';
            }

            $res .= '});' .
                '</script>';
            echo $res;
        }
    }

    public function editCategory($id){
        if (isset($_POST['group_submit'])) {
            if (!empty($_POST['category_name'])) {
                if (!empty($_POST['category_description'])) {

                    $img = getimagesize($_FILES["category_input"]["tmp_name"]);
                    if( $img !== false){
                        $data = base64_encode(file_get_contents( $_FILES["category_input"]["tmp_name"] ));
                        $encrypImg = "data:".$img["mime"].";base64,".$data;

                        MysqlConnect::instance()->updateCategoryWithImage($id,$_POST["category_name"],$_POST['category_description'],$encrypImg);

                    }
                    else {
                        MysqlConnect::instance()->updateCategoryWithoutImage($id,$_POST["category_name"],$_POST['category_description']);

                    }
                    $parentID = $_POST['backup_id'];

                    if(!empty($_POST['category_parent'])) {

                        $childID = $_GET['id'];
                        $ID = MysqlConnect::instance()->getIDByParentAndChild($parentID,$childID);
                        MysqlConnect::instance()->updateCategoryParent($ID,$_POST['category_parent'],$childID);
                    }
                }
            }
        }
    }

    public function checkID(){
        $result = MysqlConnect::instance()->getCategoryByID($_GET['id']);
        if($result != null){
            $res = '<script>$(document).ready(function(){'.
                '$(\'#category_name\').val(\'' . $result[0]['name'] . '\');'.
                '$(\'#category_description\').val(\''. $result[0]['description'] . '\');'.
                '$(\'#backup_id\').val(\'' . $result[0]['id_parent'] . '\');'.
                '$("#category_image").attr("src",\'' .  $result[0]['image'] . '\');';

                if(isset($result[0]['id_parent'])){
                    $res .= '$("#category_parent").val("' . $result[0]['id_parent']. '")';
                }


            $res .='});' .
                '</script>';
            echo $res;
        }
    }

    public function generateParentAndChild(){
        $result = MysqlConnect::instance()->getParentAndChilds();
        $res = '';
        $parent = [];
        $checkParent = false;

        for($i = 0; $i < sizeof($result); $i++){
            for($k = 0; $k < sizeof($parent); $k++){
                if($parent[$k] == $result[$i]['parent']){
                    $checkParent = true;
                }
            }
            if($checkParent == false){

                $res .= '<div class="alert alert-primary">'.
                    '<div class="row">'.
                    '<div class="col-md-11">'.
                    '<strong>' . $result[$i]['parent']. '</strong>'.
                    '</div>'.
                    '<div class="col-md-1 margin-10px" style="margin-top: 0px!IMPORTANT;">'.
                    '<span class="text-right" style="margin-right: 10px;"><a href="editcategory.php?id='. $result[$i]['id_parent'] . '"><i class="fas fa-edit"></i></a></span>'.
                    '<span class="text-right"><a href="deletecategory.php?id=' . $result[$i]['id_parent']. '"><i class="far fa-trash-alt"></i></a></span>'.
                    '</div>'.
                    '</div>'.
                    '</div>';

                for($j = 0; $j < sizeof($result); $j++){
                    if($result[$i]['parent'] == $result[$j]['parent']){
                        $res .= '<div class="row">'.
                            '<div class="col-md-1"></div>'.
                            '<div class="col-md-11">'.
                            '<div class="alert alert-secondary">'.
                            '<div class="row">'.
                            '<div class="col-md-11">'.
                            '<strong>' . $result[$j]['child'] . '</strong>'.
                            '</div>'.
                            '<div class="col-md-1 margin-10px" style="margin-top: 0px!IMPORTANT;">'.
                            '<span class="text-right" style="margin-right: 10px;"><a href="editcategory.php?id='. $result[$j]['id_child'] . '"><i class="fas fa-edit"></i></a></span>'.
                            '<span class="text-right"><a href="deletecategory.php?id=' . $result[$j]['id_child']. '"><i class="far fa-trash-alt"></i></a></span>'.
                            '</div>'.
                            '</div>'.
                            '</div>'.
                            '</div>'.
                            '</div>';
                    }

                }

                array_push($parent,$result[$i]['parent']);
            }

            $checkParent = false;


        }

        echo $res;
    }

}