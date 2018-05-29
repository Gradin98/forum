<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/3/2018
 * Time: 9:00 PM
 */

require_once("MysqlConnect.php");
require_once("Messages.php");

class Login
{
    static private $error = "";


    static public function loginForm()
    {
        echo '<form action="./login.php" method="post">'.
                '<p class="login-form-information">Email</p>'.
                '<p><input type="email" name="login_email"></input>'.
                '<p class="login-form-information">Parola</p>'.
                '<p><input type="password" name="login_password"></input></p>'.
                '<p class="login-form-information">' . Login::$error . '</p>'.
                '<p><input type="submit" name="login_submit"></input></p>'.
                '<center><p class="category-content-description margin-top-20">Ai uitat parola?</p></center>'.
			'</form>';
    }

    static public function checkLogin()
    {
        if (isset($_POST['login_submit'])) {
            if (!empty($_POST['login_email'])) {
                if (!empty($_POST['login_password'])) {
                    $result = MysqlConnect::instance()->checkLoginUserAndReturnPassword($_POST['login_email']);

                    if ($result != null && password_verify($_POST['login_password'], $result)) {
                        session_start();

                        $_SESSION['username'] = $_POST['login_email'];
                        $_SESSION['id'] = MysqlConnect::instance()->getIdByEmail($_POST['login_email']);

                        header("Location: ./index.php");
                        exit;

                    } else {

                        Login::$error = Messages::SOMETING_WRONG_LOGIN;
                    }
                } else {

                    Login::$error = Messages::PASSWORD_MISS_LOGIN;
                }
            } else {

                Login::$error = Messages::EMAIL_MISS_LOGIN;
            }
        }
    }

}