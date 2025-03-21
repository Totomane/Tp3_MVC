<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/bitnami.css" />
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="-1">

        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <a href="index.php?action=menu">Retour au menu</a><h1><?= $title ?></h1></a>
        </header>
        <hr/>
        <div>
            <?= $content ?>
        </div>
        <footer>
        </footer>
        <hr/>
    </body>
</html>
