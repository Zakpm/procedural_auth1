<?php $theme = extends_of("themes/base_admin.html.php"); ?>

<?php $title = "Liste des catégories"; ?>

<h1 class="text-center my-3 display-5">Liste des catégories</h1>

<?php if( isset($_SESSION['success']) && !empty($_SESSION['success']) ) : ?>
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <?= $_SESSION['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif ?>

<div class="d-flex justify-content-end align-items-center my-3">
    <a href="/admin/category/create" class="btn btn-primary">Nouvelle catégorie</a>
</div>

<?php if(isset($categories) && !empty($categories)) : ?>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-center">
        <thead class="bg-dark text-white">
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($categories as $category) : ?>
                    <tr>
                        <td><?= htmlspecialchars($category['id']) ?></td>
                        <td><?= htmlspecialchars($category['name']) ?></td>
                        <td>
                            <a href="/admin/category/edit/<?= htmlspecialchars($category['id']) ?>" class="btn btn-sm btn-secondary">Modifier</a>
                            <a onclick="return confirm('Confirmer la suppression ?')" href="/admin/category/delete/<?= htmlspecialchars($category['id']) ?>" class="btn btn-sm btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</div>
    <?php else : ?>
        <p class="mt-5 text-center lead">Aucune catégorie existante</p>
<?php endif ?>

