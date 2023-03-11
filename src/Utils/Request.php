<?php
namespace AsaP\Utils;

class Request
{
    private $httpMethod;
    private $uri;

    // Constructor to initialize the HTTP method and URI properties of the Request object
    function __construct($httpMethod, $uri)
    {
        $this->httpMethod = $httpMethod;
        $this->uri = $uri;
    }

    // Getter method to retrieve the HTTP method of the request
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    // Getter method to retrieve the URI of the request
    public function getUri()
    {
        return $this->uri;
    }
}