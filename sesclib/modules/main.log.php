<?php
/**
*
*   @title:     main.writer
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   12th November 2017
*   @version:   1.0
*   
*/


//date_default_timezone_set('UTC');

class log{
    function write($text){
        
        $ip = getenv ("REMOTE_ADDR");
        if (file_exists('sesclog.log')){
            $text = file_get_contents('sesclog.log') . "\n" . str_pad(date('(z) [d.m.Y|H:i:s]'), 30, ' ', STR_PAD_RIGHT) .
            str_pad($ip, 15, ' ', STR_PAD_RIGHT) . "|" .
            str_pad($text, 80, ' ', STR_PAD_RIGHT) . "|";
        } else {
            $text = date('(z) d.m.y #') . $text;
        }
        $FILE = fopen('sesclog.log', 'w');
        fwrite($FILE, $text);
        fclose($FILE);
    }
}
