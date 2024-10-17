<!-- http://localhost/Workhuman-Assesment/php/create_db.php -->
<?php
    // create a new SQLite database in memory and create a table to store the countries data 
    $db = new PDO("sqlite:" . __DIR__ . "/countries.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create a table to store the countries data if it doesn't already exist 
    $db->exec("CREATE TABLE IF NOT EXISTS countries (
        id INTEGER PRIMARY KEY,
        name TEXT NOT NULL UNIQUE )");

    $countries = [
        'Albania',
        'Andorra', 
        'Australia', 
        'Brazil', 
        'Belgium', 
        'Canada', 
        'China', 
        'France', 
        'Germany', 
        'India', 
        'Indonesia', 
        'Ireland', 
        'Italy', 
        'Japan', 
        'Kenya', 
        'Luxembourg', 
        'Mexico', 
        'New Zealand', 
        'Nigeria', 
        'Portugal', 
        'Russia', 
        'South Africa', 
        'South Korea', 
        'Spain', 
        'Sweden', 
        'Thailand', 
        'Ukraine', 
        'United Kingdom', 
        'United States of America', 
        'Vietnam', 
        'Zambia'
    ];

    // insert the country names into the table
    $stmt = $db->prepare("INSERT INTO countries (name) VALUES (:name)");
    // loop through the countries array and insert each country into the table
    foreach ($countries as $country) {
        $stmt->execute(['name' => $country]);
    }

    echo "Database created successfully";
