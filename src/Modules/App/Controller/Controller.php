<?php

namespace App\Controller;

abstract class Controller
{
    abstract protected static function view(string $page, mixed $data = null): string;

    protected static function close(string $page, mixed $data = null): void
    {
        echo static::view($page, $data);
        die();
    }
}