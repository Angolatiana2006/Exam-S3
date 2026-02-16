<?php
require_once "../config/database.php";

class Besoin {

    public static function getAll(){
        $pdo = Database::connect();

        return $pdo->query("
            SELECT besoins.*, villes.nom_ville, besoins_types.nom_type
            FROM besoins
            JOIN villes ON besoins.ville_id = villes.id
            JOIN besoins_types ON besoins.besoin_type_id = besoins_types.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data){

        $pdo = Database::connect();

        $sql = "INSERT INTO besoins 
                (ville_id, besoin_type_id, quantite, unite)
                VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            $data['ville_id'],
            $data['besoin_type_id'],
            $data['quantite'],
            $data['unite']
        ]);
    }
}
