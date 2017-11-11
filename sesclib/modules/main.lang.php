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
    $LangConfirm = '';
    $LangYes = '';
    $LangNo = '';
    $LangDeleteError = '';
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
    $GLOBALS['LangConfirm'] = 'Bist du sicher? Ich lösche dann ';
    $GLOBALS['LangYes'] = 'Ja';
    $GLOBALS['LangNo'] = 'Nein';
    $GLOBALS['LangDeleteError'] = 'Keine Berechtigung diese Datei zu löschen';
}
function english(){
    $GLOBALS['LangSearch'] = 'Search';
    $GLOBALS['LangUsername'] = 'Username';
    $GLOBALS['LangPassword'] = 'Password';
    $GLOBALS['LangLogin'] = 'Login';
    $GLOBALS['LangConfirm'] = 'Are you sure? I will delete ';
    $GLOBALS['LangYes'] = 'Yes';
    $GLOBALS['LangNo'] = 'No';
    $GLOBALS['LangDeleteError'] = 'No permission to delete this file';
}
