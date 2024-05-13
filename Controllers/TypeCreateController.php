<?php
    require_once "BaseFuturamaTwigController.php";

    class TypeCreateController extends BaseFuturamaTwigController{
        public $title = "Добавление типа";
        public $template = "TypeCreate.twig";

        public function get(array $context){
            parent::get($context);
        }

        public function post(array $context){
            // Получаем значения полей с формы
            $type = $_POST['type'];
            

            $sql = "INSERT INTO character_types(type) VALUES (:type)";
            $query = $this->pdo->prepare($sql);
            $query->bindValue("type", $type);
            $query->execute();

            $context['message'] = "Вы успешно создали новый тип персонажей";

            $this->get($context);
            
            // Редирект, чтобы при обновлении страницы не отправлялся ещё один POST и обновлялась навигация
            header("Location: /type/create");
            exit;
        }
    }
?>