<?php

declare(strict_types=1);

$directory = __DIR__;

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(
        $directory,
        FilesystemIterator::SKIP_DOTS
    )
);

$files = [];

foreach ($iterator as $file) {
    if (!$file->isFile() || $file->getExtension() !== 'php') {
        continue;
    }

    if ($file->getRealPath() === __FILE__) {
        continue;
    }

    $files[] = $file->getRealPath();
}

sort($files);

foreach ($files as $file) {
    require_once $file;
}