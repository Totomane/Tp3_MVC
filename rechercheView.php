<?php $title="Recherche produits"; ?>
<?php ob_start(); ?>

<form method="post" action="index.php?action=recherche">
            <label>Titre : </label>
            <input type="text" name="titre">
            <input type="submit" name="btnRecherche" value="Rechercher">
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once('layout.php'); ?>