<?php
// Абстрактный класс, от него потом наследование
abstract class BaseController{
    public PDO $pdo;
    public array $params;

    public function __construct()
    {
        session_set_cookie_params(60 * 60 * 10); // Время жизни 10 часов (по дефолту - до закрытия браузера)
        session_start();
    }

    public function setPDO($pdo){
        $this->pdo = $pdo;
    }
    
    public function setParams(array $params) {
        $this->params = $params;
    }

    // Возвращает контекст с данными
    public function getContext(): array{
        return []; // по умолчанию - пустой контекст
    }

    public function process_response(){
        $method = $_SERVER['REQUEST_METHOD'];
        $context = $this->getContext();
        
        if($method == 'GET'){
            $this->get($context);
        } else if($method == 'POST'){
            $this->post($context);
        }
    }

    public function get(array $context) {}
    public function post(array $context) {}
}
?>