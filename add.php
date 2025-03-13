<form class="commentaire" action="index.php?action=add_comment" method="post">
    <link rel="stylesheet" href="/public/Btrobin.css">
    <input type="hidden" name="id_article" value="<?php echo htmlspecialchars($_GET['id_art'] ?? ''); ?>">

    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" required>

    <label for="commentaire">Commentaire</label>
    <textarea name="commentaire" cols="55" rows="3" required></textarea>

    <input type="submit" value="Ajouter le commentaire">
</form>
