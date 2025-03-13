<?php
require 'model/CommentModel.php';

class Commentcontroller {
    private $model;

    public function __construct() {
        $this->model = new CommentModel();
    }

    public function listComments($articleId) {
        $comments = $this->model->getAllComments($articleId);
        require 'view/comment/list.php';
    }
    public function addComment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_article = $_POST['id_article'];
            $pseudo = $_POST['pseudo'];
            $commentaire = $_POST['commentaire'];

            if ($this->model->addComment($id_article, $pseudo, $commentaire)) {
                header('Location: index.php?action=view_article&id=' . $id_article);
                exit;
            } else {
                echo "Erreur lors de l'ajout du commentaire.";
            }
        }
    }

    public function deleteComment($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];

            if ($this->model->deleteComment($id, $login, $mdp)) {
                $message = "Commentaire supprimé avec succès !";
            } else {
                $message = "Échec de la suppression.";
            }
        }

        require 'view/comment/delete.php';
    }
}
?>
