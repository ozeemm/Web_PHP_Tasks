<?php
    require_once "BaseFuturamaTwigController.php";

    class MainController extends BaseFuturamaTwigController{
        public $title = "Главная";
        public $template = "main.twig";

        public function getContext(): array
        {
            $context = parent::getContext();

            if(isset($_GET['type'])){
                $query = $this->pdo->prepare("SELECT * FROM characters WHERE type = :type");
                $query->bindValue("type", $_GET["type"]);
                $query->execute();
            }
            else{
                $query = $this->pdo->query("SELECT * FROM characters"); // Запрос
            }
            $context['characters'] = $query->fetchAll(); // Стягивание данных

            return $context;
        }
    }
?>