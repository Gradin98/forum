<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/2/2018
 * Time: 10:19 PM
 */

require_once("MysqlConnect.php");
require_once("Messages.php");

class Register
{
    static private $error = "";

    static public function registerForm()
    {
        echo '<form action="" method="post">'.
				'<p class="login-form-information">Nume utilizator</p>'.
				'<p><input type="text" name="register_username"></input>'.
				'<p class="login-form-information">Adresa Email</p>'.
				'<p><input type="email" name="register_email"></input></p>'.
				'<p class="login-form-information">Parola</p>'.
				'<p><input type="password" name="register_password"></input></p>'.
				'<p class="login-form-information">Confirma Parola</p>'.
				'<p><input type="password" name="confirm_register_password"></input></p>'.
				'<p class="login-form-information">' . Register::$error . '</p>'.
				'<p><input type="submit" name="register_submit"></input></p>'.
				'<center><p class="category-content-description margin-top-20">Ai uitat parola?</p></center>'.
			'</form>';
    }

    static public function checkRegister()
    {
        if (isset($_POST['register_submit'])) {
            if (!empty($_POST['register_username'])) {
                if (!empty($_POST['register_email'])) {
                    if (!empty($_POST['register_password'])) {
                        if (!empty($_POST['confirm_register_password'])) {
                            if ($_POST['register_password'] == $_POST['confirm_register_password']) {
                                if (MysqlConnect::instance()->checkUsername($_POST['register_username'])) {
                                    if (MysqlConnect::instance()->checkEmail($_POST['register_email'])) {

                                        //AICI E CODUL ACESTUI SIR DE IF-URI

                                        $username = $_POST['register_username'];
                                        $email = $_POST['register_email'];

                                        $password = $_POST['register_password'];

                                        $ip = $_SERVER['REMOTE_ADDR'];

                                        MysqlConnect::instance()->insertUser($username, $email, $password, $ip);

                                        header("Location: ./login.php");
                                        exit;

                                        //AICI SE INCHEIE


                                    } else {
                                        Register::$error = Messages::EMAIL_EXISTS_REGISTER;
                                    }
                                } else {
                                    Register::$error = Messages::USERNAME_EXISTS_REGISTER;
                                }
                            } else {
                                Register::$error = Messages::NOT_SAME_PASSWORD_REGISTER;
                            }
                        } else {
                            Register::$error = Messages::SECOND_PASSWORD_MISS_REGISTER;
                        }
                    } else {
                        Register::$error = Messages::PASSWORD_MISS_REGISTER;
                    }
                } else {
                    Register::$error = Messages::EMAIL_MISS_REGISTER;
                }
            } else {
                Register::$error = Messages::EMAIL_MISS_LOGIN;
            }
        }

    }


}