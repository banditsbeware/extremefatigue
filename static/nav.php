<style>
  div#nav { 
/*  margin: 3px auto;  */
    color: #515151;
    font-size: 14px;
  } 
  div.nav-item {
    padding: 0 0.1em;
    display: inline-block;
  }
  div.nav-item a {
    text-decoration: none;
    font-weight: regular;
  }
  div.nav-item a:visited { color: inherit; }
  div.nav-item a#c { color: #010199; }
</style>

<div id='nav'><?php

    $me = $_SERVER["SCRIPT_NAME"];
    $i = 0;

    echo "[ ";
    foreach (glob("*.php") as $filename) {
      if ($i) echo " / ";

      $fn = substr($filename, 0, -4);

      if ("/$filename" == "$me")
        echo "<a id='c'>$fn</a>";

      else
        echo "<a href='/$filename'>$fn</a>";

      $i += 1;
    }
    echo " ]";

?></div>
