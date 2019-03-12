<?php

/**
 * Class Database
 */
class Database
{
    public $conn;

    /**
     * Fetches items from DataBase.
     */
    public function Fetch() {
        self::PDOconnect();
        $sth = $this->conn->prepare("SELECT * FROM producten");
        $sth->execute();

        $result = $sth->fetchAll();
        var_dump($result);
    }

    /**
     * Connects to DataBase using PDO protocol.
     * @param string $user
     * @param string $pass
     */
    public function PDOconnect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=aldidlheijn", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function __construct()
    {
        $this->PDOconnect();
        $this->Fetch();
    }
}