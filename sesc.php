<link rel="stylesheet" href="stylesheet.css">
<center>

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
if (isset($_REQUEST['m'])){
    $requestString = '/' . $_REQUEST['m']; 
}else{
    $requestString = '';  
}

/*  */$version = $releaseVersion . "." . $subVersion . " " . $versionTitle;/*  */


echo init::initialize();
echo '<div id="main"><div id="navi">';
echo '<div id="left"><h1 style="color:#BBFFBB"><b>Sesc</b></h1>' . $requestString . '</div>';
echo '<div id="right" style="padding-right: 6pt;">';
echo search::layout();
echo '</div></div>';


upload::load();
 
echo '<div id="innermain">';


echo '<br>';

if (isset($_REQUEST['search'])){
    echo '<div id="hits">';
        foreach(search::searching($_REQUEST['search'], getcwd() . '/') as $hit){
            if (!empty($hit)){
                echo gui::buttons($hit,$_REQUEST['search']) . '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '#content">' . $hit . '</a><br>';
            }
        }
    echo '</div>';
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



?>
</div>
</div><br><br><br><br>

