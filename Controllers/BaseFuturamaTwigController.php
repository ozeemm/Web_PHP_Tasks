<?php

    class BaseFuturamaTwigController extends TwigBaseController{
        public function getContext(): array
        {
            $context = parent::getContext();
            
            $query = $this->pdo->query("SELECT * FROM character_types ORDER BY -1");
            $types = $query->fetchAll();
            $context['types'] = $types;

            $context = $this->writeHistory($context);

            return $context;
        }

        public function writeHistory(array $context){
            $url = $_SERVER['REQUEST_URI'];
            if(!isset($_SESSION['pages_history'])){
                $_SESSION['pages_history'] = [];
            }
            array_unshift($_SESSION['pages_history'], $url);

            while(count($_SESSION['pages_history']) > 10){
                array_pop($_SESSION['pages_history']);
            }

            $context['session_id'] = session_id();
            $context['pages_history'] = (isset($_SESSION['pages_history']) ? $_SESSION['pages_history'] : '');
            return $context;
        }
    }

?>