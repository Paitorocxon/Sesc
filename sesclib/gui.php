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
        
}
