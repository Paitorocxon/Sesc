<?php
/**
*
*   @title:     main.creator
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   13th November 2017
*   @version:   1.0
*   
*/


class creator{
    function write($file,$content){
        if (isset($file) && isset($content)){
            $writefile = fopen($file, "w") or die("Error");
            fwrite($writefile, $content);
            fclose($writefile);
        }
    }
}
