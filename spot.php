<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" contents="">
  <link rel="stylesheet" href="static/style.css" type="text/css">
  <title>spotify playlists</title>
  <style>
    details {
      padding: 4px 0;
      background-color: #f0f0fa;
      border: none;
      box-shadow: 2px 2px 4px #bbbbbb;
      cursor: pointer;
    }
    details > summary {
      width: 200px;
      padding: 0 0 0 4px;
    }
    details > iframe {
      width: 95%;
      margin-left: 2.5%;
      padding: 5px 0;
    }
    details > p,h5 {
      padding: 4px;
      margin: 0;
    }
    ul { list-style-type: "> "; }
    ul > li {
      margin-left: 25px;
    }
  </style>
</head>

<body>
  
  <?php include "static/nav.php"; ?>

  <h3>spotify playlists</h3>

  <p>see <a href='https://open.spotify.com/user/1215017379?si=77f094e595534463'>my spotify profile</a>, the individual playlist links kept breaking on here</p>

<?php

$pl = array(
  ["corner",
  "lo-fi that is \"low fidelity\": sampled, chopped, and sonically degraded, distinct from <a target='_blank' href='https://www.youtube.com/watch?v=jfKfPfyJRdk'>mainstream, hi-fi \"lo-fi\"</a>. usage of foley and non-musical samples interjected and overlayed on beats. imitates the blur of sights and sounds throughout daily life which fall away, meaningless and without context",
  "Jinsang, tajima hal, Flavors, Family Event, Ill Sugi, your best friend jippy, Tomppabeats, oofoe, Aaronmaxwell, Saib, Ajmw, Byson, Aerate, 90sFlav, Made in M, wuf, Miraa., idntrmmber",
  "lo-fi, glitch, beats, abstract beats, jazz"],

  ["tunnel", 
   "Music for moving through tunnels at high speeds with low visibility.</br>the air gets colder as depth increases.",
  "// TODO",
  "jungle, house, techno"],

  [".iso", 
   "Music which longs for human connections. Somewhat nostalgic. makes it feel like one could vanish and all their loved ones would be unaffected.",
  "// TODO",
  "vaporwave, disco"],

  ["𝔸ℝℂℍ𝕀𝕋𝔼ℂ𝕋𝕌ℝ𝔼",
   "A playlist for a destroyed world. </br>the sounds of the first year after all humans have vanished",
  "VANITAS命死, ぬいぐるみクレヨン Lush Crayon, Windows 96, Christtt, 猫 シ Corp., SPORTSGIRL, death's dynamic shroud, CYBEREALITYライフ, ESPRIT 空想, KyonPalm, Ｏｃｅａｎ Ｓｈｏｒｅｓ, &lt;/body&gt;, bliss3three, Blank Banshee, 회사AUTO, Mindspring Memories, サイバー '98, bbrainz, .CASTING, Limousine, desert sand feels warm at night, Incorporeal Visions Deluxe, Father2006, Tupperwave, PowerPCME, King Quartz, architecture in tokyo, 18 Carat Affair",
  "vaporwave, deathdream, slushwave, hardvapour, mallsoft"],

  [".all",
   "Various sounds (I put a lot of new music here when i'm not yet sure where it fits",
  "Goreshit, Machine Girl, Xxtarlit⚸, TOKYOPILL, Sewerslvt, Windowshopping,, Loli in early 20s,  Aphex Twin, NANORAY, bye2, Acetantina, Nmesh, Waqs, willow1, C!erra My\$t, 97997ALMONDS, Casper Mcfadden, Grimes, Sienna Sleep, Kikuo, Yesterdayneverhappened, ooxygen, optic core, Eldia, emamouse, Purity Filter, &#956;-Ziq, amber key, Softxoxo's, Perfect Chao, Shitmat, Shima33, Govlink, Emray,</br> ⣎⡇ꉺლ༽இ•̛)ྀ◞ ༎ຶ ༽ৣৢ؞ৢ؞ؖ ꉺლ, ",
  "digital hardcore, glitchbreak, jungle, hyperpop, footwork, atmospheric drum and bass, weirdcore, braindance, intelligent dance music, experimental, drum and bass"],
    
  ["#include",
  "several images come to mind while listening to this playlist:<ul><li>the inner thoughts of a fax machine that has just learned it will be discarded</li><li>a detailed account of an electron's journey through a resistive wire</li><li>ultraviolet conversation between</br>two timelike-separated blades of grass</li><li>neutron star core basket-weaving</li><li>being Laplace's demon</li><li>what Irwin listens to as He transcribes the syntax tree of every sentence of every conversation being had on the planet</li></ul>",
  "Bataille Solaire, Loto Retina, Gora Sou, Metaroom",
  "deconstructed club, spectra, collage pop, weirdcore"],

  ["~ sui generis",
   "I used to think that this kind of music was not complex enough to be interesting (`~ sui generis` is supposed to translate to `not original`). Since being exposed to live house/techno DJs, I have started to appreciate quality sound design, mixing, and transitions. This music is easy to dance to and is good in the background while doing other tasks.",
  "DJ BORING, DJ Houseplants, Klaus Veen, lone, salute",
  "house, flat house, lo-fi house, tech house, float house"],

  ["> pkill ->",
   "a playlist for when your consciousness has been digitally uploaded but some of the code has been corrupted. you perceive lights and sounds but are unsure of their origin or chronological order. some sequences may have been repeated or <span id='the-d'>d</span>estroyed but there is no way of knowing what exactly is wrong. you are unsure about the amount of time that's passed since you came into existence. it is not only you that is incomplete but all of the world around you appears to have been altered or deleted randomly. it isn't painfu̥̞̞̭ͅl̴͏҉̫̙̹̘̩̼̩̩ <small>(there may or may not even be a body which can feel pain)</small>, but at least these thoughts &mdash; slightly uneasy and confused, but certainly thoughts &mdash; <span id='space'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span> are there",
  "2003 Toyota Corolla, koronba, Urotsuki, C418, No Love In The House Of Gold, Infinity Frequencies, Giant Claw, Lh, Pun Collins, Diskette Park, Father2006",
  "glitch, deathdream, fourth world, sampledelia, hardvapour, spectra, deconstructed club, ambient"],

);

shuffle($pl);

for ($i = 0; $i < count($pl); $i++) {
  echo "<details>
          <summary>".($pl[$i][0])."</summary>
          <p>".($pl[$i][1])."</p>
          <h5>some artists</h5>
          <p>".($pl[$i][2])."</p>
          <h5>some genres</h5>
          <p>".($pl[$i][3])."</p>
        </details></br>";
}

?>
  <p id='cp'>&#169; extreme fatigue <?php echo date("Y"); ?></p> 
</body>
<script>

let s = document.getElementById("space");
let d = document.getElementById("the-d");

setInterval(() => {
  s.innerText = "";
  setTimeout(() => { s.innerHTML = "&emsp;&emsp;&emsp;&emsp;" }, 480);
}, 500);

setInterval(() => {
  d.innerText = "d";
  setTimeout(() => { d.innerHTML = "D" }, 2160);
}, 2200);

</script>
</html>
