<?php
        // Подключаем
        require_once '../vendor/autoload.php';
        require_once '../framework/autoload.php';
        require_once '../Controllers/MainController.php';
        require_once '../controllers/Controller404.php';
        require_once "../controllers/ObjectController.php";
        require_once "../controllers/SearchController.php";
        require_once "../controllers/CharacterCreateController.php";
        require_once "../controllers/TypeCreateController.php";

        // Создаем загрузчик шаблонов, и указываем папку с шаблонами
        // только слеш вместо точек
        $loader = new \Twig\Loader\FilesystemLoader('../views');
    
        // Экземпляр Twig с помощью которого будет рендерить
        $twig = new \Twig\Environment($loader, [
            "debug" => true // добавляем тут debug режим
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension()); // активируем расширени

        $pdo = new PDO("mysql:host=localhost:3307;dbname=futurama;charset=utf8", "root", ""); // Подключаемся к БД

        $router = new Router($twig, $pdo);
        $router->add("/", MainController::class);
        $router->add("/character/(?P<id>\d+)", ObjectController::class);
        $router->add("/search", SearchController::class);
        $router->add("/character/create", CharacterCreateController::class);
        $router->add("/character/create/type", TypeCreateController::class);

        $router->get_or_default(Controller404::class);
?>