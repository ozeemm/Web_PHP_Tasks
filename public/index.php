<?php
        // Подключаем пакеты
        require_once '../vendor/autoload.php';
        require_once '../Controllers/MainController.php';
        require_once "../controllers/Controller404.php";

        require_once '../Controllers/BenderController.php';
        require_once '../Controllers/BenderImageController.php';
        require_once '../Controllers/BenderInfoController.php';

        require_once '../Controllers/FryController.php';
        require_once '../Controllers/FryImageController.php';
        require_once '../Controllers/FryInfoController.php';

        // Создаем загрузчик шаблонов, и указываем папку с шаблонами
        // только слеш вместо точек
        $loader = new \Twig\Loader\FilesystemLoader('../views');
    
        // Экземпляр Twig с помощью которого будет рендерить
        $twig = new \Twig\Environment($loader, [
            "debug" => true // добавляем тут debug режим
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension()); // активируем расширение

        $url = $_SERVER["REQUEST_URI"];

        $controller = new Controller404($twig); // Переменная под контроллер

        $pdo = new PDO("mysql:host=localhost:3307;dbname=futurama;charset=utf8", "root", ""); // Подключаемся к БД

        if($url == "/"){
            $controller = new MainController($twig);
        }   

        elseif(preg_match("#^/Fry/image#", $url)){
            $controller = new FryImageController($twig);
        }
        elseif(preg_match("#^/Fry/info#", $url)){
            $controller = new FryInfoController($twig);
        }
        elseif(preg_match("#^/Fry#", $url)){
            $controller = new FryController($twig);
        }

        elseif(preg_match("#^/Bender/image#", $url)){
            $controller = new BenderImageController($twig);
        }
        elseif(preg_match("#^/Bender/info#", $url)){
            $controller = new BenderInfoController($twig);
        }
        elseif(preg_match("#^/Bender#", $url)){
            $controller = new BenderController($twig);
        }

        if($controller){
            $controller->setPDO($pdo);
            $controller->get();
        }
?>