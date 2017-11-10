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
echo search::layout();



if (isset($_REQUEST['search'])){
    foreach(search::searching($_REQUEST['search'], getcwd() . '/') as $hit){
        echo '<a href="' . $hit . '">' . $hit . '</a><br>';
    }
}