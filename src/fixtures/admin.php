<?php 

    function createAdmin(){

        require __DIR__ . "/../../config/database.php";

        $req = $db -> prepare("INSERT  INTO admin (first_name, last_name, email, password, created_at, updated_at) VALUES (:first_name, :last_name, :email, :password, now(), now() )");
        $req -> bindValue(":first_name", "Zakaryya");
        $req -> bindValue(":last_name", "PM");
        $req -> bindValue(":email", "zakaryyapm@outlook.fr");
        $req -> bindValue(":password", password_hash("Azerty123*", PASSWORD_BCRYPT, ['cost' => 12]));

        $req->execute();
        $req->closeCursor();
    }

    createAdmin();







?>