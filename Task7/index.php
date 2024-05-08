<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
    <style>
        table , th, td{
            border : 1px solid black;
            border-collapse: collapse;
        }

        th, td{
            width: auto;
            height : 20px;
            padding : 5px;
            text-align: center;
        }

        th{
            background-color: rgb(84, 110, 122);
        }

        td{
            background-color : rgb(117, 117, 117);
        }

        td:nth-child(even){
            background-color: rgb(158, 158, 158);
        }

    </style>
</head>
<body>
<form method="post">
  <label for="name">Name:</label>
  <input type="text" name="first_name">

  <label for="id">ID:</label>
  <input type="text" name="ID1">

  <label for="Phone">Phone number:</label>
  <input  name="Phone">
  </input>

  <input type="submit" value="Search" name="submit">
</form>
</body>
</html>

<?php
$host = 'localhost';
$dbname = 'task7schema';
$username = 'root';
$password = 'Jan0kce0d!';
$port = 3306;
$tableName = 'taskdb';

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);

if(isset($_POST["submit"])) {
    $str1 = !empty($_POST["first_name"]) ? $_POST["first_name"] : '';
    $str2 = !empty($_POST["ID1"]) ? $_POST["ID1"] : '';
    $str3 = !empty($_POST["Phone"]) ? $_POST["Phone"] : '';

    if(empty($str1) and empty($str2)) {
        $sth = $pdo->prepare("SELECT * FROM $tableName WHERE Phone = '$str3'");
    }
    elseif(empty($str2) and empty($str3)) {
        $sth = $pdo->prepare("SELECT * FROM $tableName WHERE first_name LIKE '%$str1%'");
    }

    elseif(empty($str1) and empty($str3)) {
        $sth = $pdo->prepare("SELECT * FROM $tableName WHERE ID = '$str2'");
    }

    elseif(empty($str1)) {
        $sth = $pdo->prepare("SELECT * FROM $tableName WHERE ID = '$str2' and Phone = '$str3'");
    }

    elseif(empty($str2)) {
        $sth = $pdo->prepare("SELECT * FROM $tableName WHERE first_name LIKE '%$str1%' and Phone = '$str3'");
    }

    elseif(empty($str3)) {
        $sth = $pdo->prepare("SELECT * FROM $tableName WHERE first_name LIKE '%$str1%' and ID = '$str2'");
    }
    else {
        $sth = $pdo->prepare("SELECT * FROM $tableName WHERE first_name LIKE '%$str1%' and ID = '$str2' and Phone = '$str3'");

    }
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();

    // Check if there are any matching rows
    if($sth->rowCount() > 0) {
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>ID</th>
                <th>Phone</th>
            </tr>
            <?php
            // Fetch and display all matching rows
            while ($row = $sth->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                    <td><?php echo $row->first_name; ?> </td>
                    <td><?php echo $row->last_name; ?> </td>
                    <td><?php echo $row->ID; ?> </td>
                    <td><?php echo $row->Phone; ?> </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo "No records found";
    }
}
?>