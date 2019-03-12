<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 auto-center">
                <h3>hallo</h3>
            </div>
            <br>
            <form action="insert_factuur.php" method="POST">
                <p>Kies klant <select name="klant_naam">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=klantenwigmans2", $username, $password);
                            // set the PDO error mode to exception
    //                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        }
                        catch(PDOException $e)
                        {
                            echo "Connection failed: " . $e->getMessage();
                        }

                        //                            $sth = $conn->prepare('SELECT klant_nr, naam FROM klant');
                        //                            $sth->execute();
                        $result = $conn->query('SELECT klant_nr, naam FROM klant')->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row) {
                            echo "<option value=".$row["klant_nr"].">".$row["naam"]."</option>";
                        }
                    ?>
                    </select></p>

                <br>
                <p>datum <input name="datum" type="date"></p>
                <br>
                <p>prijs <input name="prijs" type="number" min="0" step="any"></p>

                <input type="submit">
            </form>
            <div class="col-xl-12 auto-center">
                <?php
                require_once('fetch.php');
                ?>
            </div>
        </div>
    </div
</body>
</html>