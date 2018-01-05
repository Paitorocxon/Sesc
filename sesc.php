<?php 
session_start([
    'cookie_lifetime' => 86400,
]);
?>
<title>Sesc</title>
<link rel="shortcut icon" href="favicon.png" type="image/png" />
<center>
<?php

/**
*
*   @title:     Sesc
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   09th November 2017
*   @version:   2.0 [Cactus] ಠᴗಠ"
*   
*/
set_time_limit(0);
include_once('sesclib/autoload.php');



$releaseVersion = 2;
$subVersion = 1;
$versionTitle = "[Cactus] ಠᴗಠ ";
$GlobalHeadColor = '';
echo styleByTime();
$SEARCHED = '';
if (isset($_REQUEST['search'])){
    $SEARCHED = $_REQUEST['search'];
}else{
    $SEARCHED = '';
}

if (isset($_REQUEST['m'])){
    $requestString = '/' . $_REQUEST['m']; 
}else{
    $requestString = '';  
}


/*  */$version = $releaseVersion . "." . $subVersion . " " . $versionTitle;/*  */
$INIT = new init();



echo $INIT->initialize();




//Since here, everything should be initialized :D


$upload = new uploading();
$upload->uploadscript();



$Login = new logining();
$Login->isLoggedin();
echo '<div id="main"><div id="navi">';
echo '<div id="left"><div id="heading"><b>Sesc/</b></div>' . $_SESSION['dir'] . ' ' . $requestString . '</div>';
echo '<div id="right" style="padding-right: 6pt;">';
$SEARCH = new search();
echo $SEARCH->layout();
echo '</div>';
$MENU = new menu();
echo $MENU->navigation();
echo '</div><div id="light"></div>';


if (isset($_REQUEST['m']) && isset($_REQUEST['edit'])){
    $CREATOR = new creator();
    $CREATOR->write($_REQUEST['m'], $_REQUEST['edit']);
}
 
echo '<div id="innermain">';
$filo = '';
if (isset($_REQUEST['m'])){
    $filo = $_REQUEST['m'];
}
echo '<form><input type="submit" id="addknopp" value="+"> <input type="hidden" id="action" name="action" value="edit"><input type="text" id="m" name="m" value="' . $filo . '"></form>';

echo '<br>';
if(isset($_REQUEST['page'])){
    page($_REQUEST['page']);   
}else{
    page('start');   
}

echo '<div id="foot">Sesc © 2017 Fabian Müller</div>';

function styleByTime(){
        date_default_timezone_set("Europe/Berlin");
        $timestamp = time();
        $time = date("H");
        if ($time > 5 && $time < 20 ){
            ini_set("highlight.comment", "#008000; font-weight: bold");
            ini_set("highlight.html", "#808080");
            ini_set("highlight.keyword", "#FF00BB; font-weight: bold");
            ini_set("highlight.string", "#808080");
            $GLOBALS['GlobalHeadColor'] = '#88DD88';
            return '<link rel="stylesheet" href="stylesheet.css">';
        }else{
            ini_set("highlight.comment", "#008000; font-weight: bold");
            ini_set("highlight.html", "#808080");
            ini_set("highlight.keyword", "#FF00BB; font-weight: bold");
            ini_set("highlight.string", "#808080");
            $GLOBALS['GlobalHeadColor'] = '#88DD88';
            return '<link rel="stylesheet" href="stylesheet.css">';
        }
    }
?>
</div>
</div><br><br><br><br>

