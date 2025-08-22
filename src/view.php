<!--
    view.php
    reads an essay from the database.
-->
<?php include "database.php";

if (isset($preview_filename)) {
    $title = $preview_filename;
    $content = file_get_contents($preview_filename);
} else {
    $pdo = new PDO($DB_PATH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // get ID from request, zero if invalid
    $said = is_numeric($_GET["said"]) ? (int) $_GET["said"] : 0;
    if (!is_int($said) or $said <= 0) die("invalid ID");

    // read database for essay said=123
    $res = read_essay($pdo, $said);

    $said    = $res[0];
    $title   = $res[1];
    $date    = $res[2];
    $content = $res[3];
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../static/common.css" type="text/css">
        <link rel="stylesheet" href="../static/view.css" type="text/css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../static/wetlands.js"></script>
        <script src="../static/overlib.js"></script>
        <script defer src="../static/personalGrowth.js"></script>

        <base target="_blank">
        <title><?php echo "$title"; ?></title>
        <style>
            a#back {
                margin-top: 3px;
                margin-left: -15px;
                color: #515151;
                text-decoration: none;
            }
            h3 { color: black; }
            img {
                display: block;
                width: 80%;
                margin: 20px auto;
            }
        </style>
    </head>
    <main>
        <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
        <a id='back' href='/home.php' target='_self'>&lt; back</a>
        <?php echo $content; ?>
    </main>
</html>
