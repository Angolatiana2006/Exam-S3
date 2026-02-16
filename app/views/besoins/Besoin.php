<?php
require_once "../config/Database.php";
require_once "../models/Besoin.php";

$success = '';
$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ville_id = $_POST['ville_id'];
    $besoin_type_id = $_POST['besoin_type_id'];
    $quantite = $_POST['quantite'];
    $unite = $_POST['unite'];

    // validation simple
    if($ville_id == '' || $besoin_type_id == '' || $quantite <= 0){
        $error = "Veuillez remplir tous les champs correctement.";
    } else {
        $data = [
            'ville_id' => $ville_id,
            'besoin_type_id' => $besoin_type_id,
            'quantite' => $quantite,
            'unite' => $unite
        ];

        if(Besoin::create($data)){
            $success = "Besoin ajouté avec succès ✅";
        } else {
            $error = "Erreur lors de l'ajout du besoin.";
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ajouter un besoin - BNGRC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST">
                    <div class="login-form-head">
                        <h4>Ajouter un Besoin</h4>
                        <p>Remplissez le formulaire pour ajouter un nouveau besoin</p>
                        <?php if($success) echo "<p class='text-success'>{$success}</p>"; ?>
                        <?php if($error) echo "<p class='text-danger'>{$error}</p>"; ?>
                    </div>
                    <div class="login-form-body">

                        <div class="form-gp">
                            <label for="ville_id">Ville</label>
                            <input type="text" id="ville_id" name="ville_id" placeholder="Antananarivo">
                            <i class="ti-location-pin"></i>
                        </div>

                        <div class="form-gp">
                            <label for="besoin_type_id">Type de besoin</label>
                            <input type="text" id="besoin_type_id" name="besoin_type_id" placeholder="Argent">
                            <i class="ti-list"></i>
                        </div>

                        <div class="form-gp">
                            <label for="quantite">Quantité</label>
                            <input type="number" id="quantite" name="quantite" min="1" placeholder="Ex: 10">
                            <i class="ti-bar-chart"></i>
                        </div>

                        <div class="form-gp">
                            <label for="unite">Unité</label>
                            <select id="unite" name="unite">
                                <option value="kg">kg</option>
                                <option value="litres">litres</option>
                                <option value="Ar">Ar</option>
                            </select>
                            <i class="ti-angle-down"></i>
                        </div>

                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Ajouter <i class="ti-arrow-right"></i></button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
