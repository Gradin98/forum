<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/4/2018
 * Time: 10:25 PM
 */

require_once('MysqlConnect.php');

class CategoryIndex
{

    public function setParent(){
        $result = MysqlConnect::instance()->getParentAndChilds();

        $res = '';
        $parent = [];
        $checkParent = false;

        for($i = 0; $i < sizeof($result); $i++) {
            for ($k = 0; $k < sizeof($parent); $k++) {
                if ($parent[$k] == $result[$i]['parent']) {
                    $checkParent = true;
                }
            }
            if ($checkParent == false) {
                $res .= "<div class=\"category-content\">
                <a href='category.php?id=" . $result[$i]['id_parent']. "'><div class=\"row no-margin\">
                    <div class=\"col-md-1 col-sm-1 col-1\">
                        
                    </div>
                    <div class=\"col-md-6 col-sm-8 col-8\">
                        <p class=\"category-content-title\">" . $result[$i]['parent'] ."</p>
                        <p class=\"category-content-description\">" . $result[$i]['description'] . "</p>
                    </div>
                </div></a>
            </div>";
            }
        }
        echo $res;
    }

    public function setChild(){
        $result = MysqlConnect::instance()->getChildByParentID($_GET['id']);

        $res = '';
        $parent = [];
        $checkParent = false;

        for($i = 0; $i < sizeof($result); $i++) {
            for ($k = 0; $k < sizeof($parent); $k++) {
                if ($parent[$k] == $result[$i]['name']) {
                    $checkParent = true;
                }
            }
            if ($checkParent == false) {
                $res .= "<div class=\"category-content\">
                <a href='category.php?id=" . $result[$i]['id_child']. "'><div class=\"row no-margin\">
                    <div class=\"col-md-1 col-sm-1 col-1\">
                        <center><img src='" . $result[$i]['image'] ."' style='width: 100%;margin-top: 30px;'>
                            <center>
                    </div>
                    <div class=\"col-md-6 col-sm-8 col-8\">
                        <p class=\"category-content-title\">" . $result[$i]['name'] ."</p>
                        <p class=\"category-content-description\">" . $result[$i]['description'] . "</p>
                    </div>
                </div></a>
            </div>";
            }
        }
        echo $res;
    }

    public function setListOfPosts(){
        $result = MysqlConnect::instance()->getPostByCategoryID($_GET['id']);
        $res = "";
        if(sizeof($result)){
            foreach($result as $val){
                $res .= "<div class=\"category-content\">
					<a href='post.php?id=" . $val['id'] . "'><div class=\"row no-margin\">
						<div class=\"col-md-1 col-sm-1 col-1\">
							<center><img src='" . $val['avatar'] ."' style='width: 100%;margin-top: 30px;'>
                            <center>
						</div>
						<div class=\"col-md-6 col-sm-8 col-8\">
							<p class=\"category-content-title\">". $val['title']."</p>
						</div>
						<div class=\"col-md-4 col-sm-4 col-4 d-none d-lg-block category-last-post\">
							<div class=\"row\">
								<div class=\"col-md-12 col-sm-12 col-12\">
									<center><p class=\"category-content-title\">By " . $val['username']. " </p></center>
									<center><p class=\"category-content-description\">at " . $val['date'] . "</p></center>
								</div>
							</div>
						</div>
					</div>
				</div></a>";
            }
        }

        echo $res;

    }


}