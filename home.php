<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">
    <title>. . .</title>
  </head>
  <body>
    <div id='top'><?php include "static/nav.php"; ?></div>
  
    <p></p>
    <div id='thoughts'>
      <div 
        style='position: absolute; top: -10px; left: 10px;
               background-color: #eee; padding: 1px 4px; border: 1px solid black'>On my mind today</div>
      <?php
        $thoughts = file("thoughts.txt");
        echo "<p>".$thoughts[array_rand($thoughts)]."</p>";      
      ?>
      <img src='static/media/dave1.png'/>
    </div>

    <div id='updates'>
      <h4>Update history</h4>
      <div style='height: 200px; overflow-y: scroll;'>
      <?php
        $output = `git log --pretty=format:"%h %s - %ad" --date=relative`;
        echo "<pre>$output</pre>";
      ?>
    </div></div>

    <div id='buttons'>
      <img src='static/media/buttons/colors.gif'/>
      <img src='static/media/buttons/Sailor.gif'/>
      <a target='_blank' href='https://hekate.neocities.org/'>
        <img src='static/media/buttons/hekate.png'/></a>
      <img src='static/media/buttons/firefox1.gif'/>
    </div>
    
    <p id='cp'>&#169; extreme fatigue <?php echo date("Y"); ?></p> 
    <img style='width: 100px; position: absolute; bottom: 0; left: 0' src='static/media/buttons/firefox.png'/>
    <img style='position: absolute; bottom: 10px; right: 10px' src='static/media/buttons/monitor.gif'/>
  </body>

  <?php include "anim/_base.html"; ?>
  
  <?php
    $anims = glob("anim/anim*.html");
    $file = $anims[array_rand($anims, 1)];
//  $file = "anim/anim9.html";
    include $file;    
  ?>
</html>
