<?php

declare(strict_types=1);

require 'controller/ArticleControllers.php';
require 'controller/CommentController.php';

// Définition des routes sous forme de tableau associatif
$routes = [
    'home' => 'listArticles',
    'view_article' => 'viewArticle',
    'add_comment' => 'addComment',

    'delete_comment' => 'deleteComment',
];

// Récupération de l'action et de l'ID (si fourni)
$action = $_GET['action'] ?? 'home';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Instanciation des contrôleurs
$articleController = new ArticleController();
$commentController = new CommentController();

// Vérification si l'action demandée existe dans les routes
if (array_key_exists($action, $routes)) {
    $method = $routes[$action];

    // Vérification et appel de la méthode appropriée
    if (method_exists($articleController, $method)) {
        $articleController->$method($id);
        return;
    } elseif (method_exists($commentController, $method)) {
        $commentController->$method($id);
        return;
    }
}


http_response_code(404); // 404 TmTC Brozeur
echo "Erreur 404 : Page not FOund";
