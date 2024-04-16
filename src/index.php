<?php

declare(strict_types=1);
// error_reporting(0);
// session_start();

function is_image(string $file_path): bool
{
    return in_array(pathinfo($file_path, PATHINFO_EXTENSION), IMAGE_EXT);
}

function is_path_accessible(string $path_to_open): bool
{
    chdir($path_to_open);
    $current_path = getcwd();
    return strpos($current_path, ROOT_PATH) !== false;
}

function get_uri_back(string $current_uri): string
{
    $uri_parts = explode('/', $current_uri);
    $uri_parts = array_filter(
        $uri_parts,
        fn($part) => $part !== ''
    );
    if (count($uri_parts) === 0) {
        return '';
    }
    array_pop($uri_parts);
    return '//' . $_SERVER['HTTP_HOST'] . '/' . implode('/', $uri_parts);
}



const ROOT_PATH = __DIR__ . '/files';
const IMAGE_EXT = [
    'jpg',
    'jpeg',
    'png',
    'gif'
];



$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, '/');
$path_to_open = ROOT_PATH . $uri;
$uri_back = get_uri_back($uri);

if (!is_dir($path_to_open)) {
    die('Not found directory');
}

if (!is_path_accessible($path_to_open)) {
    die('Access denied');
}

$files = scandir($path_to_open);
foreach ($files as $file) {
    if ($file === '.') {
        continue;
    } elseif ($file === '..') {
        if ($uri_back === '') {
            continue;
        }
        echo '<a href="' . $uri_back . '">';
        echo $file . '</a><br>';
        continue;
    }

    $file_uri = $uri . '/' . $file;
    $file_path = ROOT_PATH . $file_uri;

    if (is_dir($file_path)) {
        echo "<a href=\"{$file_uri}\">{$file}</a><br>";
    } else if (is_image($file_path)) {
        echo "{$file}<br>";
    }
}
