

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
        if (isset($_REQUEST['nav'])){
            if ($_REQUEST['nav']=='..'){
                $_SESSION['dir'] = dirname($_SESSION['dir'],1);
            } else {
            $_SESSION['dir'] = $_SESSION['dir'] . '\\' . $_REQUEST['nav'];
            }
            die('<meta http-equiv="refresh" content="0; url=sesc.php?search=' . $_REQUEST['search'] . '" />');
        } elseif (!isset($_SESSION['dir'])) {
            $_SESSION['dir'] = getcwd();
        }
        
        
        
        $req = search::IsRequest();
        echo '<form>' .
        '<input type="text" value="' . $req . '" id="search" name="search">' . 
        '<input type="submit" value="' . $GLOBALS['LangSearch'] . '">' . 
        '</form>';
    }
    
    function searching($search){
     
     $SearchArray[] = NULL;
        foreach(scandir($_SESSION['dir']) as $file){
            #if($file !== '.' AND $file !== '..'){
                if (file_exists($file)){
                    if (is_file($file)){
                        if (!empty($search)){
                            if ($search == '%') {
                                array_push ($SearchArray,$file);
                            } else {
                                if (strpos(strtolower('_' . $file), strtolower(trim($search)))) {
                                    array_push ($SearchArray,$file);
                                } elseif (strpos(strtolower('_' . file_get_contents($file)), strtolower(trim($search)))){
                                    array_push ($SearchArray,$file);  
                                }
                            }
                        }
                    } else {
                        echo '/<a href="sesc.php?nav=' . $file . '&search=' . $_REQUEST['search'] . '">' . $file . '</a><br>';
                    }
                }
            #}
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