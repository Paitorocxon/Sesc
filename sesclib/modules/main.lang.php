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
    $LangStart = '';
    $LangControl = '';
    $LangHelp = '';
    $LangDelete = '';
    $LangRead = '';
    $LangOpen = '';
    $LangAbout = '';
    $LangAboutText = '';
    $LangHelpText = '';
    $LangControlText = '';
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
    $GLOBALS['LangStart'] = 'Start';
    $GLOBALS['LangControl'] = 'Steuerung';
    $GLOBALS['LangHelp'] = 'Hilfe';
    $GLOBALS['LangDelete'] = 'Löschen';
    $GLOBALS['LangRead'] = 'Lesen';
    $GLOBALS['LangOpen'] = 'Öffnen';
    $GLOBALS['LangAbout'] = 'Über';
    $GLOBALS['LangAboutText'] = '<div id="info"><h3>Sesc</h3> - <h5>Search \'n Script</h5><br>' . 
    'Version: ' . $GLOBALS['version'] . '<br />' .
    'Entwickler: Fabian Müller (Paitorocxon)' .
    '<br />' .
    'Copyright © 2017 Fabian Müller' . 
    '</div><br>';
    $GLOBALS['LangHelpText'] = '<div id="info"><h3>Hilfe</h3><br />' . 
    'Suche:' . 
    '<br />' . 
    '' . 
    '</div>';
    $GLOBALS['LangControlText'] = '<div id="info"><h3>Steuerung</h3></div>';
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
    $GLOBALS['LangStart'] = 'Start';
    $GLOBALS['LangControl'] = 'Control';
    $GLOBALS['LangHelp'] = 'Help';
    $GLOBALS['LangDelete'] = 'Delete';
    $GLOBALS['LangRead'] = 'Read';
    $GLOBALS['LangOpen'] = 'Open';
    $GLOBALS['LangAbout'] = 'About';
    $GLOBALS['LangAboutText'] = '<div id="info"><h3>Sesc</h3> - <h5>Search \'n Script</h5><br>' . 
    'Version: ' . $GLOBALS['version'] . '<br />' .
    'Developer: Fabian Müller (Paitorocxon)' .
    '<br />' .
    'Copyright © 2017 Fabian Müller' . 
    '</div><br>';
    $GLOBALS['LangHelpText'] = 'HELP';
    $GLOBALS['LangControlText'] = '<div id="info"><h3>Control</h3></div>';
}
