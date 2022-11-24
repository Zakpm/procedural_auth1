<?php 
declare(strict_types=1);

require AUTH_MIDDLEWARE;
require ABSTRACT_CONTROLLER;


/**
 * Cette fonction permet d'afficher la liste des catégories
 *
 * @return string
 */
function index() : string {

    require CATEGORY;
    $categories = findAllCategories();
    
    return render("pages/admin/category/index.html.php", [
        "categories" => $categories
    ]);
}


/**
 * Cette methode permet d'afficher le formulaire de création d'une nouvelle catégorie
 *
 * @return string
 */
function create() : string {

    if( $_SERVER['REQUEST_METHOD'] === "POST"){

        require VALIDATOR;

       $errors = make_validation(
            $_POST,
            [
                "name" => ["required", "string", "max::255", "unique::category,name"]
            ],
            [
                "name.required" => "Le nom est obligatoire.",
                "name.string"   => "Veuillez entrer un chaîne de cractères.",
                "name.max"      => "Veuillez entrer au maximum 255 caractères.",
                "name.unique"   => "Cette catégorie existe déjà. Veuillez en choisir une autre."
            ]
            );

            if (count($errors) > 0){

                $_SESSION['errors'] = $errors;
                $_SESSION['old']    = old_values($_POST);
                return redirect_back();
            }

            
            require CATEGORY;

            createCategory(old_values($_POST));

           $_SESSION['success'] = "La catégorie a été ajouté avec succès";

           return redirect_to_url("/admin/category/list");

    }

    return render("pages/admin/category/create.html.php");
}



function edit($params) {

    $id = (int) strip_tags($params[0]);

   require CATEGORY;
   $category = findCategoryById($id);
   
   if ( ! $category){

    return redirect_to_url("/admin/category/list");
    
   }

   if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    require VALIDATOR;
    $errors = make_validation(
        $_POST,
        [
            "name" => ["required", "string", "max::255", "uniqueOnUpdate::category,name," .$category['id']]
        ],
        [
            "name.required" => "Le nom est obligatoire.",
            "name.string"   => "Veuillez entrer un chaîne de cractères.",
            "name.max"      => "Veuillez entrer au maximum 255 caractères.",
            "name.uniqueOnUpdate"   => "Cette catégorie existe déjà. Veuillez en choisir une autre."
        ]  

    );

    if (count($errors) > 0){

        $_SESSION['errors'] = $errors;
        $_SESSION['old']    = old_values($_POST);
        return redirect_back();
    }
    updatedCategory(old_values($_POST), $category['id']);

    return redirect_to_url("/admin/category/list");

   }
    
   return render("pages/admin/category/edit.html.php", [
        "category" => $category
]);
}


/**
 * Ctte fonction permet de supprimer une catégorie de la table "category"
 *
 * @param array $params
 * 
 * @return string
 */
function delete(array $params) : string{

    $id = (int) strip_tags($params[0]);

    require CATEGORY;
    $category = findCategoryById($id);

    if (! $category) {

        return redirect_to_url("/admin/category/list");
    }

    deleteCategory($category['id']);

    return redirect_to_url("/admin/category/list");
}


?>