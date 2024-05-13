<?php
        // Подключаем пакеты
        require_once '../vendor/autoload.php';

        // Создаем загрузчик шаблонов, и указываем папку с шаблонами
        // только слеш вместо точек
        $loader = new \Twig\Loader\FilesystemLoader('../views');
    
        // Экземпляр Twig с помощью которого будет рендерить
        $twig = new \Twig\Environment($loader);
        $url = $_SERVER["REQUEST_URI"];
        
        $context = [];
        $template = "";
        $title = "";

        $menu = [["title" => "Главная", "url" => "/"],
                ["title" => "Фрай", "url" => "/Fry"], 
                ["title" => "Бендер", "url" => "/Bender"]];

        $nav_menu = [["name" => "Фрай", "url" => "/Fry"],
                    ["name" => "Бендер", "url" => "/Bender"]];

        if($url == "/"){
            $template = "main.twig";
            $title = "Главная";
        }   
        elseif(preg_match("#^/Fry#", $url)){
            $template = "object.twig";
            $title = "Фрай";
            $context["url"] = "/Fry";
            $context["image"] = "/images/Fry.jpg";
            $context["description"] = "Родился 14 августа 1974 года.\nЗаморозил себя в криогенной камере за несколько секунд до наступления 2000 года.\nРазморозился в конце 2999 года, и в дальнейшем стал курьером в компании «Межпланетный Экспресс».";
            if(preg_match("#^/Fry/image#", $url)){
                $context["is_image"] = true;
                $template = "image.twig";
            }
            elseif(preg_match("#^/Fry/info#", $url)){
                $context["is_info"] = true;
                $template = "info.twig";
            }
        }
        else if(preg_match("#^/Bender#", $url)){
            $template = "object.twig";
            $title = "Бендер";
            $context["url"] = "/Bender";
            $context["image"] = "/images/Bender.jpg";
            $context["description"] = "Был сделан в Мексике в 2997 году. Имеет серийный номер 2716057.\nПьет большое количество алкоголя, чтобы подзарядить свои топливные элементы.\nАвантюрист, любит курить сигары.\nВ настоящее время живет в квартире с Фраем.";
            if(preg_match("#^/Bender/image#", $url)){
                $context["is_image"] = true;
                $template = "image.twig";
            }
            elseif(preg_match("#^/Bender/info#", $url)){
                $context["is_info"] = true;
                $template = "info.twig";
            }
        }
        $context["menu"] = $menu;
        $context["nav_menu"] = $nav_menu;
        $context["title"] = $title;
        
        echo $twig->render($template, $context);
?>