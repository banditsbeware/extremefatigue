<!--
    nav.php
    included in all /public/*.php scripts to display the nav bar
-->
<style>
  div#nav { 
    margin: 15px;
    color: #515151;
  } 
  div#nav a {
    color: inherit;
    text-decoration: none;
  }
  div#nav a#c {
    text-decoration: underline;
  }
</style>

<div id='nav'><p><?php

    $me = $_SERVER["SCRIPT_NAME"];
    $i = 0;

    echo "[ ";
    foreach (glob("*.php") as $filename) {
      if ($i) echo " / ";

      $fn = substr($filename, 0, -4);

      if ("/public/$filename" == "$me")
        echo "<a id='c'>$fn</a>";

      else
        echo "<a href='$filename'>$fn</a>";

      $i += 1;
    }
    echo " ]";

?></p></div>
