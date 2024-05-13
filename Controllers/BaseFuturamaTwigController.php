<?php

    class BaseFuturamaTwigController extends TwigBaseController{
        public function getContext(): array
        {
            $context = parent::getContext();
            
            $query = $this->pdo->query("SELECT * FROM character_types ORDER BY -1");
            $types = $query->fetchAll();
            $context['types'] = $types;

            return $context;
        }
    }

?>