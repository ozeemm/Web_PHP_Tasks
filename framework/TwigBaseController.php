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

            return $context;
        }

        public function getTemplate(){ return $this->template; }

        // Рендерим результат
        public function get(array $context) {
            echo $this->twig->render($this->getTemplate(), $context);
        }
    }
?>