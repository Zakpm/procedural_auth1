<?php 

/**
 * Cette methode vérifie
 *    - si l'email récupéré depuis le formulaire correspond à celui d'un utilisateur de la table "user"
 *    - si le mot de passe récupéré depuis le formulaire correspon à celui de cet utilisateur
 *
 * @return array|null
 */
function authenticateUser(array $data) : ?array {

    //  Etablir une connexion avec la base de données
    require DB;

    // Effectuer la requête pour récupérer les données de l'utilisateur dont l'emial a été récupérer depuis le formulaire
    $req = $db -> prepare("SELECT * FROM user WHERE email=:email");
    $req -> bindValue(":email", $data['email'] );
    $req -> execute();
    $row = $req -> rowCount();

    // Si le nombre d'enregistrment n'est pas égal à 1
    if ($row != 1){
        // Cet email n'existe pas dans la table "user"
        // Retourner null et arrêter le script 
        return null; 
    }
    
    // Dans le cas contraire, récupérer les donnéees de l'utilisateur dont l'email a mathé 
    $user = $req -> fetch();
    
    // Ensuite le mot de passe de l'utilisateur  récupéreé de la table "user"
    // ne match pas avec celui récupérer depuis le formulaire
    if ( ! password_verify($data['password'], $user['password'])){

        // Cela veut dire que le mot de passe ne correspond pas
        // Retourner null et arrêter le script
        return null; 
    }

    // Dans le cas contraire 
    // retourner toutes les données de cet utilisateur
    return $user;
}








?>