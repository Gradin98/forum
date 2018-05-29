<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/24/2018
 * Time: 5:26 PM
 */

require_once("MysqlConnect.php");

class Page
{
    private $title,$content;

    /**
     * Page constructor.
     * @param $title
     */
    public function __construct($val)
    {
        $result = MysqlConnect::instance()->getPageByTitle($val);

        if(sizeof($result) > 0){
            $this->title = $result[0]['title'];
            $this->content = $result[0]['content'];
        }
        else {
            $result = MysqlConnect::instance()->getPageByID($val);
            if(sizeof($result) > 0){
                $this->title = $result[0]['title'];
                $this->content = $result[0]['content'];
            }
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }




}