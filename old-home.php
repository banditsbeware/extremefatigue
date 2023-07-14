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
    <?php include "nav.php"; ?>
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

        <div id='essay-list' class='maincolumn'>
          <ul><?php

            $files = glob("html/*.html");
            $_m = -1;

            // newest first.
            foreach (array_reverse($files) as $filename) {

              //!  TODO. this is terrible. !!!!!!!!!!!!!
              //!  parse filename for date and title   !
              //!                                      !
              $fn = substr($filename, 14, -5);
              $d = date_parse( substr($filename, 5, 8) );
              $m = $d["month"]; $y = substr($d["year"], 2);

              // if the month changes -
              if ($m != $_m) {

                // human-readable date: mmm 'yy
                $month = date('M', mktime(0, 0, 0, $m, 10));

                // close the previous month div
                if ($_m >= 0) echo "</div>";

                // create the current month div
                echo "<div class='month'>";
                echo "<em class='month-label'>$month '$y</em>";
                
                // set the new current month
                $_m = $m;
              }

              echo "<li><a href='/$filename'>$fn</a></li>";
            }

            // close the last month div
            echo "</div>";
          ?></ul>
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
              $button = "<img src='static/media/buttons/".$buttons[$i][0]."'/>";
              if (strlen($buttons[$i][1]) > 0) 
                echo "<a target='_blank' href='".$buttons[$i][1]."'>".$button."</a>";
              else
                echo "<a>".$button."</a>";
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
