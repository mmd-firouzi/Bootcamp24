<?php
    require_once 'vendor/autoload.php';
    $faker = Faker\Factory::create();

    $host = 'localhost';
    $dbname = 'task7schema';
    $username = 'root';
    $password = 'Jan0kce0d!';
    $port = 3306;
    $tableName = 'bigdata';

    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);


    foreach (range(1, 100000000) as $i) {
        $fname = $faker->firstname;
        $family = $faker->lastname;
        $age = $faker->numberBetween(2, 100);
        $gender = $faker->numberBetween(0, 1);
        $married = $faker->numberBetween(0, 1);
        $mobile = $faker->numerify('######');
        $national = $faker->countryCode;
        $about = $faker->text(5);
    
        $sql = "
            INSERT INTO bigdata (fname, family, age, gender, married, id, mobile, national, about)
            VALUES (
                :fname, :family, :age, :gender, :married, :id, :mobile, :national, :about
            )
        ";
    
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':family', $family);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':gender', $gender, PDO::PARAM_INT);
        $stmt->bindParam(':married', $married, PDO::PARAM_INT);
        $stmt->bindParam(':id', $i, PDO::PARAM_INT);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':national', $national);
        $stmt->bindParam(':about', $about);
    
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    

    
?>