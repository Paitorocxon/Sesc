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
             <a id="interaction" title="' . $GLOBALS['LangDelete'] . '" href="sesc.php?m=' . $file . '&action=delete&search=' . $GLOBALS['SEARCHED'] . '#delaction">' . '<img src="images/delete.png">' . '</a>' . 
            '<a id="interaction" href="sesc.php?m=' . $file . '&action=read">' . '<img src="images/read.png">' . '</a>' . 
            '<a id="interaction" href="' . $file . '">' . '<img src="images/open.png">' . '</a>' .
            '<a id="interaction" href="sesc.php?m=' . $file . '&action=edit">' . '<img src="images/edit.png">' . '</a>' .
            '<a id="interaction" href="sesc.php?download=' . $file . '">' . '<img src="images/download.png">' . '</a>';
        }
        function functions($file){
            return '
            <a href="sesc.php?action=save&m="' . 
            $file . 
            '">' . 
            $GLOBALS['LangSave'] . 
            '</a>'
            ;
        }
        
}
