<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/GitHubMarkdownMath.php';
require_once __DIR__ . '/markdown.php';

$file = get_file_path($_SERVER["REQUEST_URI"]);
if ($file === null) {
    http_response_code(404);
    exit;
}

$mode = $file[1];
$file = $file[0];

$src = file_get_contents($file);

$title = '';
if ($mode === 1) {
    $title = get_md_title($src);

    $renderer = new GitHubMarkdownMath();
    $content = $renderer->parse($src);
} else if($mode === 2) {
    $title = get_html_title($src);
    $content = $src;
} else {
    echo $src;
    exit;
}

include __DIR__ . '/template.php';
