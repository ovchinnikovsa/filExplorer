<?php

namespace App\FileExplorer;

use App\FileExplorer\Path;

class FilePath extends Path
{
    public function getFilePath(): string
    {
        return parent::ROOT_DIR . $this->constructPathString();
    }

    public function getUrlPath(): string
    {
        $urlPath = '/explorer/' . $this->constructPathString();

        return $urlPath;
    }
}