           
<?php
    require_once "FryController.php"; // Подключаем

    class FryInfoController extends FryController{
        public $template = "info.twig";

        public function getContext(): array {
            $context = parent::getContext();
            $context["description"] = "Родился 14 августа 1974 года.\nЗаморозил себя в криогенной камере за несколько секунд до наступления 2000 года.\nРазморозился в конце 2999 года, и в дальнейшем стал курьером в компании «Межпланетный Экспресс».";
            $context["is_info"] = true;
            
            return $context;
        }
    }
?>