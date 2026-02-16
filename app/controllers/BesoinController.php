<?php

require_once "../models/Besoin.php";

class BesoinController {

    public function index(){

        $besoins = Besoin::getAll();

        require "../views/besoins/index.php";
    }

    public function create(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            Besoin::create($_POST);

            header("Location: index.php?route=besoins");
            exit();
        }

        require "../views/besoins/create.php";
    }
}
