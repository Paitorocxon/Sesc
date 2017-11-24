
<div id="main">
<br>
<link rel="stylesheet" href="stylesheet.css">
<br>#Auth#<br>
Standard username: root<br>
Standard password: root<br>

<form>
	<input type="text" id="user" name="user" value="<?php if(isset($_GET['user'])){echo $_GET['user'];}else{echo 'NoUser';}?>"><br>
	<input type="password" id="password" name="password" value="<?php if(isset($_GET['password'])){echo $_GET['password'];}else{echo '';}?>"><br>
	<input type="text" style="width:100%;" id="command" name="command" value="<?php if(isset($_GET['command'])){echo $_GET['command'];}else{echo '';}?>" autofocus><br>
	<input type="submit" value="send">
</form>
<br><br>






<?php
//PAITS SERVER ENGINE
// COPYRIGHT © 2017 Paitorocxon (Fabian Müller)
//  VERSION 1.0.1

$AdministratorUsername = "root";
$AdministratorPassword = "root";







function Error_Handler($error_number,$error_string,$error_file,$error_line){
    die('<br><font color=red>[SERVER] ERROR ' . $error_number . $error_number . "<br>" . "#####" . $error_string .  "#####" . "<br>" . $error_file . $error_line . ' !</font>');
}
set_error_handler("Error_Handler");
if(isset($_GET['user']) && isset($_GET['password'])){
    
    
    
    
    if(file_exists("userfiles/" . $_GET['user'])){
        if(base64_decode(base64_decode(base64_decode(file_get_contents("userfiles/" . $_GET['user']))))==$_GET['password']){
        }else{
            echo "[SERVER] 0,403";
            die();
        }
    }else{
        
            if ($_GET['user'] == $AdministratorUsername && $_GET['password'] == $AdministratorPassword){
        //ignore login
    }else{
        die("[SERVER] 0,404");
    }
        
    }
}else{

}
if (!is_dir("userfiles")){
    mkdir("userfiles");
    $myfile = fopen("userfiles/" . 'root', "w") or die("Cannot create user");
    $txt = base64_encode(base64_encode(base64_encode('root')));
    fwrite($myfile, $txt);
    fclose($myfile);
}
echo "[SERVER]" . "<br>";
if(isset($_GET['command'])){
    $full_command = explode(" ", $_GET['command']);
    $command = $full_command;
    if(isset($command[0])){
        if($command[0]=="ls"){
            if(isset($command[1])){
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
            $files = scandir(realpath(dirname(__FILE__)) . $command[1]);   
            }else{
            $files = scandir(realpath(dirname(__FILE__)));                
            }
            $count = 0;
            echo "<br>";
            foreach ($files as $file){
                $count++;
                if(is_dir($file)){
                echo "[DIR]/ " .$file  . "<br>";
                }else{
                echo $file . "<br>";
                }
            }
            echo "<br>" . "[" . $count . "] Files in ";
            die();  
        }elseif($command[0]=="mkdir"){
            if(isset($command[1])){
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
                mkdir($command[1]); 
                echo "Created " . $command[1];      
            }else{        
                echo "Not created " . $command[1];            
            }
            die();  
        }elseif($command[0]=="del"){
            if(isset($command[1])){
                if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }elseif($command[1]="pse.php"){
                    die("Illegal charackters! (..)");
                }
                unlink( $command[1]); 
                echo "Erased " . $command[1];      
            }else{        
                echo "Error!" . $command[1];            
            }
            die();  
        }elseif($command[0]=="rmdir"){
            if(isset($command[1])){
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
                $files = glob('path/to/temp/{,.}*', GLOB_BRACE);
                foreach($files as $file){ 
                  if(is_file($file)){
                    unlink($file);
                  }
                }
                try{
                    rmdir($command[1]);
                } catch (Exception $ex){
                    echo  $ex;
                }
                echo "Erased " . $command[1];      
            }else{        
                echo "Error!" . $command[1];            
            }
            die();  
        }elseif($command[0]=="upload"){
            if(isset($command[1])){
                $myfile = fopen($command[1], "w") or die("Cannot create file");
                $txt = base64_decode($command[2]);
                fwrite($myfile, $txt);
                fclose($myfile);
            }
               
            die();  
        }elseif($command[0]=="rm"){
            if(isset($command[1])){
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
                if( file_exists($command[1])){
                  if(is_file($command[1])){
                    unlink($command[1]);
                  }
                }

                echo "Erased " . $command[1];      
            }else{        
                echo "Error!" . $command[1];            
            }
            die();  
        }elseif($command[0]=="rmuser"){
            if(isset($command[1])){
         
                if( file_exists('userfiles/' . $command[1])){
                  if(is_file('userfiles/' . $command[1])){
                    unlink('userfiles/' . $command[1]);
                  }
                }

                echo "Erased " . $command[1];      
            }else{        
                echo "Error!" . $command[1];            
            }
            die();  
        }elseif($command[0]=="read"){
            if(isset($command[1])){
                
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
                if(file_exists($command[1])){
                    die(file_get_contents($command[1]));
                }   
            }else{        
                echo "Error! No such file or directory!" . $command[1];            
            }
            die();    
        }elseif($command[0]=="createuser"){
            if(isset($command[1]) && isset($command[2])){
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
                if(file_exists("userfiles/" . $command[1])){
                    die("User exists already");
                }else{
                    $myfile = fopen("userfiles/" . $command[1], "w") or die("Cannot create user");
                    $txt = base64_encode(base64_encode(base64_encode($command[2])));
                    fwrite($myfile, $txt);
                    fclose($myfile);
                    echo "User " . $command[1] . "sucessfully created!";
                }   
            }else{        
                echo "Error! No such file or directory!" . $command[1];            
            }
            die();  
        }elseif($command[0]=="touch"){
            if(isset($command[1])){
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
                if(file_exists($command[1])){
                    die("User exists already");
                }else{
                    $myfile = fopen($command[1], "w") or die("Cannot create file");
                    $txt = $command[2];
                    fwrite($myfile, $txt);
                    fclose($myfile);
                }   
            }else{        
                echo "Error! No such file or directory!" . $command[1];            
            }
            die();  
        }elseif($command[0]=="readall"){
            if(isset($command[1])){
                /*if(strpos($command[1],"..")){
                    die("Illegal charackters! (..)");
                }*/
                $files = glob('path/to/temp/{,.}*', GLOB_BRACE);
                foreach($files as $file){
                                echo  "FILE:" . $file . "<br>";                
                  if(is_file($file)){
                    echo file_get_contents($file) . "<br>" . "##########################";
                  }
                }     
            }else{        
                echo "Error!" . $command[1];            
            }
            die("END");  
        }elseif($command[0]=="sql"){
	//sql Ã¼berarbeiten!
/*

#####################################################

*/
            
            
            define("DB_SERVER", $command[1]);
            define("DB_USER", $command[2]);
            define("DB_PASSWORD", $command[3]);
            define("DB_DATABASE", $command[4]);
            $connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
            $servername = $command[1];
            $uname = $command[2];
            $password = $command[3];
            $dbname = $command[4];
            $command5 = $command[5];
            $conn = new mysqli($servername, $uname, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failure: " . $conn->connect_error);
            }
            $stringlength = strlen($servername) + strlen($uname) + strlen($password) + strlen($dbname) + strlen($command5) +2;
            $sql = substr($_GET['command'], $stringlength,80);
            echo $servername . "@" . $uname . ":" . $sql . "<br>" . "'" . $password . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    foreach ($row as $rawrow){
                        echo $rawrow . "<br>";
                    }
                }
            } else {
            }
            
            $conn->close();
            die("<br>" . "SQL:" . "END");  
        }elseif($command[0]=="help"){
            echo "<br>";
            echo "ls </FOLDERNAME>                              -<b>List all files in folder</b>" . "<br>";
            echo "mkdir FOLDERNAME                              -<b>Creates a new directory</b>" . "<br>";
            echo "rmdir FOLDERNAME                              -<b>Deletes a directory</b>" . "<br>";
            echo "del FILENAME                                  -<b>Deletes a filev" . "<br>";
            echo "createuser USERNAME PASSWORD                  -<b>Create user</b>" . "<br>";
            echo "touch FILENAME <content>                      -<b>Create new file</b>" . "<br>";
            echo "read FILENAME <content>                       -<b>Read a file</b>" . "<br>";
            echo "sql HOST USER PASSWORD DATABASE COMMAND       -<b>Run SQL command</b>" . "<br>";
            echo "rm FILENAME                                   -<b>Delete a file</b>" . "<br>";
            echo "rmuser USERNAME                               -<b>Delete a user</b>" . "<br>";
            die();            
        }        
    }
}else{
    die();
}

//PaitsServerEngine
?>
</div>