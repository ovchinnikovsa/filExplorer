<?php

namespace App\View;


class View
{
    const PAGE_PATH = __DIR__ . '/pages/';

    public static function explorer() {
        $data = [
            // getting data to render
        ];
        echo self::render('explorer', $data);
    }

    private static function render($page, $data = [])
    {
        extract($data);
        ob_start();
        include self::PAGE_PATH . $page . '.php';
        return ob_get_clean();
    }
}
