<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">
    <title>blog</title>
    <style>
      ul {
        margin-top: 30px;
        list-style-type: none;
      }
      div.month {
        padding: 2px;
        background-color: #ccccff;
      }
      div.month:nth-child(odd) {
        background-color: #ddddff;
      }
      em.month-label {
        float: right;
      }
      li a {
        text-decoration: none;
      }
    </style>
  </head>

  <body>

    <?php include "static/nav.php"; ?>

    <h3>b - blog</h3>

    <ul><?php

      $files = glob("html/*.html");
      $_m = -1;

      foreach (array_reverse($files) as $filename) {

        $fn = substr($filename, 14, -5);
        $d = date_parse( substr($filename, 5, 8) );
        $m = $d["month"]; $y = substr($d["year"], 2);


        if ($m != $_m) {
          $month = date('M', mktime(0, 0, 0, $m, 10));
          echo "</div><div class='month'>";
          echo "<em class='month-label'>$month '$y</em>";
          $_m = $m;
        }

        echo "<li><a href='/$filename'>$fn</a></li>";
      }
      echo "</div>";
    ?></ul>

  </body>
</html>
