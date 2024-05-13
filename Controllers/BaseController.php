<?php
// Абстрактный класс, от него потом наследование
abstract class BaseController{
    // Возвращает контекст с данными
    public function getContext(): array{
        return []; // по умолчанию - пустой контекст
    }

    // Вызов рендеринга
    abstract public function get();
}
?>