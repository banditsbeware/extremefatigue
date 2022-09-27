<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" contents="">
    <link rel="stylesheet" href="static/style.css" type="text/css">
    <title>baz</title>
    <style>
      img {
        max-width: 60ch;
        display: block;
      }
    </style>
  </head>

  <body>
    
    <?php include "static/nav.php"; ?>
    
    <h3>baz - macbook pro</h3>

    <img src='static/media/macback.png' />

    <p>
      2021 16" M1 MacBook Pro, purchased in my last semester of college in spring of 2022; Used often for reading and coding remotely. Wallpaper: <a href='https://stsci-opo.org/STScI-01G8GX1KMWX2XA4PK2EWM7KE3R.png'>full resolution NGC 3324 image</a> (125MB) from the JWST debut
    </p>

    <img src='static/media/MacOS_rice.png' />

    <h3>software</h3>
    <ul>
      <li>Package manager: Homebrew</li>
      <li>Terminal: <a>Iterm2</a></li>
      <li>Shell: zsh, with oh-my-zsh</li>
      <li>Editor: <a>NeoVim</a> or Visual Studio Code (with Vim extension)</li>
      <li>Browser: Firefox, with plugins<ul style='padding-left: 20px'>
        <li>Vimium</li>
        <li>uBlock Origin</li>
        <li>Dark Reader</li>
        <li>Sidebery</li>
        <li>Download All Images</li>
        <li>I Don't Care About Cookies</li>
      </ul></li>
      <li>RSS aggregator: Reeder</li>
      <li>PDF reader: Skim</li>
      <li>Miscellaneous<ul style='padding-left: 20px'>
        <li>Discord</li>
        <li>GIMP</li>
        <li>Hex Fiend</li>
        <li>Notion</li>
        <li>Spotify</li>
      </ul></li>
    </ul>

    <p id='cp'>&#169; extremefatigue <?php echo date("Y"); ?></p> 

  </body>

</html>
