<?php
    require_once "TwigBaseController.php"; // Подключаем

    class BenderController extends TwigBaseController{
        public $title = "Бендер";
        public $template = "object.twig";

        public function getContext(): array {
            $context = parent::getContext();
            $context["url"] = "/Bender";
            
            return $context;
        }
    }
?>