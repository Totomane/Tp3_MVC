<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/public/Btrobin.css">
    <title>Supprimer un Commentaire</title>

</head>
<body>

<header>
    <h1>Suppression d'un Commentaire</h1>
</header>

<?php if (!empty($_GET['id_com'])): ?>
    <div class="container">
        <form action="index.php?action=delete_comment" method="post">
            <input type="hidden" name="id_com" value="<?php echo (int) $_GET['id_com']; ?>">
            <label for="login">Identifiant :</label><br>
            <input type="text" name="login" required><br><br>
            <label for="mdp">Mot de passe :</label><br>
            <input type="password" name="mdp" required><br><br>
            <input type="submit" value="Supprimer">
        </form>
    </div>
<?php else: ?>
    <p>Identifiant du commentaire manquant</p>
<?php endif; ?>

</body>
</html>
