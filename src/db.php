<?php

$pdo = new PDO('sqlite:database.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

function dict_remove($pdo, $id) {

}

function read_dict($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM dict;");
    $stmt->execute();
    return $stmt->fetchAll();
}

// drop_table_dict($pdo);
// create_table_dict($pdo);
// dict_add($pdo, "foo", "a metasyntactic variable");
// dict_add($pdo, "bar", "a metamezzianic variable");
// read_dict($pdo);

?>