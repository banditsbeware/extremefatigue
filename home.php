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
      <?php
        $thoughts = file("thoughts.txt");
        echo "<p>".$thoughts[array_rand($thoughts)]."</p>";      
      ?>
      <img src='static/media/dave1.png'/>
    </div>

    <div id='studytopics'>
      <h2>Interesting topics</h2>
      <ul><?php
        $topics = file("studytopics.txt");
        shuffle($topics);
        for ($i=0; $i<10; $i++)
          echo "<li>".$topics[$i]."</li>";
      ?></ul>
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
      <a target='_blank' href='http://fonts.tom7.com/'>
        <img src='static/media/buttons/dbz-bt2.gif'/></a>
    </div>
    
    <p id='cp'>&#169; extreme fatigue <?php echo date("Y"); ?></p> 
    <img style='width: 100px; position: absolute; bottom: 10px; left: 10px' src='static/media/buttons/firefox.png'/>
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
