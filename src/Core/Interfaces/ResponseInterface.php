<?php

interface ResponseInterface
{
    public function setStatusCode($statusCode);
    public function addHeader($name, $value);
    public function setContentType($contentType);
    public function redirect($url);
}