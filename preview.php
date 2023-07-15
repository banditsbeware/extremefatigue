<!--
    preview.php
    preview an essay during editing.
    request localhost:8000/preview.php?file=new_essay.html to view
    extremefatigue/new_essay.html
    
    when finished, run `python3 dbhelper.py` and add `new_essay.html`
    to add it to the database
-->
<?php 

$preview_filename = dirname(__FILE__) . "/". $_GET["file"];

include "src/view.php";

?>
