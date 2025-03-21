<?php
declare(strict_types=1);
require 'models/ProductModel.php';

class ProductController {
    private ProductModel $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    public function products(): void {
        $products = $this->model->getAllProducts();
        require 'views/productsView.php';
    }

    public function show(int $id): void {
        $product = $this->model->getProductById($id);
        if ($product) {
            require 'views/productView.php';
        } else {
            $this->error(404, "Produit n'existe pas");
        }
    }

    public function ajout(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérification que tous les champs sont bien remplis
        if (trim($_POST['titre']) === '' || empty($_POST['descriptif']) || empty($_POST['stock']) || empty($_POST['prix']) || empty($_POST['fabricant'])) {
            echo "<script>window.alert('Tous les champs doivent être remplis et le titre ne peut pas être vide.');</script>";
            require 'views/ajoutView.php';
            // Retformulaire
            return;
        }
        $titre = $_POST['titre'];
        $descriptif = trim($_POST['descriptif']);
        $stock = intval($_POST['stock']);
        $prix = floatval($_POST['prix']);
        $fabricant = trim($_POST['fabricant']);

        $res = ajoutProduit($titre, $descriptif, $stock, $prix, $fabricant);
        if ($res === 1) {
            echo "<script>window.alert('Produit ajouté');</script>";
            echo "<script>window.location.assign('index.php');</script>";
        } else {
            echo "<script>window.alert('Erreur lors de l\'ajout du produit.');</script>";
            require 'views/ajoutView.php';
        }
    } else {
        // Affichage initial du formulaire d'ajout
        require 'views/ajoutView.php';
    }
}
    public function recherche(): void {
        if (isset($_POST['titre'])) {
            $products = $this->model->searchProducts($_POST['titre']);
            require 'views/productsView.php';
        } else {
            require 'views/rechercheView.php';
        }
    }

    public function menu(): void {
        require 'views/menuView.php';
    }

    public function error(int $code, string $msg): void {
        http_response_code($code);
        require "views/{$code}.php";
        die();
    }
}
?>