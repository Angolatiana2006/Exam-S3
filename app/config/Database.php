<?php

class Database {
    private $host = "127.0.0.1"; // <- changer localhost en 127.0.0.1
    private $dbname = "bngrc";
    private $user = "root";
    private $pass = ""; // ou ton mot de passe MySQL

    public function connect() {
        try {
            $conn = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->dbname, // <- TCP/IP
                $this->user,
                $this->pass
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}

