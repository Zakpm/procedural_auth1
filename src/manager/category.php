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


/**
 * Cette fonction recupère une catégorie en particulier de la table "category"
 * en fonction du critère choisi.
 *
 * @param int|string  $id
 * 
 * @return array|bool
 */
function findCategoryById(int|string $id) : bool|array {

    require DB;

    $req = $db       ->prepare("SELECT * FROM category WHERE id=:id");
    $req             -> bindValue(":id", $id);
    $req             -> execute();
    $category = $req -> fetch();
    $req             -> closeCursor();

    return $category;
}


/**
 * Cette fonction permet de modifier un enregistrement de la table "category"
 *
 * @param array $data
 * @param integer|string $id
 * @return void
 */
function updatedCategory(array $data, int|string $id) : void {

    require DB;
    $req = $db -> prepare("UPDATE category SET name=:name, updated_at=now() WHERE id=:id"); // ne jamais oublier le WHERE id=:id sinon il midifie tout ce qu'il y a 

    $req -> bindValue(":name", $data['name']);
    $req -> bindValue(":id", $id);

    $req -> execute();
    $req -> closeCursor();
}

function deleteCategory(int|string $id) : void {

    require DB;

    $req = $db -> prepare("DELETE FROM category WHERE id=:id");
    $req -> bindValue(":id", $id);
    $req -> execute();
    $req -> closeCursor();
}




?>