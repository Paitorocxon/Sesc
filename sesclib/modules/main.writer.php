<?php
/**
*
*   @title:     main.writer
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   12th November 2017
*   @version:   1.2
*   
*/


class writer{
    function edit($file){
        if (file_exists($file)){
            return '<form method="POST"><br><input type="submit" value="' . $GLOBALS['LangSave'] . '"><input type="hidden" name="m" id="m" value="' . $file . '"           >  <textarea id="edit"  name="edit">' .
            file_get_contents($file) . 
            '</textarea></form>' . 
            '<br>';
        }else{
            return '<form method="POST"><br><input type="submit" value="' . $GLOBALS['LangSave'] . '"><input type="hidden" name="m" id="m" value="' . $file . '"           >  <textarea id="edit"  name="edit">' .
            '</textarea></form>' . 
            '<br>';
        }
    }
}
