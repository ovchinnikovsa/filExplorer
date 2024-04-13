<?php

namespace App\FileExplorer;

use App\FileExplorer\Path;
use App\FileExplorer\UrlPath;

class FileScanner
{
    const IMAGE_EXT = [
        'jpg',
        'jpeg',
        'png',
        'gif'
    ];
    private Path $path;

    public function __construct(Path $path)
    {
        $this->path = $path;
        if (!is_dir($this->path->getFilePath())) {
            throw new \Exception('Directory not exist');
        }
    }

    public function getPathList(): array
    {
        $pathList = $this->scan();
        foreach ($pathList as $key => &$value) {
            $value_path = $this->path->getFilePath() . '/' . $value;
            $is_dir = is_dir($value_path);
            $link = '#';
            if ($is_dir) {
                $link = $this->getExplorerLink($value);
            } elseif (!$this->isImage($value_path)) {
                unset($pathList[$key]);
                continue;
            }
            $value = [
                'is_dir' => $is_dir,
                'name' => $value,
                'link' => $link,
            ];
        }
        $this->setPathUpLink($pathList);
        return $pathList;
    }

    private function scan(): array
    {
        $dirContent = scandir($this->path->getFilePath());
        $dirContent = array_filter(
            $dirContent,
            function ($value) {

                return $value !== '.' && $value !== '..';
            }
        );
        return $dirContent;
    }

    private function setPathUpLink(array &$pathList): void
    {
        $dirUp = new UrlPath(
            $this->path->getUrlPath()
        );

        try {
            $dirUp->getPathUp();
        } catch (\Exception $exception) {
            return;
        }

        $dirPathUp = $dirUp->getUrlPath();
        if (!empty($dirPathUp)) {
            array_unshift($pathList, [
                'is_dir' => true,
                'name' => '..',
                'link' => $dirPathUp,
            ]);
        }
    }

    private function getExplorerLink(string $dirName): string
    {
        $currentUrl = $this->path->getUrlPath();
        if (substr($currentUrl, -1) !== '/') {
            $currentUrl .= '/';
        }

        $dirPath = new UrlPath($currentUrl . $dirName);
        return $dirPath->getUrlPath();
    }

    function isImage($file)
    {
        if (!file_exists($file)) {
            return false;
        }

        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        return in_array($extension, self::IMAGE_EXT);
    }
}