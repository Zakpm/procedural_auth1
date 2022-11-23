<?php 
declare(strict_types=1);

require AUTH_MIDDLEWARE;
require ABSTRACT_CONTROLLER;

/**
 * Cette fonction retourne la pasge d'accueil de l'espace d'administration
 *
 * @return string
 */
    function index() : string {

        return render("pages/admin/home/index.html.php");
    }








?>