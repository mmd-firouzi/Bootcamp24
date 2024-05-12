<?php

    $host = 'localhost';
    $dbname = 'task7schema';
    $username = 'root';
    $password = 'Jan0kce0d!';
    $port = 3306;
    $tableName = 'bigdata';

    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);


    $sql = "SELECT COUNT(*) AS total_count FROM $tableName where gender = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Total count of men: " . $result['total_count'], '<br>';

    $sql = "SELECT COUNT(*) AS total_count FROM $tableName where gender = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Total count of women: " . $result['total_count'], '<br>';

    $sql = "SELECT AVG(age) AS avg_count FROM $tableName where gender = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "AVG age of men: " . $result['avg_count'], '<br>';

    $sql = "SELECT AVG(age) AS avg_count FROM $tableName where gender = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "AVG age of women: " . $result['avg_count'], '<br>';

    $sql = "SELECT COUNT(*) AS tot_count FROM $tableName where age > 60 and gender = 0";;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "total women older than 60: " . $result['tot_count'], '<br>';

    $sql = "SELECT COUNT(*) AS tot_count FROM $tableName where age > 60 and gender = 0 and married = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "total women older than 60 and single: " . $result['tot_count'], '<br>';
?>