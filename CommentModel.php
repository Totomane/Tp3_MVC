<?php
require_once 'db.php';

class CommentModel {
    private $bdd;

    public function __construct() {
        $this->bdd = getDatabaseConnection();
    }
    public function addComment($id_article, $pseudo, $commentaire) {
        $date_crea = date("Y-m-d H:i:s");
        $sql = "INSERT INTO commentaires (id_art, pseudo, contenu, date_crea) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_article, $pseudo, $commentaire, $date_crea]);
    }

    public function getAllComments($articleId) {
        $stmt = $this->bdd->prepare("SELECT * FROM commentaires WHERE id_art = ? ORDER BY date_crea ASC");
        $stmt->execute([$articleId]);
        return $stmt->fetchAll();
    }

    public function deleteComment($id_com) {
        $sql = "DELETE FROM commentaires WHERE id_com = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_com]);
    }
}
?>
