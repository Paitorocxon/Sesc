<?php
/**
*
*   @title:     main.createHTML
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/

ini_set("highlight.comment", "#008000; font-weight: bold");
ini_set("highlight.html", "#808080");
ini_set("highlight.keyword", "#FF00BB; font-weight: bold");
ini_set("highlight.string", "#808080");


class createHTML{
    function highlight($text){
        highlight_string($text);
        return '';
    }
   
}