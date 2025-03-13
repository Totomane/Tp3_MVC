<?php
require_once 'db.php';
function getDatabaseConnection()
{
    try {
        return new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
class  ArticleModel {
    private $bdd;

    public function __construct() {
        $this->bdd = getDatabaseConnection();
    }

    public function getArticle($id) {
        $stmt = $this->bdd->prepare("SELECT * FROM articles WHERE id_art = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function addArticle($titre, $corps, $auteur) {
        $stmt = $this->bdd->prepare("INSERT INTO articles (id_aut, titre, corps, date_crea, date_modif) VALUES (?, ?, ?, NOW(), NOW())");
        return $stmt->execute([$auteur, $titre, $corps]);
    }
}
?>
