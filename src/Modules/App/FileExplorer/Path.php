<?php

namespace App\FileExplorer;

class Path
{
    const ROOT_DIR = __DIR__ . '/../../../files/';
    private $path = self::ROOT_DIR;

    public function __construct(string $path)
    {
        if (!$this->isValid($path)) {
            throw new \Exception('Invalid url');
        }
        $path = substr($path, strlen('/explorer/'));
        $this->path .= $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function isValid(string $path): bool
    {
        return preg_match('#^[a-zA-Z0-9/]+$#', $path) === 1;
    }
}