<?php
class SetWelcomeController extends BaseController{
    public function get(array $context){
        $url = $_SERVER['HTTP_REFERER']; // url, с которого перешли

        // Список сообщений
        if(!isset($_SESSION['pages_history'])){
            $_SESSION['pages_history'] = [];
        }
        array_unshift($_SESSION['pages_history'], $url);

        header("Location: $url"); // Возвращаемся назад
        exit;
    }
}
?>