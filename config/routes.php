<?php 

get("/",             ["visitor/welcome/welcomeController", "index"]);

/* ------------------------Registration---------------------- */
get("/register",     ["visitor/registration/registrationController", "register"] );
post("/register",    ["visitor/registration/registrationController", "register"] );


?>