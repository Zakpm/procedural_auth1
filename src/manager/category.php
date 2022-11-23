<?php 

/**
 * Cette fonction permet d'insérer une nouvelle catégorie dans la table "category"
 *
 * @param array $data
 * @return void
 */
function createCategory(array $data) : void {

    require DB;

    $req = $db -> prepare("INSERT INTO category (name,created_at, updated_at) VALUES (:name, now(), now() ) ");
    $req -> bindValue(":name", $data['name']);
    $req -> execute();
    $req -> closeCursor();
}

/**
 * Cette fonction permet de récupérer tous les enregistrements de la table "category"
 *
 * @return array
 */  
function findAllCategories() : array {

    require DB;
    $req = $db -> prepare("SELECT * FROM category ORDER BY created_at DESC");
    $req -> execute();
    $categories = $req -> fetchAll();
    $req -> closeCursor();

    return $categories;
}





?>