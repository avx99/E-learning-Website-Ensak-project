<?php

// if (!isset($_SERVER['HTTP_REFERER'])) {
//     die("page inaccesible");
// }

function articles($str)
{
    $text = '';
    if ($file = fopen($str, "r")) {
        while (!feof($file)) {
            $line = fgets($file);
            $text .= $line;
        }
        fclose($file);
    }
    return $text;
}
$java = articles("FilesArticles/java.txt");
$gen = articles("FilesArticles/generale.txt");
$python = articles("FilesArticles/python.txt");
$c = articles("FilesArticles/langageC.txt");
$php = articles("FilesArticles/php.txt");
$js = articles("FilesArticles/javascript.txt");
$hc = articles("FilesArticles/html&css.txt");
$vuejs = articles("FilesArticles/VueJs.txt");
$angular = articles("FilesArticles/angular.txt");
$sql = articles("FilesArticles/sql.txt");
$git = articles("FilesArticles/git.txt");
