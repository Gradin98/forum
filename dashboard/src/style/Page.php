<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/24/2018
 * Time: 6:50 PM
 */

require_once("../MysqlConnect.php");
class Page
{

    public function savePage(){
        if(isset($_POST['page_submit'])){
            if(!empty($_POST['page_title'])){

                $title = $_POST['page_title'];
                $content = $_POST['page_content'];

                MysqlConnect::instance()->savePage($title,$content,str_replace(" ", "-", strtolower($title)));
            }
        }
    }

    public function generatePageList(){
        $result = MysqlConnect::instance()->getAllPage();
        $res = "";
        foreach($result as $val){
            $res .= '<tr>'.
                '<td>' . $val['title'] . '</td>'.
                '<td class="text-right"><a href="editpage.php?id=' . $val['id'] . '"><i class="fas fa-edit"></i></a> &nbsp '.
                '<a href="deletepage.php?id=' . $val['id'] . '"><i class="far fa-trash-alt"></i></a></td>'.
                '</tr>';
        }

        echo $res;

    }

    public function updatePage($id){
        if(isset($_POST['page_submit'])){
            if(!empty($_POST['page_title'])){

                $title = $_POST['page_title'];
                $content = $_POST['page_content'];

                MysqlConnect::instance()->updatePage($id,$title,$content,str_replace(" ", "-", strtolower($title)));
            }
        }
    }

    public function checkID($id){
        $result = MysqlConnect::instance()->getPageByID($id);
        if(sizeof($result) > 0){
            echo '<script>'.
                '$(document).ready(function() { $("#inputPassword6").val("' .  $result[0]['title'] . '");'.
                'let markupStr2 = \'' . $result[0]['content'] . '\';'.
                'let cev2a = $("#page_content");'.
                'ceva.summernote("code", markupStr2);});'.
                '</script>';
        }
        else {
            header("Location: createpage.php");
        }
    }

}