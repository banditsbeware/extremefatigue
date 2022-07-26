<style>
  div#nav { 
    margin: 3px auto;  
    color: #515151;
    font-size: 14px;
  } 
  div.nav-item {
    padding: 0 5px;
    display: inline-block;
  }
  div.nav-item:not(:first-child) {
    border-left: 1px solid black;
  }
  div.nav-item a {
    text-decoration: none;
    font-weight: regular;
  }
  div.nav-item a:visited {
    color: inherit;
  }
  div.nav-item a:hover {
    text-shadow: 0px 0px 1px black;
    transistion: 0.5s;
  }
  div.nav-item a#current-page {
    color: #010199;
  }
</style>
<div id='nav'><?php

    $me = $_SERVER["SCRIPT_NAME"];

    foreach (glob("*.php") as $filename) {
      echo "<div class='nav-item'>";

      $fn = substr($filename, 0, -4);

      if ("/$filename" == "$me")
        echo "<a id='current-page'>$fn</a>";

      else
        echo "<a href='/$filename'>$fn</a>";
    
      echo "</div>";
    }

?></div>
