<?php include "db.php";

$pdo = new PDO($DB_PATH);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// get ID from request, zero if ivalid
$said = is_numeric($_GET["said"]) ? (int) $_GET["said"] : 0;
if (!is_int($said) or $said <= 0) die("invalid ID");

// read database for essay said=123
$res = read_essay($pdo, $said);

// foreach ($res[0] as $key => $value) {
//     echo "<p>".$key." &rarr; ".$value."</p>";
// }

$said    = $res[0];
$title   = $res[1];
$date    = $res[2];
$content = $res[3];

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../static/style.css" type="text/css">
        <title><?php echo "$title"; ?></title>
        <style>
            a#back {
                margin-top: 3px;
                margin-left: -15px;
                color: #515151;
                font-size: 12px;
                text-decoration: none;
            }
            h3 { color: black; }
        </style>
    </head>
    <main>
        <a id='back' href='/home.php'>&lt; back</a>
        <?php echo $content; ?>
    </main>
</html>