<?php
    require_once "FryController.php"; // Подключаем

    class FryImageController extends FryController{
        public $template = "image.twig";

        public function getContext(): array {
            $context = parent::getContext();
            $context["image"] = "../images/Fry.jpg";
            $context["is_image"] = true;
            
            return $context;
        }
    }
?>