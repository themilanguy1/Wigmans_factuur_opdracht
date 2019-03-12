<?php

if(isset($_POST['klant_naam'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=klantenwigmans2", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $factuur_nr = random_int(1, 999999);
    $klant_naam = $_POST['klant_naam'];
    $datum = $_POST['datum'];
    $prijs = $_POST['prijs'];

    $sql = $conn->prepare("SELECT factuur_nr FROM factuur WHERE factuur_nr = '$factuur_nr'");
    $sql->execute();

    if($sql->rowCount() > 0) {
        $factuur_nr = random_int(1, 999999);

        $sql = $conn->prepare("SELECT factuur_nr FROM factuur WHERE factuur_nr = '$factuur_nr'");
        $sql->execute();
        if($sql->rowCount() > 0) {
            $factuur_nr = random_int(1, 999999);

            $sql = $conn->prepare("SELECT factuur_nr FROM factuur WHERE factuur_nr = '$factuur_nr'");
            $sql->execute();

            return $factuur_nr;
        }
    }

    $sth = $conn->prepare("INSERT INTO factuur (factuur_nr, klant_nr, datum, prijs) VALUES ($factuur_nr, $klant_naam, '$datum', $prijs)");
    $sth->execute();
}
