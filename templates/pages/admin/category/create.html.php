<?php $theme = extends_of("themes/base_admin.html.php"); ?>

<?php $title = "Nouvelle catégorie"; ?>

<h1 class="text-center my-3 display-5">Nouvelle catégorie</h1>

<div class="container mt-5">
    <form method="post">
        <div class="mb-3">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Entrer le nom de la catégorie" value="<?= old('name') ?>">
            <div class="text-danger"><?= formErrors('name'); ?></div>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Créer">
        </div>
    </form>
</div>