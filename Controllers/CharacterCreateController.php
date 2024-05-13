<?php
    require_once "BaseFuturamaTwigController.php";

    class CharacterCreateController extends BaseFuturamaTwigController{
        public $title = "Добавление персонажа";
        public $template = "CharacterCreate.twig";

        public function get(array $context){
            parent::get($context);
        }

        public function post(array $context){
            // Получаем значения полей с формы
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $info = $_POST['info'];
            
            // Достаём картинку
            $img_tmp_name = $_FILES['image']['tmp_name']; // Путь во временной папке
            $img_name = $_FILES['image']['name']; 

            // используем функцию которая проверяет, что файл действительно был загружен через POST запрос
            // если так, то переносит его в указанное во втором аргументе место
            move_uploaded_file($img_tmp_name, "../public/media/$img_name");

            $image_url = "/media/$img_name";

            $sql = "INSERT INTO characters(title, description, info, type, image) VALUES (:name, :description, :info, :type, :image)";
            
            $query = $this->pdo->prepare($sql);
            $query->bindValue("name", $name);
            $query->bindValue("description", $description);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);    
            $query->bindValue(":image", $image_url);
            $query->execute();

            $context['message'] = "Вы успешно создали объект";
            $context['id'] = $this->pdo->lastInsertId();
            $this->get($context);
        }
    }
?>