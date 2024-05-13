<?php
    // Подключаем пакеты
    require_once '../vendor/autoload.php';

    // Создаем загрузчик шаблонов, и указываем папку с шаблонами
    // только слеш вместо точек
    $loader = new \Twig\Loader\FilesystemLoader('../views');

    // Экземпляр Twig с помощью которого будет рендерить
    $twig = new \Twig\Environment($loader);

    $url = $_SERVER["REQUEST_URI"];
    $title = "";
    $template = "";
    $context = []; // Пустой словарик
    $menu = [["title" => "Главная", "url" => "/"],
            ["title" => "Древо", "url" => "/tree"],
            ["title" => "Ручеёк", "url" => "/water"]];

    if($url == "/"){
        $title = "Главная";
        $template = "main.twig";
    }
    elseif($url == "/tree"){
        $title = "Древо";
        $template = "base_image.twig";
        $context["image"] = "/images/tree.jpg";
    }
    elseif($url == "/water"){
        $title = "Ручеёк";
        $template = "base_image.twig";
        $context["image"] = "/images/water.jpg";
    }
    $context["menu"] = $menu;
    $context["title"] = $title;

    echo $twig->render($template, $context);
?>