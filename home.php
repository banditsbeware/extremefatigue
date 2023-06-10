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
    <?php include "src/nav.php"; ?>
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

        <div id='barnum' class='maincolumn'>
          <p>Does this sound like <em>you?</em></p> <ul>
          <li>you have a great need for other people to like &amp; admire you</li>
          <li>you have a tendency to be critical of yourself</li>
          <li>you have lots of unused capacity which you haven't used to your advantage</li>
          <li>you may have some personality weaknesses but can compensate for them</li>
          <li>while disciplined &amp; self controlled outside, you tend to be worrisome &amp; insecure inside</li>
          <li>you prefer some change &amp; variety, are dissatisfied with restrictions/limitations</li>
          <li>you are an independent thinker &amp; need satisfactory proof of claims by others</li>
          <li>you find it unwise to be too quick in revealing yourself to others</li>
          <li>you are sometimes extraverted, but sometimes introverted</li>
          <li>some of your aspirations tend to be pretty unrealistic</li>
          <li>security is one of your major goals in life</li>
          </ul> <p><small>if so, you may be susceptible to pseudoscientific grifts; please see <a target='_blank' href='https://en.wikipedia.org/wiki/Barnum_effect'>Barnum effect</a></small></p>
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
              if (strlen($buttons[$i][1]) > 0) 
                echo "<a target='_blank' href='".$buttons[$i][1]."'>
                        <img src='static/media/buttons/".$buttons[$i][0]."'/></a>";
              else
                echo "<a><img src='static/media/buttons/".$buttons[$i][0]."'/></a>";
            }
          ?>
        </div>
        
        <img style='width: 88px; position: fixed; bottom: 10px; right: 15px' src='static/media/buttons/monitor.gif'/>
    </main>
  </body>

    <?php
      $thoughts = file("static/thoughts.txt");
      echo "<p id='thought'>".$thoughts[array_rand($thoughts)]."</br>.</br>.</br>.</p>";      
    ?>
    <img style='margin-left: -50px; margin-bottom: -12px' src='static/media/walk1.gif'/>
    <div id='floor'></div>
    <!--<p id='cp'>&#169; extreme fatigue <?php echo date("Y"); ?></p>-->


  <?php // include "anim/_base.html"; ?>
  
  <?php
//  $anims = glob("anim/anim*.html");
//  $file = $anims[array_rand($anims, 1)];
//  $file = "anim/anim9.html";
//  include $file;    
  ?>
</html>
