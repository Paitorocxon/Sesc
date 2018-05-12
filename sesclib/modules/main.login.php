
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
        if (isset($_REQUEST['logout'])){
                logining::logout();
        } else {
            
            if (isset($_SESSION['username']) && isset($_SESSION['password'])){
                logining::checklogin($_SESSION['username'],$_SESSION['password']);
            } elseif (isset($_REQUEST['username']) && isset($_REQUEST['password'])){
                logining::checklogin($_REQUEST['username'],$_REQUEST['password']);
            } else {
                logining::login();
            }
            
        }
            
    }
    function checklogin($name,$password){
    global $PDO;
    $pdo = new PDO('mysql:host=localhost;dbname=sesc', $GLOBALS['DB_USERNAME'], $GLOBALS['DB_PASSWORD']);
        

    $sql="SELECT * FROM users WHERE username='$name' and password='$password'";

       $IS_VALID = 0;
       foreach ($pdo->query($sql) as $row) {
           if ($row['username'] == $name && $row['password'] == $password) {
                $IS_VALID = 1;
                $_SESSION['prev'] = $row['admin'];
           }
        }
       
        
        if ($IS_VALID == 1){
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['dir'] = getcwd();
            
        } else {
            logining::login();
        }
    }
    function login(){
        $_SESSION = array();
        $_SESSION['username'] = NULL;
        $_SESSION['password'] = NULL;
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        #session_destroy();
                die('<div id="draggable" class="ui-widget-content"><div id="navi_login">LOGIN</div><br>
                <form action=""  method="POST">
                Username<br><input type="text" name="username"><br><br>
                Password<br><input type="password" name="password"><br>
                <br>
                <br>
                <input type="submit" value="Login">
                </form>
                <div id="foot">Sesc © 2017 Fabian Müller</div></div>'
                );
    }
    function logout(){
        $_SESSION = array();
        $_SESSION['username'] = NULL;
        $_SESSION['password'] = NULL;
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        #session_destroy();
        die('<meta http-equiv="refresh" content="0; url=sesc.php" />');
    }
}


