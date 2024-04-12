<?php

namespace App\View;


class View
{
    const PAGE_PATH = __DIR__ . '/pages/';

    public static function render(string $page, array $data = []): string
    {
        if (!file_exists(self::PAGE_PATH . $page . '.php')) {
            throw new \Exception("Page not found", 1);
        }
        extract($data);
        ob_start();
        include self::PAGE_PATH . $page . '.php';
        return ob_get_clean();
    }
}
