
  <style>
    #draggable {
        width: 400px;
        height: 300px;
        background-color: #FFFFDD;
        margin: 0px;
        box-shadow: 0px 1px 3px 0px #BBBBBB;
        border-radius: 10px 10px 10px 10px;
        text-align: center;
    }
    
    #navi_login{
        text-align: left;
        background-color: #99EE99;
        width: 100%;
        color: #FFFFFF;
        height: 40pt;
        font-weight: bold;
        overflow: auto;
        padding-left: -10pt;
        border: 0px solid #FFFFFF;
        border-top: 8px solid #88DD88;
        border-radius: 10px 10px 0px 0px;
    }
    
  </style>
  <script src="jquery/jquery-1.12.4.js"></script>
  <script src="jquery/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#draggable" ).draggable();
  } );
  </script>
  
  


<?php
/**
*
*   @title:     main.login
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   02.01.2018
*   @version:   1.0
*   
*/
$SU_Username='';
$SU_Password='';

class logining{
    function isLoggedin(){
        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            logining::checklogin($_SESSION['username'],$_SESSION['password']);
        } elseif (isset($_REQUEST['username']) && isset($_REQUEST['password'])){
            logining::checklogin($_REQUEST['username'],$_REQUEST['password']);
        } else {
            logining::login();
        }
            
    }
    function checklogin($name,$password){
        if ($name == 'pait' && $password == 'germany1999'){
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $password;
        } else {
            logining::login();
        }
    }
    function login(){
                die('<div id="draggable" class="ui-widget-content"><div id="navi_login">LOGIN</div><br>
                <form action="">
                Username<br><input type="text" name="username"><br><br>
                Password<br><input type="password" name="password"><br>
                <br>
                <br>
                <input type="submit" value="Login">
                </form>
                </div>'
                );
    }
}