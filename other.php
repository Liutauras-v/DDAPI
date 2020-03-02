<?php
define('LOC', 'other')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDAPI: Other</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/other.css">
</head>

<body>
    <?php require_once(__DIR__ . '/views/header.php') ?>

    <h1>Other tools to test:</h1>

    <?php
    $html = '<div class="href-list">';
    $dirs =  array_diff(scandir(__DIR__ . '/other', 1), array('..', '.'));
    for ($i = 0; $i < count($dirs); $i++) {
        if (!file_exists(__DIR__ . '/other/' . $dirs[$i] . '/flavortext.txt') || !($file = file_get_contents(__DIR__ . '/other/' . $dirs[$i] . '/flavortext.txt'))) {
            continue;
        }
        if(!strpos($file, '@@@')){
            continue;
        }
        $html .= ($i + 1) . ') ';
        $flavortext = explode('@@@', $file);
        $html .= '<a href=./other/' . $dirs[$i] . '>' . $flavortext[0] . '</a><span>' . $flavortext[1] . '</span>';
    }
    echo $html . '</div>';
    ?>

</body>

</html>