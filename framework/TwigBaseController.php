<?php
    require_once "BaseController.php"; // Импортим BaseController

    class TwigBaseController extends BaseController{
        public $title = ""; // Название страницы
        public $template = ""; // Шаблон страницы
        protected \Twig\Environment $twig; // Ссылка на экземпляр twig для рендеринга

        public function setTwig($twig) {
            $this->twig = $twig;
        }

        // Переопределяем функцию контекста
        public function getContext(): array{
            $context = parent::getContext();
            $context['title'] = $this->title; // Добавляем title
            
            $query = $this->pdo->query("SELECT * FROM characters"); // Запрос
            $context['characters'] = $query->fetchAll(); // Стягивание данных

            return $context;
        }

        // Рендерим результат
        public function get() {
            echo $this->twig->render($this->template, $this->getContext());
        }
    }
?>