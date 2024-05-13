<?php
// Абстрактный класс, от него потом наследование
abstract class BaseController{
    public PDO $pdo;

    public function setPDO($pdo){
        $this->pdo = $pdo;
    }

    // Возвращает контекст с данными
    public function getContext(): array{
        return []; // по умолчанию - пустой контекст
    }

    // Вызов рендеринга
    abstract public function get();
}
?>