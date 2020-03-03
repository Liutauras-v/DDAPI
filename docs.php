<?php
define('LOC', 'docs')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDAPI: DOCS</title>
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/switch.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/docs.css">
</head>

<body>
    <?php require_once(__DIR__ . '/views/header.php') ?>

    <div id="left">
        <?php

        $db = json_decode(file_get_contents('./db/docs.json'), true);
        $html = '';

        for ($i = 0; $i < count($db); $i++) {
            $html .= '<div class="item" info_id="' . $db[$i]['id'] . '">
            <span info_id="' . $db[$i]['id'] . '" class="mt ' . $db[$i]['method'] . '">' . $db[$i]['method'] . '</span>
            <span info_id="' . $db[$i]['id'] . '" class="mono">' . $db[$i]['end_point'] . '</span></div>';
        }

        echo $html;
        ?>
    </div>

    <div id="center"></div>

    <div id="right">
        <?php
        $html = '';

        for ($i = 0; $i < count($db); $i++) {
            $html .= '<div info_id="'.$db[$i]['id'].'" class="item">
            <h2><span class="mt ' . $db[$i]['method'] . '">' . $db[$i]['method'] . '</span> '. $db[$i]['end_point'] . '</h2>
            <p>' . $db[$i]['description'] . '</p>';

            if ($db[$i]['args'] != null) {
               $html .= '<div class="arg-field">';
               
               for ($j=0; $j < count($db[$i]['args']); $j++) { 
                   $html .= '<div class="arg">
                   <div class="arg-topLine">
                   <span class="arg-name">'.$db[$i]['args'][$j]['arg_name'].'</span>
                   <span class="arg-type">'.$db[$i]['args'][$j]['arg_type'].'</span>
                   <span class="arg-req">
                   '.($db[$i]['args'][$j]['arg_req'] ? '(required)' : '(optional)').'
                   </span>
                   </div>
                   <div class="arg-botLine">
                   <p class="arg-desc">'.$db[$i]['args'][$j]['arg_desc'].'</p>
                   </div>
                   </div>';
               }

               $html .= '</div>';
            }


            $html .= '</div>';
        }
        echo $html;
        ?>
    </div>

    <script src="./js/darkmode.js"></script>
    <script src='./js/docs.js'></script>
    <script src='./js/main.js'></script>
</body>

</html>