<?php
/**
*
*   @title:     main.lang
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.3
*   
*/
    $LANG = 'en';
    
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
    $LangEdit = '';
    $LangSave = '';
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
    $GLOBALS['LangEdit'] = 'Bearbeiten';
    $GLOBALS['LangSave'] = 'Speichern';
    $GLOBALS['LangDownload'] = 'Herunterladen';
    $GLOBALS['LangAboutText'] = '<div id="info"><h3>Sesc</h3> - <h5>Search \'n Script</h5><br>' . 
    'Sesc - Inovation ist dort wo die Ideen beginnen.<br>' . 
    'Version: ' . $GLOBALS['version'] . '<br />' .
    'Entwickler: Fabian Müller (Paitorocxon)' .
    '<br />' .
    'Copyright © 2017 Fabian Müller' . 
    '</div><br><img src="favicon.png" width="100px" style="border-radius: 5px 5px 5px 5px;">';
    $GLOBALS['LangHelpText'] = '<div id="info"><h3>Hilfe</h3></div><br>' . 
    'Sesc - Inovation ist dort wo die Ideen beginnen.<br>' . 
    '<a href="http://httpd.apache.org/docs/2.2/mod/core.html#limitrequestline">HTTP ERROR 414</a> Füge in deiner "\apache\conf\httpd.conf" "LimitRequestLine 10240" hinzu. Das sollte eine Gesunde Anzahl an Buchstaben sein. :D<br>' . 
    
    'Kontaktiere mich:<a href="mailto:paitorocxon@gmail.com?subject=Hilfe&body=Hey Kumpel! Ich brauche deine Hilfe!">paitorocxon@gmail.com</a>';
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
    $GLOBALS['LangEdit'] = 'Edit';
    $GLOBALS['LangSave'] = 'Save';
    $GLOBALS['LangDownload'] = 'Download';
    $GLOBALS['LangAboutText'] = '<div id="info"><h3>Sesc</h3> - <h5>Search \'n Script</h5><br>' . 
    'Sesc - Inovation is where the ideas begins.<br>' .
    'Version: ' . $GLOBALS['version'] . '<br />' .
    'Developer: Fabian Müller (Paitorocxon)' .
    '<br />' .
    'Copyright © 2017 Fabian Müller' . 
    '</div><br><img src="favicon.png" width="100px" style="border-radius: 5px 5px 5px 5px;">';
    $GLOBALS['LangHelpText'] = '<div id="info"><h3>Help</h3></div><br>' . 
    '<a href="http://httpd.apache.org/docs/2.2/mod/core.html#limitrequestline">HTTP ERROR 414</a> Add to your "\apache\conf\httpd.conf" LimitRequestLine 10240. That\'s a healthy amout of chars :D<br>' . 
    
    'Sesc - Inovation is where the ideas begins.<br>' . 
    'Contact me:<a href="mailto:paitorocxon@gmail.com?subject=Help&body=Hey pal! I need some help!">paitorocxon@gmail.com</a>';
    $GLOBALS['LangControlText'] = '<div id="info"><h3>Control</h3></div>';
}
