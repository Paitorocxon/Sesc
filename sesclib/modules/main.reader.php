<?php
/**
*
*   @title:     main.reader
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/


class reader{
    function read(){
        if (isset($_REQUEST['m'])){
            if (file_exists($_REQUEST['m'])){
                $return = file_get_contents($_REQUEST['m']);
                return $return;
            }else{
            }
        }else{
        }
    }
    function action($action,$file,$search){
        if (isset($action) && isset($file)){
            if ($action == 'delete'){
                return $GLOBALS['LangConfirm'] . $file . '<br>' .  
                '<a id="knoppdelete" href="sesc.php?m=' . $file . '&action=confirm&search=' . $search . '">' . $GLOBALS['LangYes'] . '</a> ' .
                '<a id="knopp" href="javascript:history.back()">' . $GLOBALS['LangNo'] . '</a>';
            }elseif ($action == 'confirm'){
                if ($file !== 'sesc.php' && $file !== 'stylesheet.css' && $file !== 'stylesheet.night.css'){
                unlink($file);
                header('location: sesc.php?search=' . $search);
                    
                }else{
                    return '<a id="knopp" href="javascript:history.back()"> <-- </a> <font color=red> ' . $GLOBALS['LangDeleteError'] . '</font>';
                }
            }elseif ($action == 'open'){
                header('location: ' . $file);
            }elseif ($action == 'edit'){
                echo writer::edit($file);
                //header('location: sesc.php?m=' . $file . '&action=fileedit');
            }
        }
    }
}