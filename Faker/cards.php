<?php
require ('vendor/autoload.php'); 

use Faker\Factory;

$faker = Factory::create();
$pdo = new PDO('mysql:host=your_host;dbname=your_database', 'your_username', 'your_password');

for ($i = 0; $i < 20; $i++) {
    $stmt = $pdo->prepare("INSERT INTO cardDetail (creditCardType, creditCardNumber, creditCardExpirationDate, userIdNumber) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $faker->creditCardType,
        $faker->creditCardNumber,
        $faker->creditCardExpirationDate,
        rand(1, 100) 
    ]);
}

echo "20 rows inserted into cardDetail table.";
?>
