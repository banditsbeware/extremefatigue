<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">
    <title>quotes</title>
    <style>
      html {
        background-color: #7fbadc;
        overflow-x: hidden;
      }
      div#quotes p {
      /*width: 200%;*/
      /*line-height: 1.3;*/
      /*margin-left: -50%;*/
      }
      div#quotes a { 
        text-decoration: none;
      }
      p.attr { 
        color: gray;
        font-size: 0.8em;
        text-align: right;
        margin-bottom: 60px;
      }
      img.cloud {
        width: 200px;
        z-index: -1;
        position: absolute;
        top: 0;
        animation: 20s linear infinite windy;
      }
      @keyframes windy {
        from { right: -200px; }
        to   { right: 100%;   }
      }
    </style>
  </head>

  <body>
    
    <?php include "static/nav.php"; ?>

    <h3>quotes</h3>

<div id="quotes"><?php

$k = array(
  ["Most people have no idea how beautiful the world is and how much magnificence is revealed in the tiniest things, in some flower, in a stone, in tree bark, or in a birch leaf. The grown-ups, going about their business and worries, and tormenting themselves with all kinds of details, gradually lose the perspective for these riches that children, when they are attentive and good, soon notice and love with their whole heart. And yet the greatest beauty would be achieved if everyone remained in this regard always like attentive and good children, simple and pious in sensitivities, and if people did not lose the capacity for taking pleasure as intensely in a birch leaf or a peacock's feather or the wing of a hooded crow as in a mighty mountain or a splendid palace. What is small is not small in itself, just as that which is great is not &mdash; great. A great and eternal beauty passes through the whole world, and it is distributed fairly over that which is small and that which is large; for in such important and essential matters, no injustice is to be found on earth.","Rainer Maria Rilke"
  ],[ "I am walking around all alone in this splendid garden that does not belong to me and the gate of which stands wide open for anyone; I dwell here in refreshing but also oppressive loneliness. That is why I’ve been attesting to the existence of this idyllic spot for years… without expecting many strollers to come, however. For what enthralls me and what I experience as beauty is often judged to be dull and dry by others.", "M.C. Escher"
  ],[
    "My belief is that the explanations of \"emergent\" phenomena in our brains&mdash; for instance, ideas, hopes, images, analogies, and finally consciousness and free will&mdash; are based on a kind of strange loop, an interaction between levels in which the top level reaches back down towards the bottom level and influences it, while at the same time being itself determined by the bottom level. In other words, the self-reinforcing \"resonance\" between different levels&mdash; quite like the Henkin sentence which, by merely asserting its own provability, actually becomes provable. The self comes into being at the moment is has the power to reflect itself.", "GEB"
  ],[
    "If you think you're a really good programmer... read <em>The Art of Computer Programming</em>... you should definitely send me a r&eacute;sum&eacute; if you can read the whole thing.", "Bill Gates"
  ],[
    "Mathematics is like kissing; no fun to watch others do it. You have to do it yourself.", "my partial differential equations professor"
  ],[
    "A new scientific truth does not triumph by convincing its opponents and making them see the light, but rather because its opponents eventually die, and a new generation grows up that is familiar with it.", "Max Planck"
  ],[
    "Any word you have to hunt for in a thesaurus is the wrong word.", "Stephen King"
  ],[
    "The board rewrote the definition of science, so that it is no longer limited to the search for natural explanations of phenomena.", "AP on the Kansas board of education"
  ],[
    "Lisp has jokingly been called \"the most intelligent way to misuse a computer\". I think that description is a great compliment because it transmits the full flavor of liberation: it has assisted a number of our most gifted fellow humans in thinking previously impossible thoughts.", "Edsger Dijkstra"
  ],[
    "At least it hides the face partly well, so you have the apparent face, the apple, hiding the visible but hidden, the face of the person. It's something that happens constantly. Everything we see hides another thing, we always want to see what is hidden by what we see. There is an interest in that which is hidden and which the visible does not show us. This interest can take the form of a quite intense feeling, a sort of conflict, one might say, between the visible that is hidden and the visible that is present.","Ren&eacute; Magritte on his painting <em>The Son of Man</em>"
  ],[
    "Before I began my studies in Zen, I thought a tree was a tree and a stone was a stone. When I started to study Zen, I could see that a tree was not a tree and a stone was not a stone. Now that I am a Zen master, I know that a tree is a tree, and a stone is a stone.", 
    "this <a href='https://news.ycombinator.com/item?id=32398391#32399093'>HN thread</a>"
  ],[
    "Hogen of Seiryo monastery was about to lecture before dinner when he noticed that the bamboo screen, lowered for meditation, had not been rolled up. He pointed to it. Two monks arose wordlessly from the audience and rolled it up. Hogen, observing the physical moment, said, \"The state of the first monk is good, not that of the second.\"", "GEB"
  ],[
    "The student Doko came to a Zen master, and said: \"I am seeking the truth. In what state of mind should I train myself, so as to find it?\" Said the master, \"There is no mind, so you cannot put it in any state. There is no truth, so you cannot train yourself for it.\" \"If there is no mind to train, and no truth to find, why do you have these monks gather before you every day to study Zen and train themselves for this study?\" \"But I haven't an inch of room here,\" said the master, \"so how could the monks gather? I have no tongue, so how could I call them together or teach them?\" \"Oh, how can you lie like this?\" asked Doko. \"But if I have no tongue to talk to others, how can I lie to you?\" asked the master. Then Doko said sadly, \"I cannot follow you. I cannot understand you.\" \"I cannot understand myself,\" said the master.", "GEB"
  ],[
    "Hyakujo wished to send a monk to open a new monastery. He told his pupils that whoever answered a question most ably would be appointed. Placing a water vase on the ground, he asked: \"Who can say what this is without calling its name?\" The chief monk said: \"No one can call it a wooden shoe.\" Isan, the cooking monk, tipped over the vase with his foot and went out. Hyakujo smiled and said: \"The chief monk loses.\" And Isan became the master of the new monastery.", "GEB"
  ]
);

shuffle($k);

for ($i = 0; $i < count($k); $i++) {
  echo "<p>".($k[$i][0])."</p>";
  echo "<p class='attr'>".($k[$i][1])."</p>";
}

$cloud_files = glob("static/media/clouds/*.png");
for ($i = 0; $i < 20; $i++) {
  echo "<img class='cloud' src='".$cloud_files[array_rand($cloud_files, 1)]."'/>";
}

?></div></body>

<script>

let clouds = document.getElementsByClassName("cloud");

let d, h, hmax = document.getElementsByTagName("body")[0].clientHeight;

for (let c of clouds) {
  h = Math.random() * hmax;
  d = Math.random() * 20;
  c.style.top = `${h}px`;
  c.style.animationDelay = `-${d}s`;
}

</script>
</html>
