<?php
/**
*
*   @title:     main.sql
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   30th November 2017
*   @version:   1.0
*   
*/


class sql{
    function login($hostuser, $hostaddress, $database , $username, $password){
        define("DB_SERVER", $hostaddress);
        define("DB_USER", $hostuser);
        define("DB_PASSWORD", $password);
        define("DB_DATABASE", $database);
        $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);

        $conn = new mysqli(DB_USER . '@' . DB_SERVER, $$hostuser, $password, $database , 'select');



    }
}
