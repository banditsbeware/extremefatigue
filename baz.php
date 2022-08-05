<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">
    <title>david's website</title>
    <style>
      img {
        max-width: 200%;
        display: block;
        margin-left: -50%;
        margin-right: -50%;
      }
    </style>
  </head>

  <body>
    
    <?php include "static/nav.php"; ?>
    
    <h3>baz - laptop</h3>

    <p>
      2021 16" M1 MacBook Pro, purchased in my last semester of college in spring of 2022; Used often for reading and coding remotely. Wallpaper: <a href='https://stsci-opo.org/STScI-01G8GX1KMWX2XA4PK2EWM7KE3R.png'>full resolution NGC 3324 image</a> (125MB) from the JWST debut
    </p>

    <img src='static/media/MacOS_rice.png' />
    <!-- include photo of back of laptop lid -->

    <h3>software</h3>
    <ul>
      <li>Terminal: <a>Iterm2</a></li>
      <li>Editor: <a>NeoVim</a></li>

    </ul>

    <p id='cp'>&#169; david rademacher <?php echo date("Y"); ?></p> 

  </body>

</html>
