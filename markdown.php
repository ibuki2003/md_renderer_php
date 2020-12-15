<?php

function get_file_path($uri) {
    $base = __DIR__ . '/data/' . $uri;
    if (substr($base, -1) === '/') $base = substr($base, 0, -1);

    if (file_exists($base . '.md'))
        return $base . '.md';
    return $base . '/index.md';
}

function get_md_title($content) {
    preg_match('/^# (.+)$/m', $content, $matches);
    $title = $matches[1];
    return $title;
}

function get_page_title($uri) {
    return get_md_title(file_get_contents(get_file_path($uri)));
}
