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

    <?php include "src/nav.php"; ?>

    <main>
      <h3>dictionary</h3>

      <ul id='dict'><?php
    
        include 'src/db.php';

        $pdo = new PDO('sqlite:database.db');
        $dict = read_dict($pdo);
        
        foreach ($dict as $row) {
          echo "<li title='[".$row["id"]."] ".$row["date"]."'>"
              ."<b>".$row["term"]."</b> "
              .$row["defn"]."</li>";
        }
        //  print_r("[". $row["id"] ."] ". $row["date"] ." <b>". $row["term"] ."</b>: ". $row["defn"] ."</br>");

        // sort( $dict, SORT_NATURAL | SORT_FLAG_CASE );
        // for ($i = 0; $i < count($dict); $i++) echo $dict[$i];

      ?></ul>
    </main>

  </body>
</html>
