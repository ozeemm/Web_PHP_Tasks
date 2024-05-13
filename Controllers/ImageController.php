<?php
    require_once "ObjectController.php";

    class ImageController extends ObjectController{
        public $template = "image.twig";

        public function getContext(): array{
            $context = parent::getContext();

            $query = $this->pdo->prepare("SELECT id, image FROM characters WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $query->execute();
            
            $data = $query->fetch();

            $context['image'] = $data['image'];
            $context["is_image"] = true;

            return $context;
        }
    }
?>