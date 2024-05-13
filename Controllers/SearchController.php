<?php
    require_once "BaseFuturamaTwigController.php";

    class SearchController extends BaseFuturamaTwigController{
        public $template = "search.twig";

        public function getContext():array {
            $context = parent::getContext();
            $context['title'] = "Поиск";

            $type = isset($_GET['type']) ? $_GET['type'] : '';
            $title = isset($_GET['title']) ? $_GET['title'] : '';
            $info = isset($_GET['description']) ? $_GET['description'] : '';

            $sql = " 
                SELECT id, title FROM characters
                WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
                AND (type = :type OR 'Все'=:type)
                AND (:info = '' OR info like CONCAT('%', :info, '%'))";

            $query = $this->pdo->prepare($sql);
            $query->bindValue("title", $title);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);
            $query->execute();

            $context['search_objects'] = $query->fetchAll();

            return $context;
        }
    }
?>