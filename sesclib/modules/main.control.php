<?php
/**
*
*   @title:     main.control
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   25th November 2017
*   @version:   1.0
*   
*/
class control{
    function ui(){
			$UPLOAD = new upload();
			echo $UPLOAD->upload();
        return "Hey :D!";
    }
}
