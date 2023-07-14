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
    
    <?php include "nav.php"; ?>
    
    <main>
      <h3>baz</h3>
      <p>2021 16" M1 MacBook Pro</p>

      <img src='static/media/macback.png' />
      <img src='static/media/MacOS_rice.png' />

      <h3>software</h3>
      <ul>
        <li>Iterm2</li>
        <li>Homebrew</li>
        <li>zsh + oh-my-zsh</li>
        <li>NeoVim</li>
        <li>Firefox &amp; plugins:<ul style='padding-left: 20px'>
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
          <li>krita</li>
          <li>Hex Fiend</li>
          <li>Spotify</li>
        </ul></li>
      </ul>
    </main>

    <p id='cp'>&#169; extremefatigue <?php echo date("Y"); ?></p> 

  </body>

</html>
