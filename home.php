<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" contents="">
        <link rel="stylesheet" href="static/style.css" type="text/css">
        <link rel="stylesheet" href="static/home.css" type="text/css">
        <title>david's site</title>
    </head>
    <body>
        <?php include "src/nav.php"; ?>
        <main>        
            <div id='file' class='maincolumn'>
                <?php include "src/buildfile.php"; ?>
            </div>

            <div id='buttons' class='maincolumn'>

                <?php // TODO. get links for all buttons
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

        </main>
    </body>

    <?php
      $thoughts = file("static/thoughts.txt");
      echo "<p id='thought'>".$thoughts[array_rand($thoughts)]."</br>.</br>.</br>.</p>";      
    ?>
    <img style='margin-left: -50px; margin-bottom: -12px' src='static/media/walk1.gif'/>
    <div id='floor'></div>

</html>
