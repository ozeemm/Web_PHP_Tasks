<?php
    require_once "BenderController.php"; // Подключаем

    class BenderImageController extends BenderController{
        public $template = "image.twig";

        public function getContext(): array {
            $context = parent::getContext();
            $context["image"] = "../images/Bender.jpg";
            $context["is_image"] = true;
            
            return $context;
        }
    }
?>