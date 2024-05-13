<?php
class ObjectController extends TwigBaseController{
    public $template = "object.twig";

    public function getContext(): array{
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT id, title, description FROM characters WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        $context['title'] = $data['title'];
        $context['description'] = $data['description'];
        $context['url'] = "/character/".$data['id'];

        return $context;
    }
}
?>