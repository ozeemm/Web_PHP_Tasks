<?php
    require_once "TwigBaseController.php"; // Подключаем

    class FryController extends TwigBaseController{
        public $title = "Фрай";
        public $template = "object.twig";

        public function getContext(): array {
            $context = parent::getContext();
            $context["url"] = "/Fry";
            
            return $context;
        }
    }
?>