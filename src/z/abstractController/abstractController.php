<?php 

/** 
 * Cette méthode prend en paramètre le nom de la vue dont elle doit  
 * extraire et retourner le contenu 
 * 
 * @param [type] $view_name
 * 
 * @return string
 */

function render($view_name) : string {

    ob_start();
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




?>