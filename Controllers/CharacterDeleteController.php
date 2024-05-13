<?php
    class CharacterDeleteController extends BaseController{
        public function post(array $context){
            $id = $this->params['id'];
            $sql = "DELETE FROM characters WHERE id=:id";
            
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->execute();

            // устанавливаем заголовок Location, на новый путь (редирект на главную)
            header("Location: /");
            exit; // после header("Location: ...") надо писать exit
        }
    }
?>