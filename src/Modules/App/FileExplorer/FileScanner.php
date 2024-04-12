<?php

namespace App\FileExplorer;

use App\FileExplorer\Path;

class FileScanner
{
    private Path $path;

    public function __construct(Path $path)
    {
        $this->path = $path;
        if (!is_dir($this->path->getPath())) {
            throw new \Exception('Directory not exist');
        }
    }

    public function getFiles(): array {
        return $this->scan();
    }
    private function scan(): array
    {
        return scandir($this->path->getPath());
    }
}