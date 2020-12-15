<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/GitHubMarkdownMath.php';
require_once __DIR__ . '/markdown.php';

$file = get_file_path($_SERVER["REQUEST_URI"]);
$markdown = file_get_contents($file);
$title = get_md_title($markdown);

$renderer = new GitHubMarkdownMath();
$content = $renderer->parse($markdown);

include __DIR__ . '/template.php';
