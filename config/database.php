<?php
/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn_db = 'mysql:dbname=dwwm8b_auth_admin;host=127.0.0.1;port=8889';
$user_db = 'root';
$password_db = 'root';

try {
$db = new PDO($dsn_db, $user_db, $password_db);
}
catch (\PDOException $e) {
    
    die("Error: " . $e->getMessage() );
}

?>