<script>

    function getSelectionText() {
        var text = "";
        if (window.getSelection) {
            text = window.getSelection().toString();
        } else if (document.selection && document.selection.type != "Control") {
            text = document.selection.createRange().text;
        }
        return text;
    }
    function strip(html) {
       var tmp = document.createElement("DIV");
       tmp.innerHTML = html;
       return tmp.textContent || tmp.innerText || "";
    }
    function striping() {
        //var selected = strip(getSelectionText());
        //replaceSelectionWithOUTHtml(selected);   
    } 
        function replaceSelectionWithOUTHtml(html) {
        var range;
        var oldcontent = getSelectionText();
        if (window.getSelection && window.getSelection().getRangeAt) {
            range = window.getSelection().getRangeAt(0);
            range.deleteContents();
            var div = document.createElement("div");
            div.innerHTML =  html;
            var frag = document.createDocumentFragment(), child;
            while ( (child = div.firstChild) ) {
                frag.appendChild(child);
            }
            range.insertNode(frag);
        } else if (document.selection && document.selection.createRange) {
            range = document.selection.createRange();
            range.pasteHTML(html);
        }
    }
    function replaceSelectionWithHtml(html) {
        var range;
        var oldcontent = getSelectionText();
        if (window.getSelection && window.getSelection().getRangeAt) {
            range = window.getSelection().getRangeAt(0);
            range.deleteContents();
            var div = document.createElement("div");
            div.innerHTML = '<' + html + '>' + oldcontent + '</' + html + '>';
            var frag = document.createDocumentFragment(), child;
            while ( (child = div.firstChild) ) {
                frag.appendChild(child);
            }
            range.insertNode(frag);
        } else if (document.selection && document.selection.createRange) {
            range = document.selection.createRange();
            range.pasteHTML(html);
        }
    } 
</script>


<?php
/**
*
*   @title:     main.writer
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   12th November 2017
*   @version:   2.0
*   
*/


class writer{
    function edit($file){
        
        $buttons = '
                <button onclick="replaceSelectionWithHtml(\'span style=font-weight:normal;\')" id="menuitem">Aa</button>
                <button onclick="replaceSelectionWithHtml(\'b\')" id="menuitem"><b>Aa</b></button>
                <button onclick="replaceSelectionWithHtml(\'i\')" id="menuitem"><i>Aa</i></button>
                <button onclick="replaceSelectionWithHtml(\'font color=red\')" id="menuitem"><font color=Red>Aa</font></button>
                <button onclick="replaceSelectionWithHtml(\'font color=blue\')" id="menuitem"><font color=blue>Aa</font></button>
                <button onclick="replaceSelectionWithHtml(\'font color=green\')" id="menuitem"><font color=green>Aa</font></button>
                ';
        
        unset($_REQUEST['search']);
        if (isset($_REQUEST['typeof']) && $_REQUEST['typeof'] == 'Normal'){
           
            if (file_exists($file)){
                return  $buttons . '

		
                
                <form method="POST"><br><input type="submit" value="' . $GLOBALS['LangSave'] . '"><input type="hidden" name="m" id="m" value="' . $file . '"           >  
                <div contentEditable="true" id="edit">' . file_get_contents($file) . '</div><input type="hidden" name="edit" id="editor_" />
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("editor_").value = document.getElementById("edit").innerHTML;
                }, 5);
                </script>
                </form>' . 
		'
		
		' .
                '<br>';
            }else{
                return  $buttons . '
                


                <form method="POST"><br><input type="submit" value="' . $GLOBALS['LangSave'] . '"><input type="hidden" name="m" id="m" value="' . $file . '"           > 
                <div contentEditable="true" id="edit"></div><input type="hidden" name="edit" id="editor_" />
                <script type="text/javascript">
                setInterval(function () {
                  document.getElementById("editor_").value = document.getElementById("edit").innerHTML;
                }, 5);
                </script>
                </form>' . 
                '<br>';
            }
        } else {
            if (file_exists($file)){
                return '
                <form method="POST"><br><input type="submit" value="' . $GLOBALS['LangSave'] . '"><input type="hidden" name="m" id="m" value="' . $file . '"           >  <textarea id="edit"  name="edit">' .
                file_get_contents($file) . 
                '</textarea></form>' . 
                '<br>';
            }else{
                return '<form method="POST"><br><input type="submit" value="' . $GLOBALS['LangSave'] . '"><input type="hidden" name="m" id="m" value="' . $file . '"           >  <textarea id="edit"  name="edit">' .
                '</textarea></form>' . 
                '<br>';
            }            
        }
    }
}
