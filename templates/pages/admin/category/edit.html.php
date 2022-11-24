<?php $theme = extends_of("themes/base_admin.html.php"); ?>

<?php $title = "Modification de cette catégorie"; ?>

<h1 class="text-center my-3 display-5">Modification de cette catégorie</h1>

<div class="container mt-5">
    <form action="" method="post">
        <div class="mb-3">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?? $category['name']; ?>" />
            <div class="text-danger"><?= formErrors('name'); ?></div>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary"/>
        </div>
    </form>

</div>