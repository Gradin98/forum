<?php
/**
 * Created by PhpStorm.
 * User: kocsi
 * Date: 5/3/2018
 * Time: 7:39 PM
 */

class Messages
{
    const USERNAME_MISS_REGISTER = "username miss";
    const EMAIL_MISS_REGISTER = "email miss";
    const PASSWORD_MISS_REGISTER = "password miss";
    const SECOND_PASSWORD_MISS_REGISTER = "confirm password miss";
    const NOT_SAME_PASSWORD_REGISTER = "not same password";

    const EMAIL_MISS_LOGIN = "email miss";
    const PASSWORD_MISS_LOGIN = "password miss";
    const SOMETING_WRONG_LOGIN = "error in data";

    const EMAIL_EXISTS_REGISTER= "email exists";
    const USERNAME_EXISTS_REGISTER = "username exists";

    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_DATABASE = 'forum-platform';
}