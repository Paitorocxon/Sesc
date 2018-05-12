<?php 
session_start([
    'cookie_lifetime' => 86400,
]);
?>
<title>Sesc</title>
<link rel="shortcut icon" href="favicon.png" type="image/png" />
<link rel="stylesheet" href="stylesheet.css" />
<center>

<div id="bgroundimage"></div>
<?php

/**
*
*   @title:     Sesc
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   09th November 2017
*   @version:   2.7 ALPHA[Exponentia] ಠᴗಠ"
*   
*/
set_time_limit(0);
include_once('sesclib/autoload.php');



$releaseVersion = 2;
$subVersion = 7;
$versionTitle = "<b>ALPHA</b> [Σxponentia] ☢";
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



//Since here, every module should be initialized :D


$upload = new uploading();
$upload->uploadscript();



$Login = new logining();
$Login->isLoggedin();
echo '<div id="navi">';
echo '<div id="left"><div id="heading"><img src="favicon.png" style="height:20pt;"><b>Sesc/</b></div>' . $_SESSION['username'] . '(' . $_SESSION['prev'] . ')'. '@' . $_SESSION['dir'] . ' ' . $requestString . '</div>';
echo '<div id="right" style="padding-right: 6pt;">';
$SEARCH = new search();
echo $SEARCH->layout();
echo '</div>';
$MENU = new menu();
echo $MENU->navigation();

if (isset($_REQUEST['m']) && isset($_REQUEST['edit'])){
    $CREATOR = new creator();
    $CREATOR->write($_REQUEST['m'], $_REQUEST['edit']);
}
 
$filo = '';
if (isset($_REQUEST['m'])){
    $filo = $_REQUEST['m'];
}
if (isset($_REQUEST['typeof']) && $_REQUEST['typeof'] == 'HTML') {
    echo '<form><input type="submit" id="addknopp" value="+"> <input type="hidden" id="action" name="action" value="edit"><input type="text" id="m" name="m" value="' . $filo . '" placeholder="file">
    <select name="typeof" id="typeof">
    <option Value="Normal">Normal</option>
    <option Value="HTML" Selected>&lt;HTML/&gt;</option>
    </select>
    </form>';
} else {    
    echo '<form><input type="submit" id="addknopp" value="+"> <input type="hidden" id="action" name="action" value="edit"><input type="text" id="m" name="m" value="' . $filo . '" placeholder="file">
    <select name="typeof" id="typeof">
    <option Value="Normal" Selected>Normal</option>
    <option Value="HTML">&lt;HTML/&gt;</option>
    </select>
    </form>';
}

echo '</div><div id="light"></div>';
echo '<div id="main"><div id="innermain"><br><br><br><br>';
echo '<br><br><br><br>';
if (isset($_REQUEST['search'])) {
        $searchresults = search::searching($_REQUEST['search']);

        foreach ($searchresults as $searched) {
		echo gui::buttons($searched, $_REQUEST['search']) . $searched . '<br>';
        }


}
if (isset($_REQUEST['m']) && isset($_REQUEST['action'])) {
	$SEARCHOLD = '';

	echo reader::action($_REQUEST['action'], $_REQUEST['m'], '%');
}

if(isset($_REQUEST['page'])){
    page($_REQUEST['page']);   
}else{
    page('start');   
}

echo '<div id="foot">Sesc © 2017 Fabian Müller</div>';

function styleByTime(){
        date_default_timezone_set("Europe/Berlin");
            ini_set("highlight.comment", "#008000; font-weight: bold");
            ini_set("highlight.html", "#808080");
            ini_set("highlight.keyword", "#FF00BB; font-weight: bold");
            ini_set("highlight.string", "#808080");
            $GLOBALS['GlobalHeadColor'] = '#88DD88';
    }
?>
</div>
</div><br><br><br><br>
</body>
</html>
