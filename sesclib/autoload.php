﻿<?php
/**
*
*   @title:     autoload
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/



class init{
    function initialize(){
       foreach(scandir('sesclib/modules/') as $module){
            if($module !== '.' AND $module !== '..'){
                include_once('sesclib/modules/' . $module);
            }
        }
    }
    
}
/* */
include_once('gui.php');
include_once('error.php');
set_error_handler("errorhand::ErrorHandler");
/* */



