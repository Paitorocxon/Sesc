<?php
/**
*
*   @title:     main.search
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/


class search{
    function layout(){
        $req = search::IsRequest();
        echo '<form>' .
        '<input type="text" value="' . $req . '" id="search" name="search">' . 
        '<input type="submit" value="' . $GLOBALS['LangSearch'] . '">' . 
        '</form>';
    }
    function searching($search){
        $SearchArray[] = NULL;
        foreach(scandir(getcwd()) as $file){
            if($file !== '.' AND $file !== '..'){
                if (file_exists($file)){
                    if (is_file($file)){
                        if (!empty($search)){
                            if (strpos(strtolower($file), strtolower($search)) OR strpos(strtolower(file_get_contents($file)), strtolower($search))) {
                                array_push ($SearchArray,$file);
                            }
                        }
                    }
                }
            }
        }
        return $SearchArray;
    }
    function IsRequest(){
        if (isset($_REQUEST['search'])){
            return $_REQUEST['search'];
        } else {
        }
    }
}