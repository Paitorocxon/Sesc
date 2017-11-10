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
                return highlight_string(file_get_contents($_REQUEST['m']));
            } else {
            }
        }else{
        }
    }
}