<?php

namespace AsaP\Utils;

use FastRoute;

use AsaP\Main;
use AsaP\Controllers\HomeController;
use AsaP\Controllers\ArticleController;
use AsaP\Utils\View;

class Router extends Main
{
    private $dispatcher;
    private $httpMethod;
    private $uri;

    function __construct($request)
    {
        // Get HTTP method and URI from request object
        $this->httpMethod = $request->getHttpMethod();
        $this->uri = $request->getUri();

        // Create dispatcher using FastRoute
        $this->dispatcher = $this->getRoutes();
    }

    public function process()
    {
        // Use dispatcher to match URI to a route
        $routeInfo = $this->dispatcher->dispatch($this->httpMethod, $this->uri);

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($this->uri, '?')) {
            $this->uri = substr($this->uri, 0, $pos);
        }
        $this->uri = rawurldecode($this->uri);

        // Handle different types of route matches
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // Return 404 Not Found error
                die('NOT_FOUND');
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                // Return 405 Method Not Allowed error
                $allowedMethods = $routeInfo[1];
                die('Not Allowed');
                break;
            case FastRoute\Dispatcher::FOUND:
                // Call handler function for matching route
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];

                print $handler($vars);
                break;
        }
    }

    private function getRoutes()
    {
        // Define routes using FastRoute syntax
        return FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
            $r->get('/AppCore/', function () {
                // Handle home page route with HomeController
                $controller = new HomeController();
                $view = new View($controller);
                $view->render();
            });
            $r->get('/AppCore/article/{slug}.{id}', function ($args) {
                // Handle article route with ArticleController
                $controller = new ArticleController($args);
                $view = new View($controller);
                $view->render();
            });
        });
    }
}