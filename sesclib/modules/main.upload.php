<?php
/**
*
*   @title:     main.upload
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/
class upload{
    function load(){
        if (isset($_REQUEST['uploadfile'])){
            if (empty($_GET['uploadfile'])){
                move_uploaded_file (
                    $_FILES['uploadfile']['tmp_name'] ,
                    $foldername . '/'. $_FILES['uploadfile']['name'] );
                echo '<meta http-equiv="refresh" content="0; URL=sesc.php>';
                die();
            }
        }
    }
}
