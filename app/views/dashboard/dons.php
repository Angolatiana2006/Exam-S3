<?php

$servername = "localhost";
$username = "root";
$password = "";     
$dbname = "bngrc";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Traitement 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['besoin_type_id'];
    $quantite = $_POST['quantite'];

    $sql = "INSERT INTO dons (besoin_type_id, quantite) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("id", $type, $quantite);

    if ($stmt->execute()) {
        $message = "Don enregistré avec succès.";
    } else {
        $message = "Erreur: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Dons</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="main-content-inner">
    <!-- Formulaire de saisie -->
    <div class="row">
        <div class="col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Saisir un Don</h4>
                    <?php if(isset($message)) echo "<p style='color:green;'>$message</p>"; ?>
                    <form action="dons.php" method="POST">
                        <div class="form-group">
                            <label for="type">Type de Don</label>
                            <select class="form-control" name="besoin_type_id" required>
                                <?php
                                $sql = "SELECT id, name FROM besoins_types";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantite">Quantité</label>
                            <input type="number" step="0.01" class="form-control" name="quantite" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des dons -->
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Liste des Dons</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Quantité</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT d.id, bt.name AS type, d.quantite, d.date_don 
                                        FROM dons d 
                                        JOIN besoins_types bt ON d.besoin_type_id = bt.id 
                                        ORDER BY d.date_don DESC";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>".$row['id']."</td>
                                            <td>".$row['type']."</td>
                                            <td>".$row['quantite']."</td>
                                            <td>".$row['date_don']."</td>
                                          </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
