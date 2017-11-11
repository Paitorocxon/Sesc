<?php
/**
*
*   @title:     main.login
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/


class login{
    function isLoggedin(){
        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            return true;
        }
    }
}