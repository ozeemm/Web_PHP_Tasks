<?php
        // Подключаем
        require_once '../vendor/autoload.php';
        require_once '../framework/autoload.php';
        require_once '../Controllers/MainController.php';
        require_once '../Controllers/Controller404.php';
        require_once "../Controllers/ObjectController.php";
        require_once "../Controllers/SearchController.php";
        require_once "../Controllers/CharacterCreateController.php";
        require_once "../Controllers/TypeCreateController.php";
        require_once "../Controllers/CharacterDeleteController.php";
        require_once "../Controllers/TypeDeleteController.php";
        require_once "../Controllers/CharacterUpdateController.php";
        require_once "../Controllers/LoginController.php";
        require_once "../Controllers/LogoutController.php";
        require_once "../middlewares/LoginRequiredMiddleware.php";
        require_once "../middlewares/PagesHistoryMiddleware.php";

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
        $router->add("/", MainController::class)
                    ->middleware(new LoginRequiredMiddleware())
                    ->middleware(new PagesHistoryMiddleware());
        $router->add("/search", SearchController::class)
                    ->middleware(new LoginRequiredMiddleware())
                    ->middleware(new PagesHistoryMiddleware());

        $router->add("/character/(?P<id>\d+)", ObjectController::class)
                    ->middleware(new LoginRequiredMiddleware())
                    ->middleware(new PagesHistoryMiddleware());
        $router->add("/character/create", CharacterCreateController::class)
                    ->middleware(new LoginRequiredMiddleware())
                    ->middleware(new PagesHistoryMiddleware());
        $router->add("/character/(?P<id>\d+)/delete", CharacterDeleteController::class)
                    ->middleware(new LoginRequiredMiddleware());
        $router->add("/character/(?P<id>\d+)/edit", CharacterUpdateController::class)
                    ->middleware(new LoginRequiredMiddleware())
                    ->middleware(new PagesHistoryMiddleware());

        $router->add("/type/create", TypeCreateController::class)
                    ->middleware(new LoginRequiredMiddleware())
                    ->middleware(new PagesHistoryMiddleware());
        $router->add("/type/(?P<id>\d+)/delete", TypeDeleteController::class)
                    ->middleware(new LoginRequiredMiddleware());
        
        $router->add("/login", LoginController::class);
        $router->add("/logout", LogoutController::class);
        
        $router->get_or_default(Controller404::class);
?>