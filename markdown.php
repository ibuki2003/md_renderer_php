<?php

function get_file_path($uri) {
    $base = __DIR__ . '/data/' . $uri;
    if (substr($base, -1) === '/') $base = substr($base, 0, -1);
    return _find_file($base);
}

function _find_file($base) {
    if (file_exists($base)) {
        if (is_dir($base)) return _find_file($base . '/index');
        return [$base, 0];
    }

    if (file_exists($base . '.md'))
        return [$base . '.md', 1];

    if (file_exists($base . '.html'))
        return [$base . '.html', 2];

    return null;
}

function get_md_title($content) {
    if (preg_match('/^# (.+)$/m', $content, $matches) !== 1) return null;
    $title = $matches[1];
    return $title;
}

function get_html_title($content) {
    if (preg_match('/<h1>(.+?)<\/h1>/', $content, $matches) !== 1) return null;
    $title = $matches[1];
    return $title;
}

function get_page_title($uri) {
    $file = get_file_path($uri);

    $title = '';
    if ($file !== null) {
        if ($file[1] === 1) $title = get_md_title(file_get_contents($file[0]));
        if ($file[1] === 2) $title = get_html_title(file_get_contents($file[0]));
        $title ??= basename($file[0]);
    }
    $title ??= basename($uri);
    return $title;
}
