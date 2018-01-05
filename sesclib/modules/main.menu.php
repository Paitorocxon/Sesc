<?php
/**
*
*   @title:     main.menu
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   12th November 2017
*   @version:   1.0
*   
*/


class menu{
    function navigation(){
        return '<a id="menuitem" href="sesc.php">' . $GLOBALS['LangStart'] . '</a>' .
        '<a id="menuitem" href="sesc.php?page=control">' . $GLOBALS['LangControl'] . '</a>' .
        '<a id="menuitem" href="sesc.php?page=help">' . $GLOBALS['LangHelp'] . '</a>' .
        '<a id="menuitem" href="sesc.php?page=about">' . $GLOBALS['LangAbout'] . '</a> ' .
        '<a id="menuitem" href="sesc.php?logout=ByeBye">' . 'Logout' . '</a> ';
    }
}
