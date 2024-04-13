<?php

namespace App\Controller;

use App\Controller\Controller;
use App\FileExplorer\FileScanner;
use App\FileExplorer\UrlPath;
use App\View\ViewExplorer;

class ExplorerController extends Controller
{
    public static function explorer($params)
    {
        $path = new UrlPath($params);
        $fileScanner = new FileScanner($path);

        self::close('explorer', $fileScanner->getPathList());
    }

    protected static function view(string $page, mixed $data = null): string
    {
        return ViewExplorer::render($page, $data);
    }
}