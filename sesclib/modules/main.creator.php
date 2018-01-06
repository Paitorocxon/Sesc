
  <script src="jquery/jquery-1.12.4.js"></script>
  <script src="jquery/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [<?php
    foreach(scandir(getcwd()) as $file){
            if($file !== '.' AND $file !== '..'){
                if (file_exists($file)){
                    if (is_file($file)){
                        echo '"' . $file . '",' . "\n";
                    }
                }
            }
        }
        echo '"%"';

    ?>
    ];
    
    $( "#m" ).autocomplete({
      source: availableTags
    });
  } );
  </script>


<?php
/**
*
*   @title:     main.creator
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   13th November 2017
*   @version:   1.2
*   
*/


class creator{
    function write($file,$content){
        if (isset($file) && isset($content)){
            $writefile = fopen($file, "w") or die("Error");
            fwrite($writefile, $content);
            fclose($writefile);
            die('<meta http-equiv="refresh" content="0; url=sesc.php?action=read&m=' . $file . '" />');
        }
    }
}
