<?php

function get_file_path($uri) {
    return __DIR__ . '/data/' . $uri;
}

function get_md_title($content) {
    preg_match('/^# (.+)$/m', $content, $matches);
    $title = $matches[1];
    return $title;
}

function get_page_title($uri) {
    return get_md_title(file_get_contents(get_file_path($uri)));
}
