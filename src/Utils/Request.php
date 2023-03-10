<?php
namespace AsaP\Utils;

class Request
{
    private $httpMethod;
    private $uri;

    function __construct($httpMethod, $uri)
    {
        $this->httpMethod = $httpMethod;
        $this->uri = $uri;
    }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    public function getUri()
    {
        return $this->uri;
    }
}
