<?php
    class LoginController extends BaseFuturamaTwigController{
        public $title = "Авторизация";
        public $template = "auth.twig";

        public function get(array $context){
            parent::get($context);
        }

        public function post(array $context){
            // Получаем значения полей с формы
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username=:user AND password=:password";
            $query = $this->pdo->prepare($sql);
            $query->bindValue("user", $username);
            $query->bindValue("password", $password);
            $query->execute();
            $data = $query->fetch();

            if($data == null){ // Unathorized
                $_SESSION['is_logged'] = false;
                $context['message'] = "Неверный логин или пароль";
                $this->get($context);
            }
            else{
                $_SESSION['is_logged'] = true;
                $_SESSION['username'] = $username;
                header("Location: /");
                exit;
            }
        }
    }
?>