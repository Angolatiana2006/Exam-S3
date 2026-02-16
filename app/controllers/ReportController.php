<?php
namespace app\controllers;

use Flight;
use app\models\Report;

class ReportController {

    public function index() {

 
        $dateDebut = null;
        if (isset($_GET['date_debut']) && $_GET['date_debut'] != '') {
            $dateDebut = $_GET['date_debut'];
        }


        $dateFin = null;
        if (isset($_GET['date_fin']) && $_GET['date_fin'] != '') {
            $dateFin = $_GET['date_fin'];
        }

  
        $rows = Report::getReport($dateDebut, $dateFin);
        $totals = Report::getTotals($dateDebut, $dateFin);

    
        Flight::render('course/report_list', [
            'rows' => $rows,
            'totals' => $totals,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin
        ]);
    }

}

