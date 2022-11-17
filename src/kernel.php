<?php 
declare(strict_types=1);

/**
 * ----------------------------------------------------
 *                       Le Kernel 
 * 
 * Ce fichier représente le noyau de l'application
 * 
 * @author Zakaryya PAPA MOHAMED <zakaryyapm@gmail.com>
 * 
 * @version 1.0.0
 * ----------------------------------------------------
 */


//  Chargement de l'autoloader de composer
require __DIR__ . "/../vendor/autoload.php";


//  Chargement du routeur 
require __DIR__ . "/z/routing/router.php";


// Chargement des routes dont l'applicaton attend la reception
require __DIR__ . "/../config/routes.php";


// Exécution du router
$router_response = run();

dd($router_response);
?>