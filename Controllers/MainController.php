<?php
    require_once "TwigBaseController.php"; // Подключаем

    class MainController extends TwigBaseController{
        public $title = "Главная";
        public $template = "main.twig";

        public function getContext(): array
        {
            $context = parent::getContext();

            $query = $this->pdo->query("SELECT * FROM characters"); // Запрос
            $context['characters'] = $query->fetchAll(); // Стягивание данных

            return $context;
        }
    }
?>