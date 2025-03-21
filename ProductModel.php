<?php
declare(strict_types=1);
require_once 'config/db.php';

class Database {
    private static ?Database $instance = null;
    private \PDO $pdo;

    private function __construct() {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
        $this->pdo = new \PDO($dsn, DB_USER, DB_PWD);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): \PDO {
        return $this->pdo;
    }
}

class ProductModel {
    private \PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllProducts(): array {
        $stmt = $this->db->query('SELECT * FROM produits');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getProductById(int $id): ?array {
        $stmt = $this->db->prepare('SELECT * FROM produits WHERE id_produit = ?');
        $stmt->execute([$id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function addProduct(string $titre, string $descriptif, int $stock, float $prix, string $fabricant): bool {
        $stmt = $this->db->prepare('INSERT INTO produits (titre, descriptif, stock, prix, fabricant) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$titre, $descriptif, $stock, $prix, $fabricant]);
    }
    // Recherche un produit par titre
    public function searchProducts(string $titre): array {
        $query = $this->db->prepare("SELECT * FROM produits WHERE titre = ?");
        $query->execute([$titre]);
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($products) {
            return $products;
        } else {
            error(404, "Produit " . $titre);
        }
    }
}
?>