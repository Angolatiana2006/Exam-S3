<?php

namespace app\controllers;

use Flight;
use app\models\Course;
use app\models\Conducteur;
use app\models\Moto;
use app\models\Affectation;
use app\models\Carburant;

class CourseController
{

    public function list()
    {
        $courses = Course::getAllWithAffectation();
        Flight::render('course/list', ['courses' => $courses]);
    }


    public function showCreateForm()
    {
        $conducteurs = Conducteur::getAll();
        $motos = Moto::getAll();
        Flight::render('course/create', [
            'conducteurs' => $conducteurs,
            'motos' => $motos
        ]);
    }

    
    public function create()
{
    
    $conducteur_id = $_POST['conducteur_id'];
    $moto_id = $_POST['moto_id'];
    $date = $_POST['date'];

    
    $affectation = Affectation::getByConducteurAndDate($conducteur_id, $date);

    if (!$affectation) {
        
        $affectation_id = Affectation::create($conducteur_id, $moto_id, $date);
    } else {
        
        $affectation_id = $affectation['id'];
    }

    
    $data = [
        'affectation_id' => $affectation_id,
        'heure_debut'    => $_POST['heure_debut'],
        'heure_fin'      => $_POST['heure_fin'],
        'km'             => $_POST['km'],
        'montant_paye'   => $_POST['montant_paye'],
        'lieu_depart'    => $_POST['lieu_depart'],
        'lieu_arrivee'   => $_POST['lieu_arrivee']
    ];

    
    Course::insert($data);

    
    Flight::redirect('/courses');
}


    
    public function update($id)
    {
        $course = Course::getById($id);


        if ($course['valide']) {
            Flight::halt(403, "Cette course est déjà validée et ne peut pas être modifiée.");
        }

        $data = [
            'affectation_id' => $_POST['affectation_id'],
            'heure_debut' => $_POST['heure_debut'],
            'heure_fin' => $_POST['heure_fin'],
            'km' => $_POST['km'],
            'montant_paye' => $_POST['montant_paye'],
            'lieu_depart' => $_POST['lieu_depart'],
            'lieu_arrivee' => $_POST['lieu_arrivee'],
            'valide' => null 
        ];

        Course::update($id, $data);

        Flight::redirect('/courses');
    }

        public function validateCourse($id)
    {
        Course::validate($id);
        Flight::redirect('/courses');
    }

        public function showEditForm($id)
    {
        $course = Course::getById($id);
        $affectations = Affectation::getAll();
        Flight::render('course/edit', [
            'course' => $course,
            'affectations' => $affectations
        ]);
    }

    public static function showCarburantForm()
{
    $current = Carburant::getCurrent();
    Flight::render('course/edit-carburant', ['current' => $current]);
}

public static function updateCarburant()
{
    $nouveau_prix = $_POST['prix_par_litre'];
    $today = date('Y-m-d');

    
    Carburant::setPrix($nouveau_prix, $today);

   
    Flight::redirect('/courses/edit-carburant');
}


public static function showDeleteAllForm()
{
    Flight::render('course/delete-all', []);
}


public static function deleteAll()
{
    $code = $_POST['confirmation_code'] ?? '';

    if ($code === '1234') {
        \app\models\Course::deleteAll();
        Flight::redirect('/courses?msg=Toutes les courses ont été supprimées');
    } else {
        Flight::redirect('/courses/delete-all?error=Code incorrect');
    }
}





}
