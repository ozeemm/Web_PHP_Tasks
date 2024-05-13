<?php
    require_once "BaseFuturamaTwigController.php";

    class Controller404 extends BaseFuturamaTwigController{
        public $title = "Страница не найдена";
        public $template = "404.twig";

        public function get(){
            http_response_code(404);
            parent::get();
        }
    }
?>