<?php 
declare(strict_types=1);

require ABSTRACT_CONTROLLER;


/**
 * Cette méthode fait 2 choses : 
 *     - Accéder la page du formaulaire d'inscription
 *     - Récupérer les données du formaulaire d'inscription
 *     - Faire appel aux service du validateur afin de procéder à la validation de ces données 
 *     - Faire appel au manager de la table "user" (model) afin d'inserer les données en base.
 *     -Les stocker
 *
 * @return string
 */
    function register() : string {

        if ($_SERVER['REQUEST_METHOD'] == "POST" ){

            // appel du validateur
            require VALIDATOR;

           $errors = make_validation($_POST,
                                [
                                    "first_name"                 => ["required", "string", "max::255"],
                                    "last_name"                  => ["required", "string", "max::255"],
                                    "email"                      => ["required", "string", "min::5", "max::255", "email", "unique::user,email"],
                                    "password"                   => ["required", "string", "min::8", "max::255", "regex::/(?=(?:.*[A-Z]){1,255})(?=(?:.*[a-z]){1,255})(?=(?:.*\d){1,255})(?=(?:.*[!@#$%^&*()\-_=+{};:,<.>]){1,255})(.{8,255})/"],
                                    "confirm_password"           => ["required", "string", "min::8", "max::255", "regex::/(?=(?:.*[A-Z]){1,255})(?=(?:.*[a-z]){1,255})(?=(?:.*\d){1,255})(?=(?:.*[!@#$%^&*()\-_=+{};:,<.>]){1,255})(.{8,255})/", "same::password"],
                                ],
                                [
                                    "first_name.required"                => "Le prénom est obligatoire.",
                                    "first_name.string"                  => "Veuillez entrer une chaîne de caractère.",
                                    "first_name.max"                     => "Le prénom doit contenir au maximum 255 caractères.",

                                    "last_name.required"                 => "Le nom est obligatoire.",
                                    "last_name.string"                   => "Veuillez entrer une chaîne de caractère.",
                                    "last_name.max"                      => "Le prénom doit contenir au maximum 255 caractères.",

                                    "email.required"                     => "L'email est obligatoire.",
                                    "email.string"                       => "Veuillez entrer une chaîne de caractère.",
                                    "email.min"                          => "Le prénom doit contenir au minimum 5 caractères.",
                                    "email.max"                          => "Le prénom doit contenir au maximum 255 caractères.",
                                    "email.email"                        => "Veuillez entrer un email valide.",
                                    "email.unique"                       => "Impossible de créer un compte avec cet email.",

                                    "password.required"                  => "Le mot de passe est obligatoire.",
                                    "password.string"                    => "Veuillez entrer une chaîne de caractère.",
                                    "password.min"                       => "Le mot de passe doit contenir au minimum 8 caractères.",
                                    "password.max"                       => "Le mot de passe doit contenir au maximum 255 caractères.",
                                    "password.regex"                     => "Le mot de passe doit contenir au moin une lettre minuscule, une lettre majuscule, un caractère spécial et un chiffre.",

                                    "confirm_password.required"          => "La confirmation du mot de passe est obligatoire.",
                                    "confirm_password.string"            => "Veuillez entrer une chaîne de caractère.",
                                    "confirm_password.min"               => "La confirmation du mot de passe doit contenir au minimum 8 caractères.",
                                    "confirm_password.max"               => "La confirmation du mot de passe doit contenir au maximum 255 caractères.",
                                    "confirm_password.regex"             => "Le mot de passe doit contenir au moin une lettre minuscule, une lettre majuscule, un caractère spécial et un chiffre.",
                                    "confirm_password.same"              => "Le mot de passe doit être identique à sa confirmation.",
                                ]
            );

            if ( count($errors) > 0){
                
                $_SESSION['errors'] = $errors; // pour récuperer les erreurs quand on recharge la page 
                $_SESSION['old']    = old_values($_POST);
                return redirect_back(); // c'est la fonction qu'on a crée qui permet la rediraction 
            }

            // Appel du manager de la table User
            require USER;

            $post_clean = old_values($_POST);
            createUser($post_clean);

            return redirect_to_url("/login"); // on fait la même chose qu'avec redirect_back
        }

       return render("pages/visitor/registration/register.html.php");
    }




?>