<?php
    class LogoutController extends BaseController{
        public function post(array $context)
        {
            $_SESSION['is_logged'] = false;
            $_SESSION['username'] = "";
            
            $url = $_SERVER['HTTP_REFERER'];
            Header("Location: $url");
            exit;
        }
    }
?>