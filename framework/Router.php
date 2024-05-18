<?php
// Класс под один маршрут
class Route{
    public string $route_regexp;
    public $controller;
    public array $middlewareList = [];

    public function __construct($route_regexp, $controller)
    {
        $this->route_regexp = $route_regexp;
        $this->controller = $controller;
    }

    // Метод, с помощью которого будем добавлять обработчик
    public function middleware(BaseMiddleware $m) : Route {
        array_push($this->middlewareList, $m);
        return $this;
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
    public function add($route_regexp, $controller) : Route{
        // Создаём экземпляр маршрута
        $route = new Route("#^$route_regexp$#", $controller);
        array_push($this->routes, $route);

        // Возвращаем
        return $route;
    }

    // Функция которая должна по url найти маршрут и вызывать его функцию get
    // Если маршрут не найден, то будет использоваться контроллер по умолчанию
    public function get_or_default($default_controller){
        $url = $_SERVER['REQUEST_URI']; // Получили url
        $path = parse_url($url, PHP_URL_PATH);

        $controller = $default_controller;
        $newRoute = null;

        $matches = [];
        foreach($this->routes as $route){
            // Подходит ли маршрут под шаблон
            if(preg_match($route->route_regexp, $path, $matches)){
                $controller = $route->controller;
                $newRoute = $route;
                break;
            }
        }
        
        // Создаём экземпляр контроллера
        $controllerInstance = new $controller();
        $controllerInstance->setPDO($this->pdo);
        $controllerInstance->setParams($matches);

        // Вызываем обработчики middleware, если есть
        if($newRoute){
            foreach($newRoute->middlewareList as $m){
                $m->apply($controllerInstance, []);
            }
        }

        if($controllerInstance instanceof TwigBaseController){
            $controllerInstance->setTwig($this->twig);
        }

        return $controllerInstance->process_response();
    }
}
?>