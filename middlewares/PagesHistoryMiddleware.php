<?php
    class PagesHistoryMiddleware extends BaseMiddleware{
        public function apply(BaseController $controller, array $context)
        {
            $url = $_SERVER['REQUEST_URI'];
            if(!isset($_SESSION['pages_history'])){
                $_SESSION['pages_history'] = [];
            }
            if(count($_SESSION['pages_history']) > 0){
                if($_SESSION['pages_history'][0] != $url)
                    array_unshift($_SESSION['pages_history'], $url);
            }
            else {
                array_unshift($_SESSION['pages_history'], $url);
            }

            while(count($_SESSION['pages_history']) > 10){
                array_pop($_SESSION['pages_history']);
            }
        }
    }
?>