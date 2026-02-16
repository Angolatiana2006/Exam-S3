<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <title>BNGRC – Tableau de bord</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
</head>

<body>

<div class="page-container">

    <!-- SIDEBAR -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <h3 class="text-white">BNGRC</h3>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="#"><i class="ti-dashboard"></i><span>Tableau de bord</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-plus"></i><span>Créer un besoin</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-gift"></i><span>Créer un don</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-share"></i><span>Attribuer un don</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- FIN SIDEBAR -->

    <!-- CONTENU PRINCIPAL -->
    <div class="main-content">

        <!-- HEADER -->
        <div class="header-area">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="nav-btn pull-left">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <div class="col-md-6 clearfix">
                    <div class="user-profile pull-right">
                        <h4 class="user-name">Administrateur BNGRC</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- TITRE -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Tableau de bord</h4>
                </div>
            </div>
        </div>

        <div class="main-content-inner">

            <!-- CARTES ACTIONS -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <a href="#" class="single-report text-center">
                        <div class="s-report-inner pt--30 pb--30">
                            <i class="fa fa-list fa-2x mb-2"></i>
                            <h4>Créer un besoin</h4>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="single-report text-center">
                        <div class="s-report-inner pt--30 pb--30">
                            <i class="fa fa-gift fa-2x mb-2"></i>
                            <h4>Créer un don</h4>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" class="single-report text-center">
                        <div class="s-report-inner pt--30 pb--30">
                            <i class="fa fa-share fa-2x mb-2"></i>
                            <h4>Attribuer des dons</h4>
                        </div>
                    </a>
                </div>
            </div>

            <!-- TABLEAU DE BORD -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Suivi des besoins par ville</h4>

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Ville</th>
                                    <th>Besoin</th>
                                    <th>Quantité demandée</th>
                                    <th>Quantité donnée</th>
                                    <th>Reste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Antsirabe</td>
                                    <td>Riz</td>
                                    <td>50 kg</td>
                                    <td>30 kg</td>
                                    <td class="text-danger">20 kg</td>
                                </tr>
                                <tr>
                                    <td>Antsirabe</td>
                                    <td>Argent</td>
                                    <td>200 000 Ar</td>
                                    <td>100 000 Ar</td>
                                    <td class="text-danger">100 000 Ar</td>
                                </tr>
                                <tr>
                                    <td>Toamasina</td>
                                    <td>Tôles</td>
                                    <td>40</td>
                                    <td>40</td>
                                    <td class="text-success">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- JS -->
<script src="/assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/metisMenu.min.js"></script>
<script src="/assets/js/jquery.slicknav.min.js"></script>
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/scripts.js"></script>

</body>
</html>
