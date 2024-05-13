<?php
    require_once "TwigBaseController.php"; // Подключаем

    class MainController extends TwigBaseController{
        public $title = "Главная";
        public $template = "main.twig";
    }
?>