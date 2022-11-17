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

//  Chargment des constantes
require __DIR__ . "/../config/constants.php";


//  Chargement de l'autoloader de composer
require ROOT . "vendor/autoload.php";


//  Chargement du routeur 
require ROUTER;


// Chargement des routes dont l'applicaton attend la reception
require ROUTES;


// Exécution du router
$router_response = run();

return getControllerResponse($router_response);

/**
 * C'est grâce à cette fonction que le kernel demande au controller de s'exécuter
 * et de lui retourner la reponse correspondante à la requête
 *
 * @param array|null $router_response
 * @return void
 */
function getControllerResponse(array|null $router_response) : string {

    // SI aucun contoller n'a été trouvé par le routeur,
    // le noyau demande au contôleur des erreurs d'activer sa méthode notFound()
    if ($router_response === null){

        require CONTROLLER . "error/errorController.php";
        http_response_code(404);
        return notFound();

    }
    
            // Dans le cas contraire,
            // Récupérer le contôleur et la méthode
            $controller = $router_response['controller'];
            $method = $router_response['method'];

            //  S'il y a des paramètres, 
            // Charger le controller
            // Executer sa methode prévue en lui passant les paramètres
            if (isset($router_response['parameters']) && !empty($router_response['parameters']) ){

                $parameters = $router_response['parameters'];
                require CONTROLLER . "$controller.php";
                return $method($parameters);
            }

            // Dand le cas contraire, 
            // Charger le controller
            // Executer sa methode sans les paramètres.
            require CONTROLLER . "$controller.php";
            return $method();

 
            

}
?>