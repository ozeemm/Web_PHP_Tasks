<?php
    require_once "BaseController.php"; // Импортим BaseController

    class TwigBaseController extends BaseController{
        public $title = ""; // Название страницы
        public $template = ""; // Шаблон страницы
        protected \Twig\Environment $twig; // Ссылка на экземпляр twig для рендеринга
        
        // Конструктор
        public function __construct($twig)
        {
            $this->twig = $twig;
        }

        // Переопределяем функцию контекста
        public function getContext(): array{
            $menu = [["title" => "Главная", "url" => "/"],
                    ["title" => "Фрай", "url" => "/Fry"], 
                    ["title" => "Бендер", "url" => "/Bender"]];
            $context = parent::getContext();
            $context['title'] = $this->title; // Добавляем title
            $context['menu'] = $menu;

            return $context;
        }

        // Рендерим результат
        public function get() {
            echo $this->twig->render($this->template, $this->getContext());
        }
    }
?>