<?php
    require_once "ObjectController.php";

    class InfoController extends ObjectController{
        public $template = "info.twig";

        public function getContext(): array{
            $context = parent::getContext();

            $query = $this->pdo->prepare("SELECT id, info FROM characters WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $query->execute();
            
            $data = $query->fetch();

            $context['info'] = $data['info'];
            $context["is_info"] = true;

            return $context;
        }
    }
?>