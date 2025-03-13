<?php if (!isset($article)) : ?>
    <p>No article hermano.</p>
    <?php return; ?>
<?php endif; ?>
<link rel="stylesheet" href="/public/Btrobin.css">
<?php $pageTitle = "Article et Commentaires"; ?>
<?php include __DIR__ . '/../layout.php'; ?>
</div>
<div class="container">
    <h1><?= htmlspecialchars($article['title']) ?></h1>
    <p class="info">Publié le <?= htmlspecialchars($article['date']) ?> par <?= htmlspecialchars($article['author']) ?></p>
    <div class="content">
        <?= nl2br(htmlspecialchars($article['content'])) ?>
    </div>

    <h2>Commentaires</h2>
    <?php if (!empty($article['comments'])) : ?>
        <?php foreach ($article['comments'] as $comment) : ?>
            <div class="commentaire">
                <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> - <?= htmlspecialchars($comment['date_crea']) ?></p>
                <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
                <form action="/delete_comment.php" method="post">
                    <input type="hidden" name="id_com" value="<?= $comment['id_com'] ?>">
                    <input type="submit" value="Supprimer">
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun commentaire pour cet article hermanito</p>
    <?php endif; ?>

    <h2>Ajouter un commentaire</h2>
    <form class="commentaire" action="/add_comment.php" method="post">
        <input type="hidden" name="id_article" value="<?= $article['id'] ?>">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" required>
        <label for="commentaire">Commentaire</label>
        <textarea name="commentaire" cols="55" rows="3" required></textarea>
        <input type="submit" value="Envoyer">
    </form>
</div>
