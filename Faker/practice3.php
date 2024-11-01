<?php
require ('vendor/autoload.php'); 

use Faker\Factory;

$faker = Factory::create();
$pdo = new PDO('mysql:host=your_host;dbname=records_app', 'your_username', 'your_password');


for ($i = 0; $i < 200; $i++) {
    
    $stmt1 = $pdo->prepare("INSERT INTO table1 (field1, field2) VALUES (?, ?)");
    $stmt1->execute([$faker->word, $faker->sentence]);

    $stmt2 = $pdo->prepare("INSERT INTO table2 (fieldA, fieldB) VALUES (?, ?)");
    $stmt2->execute([$faker->word, $faker->numberBetween(1, 100)]);
}

echo "200 rows inserted into the tables in records_app database.";
?>
