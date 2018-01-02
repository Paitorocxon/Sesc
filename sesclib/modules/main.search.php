

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
    
    $( "#search" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
<?php
/**
*
*   @title:     main.search
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/


class search{
    function layout(){
        $req = search::IsRequest();
        echo '<form>' .
        '<input type="text" value="' . $req . '" id="search" name="search">' . 
        '<input type="submit" value="' . $GLOBALS['LangSearch'] . '">' . 
        '</form>';
    }
    function searching($search){
        $SearchArray[] = NULL;
        foreach(scandir(getcwd()) as $file){
            if($file !== '.' AND $file !== '..'){
                if (file_exists($file)){
                    if (is_file($file)){
                        if (!empty($search)){
                            if ($search == '%' OR $search == 'gimme all the damn files' OR $search == '') {
                                array_push ($SearchArray,$file);
                            } else {
                                if (strpos(strtolower('_' . $file), strtolower(trim($search)))) {
                                    array_push ($SearchArray,$file);
                                } elseif (strpos(strtolower('_' . file_get_contents($file)), strtolower(trim($search)))){
                                    array_push ($SearchArray,$file);  
                                }
                            }
                        }
                    }
                }
            }
        }
        return $SearchArray;
    }
    function IsRequest(){
        if (isset($_REQUEST['search'])){
            return $_REQUEST['search'];
        } else {
        }
    }
}