<?php

namespace App\View;

use App\FileExplorer\FileScanner;


class ViewExplorer
{
    const PAGE_PATH = __DIR__ . '/pages/';

    public static function render(string $page, FileScanner $fileScanner): string
    {
        if (!file_exists(self::PAGE_PATH . $page . '.php')) {
            throw new \Exception("Page not found", 1);
        }
        ob_start();
        include self::PAGE_PATH . $page . '.php';
        return ob_get_clean();
    }
}
