<?php
// controllers/DashboardController.php

class DashboardController
{
    public function index()
    {
        // Connexion DB
        $db = new Database();
        $conn = $db->connect();

        // Requête pour récupérer les besoins et dons
        $sql = "
        SELECT 
            v.name AS ville,
            bt.name AS besoin,
            b.quantite AS quantite_demandee,
            COALESCE(SUM(a.quantite), 0) AS quantite_donnee,
            (b.quantite - COALESCE(SUM(a.quantite),0)) AS reste
        FROM besoins b
        JOIN villes v ON b.ville_id = v.id
        JOIN besoins_types bt ON b.besoin_type_id = bt.id
        LEFT JOIN attributions a ON b.id = a.besoin_id
        GROUP BY b.id
        ORDER BY v.name;
        ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $besoins = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // On envoie les données à la vue
        require VIEWS . '/dashboard/index.php';
    }
}
