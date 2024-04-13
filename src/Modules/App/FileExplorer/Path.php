<?php

namespace App\FileExplorer;

abstract class Path
{
    const ROOT_DIR = __DIR__ . '/../../../files';

    protected array $path;

    public function __construct(string $path)
    {
        if (!$this->isValid($path)) {
            throw new \Exception('Invalid path');
        }
        $this->path = array_filter(explode('/', $path), 'strlen');
    }

    public function getPathUp(): void
    {
        $pathUp = array_slice($this->path, 0, -1);
        $this->path = $pathUp;
        if  (empty($pathUp)) {
            throw new \Exception('No path up');
        }
    }

    abstract public function getFilePath(): string;

    abstract public function getUrlPath(): string;

    protected function constructPathString(): string
    {
        return '/' . implode('/', $this->path);
    }

    protected function isValid(string $urlPath): bool
    {
        return preg_match('#^[a-zA-Z0-9/]+$#', $urlPath) === 1;
    }
}