<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/markdown.php';

class GitHubMarkdownMath extends \cebe\markdown\GithubMarkdown {
    public $html5 = true;
    public $enableNewlines = true;

    /**
     * @marker $
     */
    protected function parseTex($markdown) {
        if (preg_match('/^\$(.+?)\$/', $markdown, $match)) {
            return [
                ['tex', $match[1]],
                strlen($match[0])
            ];
        }
        return [['text', '$'], 1];
    }
    // rendering is the same as for block elements, we turn the abstract syntax array into a string.
    protected function renderTex($element) {
        return '<span class="tex">' . htmlspecialchars($element[1]) . '</span>';
    }

    /**
     * @marker \[
     */
    protected function parseTexBlock($markdown) {
        if (preg_match('/^\\\\\\[(.+?)\\\\\\]/', $markdown, $match)) {
            return [
                ['texblock', $match[1]],
                strlen($match[0])
            ];
        }
        return [['text', '$'], 1];
    }
    // rendering is the same as for block elements, we turn the abstract syntax array into a string.
    protected function renderTexBlock($element) {
        return '<p class="tex">' . htmlspecialchars($element[1]) . '</p>';
    }

    /**
     * @marker [[
     */
    protected function parseInternalLink($markdown) {
        if (preg_match('/^\[\[(.+?)\]\]/', $markdown, $match)) {
            $txt = $match[1];
            $pipe_pos = strpos($txt, '|');
            if ($pipe_pos === FALSE) { // path only
                return [
                    ['internallink', $txt, null],
                    strlen($match[0])
                ];
            } else {
                return [
                    ['internallink', substr($txt, 0, $pipe_pos), substr($txt, $pipe_pos+1)],
                    strlen($match[0])
                ];
            }
        }
        return [['text', '[['], 1];
    }

    protected function renderInternalLink($element) {
        $path = $element[1];
        $title = $element[2] ?? get_page_title($path);
        return "<a href=\"{$path}\">{$title}</a>";
    }

    /**
     * @marker ~~
     */
    protected function parseStrike($markdown) {
        if (preg_match('/^~~(.+?)~~/', $markdown, $match)) {
            return [
                ['strike', $match[1]],
                strlen($match[0])
            ];
        }
        return [['text', '~~'], 1];
    }
    // rendering is the same as for block elements, we turn the abstract syntax array into a string.
    protected function renderStrike($element) {
        return '<s>' . $element[1] . '</s>';
    }
}
