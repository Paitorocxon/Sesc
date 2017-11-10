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
        echo '<form>' .
        '<input type="text" id="search" name="search">' . 
        '<input type="submit" value="' . $GLOBALS['LangSearch'] . '">' . 
        '</form>';
    }
    function directory(){
        
    }
}