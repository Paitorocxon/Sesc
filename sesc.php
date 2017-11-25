<title>Sesc</title>
<link rel="shortcut icon" href="favicon.png" type="image/png" />
<center>
<?php
/**
*
*   @title:     Sesc
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   09th November 2017
*   @version:   1.4 [Levita]
*   
*/
session_start();
set_time_limit(0);
include_once('sesclib/autoload.php');



$releaseVersion = 1;
$subVersion = 6;
$versionTitle = "[Levita]";
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
echo '<div id="main"><div id="navi">';
echo '<div id="left"><h1 style="color:' . $GlobalHeadColor . '"><b>Sesc</b></h1>' . $requestString . '</div>';
echo '<div id="right" style="padding-right: 6pt;">';
$SEARCH = new search();
echo $SEARCH->layout();
echo '</div>';
$MENU = new menu();
echo $MENU->navigation();
echo '</div>';


 
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
if (isset($_REQUEST['m']) && isset($_REQUEST['edit'])){
    $CREATOR = new creator();
    $CREATOR->write($_REQUEST['m'], $_REQUEST['edit']);
}

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
            $GLOBALS['GlobalHeadColor'] = '#435189';
            ini_set("highlight.comment", "#55FF55; font-weight: bold");
            ini_set("highlight.html", "#FFFFFF");
            ini_set("highlight.keyword", "#FF5555; font-weight: bold");
            ini_set("highlight.string", "#FFFFFF");
            ini_set("highlight.default", "#00FFFF");
            return '<link rel="stylesheet" href="stylesheet.night.css">';

        }
        
    }

?>
</div>
</div><br><br><br><br>

