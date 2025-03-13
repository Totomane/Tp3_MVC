<?php
require 'model/ArticleModel.php';

class ArticleController {
    private $model;

    public function __construct() {
        $this->model = new ArticleModel();
    }

    public function viewArticle($id) {
        $article = $this->model->getArticle($id);
        require 'view/articles/view.php';
    }

    public function addArticle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $corps = $_POST['corps'];
            $id_aut = 1; // ca depend de l'aut ca cahnge

            if ($this->model->addArticle($titre, $corps, $id_aut)) {
                $message = "Article ajouté avec succès.";
            } else {
                $message = "Erreur My g";
            }
        }

        require 'view/articles/add.php';
    }
}
?>
