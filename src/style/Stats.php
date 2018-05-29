<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/6/2018
 * Time: 6:05 PM
 */

require_once('MysqlConnect.php');

class Stats
{
    const LAST_USER = 'Last User';
    const TOTAL_POSTS = 'Total Posts';
    const TOTAL_USERS = 'Total Users';

    private static function getSqlResult($type){
        switch($type){
            case 'Last User':
                return MysqlConnect::instance()->getLastRegisterUser();
            case 'Total Posts':
                return MysqlConnect::instance()->getTotalPosts();
            case 'Total Users':
                return MysqlConnect::instance()->getTotalUsers();
        }
    }

    public static function setStatsModule($class, $type){
        $result = '<div class="col-md-4">'.
            '<div class="row">'.
            '<div class="col-md-6 pull-right d-none d-lg-block">'.
            '<i class="fas fa-user icon-footer"></i>'.
            '</div>'.
            '<div class="col-md-6 d-none d-lg-block">'.
            '<p class="footer-title">' . Stats::getSqlResult($type)[0]['result'] . '</p>'.
            '<p class="footer-description">' . $type . '</p>'.
            '</div>'.
            '<div class="col-md-12 hidden-element-md">'.
            '<center><i class="fas ' . $class . ' icon-footer"></i>'.
            '<p class="footer-title">' . Stats::getSqlResult($type)[0]['result'] . '</p>'.
            '<p class="footer-description">' . $type . '</p></center>'.
            '</div>'.
            '</div>'.
            '</div>';

        echo $result;
    }

}