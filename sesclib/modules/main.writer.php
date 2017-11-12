<?php
/**
*
*   @title:     main.writer
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   12th November 2017
*   @version:   1.0
*   
*/


class writer{
    function edit($file){
        if (file_exists($file)){
            return '<textarea id="edit">' .
            file_get_contents($file) . 
            '</textarea>';
        }else{
            return '<textarea id="edit"></textarea>';
        }
    }
}
