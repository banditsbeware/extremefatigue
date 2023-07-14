<?php

// the database is in the same folder as me -> public/../
$DB_PATH = "sqlite:". dirname(__FILE__) ."/database.db";

/*
 * to use these database functions:
 * include "db.php";
 * $pdo = new PDO($DB_PATH);
 * $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 * etc
 */

//------dict table-------------------------------//
function drop_table_dict($pdo) {
    $pdo->exec("DROP TABLE IF EXISTS dict;");
}

function create_table_dict($pdo) {
    $pdo->exec("
        CREATE TABLE dict (
            id INTEGER PRIMARY KEY AUTOINCREMENT,   
            date DATE DEFAULT CURRENT_TIMESTAMP,
            term TEXT NOT NULL,
            defn TEXT NOT NULL
        );
    ");
}

function dict_add($pdo, $term, $defn) {
    $stmt = $pdo->prepare("INSERT INTO dict(term, defn) VALUES (:term, :defn);");
    $stmt->bindParam(':term', $term);
    $stmt->bindParam(':defn', $defn);
    $stmt->execute();
}

function dict_remove($pdo, $id) { }

function read_dict($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM dict;");
    $stmt->execute();
    return $stmt->fetchAll();
}


//------essay table-------------------------------//
function drop_table_essay($pdo) {
    $pdo->exec("DROP TABLE IF EXISTS essay;");
}

function create_table_essay($pdo) {
    $pdo->exec("
        CREATE TABLE essay (
            id INTEGER PRIMARY KEY AUTOINCREMENT,   
            title CHAR(50) NOT NULL,   
            date DATE DEFAULT CURRENT_TIMESTAMP,
            content TEXT NOT NULL
        );
    ");
}

function add_essay($pdo, $title, $content) {
    $stmt = $pdo->prepare("INSERT INTO essay(title, content) VALUES (:title, :content);");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
}

function read_essay($pdo, $said) {
    $stmt = $pdo->prepare("SELECT * FROM essay WHERE id=:said;");
    $stmt->bindParam(':said', $said);
    $stmt->execute();
    return $stmt->fetchAll()[0];
}

function read_all_essays($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM essay;");
    $stmt->execute();
    return $stmt->fetchAll();
}

// drop_table_dict($pdo);
// create_table_dict($pdo);
// dict_add($pdo, "foo", "a metasyntactic variable");
// dict_add($pdo, "bar", "a metamezzianic variable");
// read_dict($pdo);

?>
