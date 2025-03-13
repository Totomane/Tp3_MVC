<?php if ($article): ?>
    <h2><?= htmlspecialchars($article['titre']) ?></h2>
    <p><strong>Publié le :</strong> <?= date("d/m/Y H:i", strtotime($article['date_crea'])) ?></p>
    <p><?= htmlspecialchars($article['corps']) ?></p>

    <?php require 'view/comment/list.php'; ?>
<?php else: ?>
    <p>Article introuvable</p>
<?php endif; ?>
