<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">
    <link rel="stylesheet" href="static/home.css" type="text/css">
    <title>%</title>
  </head>
  <body>
    <?php include "static/nav.php"; ?>
    <main>
        
        <div id='main-header' class='maincolumn'>
            <pre><?php include "static/banner.txt"; ?></pre>
        </div>

        <div id='declarations' class='maincolumn'>
            <?php
                $init = ["int", "float", "double", "long", "char", "bool"];
                $decl = file("static/variables.txt");

                echo "<code> // DECLARATIONS</br>";
                for ($i=0; $i<random_int(2,5); $i++)
                    echo "<span style='color:blue'><em>"
                        .$init[array_rand($init)]
                        ."</em></span> "
                        .trim($decl[array_rand($decl)])
                        .";</br>";
                echo "</code>";
            ?>
        </div>

        <div id='studytopics' class='maincolumn'>
          <h2>Interesting topics</h2>
          <ul><?php
            $topics = file("static/studytopics.txt");
            shuffle($topics);
            for ($i=0; $i<10; $i++)
              echo "<li>".$topics[$i]."</li>";
          ?></ul>
        </div>

        <div id='updates' class='maincolumn'>
          <h4>Update history</h4>
          <div style='height: 200px; overflow-y: scroll;'>
          <?php
            $output = `git log --pretty=format:"%h %s - %ad" --date=relative`;
            echo "<pre>$output</pre>";
          ?>
        </div></div>

        <div id='barnum' class='maincolumn'> <?php include "static/barnum.html"; ?> </div>

        <div id='thoughts' class='maincolumn'>
          <?php
            $thoughts = file("static/thoughts.txt");
            echo "<p>".$thoughts[array_rand($thoughts)]."</p>";      
          ?>
          <img src='static/media/dave1.png'/>
        </div>

        <div id='buttons' class='maincolumn'>
          <?php
            $buttons = [
              ["88x31.gif", "https://cyber.dabamos.de/88x31/index.html"], 
              ["Sailor.gif", ""], 
              ["bestwithmie.gif", ""], 
              ["beyes.gif", "https://www.youtube.com/watch?v=mQ1gzLAztK8&t=1918s"], 
              ["chillsoft.gif", ""], 
              ["colors.gif", "https://coolors.co"], 
              ["corp.gif", "https://catsystemcorp.bandcamp.com/"], 
              ["dbz-bt2.gif", "http://fonts.tom7.com/"], 
              ["dontklick.gif", "https://pigeon.dog/"], 
              ["email.gif", ""], 
              ["firefox.png", ""], 
              ["firefox1.gif", ""], 
              ["hekate.png", "https://hekate.neocities.org/"],
              ["latex.gif", ""], 
              ["miku.gif", ""], 
              ["pbm.gif", ""], 
              ["php.gif", ""], 
              ["spotify.gif", "https://open.spotify.com/user/1215017379?si=c971c7bf646f4156"], 
              ["thevoid.gif", ""], 
              ["vim.gif", ""], 
              ["vocaloid.gif", ""], 
            ];
            for ($i = 0; $i < count($buttons); $i++) {
              echo "<a target='_blank' href='".$buttons[$i][1]."'>
                      <img src='static/media/buttons/".$buttons[$i][0]."'/></a>";
            }
          ?>
        </div>
        
        <img style='width: 88px; position: fixed; bottom: 10px; right: 15px' src='static/media/buttons/monitor.gif'/>
    </main>
    <p id='cp'>&#169; extreme fatigue <?php echo date("Y"); ?></p> 
  </body>

  <?php // include "anim/_base.html"; ?>
  
  <?php
//  $anims = glob("anim/anim*.html");
//  $file = $anims[array_rand($anims, 1)];
//  $file = "anim/anim9.html";
//  include $file;    
  ?>
</html>
