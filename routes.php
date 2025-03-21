<?php

declare(strict_types=1);

require 'controllers/ProductController.php';

// Définition des routes sous forme de tableau associatif
// Chaque route est liée uniquement à une méthode spécifique du contrôleur
$routes = [
    'menu' => 'menu',
    'products' => 'products',
    'ajout' => 'ajout',
    'recherche' => 'recherche',
    'show' => 'show',
];

// Récupération de l'action demandée via l'URL (paramètre GET 'action')
// Si aucune action n'est spécifiée, on affiche le menu par défaut
$action = $_GET['action'] ?? 'menu';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null; // Récupération optionnelle d'un identifiant

// Instanciation du contrôleur unique
    $controller = new ProductController();

// Vérification si l'action existe bien dans la liste des routes définies
if (array_key_exists($action, $routes)) {
    $method = $routes[$action]; // Récupération de la méthode associée
    
    // Vérification que la méthode existe réellement dans le contrôleur
    if (method_exists($controller, $method)) {
        $controller->$method($id); // Appel de la méthode avec l'ID (s'il est fourni)
        return;
    }
}

// Gestion des erreurs : si la route n'existe pas, on affiche une erreur 404
$controller->error(404, "Action non trouvée");
