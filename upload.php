<meta charset="UTF-8">
<?php
//Change the $foldername value!
//====================
$password = "1134-g-2601";
$foldername = "entry";


//====================
?>

<!DOCTYPE html>
<html>
<head>
<META http-equiv=Content-Type content="text/html" charset=UTF-8">
<title>Upload</title>
<a href="index.php"><=</a>
<br>
<br>

<form name="uploadformular" enctype="multipart/form-data" action="upload.php?action=upload" method="post">
File: <input type="file" name="uploadfile" size="60" maxlength="255">
<input type="Submit" name="Submit" value="Upload">
</form>

<?php
set_error_handler("Error_Handler");
	function Error_Handler($error_number,$error_string,$error_file,$error_line){
        echo $error_number, "@" , $error_line , "|:|" , $error_file , "___" , $error_string;
        die();
}
function startsWith($haystack, $needle)
{
  $length = strlen($needle);
  return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
  $length = strlen($needle);
  if ($length == 0) {
  return true;
}

  return (substr($haystack, -$length) === $needle);
}


//###################################################################################>
if (isset($_GET['action']) && !empty($_GET['action'])){
    if (($_GET['action'])==('delete')){
        if (isset($_GET['filename']) && !empty($_GET['filename'])){
            if(file_exists($foldername . "/" . $_GET['filename'])){
                unlink($foldername . "/" . $_GET['filename']);
                //echo '<script type="text/javascript">alert("Deleted!")</script>';
                echo '<meta http-equiv="refresh" content="0; URL=upload.php">';
                die();
            }
        }
    }elseif(($_GET['action'])==('upload')){
        if (empty($_GET['uploadfile'])){
 
            move_uploaded_file (
                $_FILES['uploadfile']['tmp_name'] ,
                $foldername . '/'. $_FILES['uploadfile']['name'] );

            echo '<meta http-equiv="refresh" content="0; URL=upload.php>';
            die();
        }
	}
    if (!is_dir($foldername)){
        echo "<font color=red><b><h1>" . $foldername . " was not found!</h1></b></font>";
    }else{
        $files = scandir($foldername);
        echo "<h1>Connected to " . $foldername . "</h1>";
        foreach($files as $file) {
            if(($file)==(".")){
                    
            }elseif(($file)==("..")){
                
            }elseif(($file)==(".htaccess")){

            }else{
                //<a title="Delete" href="index.php?password=' . $_GET['password'] . '&action=delete&filename=' . $file .'" style="text-color: #FF0000;">DELETE</a>
                echo '[<a title="Delete" href="upload.php?action=delete&filename=' . $file .'">DELETE</a>]=====================   <a href="' . $foldername . "/" . $file . '">' . $file . '<a>' . '<br>';
            }
        }
}
//###################################################################################>
}else{
    if (!is_dir($foldername)){
        echo "<font color=red><b><h1>" . $foldername . " was not found!</h1></b></font>";
    }else{
        $files = scandir($foldername);
        echo "<h1>Connected to <font color =#FBBB00><i>" . $foldername . "</font></i></h1>";
    echo '<div id="photos-info"><div id="photos-name"></div></div><br><div class="photos" autofocus>';
    
            $ImageTypes = array(
            'png',
            'jpg',
            'jpeg',
            'gif');
    foreach($files as $file) {
            $Source = $foldername . "/" . $file;
-            $EXCE = strtolower(pathinfo($Source, PATHINFO_EXTENSION));   
            if (in_array($EXCE,$ImageTypes)) {
              echo '<img class="cover" height="200px" data-name="' . $file . '" src="' . $foldername . "/" . $file . '"/>';  
            }
    }
    echo '</div>';
        foreach($files as $file) {

            if(($file)==(".")){
                
            }elseif(($file)==("..")){
            
            }elseif(($file)==(".htaccess")){

            }else{
                echo '[<a title="Delete" href="upload.php?action=delete&filename=' . $file .'" style="text-color: #FF0000;">DELETE</a>]=====================   <a href="' . $foldername . "/" . $file . '">' . $file . '<a>' . '<br>';
           }
        }
    }
}
?>
<center>

</center>
</div>


  
  
  
  
  
  
  
  </p>
</div>


</center></body>
</html>
																							

