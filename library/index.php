<?php
/**
 * Created by PhpStorm.
 * User: atsushi
 * Date: 2018/03/25
 * Time: 18:23
 */

require_once(__DIR__ . '/parsedown/Parsedown.php');

$parser = new Parsedown();
$content = $parser->text(file_get_contents(__DIR__ . '/README.md'));
?>
<html lang="ja-jp">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="generator" content="Joomla! - Open Source Content Management" />
    <title>tom-gs.com - HOME</title>
    <link href="https://raw.githubusercontent.com/mixu/markdown-styles/master/layouts/github/assets/css/github-markdown.css"
          rel="stylesheet" />
    <link href="https://raw.githubusercontent.com/mixu/markdown-styles/master/layouts/github/assets/css/hljs-github.min.css" rel="stylesheet" />
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>
<body>
<div class="markdown-body markdown"><?php echo $content; ?></div>
</body>
</html>