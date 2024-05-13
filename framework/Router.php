<?php
// Класс под один маршрут
class Route{
    public string $route_regexp;
    public $controller;

    public function __construct($route_regexp, $controller)
    {
        $this->route_regexp = $route_regexp;
        $this->controller = $controller;
    }
}

class Router{
    protected $routes = [];

    protected $twig;
    protected $pdo;

    public function __construct($twig, $pdo)
    {
        $this->twig = $twig;
        $this->pdo = $pdo;
    }

    // Добавляем маршруты
    public function add($route_regexp, $controller){
        array_push($this->routes, new Route("#^$route_regexp$#", $controller));
    }

    // Функция которая должна по url найти маршрут и вызывать его функцию get
    // Если маршрут не найден, то будет использоваться контроллер по умолчанию
    public function get_or_default($default_controller){
        $url = $_SERVER['REQUEST_URI']; // Получили url

        $controller = $default_controller;

        $matches = [];
        foreach($this->routes as $route){
            // Подходит ли маршрут под шаблон
            if(preg_match($route->route_regexp, $url, $matches)){
                $controller = $route->controller;
                break;
            }
        }
        
        // Создаём экземпляр контроллера
        $controllerInstance = new $controller();
        $controllerInstance->setPDO($this->pdo);
        $controllerInstance->setParams($matches);

        if($controllerInstance instanceof TwigBaseController){
            $controllerInstance->setTwig($this->twig);
        }

        return $controllerInstance->get();
    }
}
?>