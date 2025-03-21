<?php $title = 'Mon E-Commerce - ' . "Produits"; ?>

<?php ob_start() ?>
<?php foreach ($products as $product): ?>
    <article>
        <a href="index.php?action=show&id=<?= $product['id_produit']; ?>">
            <h2>
              <?php echo $product['titre'] . ' (' . $product['prix']; ?> €)
            </h2>
        </a>
        <p>par <?php echo $product['fabricant'] ?></p>
    </article>
    <hr />
<?php endforeach ?>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
