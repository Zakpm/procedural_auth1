<?php 

get("/", ["visitor/welcome/welcomeController", "index"]);

get("/register", ["visitor/registration/registrationController", "register"] );


?>