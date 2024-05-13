<?php
    require_once "BenderController.php"; // Подключаем

    class BenderInfoController extends BenderController{
        public $template = "info.twig";

        public function getContext(): array {
            $context = parent::getContext();
            $context["description"] = "Был сделан в Мексике в 2997 году. Имеет серийный номер 2716057.\nПьет большое количество алкоголя, чтобы подзарядить свои топливные элементы.\nАвантюрист, любит курить сигары.\nВ настоящее время живет в квартире с Фраем.";
            $context["is_info"] = true;
            
            return $context;
        }
    }
?>