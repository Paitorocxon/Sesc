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
    /* */
    function endswith($string, $test) {
        $strlen = strlen($string);
        $testlen = strlen($test);
        if ($testlen > $strlen) return false;
        return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
    }
    /* */
    
    function read(){
        $READERz = new reader();
        if (isset($_REQUEST['m'])){
            
            if ($_SESSION['prev'] > 0) {
                if (file_exists($_REQUEST['m'])){
                    if ($READERz->endswith($_REQUEST['m'], ".mp3")){
                        echo '<audio controls><source src="' . $_REQUEST['m'] . '"></audio>';
                        return "";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".mp4")){
                        echo '<video width="400" height="295" controls><source src="' . $_REQUEST['m'] . '"></video>';
                        return "";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".wav")){
                        echo '<audio controls><source src="' . $_REQUEST['m'] . '"></audio>';
                        return "";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".bmp")){
                        echo '<img src="' . $_REQUEST['m'] . '" width="200">';
                        return "";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".png")){
                        echo '<img src="' . $_REQUEST['m'] . '" width="200">';
                        return "";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".jpeg")){
                        echo '<img src="' . $_REQUEST['m'] . '" width="200">';
                        return "NOT ABLE TO READ!";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".jpg")){
                        echo '<img src="' . $_REQUEST['m'] . '" width="200">';
                        return "NOT ABLE TO READ!";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".zip")){
                        return "NOT ABLE TO READ!";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".7z")){
                        return "NOT ABLE TO READ!";
                    } elseif ($READERz->endswith($_REQUEST['m'], ".tar")){
                        return "NOT ABLE TO READ!";
                    }else{
                    $return = file_get_contents($_REQUEST['m']);
                    return $return;
                        
                    }
                    
                }else{
                }
            
        
            }else{
                return 'DENIED';
            }
        }else{
        }
    }
    function action($action,$file,$search){
        if (isset($action) && isset($file)){
            if ($action == 'delete'){
                return '<a id="delaction"></a><br><br><br><br><br><br><br><br>' . $GLOBALS['LangConfirm'] . $file . '<br>' .  
                '<a id="knoppread" href="sesc.php?m=' . $file . '&action=confirm&search=' . $search . '">' . $GLOBALS['LangYes'] . '</a> ' .
                '<a id="knoppread" href="javascript:history.back()">' . $GLOBALS['LangNo'] . '</a>';
            }elseif ($action == 'confirm'){
                if ($_SESSION['prev'] > 0) {
                    if ($file !== 'sesc.php' && $file !== 'stylesheet.css' && $file !== 'stylesheet.night.css'){
                        $NEWFILE = date('zdmYHis');
                        $LOG = new log();
                        $LOG->write('Deleted:' . $file . 'Saved to' . $NEWFILE);
                        if (!is_dir("BACKUPS")){
                            mkdir("BACKUPS");
                        }
                        copy($file,"BACKUPS/" . $NEWFILE);
                        unlink($file);
                        
                        echo '<meta http-equiv="refresh" content="0; url=sesc.php?search=' . $_REQUEST['search'] . '" />';
                    }else{
                        return '<a id="knopp" href="javascript:history.back()"> <-- </a> <font color=red> ' . $GLOBALS['LangDeleteError'] . '</font>';
                    }
                }else{
                    return '<a id="knopp" href="javascript:history.back()"> <-- </a> <font color=red> ' . $GLOBALS['LangDeleteError'] . '</font>';
                }
                
            }elseif ($action == 'open'){
                if ($_SESSION['prev'] > 0) {
                    $LOG = new log();
                    $LOG->write('Open:' . $file);
                    header('location: ' . $file);
                }else{
                    return '<a id="knopp" href="javascript:history.back()"> <-- </a> <font color=red> ' . 'DENIED' . '</font>';
                }
            }elseif ($action == 'edit'){
                
                if ($_SESSION['prev'] > 0) {
                    $LOG = new log();
                    $WRITER = new writer();
                    $LOG->write('Edit:' . $file);
                    echo $WRITER->edit($file);
                }else{
                    return '<a id="knopp" href="javascript:history.back()"> <-- </a> <font color=red> ' . 'DENIED' . '</font>';
                }
            }
        }
    }
}
