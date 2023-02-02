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

<!--<div id='you'>
      <p>Does this sound like <em>you?</em></p>
      <ul>
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
      </ul>
      <p><small>if so, you may be susceptible to pseudoscientific grifts; please see <a target='_blank' href='https://en.wikipedia.org/wiki/Barnum_effect'>Barnum effect</a></small></p>
    </div>-->

    <div id='updates'>
      <h4>Update history</h4>
      <div style='height: 200px; overflow-y: scroll;'>
      <?php
        $output = `git log --pretty=format:"%h %s - %ad" --date=relative`;
        echo "<pre>$output</pre>";
      ?>
    </div></div>

    <div id='buttons'>
      <?php
        $buttons = glob('static/media/buttons/*');
        $links = [
          "https://cyber.dabamos.de/88x31/index.html", // 88x31
          "", // Sailor
          "", // bestwithmie
          "https://www.youtube.com/watch?v=mQ1gzLAztK8&t=1918s", // beyes
          "", // chillsoft
          "https://coolors.co", // colors
          "https://catsystemcorp.bandcamp.com/", // corp
          "http://fonts.tom7.com/", // dbz-bt2
          "https://pigeon.dog/", // dontklick
          "", // email
          "", // firefox.png
          "", // firefox1
          "https://hekate.neocities.org/", // hekate
          "", // latex
          "", // miku
          "", // monitor
          "", // pbm
          "", // php
          "", // spotify
          "", // thevoid
          "", // vim
          "", // vocaloid
        ];
        for ($i = 0; $i < count($buttons); $i++) {
          echo "<a target='_blank' href='".$links[$i]."'>
                  <img src='".$buttons[$i]."'/></a>";
        }

      ?>
    </div>
    
    <p id='cp'>&#169; extreme fatigue <?php echo date("Y"); ?></p> 
    <img style='width: 88px; position: fixed; bottom: 10px; right: 15px' src='static/media/buttons/monitor.gif'/>
  </body>

<!--
  <?php include "anim/_base.html"; ?>
  
  <?php
    $anims = glob("anim/anim*.html");
    $file = $anims[array_rand($anims, 1)];
//  $file = "anim/anim9.html";
    include $file;    
  ?>
-->
</html>
