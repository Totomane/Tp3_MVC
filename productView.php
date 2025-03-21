<?php $title = 'Mon E-Commerce - ' . $product['titre']; ?>

<?php ob_start() ?>
<article>
    <header>
        <h2>
          <?php echo $product['titre'] . ' (' . $product['prix']; ?> €)
        </h2>
        <p>par <?php echo $product['fabricant'] ?></p>
    </header>
    <p><?php echo $product['descriptif']; ?></p>
</article>
<hr />
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
