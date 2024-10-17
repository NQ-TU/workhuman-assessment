<?php
// script to search for countries in the database
if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // connect to the database
    $db = new PDO('sqlite:' . __DIR__ . '/countries.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // search for countries that match the query string and return the results as JSON data 
    $stmt = $db->prepare("SELECT name FROM countries WHERE name LIKE :query COLLATE NOCASE");
    $stmt->execute(['query' => "%$query%"]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
}