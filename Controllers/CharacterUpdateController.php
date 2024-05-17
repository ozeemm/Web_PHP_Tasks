<?php
    class CharacterUpdateController extends BaseFuturamaTwigController{
        public $title = "Изменение персонажа";
        public $template = "CharacterUpdate.twig";

        public function getContext(): array
        {
            $context = parent::getContext();

            $id = $this->params['id'];

            $sql = "SELECT * FROM characters WHERE id=:id";
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->execute();

            $data = $query->fetch();
            $context['object'] = $data;
            return $context;
        }

        public function get(array $context){
            parent::get($context);
        }

        public function post(array $context){
            $id = $this->params['id'];
            // Получаем значения полей с формы
            $name = $_POST['name'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $info = $_POST['info'];

            // Обновляем всё, кроме картинки
            $sql = "UPDATE characters SET title=:name, description=:description, info=:info, type=:type WHERE id=:id";
            
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->bindValue("name", $name);
            $query->bindValue("description", $description);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);    
            $query->execute();

            // Достаём картинку
            $img_tmp_name = $_FILES['image']['tmp_name']; // Путь во временной папке
            $img_name = $_FILES['image']['name']; 
                       
            if($img_name != null){
                move_uploaded_file($img_tmp_name, "../public/media/$img_name");
                $image_url = "/media/$img_name";

                $sql = "UPDATE characters SET image=:image WHERE id=:id";
                $query = $this->pdo->prepare($sql);
                $query->bindValue("id", $id);
                $query->bindValue("image", $image_url); 
                $query->execute();
            }

            $context['message'] = "Вы успешно изменили объект";
            $context['id'] = $id;

            $context['object']['title'] = $name;
            $context['object']['description'] = $description;
            $context['object']['info'] = $info;
            $context['object']['type'] = $type;
            $this->get($context);
        }
    }
?>