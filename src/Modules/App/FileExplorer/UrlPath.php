<?php

namespace App\FileExplorer;

use App\FileExplorer\Path;

class UrlPath extends Path
{
    public function getFilePath(): string
    {
        $filePath = parent::ROOT_DIR;
        $filePath .= $this->constructPathString();
        $filePath = str_replace('explorer', '', $filePath);
        $filePath = str_replace('//', '/', $filePath);

        return $filePath;
    }

    public function getUrlPath(): string
    {
        return $this->constructPathString();
    }
}