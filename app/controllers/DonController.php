<?php
include 'DonModel.php';
include 'database.php'; // fichier de connexion à la base

$model = new DonModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['besoin_type_id'];
    $quantite = $_POST['quantite'];

    if ($model->ajouterDon($type, $quantite)) {
        header("Location: dons.php?success=1");
    } else {
        header("Location: dons.php?error=1");
    }
}
?>
