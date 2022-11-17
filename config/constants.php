<?php 

/**
 * -------------------------------------------------
 * Ce fichier contient toutes les constantes de notre application 
 * 
 * Une constante dans notre contexte va contenir un chemin
 * 
 * C'est donc un raccourci.
 * ------------------------------------------------
 * 
 */

/** Ce raccourci représente la racine du projet */
 const ROOT                = __DIR__ . "/../";


/**  Ce raccourci représente le rouetur */
const ROUTER               = ROOT . "src/z/routing/router.php";


/** Ce raccourci représente les routes dont l'application attend la réception */
const ROUTES               = __DIR__ . "/routes.php";


/** Ce raccourci représente la racine du dossier controleurs */
const CONTROLLER           = ROOT . "src/controller/";


/** Ce raccourci represente la racine du dossier des vues */
const TEMPLATES            = ROOT . "templates/";

/** Ce raccourci représente le controller abstrait */
const ABSTRACT_CONTROLLER  = ROOT . "/src/z/abstractController/abstractController.php";

?>