<?php 

get("/", ["welcomeController", "index"]);

get("/edit/{id}", ["welcomeController", "edit"]);

post("/create", ["welcomeController", "create"]);


?>