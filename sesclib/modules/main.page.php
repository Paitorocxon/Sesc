<?php
/**
*
*   @title:     main.page
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   12th November 2017
*   @version:   1.5
*   
*/



    function page($page){
        $LOG = new log();
        if ($page == 'help'){
            echo help();
        }elseif ($page == 'about'){
            echo about();
        }elseif ($page == 'create'){
            echo create();
        }elseif ($page == 'control'){
            echo control();
        }else{
               if (isset($_REQUEST['download'])){

                    header("Content-disposition: attachment; filename=" . urlencode($_REQUEST['download']) . "");
                    header("Content-type: plain/text");
                    readfile($_REQUEST['download']);
                   
                }
        if (isset($_REQUEST['search'])){
            $LOG = new log();
            $LOG->write('Search "' . $_REQUEST['search'] . '"');
            if (file_exists($_REQUEST['search'])){
               /* if ($_REQUEST['search'] !== '.' AND $_REQUEST['search'] !== '..'){
                    header('location: sesc.php?m=' . $_REQUEST['search'] . '&search=' . $_REQUEST['search']);
                }else{
                 */   
                echo '<div id="hits">';
                $SEARCH = new search();
                    foreach($SEARCH->searching($_REQUEST['search'], getcwd() . '/') as $hit){
                        if (!empty($hit)){
                            $guibuttons = new gui();
                            echo $guibuttons->buttons($hit,$_REQUEST['search']) . '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '">' . $hit . '</a><br>';
                        }
                    }
                echo '</div>';            
                //}
            }else{
                echo '<div id="hits">';
                $SEARCH = new search();
                $GUI = new gui();
                    foreach($SEARCH->searching($_REQUEST['search'], getcwd() . '/') as $hit){
                        if (!empty($hit)){
                            echo $GUI->buttons($hit,$_REQUEST['search']) . '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '">' . $hit . '</a><br>';
                        }
                    }
                echo '</div>';
            }
        }

            if (isset($_REQUEST['m']) && isset($_REQUEST['action'])){
                $READER = new reader();
                if (isset($_REQUEST['search'])){
                    echo $READER->action($_REQUEST['action'], $_REQUEST['m'], $_REQUEST['search']);
                }else{
                    echo $READER->action($_REQUEST['action'], $_REQUEST['m'], ".");
                }
             
            }

            if (isset($_REQUEST['m'])){
                echo '<h3><a name="content">' . $_REQUEST['m'] . '</h3><div id="content">';
                $CREATEHTML = new createHTML();
                $READER = new reader();
                echo $CREATEHTML->highlight($READER->read());
                echo '</div>';  
            }         
        }
    }
    
    function OnSearch(){
        $LOG = new log();
        if (isset($GLOBALS['SEARCHED'])){
            return '&search=' . $GLOBALS['SEARCHED'];
        }else{
        }
    } 
    
    function help(){
        $LOG = new log();
            $LOG->write('[HELP]');
        return $GLOBALS['LangHelpText'];
    }
    
    function about(){
        $LOG = new log();
            $LOG->write('[ABOUT]');
        return $GLOBALS['LangAboutText'];
    }
    
    function control(){
        $LOG = new log();
            $LOG->write('[CONTROL]');
        $CONTROL = new control();
        return $CONTROL->ui();
    }
    
    function create(){
        $LOG = new log();
        return $GLOBALS['LangControlText'];
    }