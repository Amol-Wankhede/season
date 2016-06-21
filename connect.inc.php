<?php 
    $host = "localhost";
    $database = "seasons";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=" .$host. ";dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES 'utf8'");
        return $pdo;
    }
    catch (PDOException $e)     {
        echo "<div class='alert alert-danger'>ERROR : " . $e->getMessage() . "</div>";
        exit();
    }


function vardump($v) {
    echo "<pre><code>";
    var_dump($v);
    echo "</code></pre>";
}

    // include('connect.php');

    // try {
    //     $sql = "SELECT * FROM activities WHERE city_id = :city_id";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindValue(":city_id", $_POST['city']);
    //     $stmt->execute();
    // } catch(PDOException $e) { 
    //     echo "<div class='alert alert-error'> ";
    //     echo "ERROR FETCHING DATABASE: " . $e->getMessage(); 
    //     echo "</div> ";
    //     exit(); 
    // } 
    // $results = $stmt->fetchAll();
    //  // var_dump($results);
    // echo json_encode($results);
 ?>