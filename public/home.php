<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" contents="">
        <link rel="stylesheet" href="/static/style.css" type="text/css">
        <link rel="stylesheet" href="/static/home.css" type="text/css">
        <title>david's site</title>
    </head>
    <body>
        <?php include "nav.php"; ?>
        <main>        
            <div id='file' class='maincolumn'>
                <?php include "buildfile.php"; ?>
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
                    ["latex.gif", "https://link.springer.com/chapter/10.1007/978-3-031-09850-5_16"], 
                    ["miku.gif", ""], 
                    ["pbm.gif", ""], 
                    ["php.gif", ""], 
                    ["spotify.gif", "https://open.spotify.com/user/1215017379?si=c971c7bf646f4156"], 
                    ["thevoid.gif", ""], 
                    ["vim.gif", ""], 
                    ["vocaloid.gif", ""], 
                ];
                for ($i = 0; $i < count($buttons); $i++) {
                    $button = "<img src='/static/media/buttons/".$buttons[$i][0]."'/>";
                    if (strlen($buttons[$i][1]) > 0) 
                        echo "<a target='_blank' href='".$buttons[$i][1]."'>".$button."</a>";
                    else
                        echo "<a>".$button."</a>";
                }
                ?>
            </div>

        </main>
    </body>

    <p id='thought'></p>
<!--<p id='thought'>.</br>.</br>.</br></p>-->
    <?php // This Feels Very Wrong
      $thoughts = file("../static/thoughts.txt");
      // echo "<p id='thought'>".$thoughts[array_rand($thoughts)]."</br>.</br>.</br>.</p>";      
      echo "<script>var thoughts = Array();";
      foreach ($thoughts as $line) echo "thoughts.push(`$line`);";
      echo "</script>";
    ?>
    <img style='margin-left: -50px; margin-bottom: -12px' src='/static/media/walk1.gif'/>
    <div id='floor'></div>

    <script>

    let printer, printing, thought = document.getElementById('thought');

    setInterval(() => {
        thought.innerHTML = ''
        if (!printing && Math.random() < 0.5) {
            printing = 1
            let txt = thoughts.at(Math.floor(Math.random() * thoughts.length))
            let i = 0
            printer = setInterval(() => {
                thought.innerHTML += txt.at(i++)

                if (i === txt.length) {
                    clearInterval(printer)
                    printing = 0
                }

            }, 30)
        }
            
    }, 5000);
    

    </script>

</html>
