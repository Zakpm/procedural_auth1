<?php 

/** 
 * Cette méthode prend en paramètre le nom de la vue dont elle doit  
 * extraire et retourner le contenu 
 * 
 * @param [type] $view_name
 * @param array $data
 * @return string
 */

function render($view_name, array $data = []) : string {

    ob_start();
    extract($data);
    require TEMPLATES . "$view_name";
    $content = ob_get_clean();

    ob_start();
    require TEMPLATES . "$theme";
    $page = ob_get_clean();

    return $page;
}

/**
 * Cette fonction permet de aux apages d'hériter d'un thème
 *
 * @param [type] $theme_name
 * @return void
 */
function extends_of($theme_name){

    return $theme_name;
}

/**
 * Cette fonction vérifie si l'utilisateur est connecté ou non
 *
 * @return boolean
 */
function get_user() : bool {

    if ( isset($_SESSION['auth']) && !empty($_SESSION['auth'])){

        return true;
    }
    return false;
}




?>