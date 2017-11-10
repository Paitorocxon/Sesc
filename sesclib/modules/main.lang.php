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
if ($LANG == 'de') {
    german();
} elseif ($LANG == 'en') {
    english();
    
}


function german(){
    $GLOBALS['LangSearch'] = 'Suchen';
}
function english(){
    $GLOBALS['LangSearch'] = 'Search';
}
