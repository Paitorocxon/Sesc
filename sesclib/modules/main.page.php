<?php
/**
*
*   @title:     main.page
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   12th November 2017
*   @version:   1.0
*   
*/



    function page($page){
        if ($page == 'help'){
            echo help();
        }elseif ($page == 'about'){
            echo about();
        }elseif ($page == 'create'){
            echo create();
        }elseif ($page == 'control'){
            echo control();
        }else{
        if (isset($_REQUEST['search'])){
            if (file_exists($_REQUEST['search'])){
               /* if ($_REQUEST['search'] !== '.' AND $_REQUEST['search'] !== '..'){
                    header('location: sesc.php?m=' . $_REQUEST['search'] . '&search=' . $_REQUEST['search']);
                }else{
                 */   
                echo '<div id="hits">';
                    foreach(search::searching($_REQUEST['search'], getcwd() . '/') as $hit){
                        if (!empty($hit)){
                            echo gui::buttons($hit,$_REQUEST['search']) . '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '#content">' . $hit . '</a><br>';
                        }
                    }
                echo '</div>';            
                //}
            }else{
                echo '<div id="hits">';
                    foreach(search::searching($_REQUEST['search'], getcwd() . '/') as $hit){
                        if (!empty($hit)){
                            echo gui::buttons($hit,$_REQUEST['search']) . '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '#content">' . $hit . '</a><br>';
                        }
                    }
                echo '</div>';
            }
        }

            if (isset($_REQUEST['m']) && isset($_REQUEST['action'])){
                if (isset($_REQUEST['search'])){
                    echo reader::action($_REQUEST['action'], $_REQUEST['m'], $_REQUEST['search']);
                }else{
                    echo reader::action($_REQUEST['action'], $_REQUEST['m'], ".");
                }
            }

            if (isset($_REQUEST['m'])){
                echo '<h3><a name="content">' . $_REQUEST['m'] . '</h3><div id="content">';
                echo createHTML::highlight(reader::read());
                echo '</div>';  
            }         
        }
    }
    
    function OnSearch(){
        if (isset($_REQUEST['search'])){
            return '&search=' . $_REQUEST['search'];
        }else{
        }
    } 
    
    function help(){
        return $GLOBALS['LangHelpText'];
    }
    
    function about(){
        return $GLOBALS['LangAboutText'];
    }
    
    function control(){
        return $GLOBALS['LangControlText'];
    }
    
    function create(){
        return $GLOBALS['LangControlText'];
    }