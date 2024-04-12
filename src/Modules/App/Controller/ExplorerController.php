<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Controller\StaticController;
use App\FileExplorer\Path;
use App\FileExplorer\FileScanner;
use App\View\ViewExplorer;

class ExplorerController extends Controller
{
    public static function explorer($params)
    {
        $path = new Path($params);
        $fileScanner = new FileScanner($path);

        // TODO: try catch
        self::close('explorer', $fileScanner);
    }

    protected static function view(string $page, mixed $data = null): string
    {
        return ViewExplorer::render($page, $data);
    }
}