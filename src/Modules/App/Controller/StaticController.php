<?php

namespace App\Controller;

use App\Controller\Controller;
use App\View\View;

class StaticController extends Controller
{
    public static function index(): void
    {
        self::close('index');
    }
    public static function explorer(): void
    {
        self::close('explorer');
    }

    public static function error(array $data): void
    {
        self::close('error', $data);
    }

    protected static function view(string $page, mixed $data = null): string
    {
        $data = $data ?? [];
        return View::render($page, $data);
    }
}