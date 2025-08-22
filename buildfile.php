<!--
    buildfile.php
    constructs the main header and essay list on home.php
-->
<?php

$types = ["int", "float", "double", "long", "char", "bool"];
$decl = file("../static/variables.txt");

function hcomment($txt) { return "<li class='hcomment' class='comment'>$txt</li>"; }
function comment($txt) { return "<li class='comment'>$txt</li>"; }
function type($txt) { return "<span class='type'>$txt</span>"; }

echo "<ol id='lines'>";

// backslashes are awesome
echo hcomment("/*                                                                                    "); 
echo hcomment(" *    __                             __   __                       __                 "); 
echo hcomment(" *   /\\ \\                     __    /\\ \\ /\\ \\                   __/\\ \\__              "); 
echo hcomment(" *   \\_\\ \\     __     __  __ /\\_\\   \\_\\ \\\\ \\/  ____        ____/\\_\\ \\ ,_\\    __       "); 
echo hcomment(" *   /'_` \\  /'__`\\  /\\ \\/\\ \\\\/\\ \\  /'_` \\\\/  /',__\\      /',__\\/\\ \\ \\ \\/  /'__`\\     "); 
echo hcomment(" *  /\\ \\L\\ \\/\\ \\L\\.\\_\\ \\ \\_/ |\\ \\ \\/\\ \\L\\ \\  /\\__, `\\    /\\__, `\\ \\ \\ \\ \\_/\\  __/     "); 
echo hcomment(" *  \\ \\___,_\\ \\__/.\\_\\\\ \\___/  \\ \\_\\ \\___,_\\ \\/\\____/    \\/\\____/\\ \\_\\ \\__\\ \\____\\    "); 
echo hcomment(" *   \\/__,_ /\\/__/\\/_/ \\/__/    \\/_/\\/__,_ /  \\/___/      \\/___/  \\/_/\\/__/\\/____/    "); 
echo hcomment(" *                                                                                    "); 
echo hcomment(" *                                                                                    "); 
echo hcomment(" */                                                                                   "); 
echo hcomment("                                                                                      "); 
echo comment("//". str_pad("",             40, "-")               ."//");
echo comment("//". str_pad("DECLARATIONS", 40, " ", STR_PAD_BOTH) ."//");
echo comment("//". str_pad("",             40, "-")               ."//");

$files = glob("html/*.html");

include "database.php";

$pdo = new PDO($DB_PATH);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sas = read_all_essays($pdo);

// sort by date newest first (descending)
function sortByDate($sa_a, $sa_b) { return strcmp($sa_b[2], $sa_a[2]); }
usort($sas, "sortByDate");

// store current month in _m.
$_m = -1;
foreach ($sas as $sa) {

    $d = date_parse( $sa[2] ); // substr($filename, 5, 8) );
    $m = $d["month"]; $y = substr($d["year"], 2);

    // if the month changes -
    if ($m != $_m) {

        // human-readable month
        $month = date('M', mktime(0, 0, 0, $m, 10));
        echo "<li></li>";
        echo comment("// $month '$y");

        // set the new current month
        $_m = $m;
    }

    // essays are just arrays of characters
    echo "<li>".type("char")
        ." <a class='salink' href='/src/view.php?said=$sa[0]'>"
        ."$sa[1]</a>[". strlen($sa[3]) ."];</li>"; 

    // a few chances to add random stuff between links
    for ($r = 0; $r < rand(1, 8); $r++)
        if (rand(0,100) < 20) 
            echo "<li>".type($types[array_rand($types)]) ." ". 
                    "<span class='salink'>". trim($decl[array_rand($decl)]) ."</span>;</li>"; 

    // at most one consecutive blank line
    if (rand(0,100) / 100 < 0.1) echo "<li></li>";        
}

echo "<li></li><li></li><li></li><li></li><li></li>";
echo "</ol>";

?>
