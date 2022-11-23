<?php 

    if( !isset($_SESSION['auth']) || empty($_SESSION['auth'])){

        session_destroy();
        unset($_SESSION);
        $_SESSION = [];
       return header("Location: /login");
    }


?>