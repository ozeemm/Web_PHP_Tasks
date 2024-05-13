<?php
    class TypeDeleteController extends BaseController{
        public function post(array $context){
            $id = $this->params['id'];
            $sql = "DELETE FROM character_types WHERE id=:id";
            
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->execute();

            header("Location: /type/create");
            exit;
        }
    }
?>