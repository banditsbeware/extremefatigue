<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">
    <title>. . .</title>
  </head>
  <body>
    <div id='top'>
      <?php include "static/nav.php"; ?>
<!--  <h3>home - extreme fatigue</h3> -->
    </div>
    <p id='cp'>&#169; extreme fatigue <?php echo date("Y"); ?></p> 
  </body>

  <?php include "anim/_base.html"; ?>
  
  <?php
    $anims = glob("anim/anim*.html");
    $file = $anims[array_rand($anims, 1)];
    //$file = "anim/anim2.html";
    include $file;    
  ?>
</html>
