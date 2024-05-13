<?php
// Абстрактный класс, от него потом наследование
abstract class BaseController{
    public PDO $pdo;
    public array $params;

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

    // Вызов рендеринга
    abstract public function get();
}
?>