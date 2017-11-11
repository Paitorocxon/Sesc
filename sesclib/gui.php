<?php
/**
*
*   @title:     gui
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/
class gui{
        function login(){
            return '<form><div>'.
            $GLOBALS['LangUsername'] . '<br><input type="hidden" name="login" id="login"><input type="text" name="username" id="username"><br />'.
            $GLOBALS['LangPassword'] . '<br><input type="password" name="password" id="password"></div>'.
            '<input type="submit" value="' . $GLOBALS['LangLogin'] . '">'.
            '</form>';
        }
        function buttons($file,$search){
            return '
            <a id="knoppdelete" href="sesc.php?m=' . $file . '&action=delete&search="' . $_REQUEST['search'] . '>Delete</a>' . 
            '<a id="knoppread" href="sesc.php?m=' . $file . '&action=read&search="' . $search . '>Read</a>' . 
            '<a id="knopp" href="sesc.php?m=' . $file . '&action=open&search="' . $search . '>Open</a>';
        }
        function functions($file){
            return '
            <a href="sesc.php?action=save&m="' . 
            $file . 
            '">' . 
            $LangSave . 
            '</a>'
            ;
        }
        
}
