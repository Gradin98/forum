<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/2/2018
 * Time: 9:59 PM
 */

     session_unset();
    session_destroy();
	header('Location: index.php')
?>