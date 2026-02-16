<?php
class DonModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function ajouterDon($type, $quantite) {
        $sql = "INSERT INTO dons (besoin_type_id, quantite) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("id", $type, $quantite);
        return $stmt->execute();
    }

    public function getAllDons() {
        $sql = "SELECT d.id, bt.name AS type, d.quantite, d.date_don 
                FROM dons d 
                JOIN besoins_types bt ON d.besoin_type_id = bt.id 
                ORDER BY d.date_don DESC";
        return $this->conn->query($sql);
    }
}
?>
