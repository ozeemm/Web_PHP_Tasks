<?php
    class LoginRequiredMiddleware extends BaseMiddleware{
        public function apply(BaseController $controller, array $context)
        {
            // Переменные под правильные логин, пароль
            $valid_user = "user";
            $valid_password = "12345";

            // Берём введённые значения
            $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
            $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            
            $sql = "SELECT * FROM users WHERE username=:user AND password=:password";
            $query = $controller->pdo->prepare($sql);
            $query->bindValue("user", $user);
            $query->bindValue("password", $password);
            $query->execute();
            $data = $query->fetch();
            
            // Сверяем с корректными
            if($data == null){
                // если не совпали, надо указать такой заголовок
                // именно по нему браузер поймет что надо показать окно для ввода юзера/пароля
                header("WWW-Authenticate: Basic realm='Futurama objects'");
                http_response_code(401); // Unathorized
                exit;
            }
        }
    }
?>