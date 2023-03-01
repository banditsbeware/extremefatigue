<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async 
      src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <title>dictionary</title>

    <style>
      body {
        max-width: 60ch;
        margin-left: 25px;
      }
      a#back {
        margin-top: 3px;
        margin-left: -15px;
        color: #515151;
        font-size: 12px;
        text-decoration: none;
      }
      h3 { color: black; }
      img {
        display: block;
        margin: auto;
        width: 300px;
      }
      p.imgcap { 
        font-size: small;
        text-align: center; 
      }
      ul#dict { 
        list-style-type: none; 
        margin: 0;
        padding: 0;
      }
      ul li { margin-bottom: 10px; }
      ul ul li { 
        list-style-type: '> '; 
        margin: 10px 0 0 25px;
      }
    </style>
  </head>

  <body>

    <?php include "static/nav.php"; ?>

    <h3>dictionary</h3>
    <p>terms I found in places and thought I needed to know what they meant. they are in lexicographical order but eventually i will add a toggle for chronological (by date found) order which i think is interesting</p>

<!--
- filenames in dict/ are dates in YY-MM format, organizing by month.
- items are accessed by _line_, so long items (e.g. with an image, sublist, math equation)
    must be squashed onto one line.
- all contents are concatenated and displayed in alphabetical order.
-->

    <ul id='dict'><?php
  
      $files = glob("dict/*");
      $dict = array();
      
      for ($k = 0; $k < count($files); $k++) {
        $dict = array_merge( $dict, file($files[$k]) );
      }

      sort( $dict, SORT_NATURAL | SORT_FLAG_CASE );
      for ($i = 0; $i < count($dict); $i++) echo $dict[$i];

    ?></ul>

  </body>
</html>
