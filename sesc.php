<link rel="stylesheet" href="stylesheet.css">
<center>
<div id="main">
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
$versionTitle= "[Levita]";

/*  */$version = $releaseVersion . "." . $subVersion . " " . $versionTitle;/*  */


echo $version;
echo init::initialize();
echo '<div id="navi">' . search::layout() . '</div>';


if (isset($_REQUEST['search'])){
    echo '<div id="hits">';
        foreach(search::searching($_REQUEST['search'], getcwd() . '/') as $hit){
            if (!empty($hit)){
                echo '<a href="sesc.php' . "?m=" . $hit . OnSearch() . '">' . $hit . '</a><br>';
            }
        }
    echo '</div>';
}

if (isset($_REQUEST['m'])){
    echo '<div id="content">';
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