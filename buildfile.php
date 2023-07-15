<!--
    buildfile.php
    constructs the main header and essay list on home.php
-->
<?php

$types = ["int", "float", "double", "long", "char", "bool"];
$decl = file("../static/variables.txt");

$L = [];

function comment($txt) { return "<span class='comment'>$txt</span>"; }
function type($txt) { return "<span class='type'>$txt</span>"; }

// backslashes are awesome
$L[] = comment("/*                                                                                    "); 
$L[] = comment(" *    __                             __   __                       __                 "); 
$L[] = comment(" *   /\\ \\                     __    /\\ \\ /\\ \\                   __/\\ \\__              "); 
$L[] = comment(" *   \\_\\ \\     __     __  __ /\\_\\   \\_\\ \\\\ \\/  ____        ____/\\_\\ \\ ,_\\    __       "); 
$L[] = comment(" *   /'_` \\  /'__`\\  /\\ \\/\\ \\\\/\\ \\  /'_` \\\\/  /',__\\      /',__\\/\\ \\ \\ \\/  /'__`\\     "); 
$L[] = comment(" *  /\\ \\L\\ \\/\\ \\L\\.\\_\\ \\ \\_/ |\\ \\ \\/\\ \\L\\ \\  /\\__, `\\    /\\__, `\\ \\ \\ \\ \\_/\\  __/     "); 
$L[] = comment(" *  \\ \\___,_\\ \\__/.\\_\\\\ \\___/  \\ \\_\\ \\___,_\\ \\/\\____/    \\/\\____/\\ \\_\\ \\__\\ \\____\\    "); 
$L[] = comment(" *   \\/__,_ /\\/__/\\/_/ \\/__/    \\/_/\\/__,_ /  \\/___/      \\/___/  \\/_/\\/__/\\/____/    "); 
$L[] = comment(" *                                                                                    "); 
$L[] = comment(" *                                                                                    "); 
$L[] = comment(" */                                                                                   "); 
$L[] = comment("                                                                                      "); 
$L[] = comment("//". str_pad("",             40, "-")               ."//");
$L[] = comment("//". str_pad("DECLARATIONS", 40, " ", STR_PAD_BOTH) ."//");
$L[] = comment("//". str_pad("",             40, "-")               ."//");

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
        $L[] = "";
        $L[] = comment("// $month '$y");

        // set the new current month
        $_m = $m;
    }

    // essays are just arrays of characters
    $L[] = type("char") 
        ." <a class='salink' href='/src/view.php?said=$sa[0]'>"
        ."$sa[1]</a>[". strlen($sa[3]) ."];"; 

    // a few chances to add random stuff between links
    for ($r = 0; $r < rand(1, 8); $r++)
        if (rand(0,100) / 100 < 0.1) 
            $L[] = type($types[array_rand($types)]) ." ". 
                    "<span class='salink'>". trim($decl[array_rand($decl)]) ."</span>;"; 

    // at most one consecutive blank line
    if (rand(0,100) / 100 < 0.1) $L[] = ""; 
}

$L[] = "                                                                                      "; 
$L[] = "                                                                                      "; 
$L[] = "                                                                                      "; 
$L[] = "                                                                                      "; 
$L[] = "                                                                                      "; 


$file = "<pre>";
for ($i=0; $i<count($L); $i++) {
    $file .= "<span class='nrcl'>". str_pad($i+1, 5, " ", STR_PAD_LEFT) ."| </span>";
    $file .= $L[$i]."</br>";
}

$file .= "</pre>";

echo $file;
?>
