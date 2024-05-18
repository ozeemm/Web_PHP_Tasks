<?php

    class BaseFuturamaTwigController extends TwigBaseController{
        public function getContext(): array
        {
            $context = parent::getContext();
            
            $query = $this->pdo->query("SELECT * FROM character_types ORDER BY -1");
            $types = $query->fetchAll();
            $context['types'] = $types;

            //$context = $this->writeHistory($context);
            $context['session_id'] = session_id();
            $context['pages_history'] = (isset($_SESSION['pages_history']) ? $_SESSION['pages_history'] : []);
            $context['is_logged'] = isset($_SESSION['is_logged']) ? $_SESSION['is_logged'] : false;
            $context['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : '';

            return $context;
        }
    }

?>