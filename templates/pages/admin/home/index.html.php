<?php $theme = extends_of("themes/base_admin.html.php"); ?>

<?php $title = "Accueil"; ?>

<h1 class="text-center my-3 display-5">Hello <?= $_SESSION['auth']['first_name']; ?> !!!</h1>