<?php
/**
*
*   @title:     main.lang
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/
    $LANG = 'de';



    
    
    $LangSearch = '';
    $LangUsername = '';
    $LangPassword = '';
    $LangLogin = '';
if ($LANG == 'de') {
    german();
} elseif ($LANG == 'en') {
    english();
}


function german(){
    $GLOBALS['LangSearch'] = 'Suchen';
    $GLOBALS['LangUsername'] = 'Benutzername';
    $GLOBALS['LangPassword'] = 'Passwort';
    $GLOBALS['LangLogin'] = 'Einloggen';
}
function english(){
    $GLOBALS['LangSearch'] = 'Search';
    $GLOBALS['LangUsername'] = 'Username';
    $GLOBALS['LangPassword'] = 'Password';
    $GLOBALS['LangLogin'] = 'Login';
}
