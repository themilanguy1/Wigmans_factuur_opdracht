<?php
/**
 * Created by PhpStorm.
 * User: Milan Gupta Laptop
 * Date: 15-Feb-19
 * Time: 12:47
 */

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=klantenwigmans2", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$sth = $conn->prepare("SELECT * FROM klant, factuur WHERE factuur.klant_nr = klant.klant_nr");
$sth->execute();

$result = $sth->fetchAll();
foreach($result as $row) {
    echo $row['naam'] . "<br />";
    echo $row['factuur_nr'] . "<br />";
    echo $row['datum'] . "<br />";
    echo $row['prijs']. "<br />";
}
