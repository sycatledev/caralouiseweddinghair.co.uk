<?php


namespace AsaP\Utils;

use AsaP\Controllers\HomeController;
use AsaP\Controllers\ArticleController;
use FastRoute;
use AsaP\Main;

use AsaP\Utils\View;

class Router extends Main
{
    private $dispatcher;
    private $httpMethod;
    private $uri;

    function __construct($request)
    {
        $this->httpMethod = $request->getHttpMethod();
        $this->uri = $request->getUri();

        $this->dispatcher = $this->getRoutes();
    }

    public function process()
    {
        $routeInfo = $this->dispatcher->dispatch($this->httpMethod, $this->uri);
        
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($this->uri, '?')) {
            $this->uri = substr($this->uri, 0, $pos);
        }
        $this->uri = rawurldecode($this->uri);

        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                die('NOT_FOUND');
                // ... 404 Not Found
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                die('Not Allowed');
                break;
            case FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
              
                print $handler($vars);
                break;
        }
    }

    private function getRoutes()
    {
        return FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
            $r->addRoute("GET", '/AppCore/', function() {
                $controller = new HomeController();
                $view = new View($controller);
                $view->render();
            });
            $r->addRoute('GET', '/AppCore/article/{slug}.{id}', function ($args) {
                $controller = new ArticleController($args);
                $view = new View($controller);
                $view->render();
            });
        });
    }


}