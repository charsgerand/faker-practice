<?php
require ('vendor/autoload.php'); 

use Faker\Factory;

$faker = Factory::create();
$pdo = new PDO('mysql:host=your_host;dbname=your_database', 'your_username', 'your_password');

for ($i = 0; $i < 100; $i++) {
    $stmt = $pdo->prepare("INSERT INTO userAccount (email, lastName, firstName, userName, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $faker->unique()->email,
        $faker->lastName,
        $faker->firstName,
        $faker->userName,
        password_hash($faker->password, PASSWORD_DEFAULT) 
    ]);
}

echo "100 rows inserted into userAccount table.";
?>
