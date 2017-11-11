
<center>
<link rel="stylesheet" href="stylesheet.css">
<?php
/**
*
*   @title:     Sesc
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   09th November 2017
*   @version:   1.0 [Levita]
*   
*/


include_once('sesclib/autoload.php');



$releaseVersion = 1 ;
$subVersion = 0 ;
$versionTitle = "[Levita]";

echo styleByTime();

if (isset($_REQUEST['m'])){
    $requestString = '/' . $_REQUEST['m']; 
}else{
    $requestString = '';  
}

/*  */$version = $releaseVersion . "." . $subVersion . " " . $versionTitle;/*  */


echo init::initialize();
echo '<div id="main"><div id="navi">';
echo '<div id="left"><h1 style="color:#435189"><b>Sesc</b></h1>' . $requestString . '</div>';
echo '<div id="right" style="padding-right: 6pt;">';
echo search::layout();
echo '</div></div>';


upload::load();
 
echo '<div id="innermain">';


echo '<br>';

if (isset($_REQUEST['search'])){
    if (file_exists($_REQUEST['search'])){
        if ($_REQUEST['search'] !== '.' AND $_REQUEST['search'] !== '..'){
            header('location: sesc.php?m=' . $_REQUEST['search']);
        }else{
            
        echo '<div id="hits">';
            foreach(search::searching($_REQUEST['search'], getcwd() . '/') as $hit){
                if (!empty($hit)){
                    echo gui::buttons($hit,$_REQUEST['search']) . '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '#content">' . $hit . '</a><br>';
                }
            }
        echo '</div>';            
        }
    }else{
        echo '<div id="hits">';
            foreach(search::searching($_REQUEST['search'], getcwd() . '/') as $hit){
                if (!empty($hit)){
                    echo gui::buttons($hit,$_REQUEST['search']) . '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '#content">' . $hit . '</a><br>';
                }
            }
        echo '</div>';
    }
}

if (isset($_REQUEST['m']) && isset($_REQUEST['action'])){
    if (isset($_REQUEST['search'])){
        echo reader::action($_REQUEST['action'], $_REQUEST['m'], $_REQUEST['search']);
    }else{
        echo reader::action($_REQUEST['action'], $_REQUEST['m'], "");
    }
}

    if (isset($_REQUEST['m'])){
        echo '<h3><a name="content">' . $_REQUEST['m'] . '</h3><div id="content">';
        echo createHTML::highlight(reader::read());
        echo '</div>';  
    }



function OnSearch(){
    if (isset($_REQUEST['search'])){
        return '&search=' . $_REQUEST['search'];
    }else{
    }
}

echo '<div id="foot"> Sesc © 2017 Fabian Müller</div>';



function styleByTime(){
        date_default_timezone_set("Europe/Berlin");
        $timestamp = time();
        $time = date("H");
        if ($time > 4 && $time < 20 ){
            ini_set("highlight.comment", "#008000; font-weight: bold");
            ini_set("highlight.html", "#808080");
            ini_set("highlight.keyword", "#FF00BB; font-weight: bold");
            ini_set("highlight.string", "#808080");

            return '<link rel="stylesheet" href="stylesheet.css">';
        }else{
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

