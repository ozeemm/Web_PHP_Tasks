<?php
    require_once "BaseFuturamaTwigController.php";

    class ObjectController extends BaseFuturamaTwigController{
        public $template = "object.twig";

        public function getContext(): array{
            $context = parent::getContext();

            $query = $this->pdo->prepare("SELECT id, title, image, description, info FROM characters WHERE id= :my_id");
            $query->bindValue("my_id", $this->params['id']);
            $query->execute();
                    
            $data = $query->fetch();

            if(isset($_GET['show'])){
                if($_GET['show'] == "image"){                     
                    $context['image'] = $data['image'];
                    $context["is_image"] = true;
                }
                else if($_GET['show'] == "info"){
                    $context['info'] = $data['info'];
                    $context["is_info"] = true;
                }
            }

            $context['description'] = $data['description'];
            $context['title'] = $data['title'];

            return $context;
        }

        public function getTemplate()
        {
            if(isset($_GET['show'])){
                if($_GET['show'] == "image")                     
                    $this->template = "image.twig";
                else if($_GET['show'] == "info")
                    $this->template = "info.twig";
            }
            return $this->template;
        }
    }
?>