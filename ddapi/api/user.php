<?php

$db = json_decode(file_get_contents('../db/user.json'), true);
parse_str(file_get_contents("php://input"), $post_vars);


function is_digit($digit)
{
    if (is_int($digit)) {
        return true;
    } elseif (is_string($digit)) {
        return ctype_digit($digit);
    } else {
        return false;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET['id'])) {
        $reArr = array();
        for ($i = 0; $i < count($db); $i++) {
            $re = new stdClass();
            $re->id = $db[$i]['id'];
            $re->username = $db[$i]['username'];
            $re->poke_count = $db[$i]['poke_count'];
            array_push($reArr, $re);
        }
        header('Content-Type: application/json');
        echo json_encode($reArr);
        die();
    } else {
        for ($i = 0; $i < count($db); $i++) {
            if ($db[$i]['id'] == $_GET['id']) {
                $re = new stdClass();
                $re->id = $db[$i]['id'];
                $re->username = $db[$i]['username'];
                $re->poke_count = $db[$i]['poke_count'];
                header('Content-Type: application/json');
                echo json_encode($re);
                die();
            }
        }
        http_response_code(404);
        echo 'User by id not found';
        die();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($post_vars['id']) || !isset($post_vars['username'])) {
        http_response_code(400);
        echo 'Invalid data';
        die();
    }

    if (!is_digit($post_vars['id'])) {
        http_response_code(400);
        echo 'Invalid data: This \'id\' is not a valid number';
        die();
    }

    if (strlen($post_vars['username']) <= 2) {
        http_response_code(400);
        echo 'Invalid data: Username lenght is too short';
        die();
    }

    for ($i = 0; $i < count($db); $i++) {
        if ($db[$i]['id'] == $post_vars['id']) {
            http_response_code(400);
            echo 'ID already registered';
            die();
        }
    }



    $re = new stdClass();
    $re->id = $post_vars['id'];
    $re->username = $post_vars['username'];
    $re->poke_count = 0;

    array_push($db, $re);
    file_put_contents('../db/user.json', json_encode($db));

    echo 'User was created!';
    die();
} else if ($_SERVER['REQUEST_METHOD'] === "DELETE") {

    if (!isset($post_vars['id'])) {
        http_response_code(400);
        echo 'Invalid data';
        die();
    }


    for ($i = 0; $i < count($db); $i++) {
        if ($db[$i]['id'] == $post_vars['id']) {
            array_splice($db, $i, 1);
            file_put_contents('../db/user.json', json_encode($db));
            echo 'User was deleted';
            die();
        }
    }

    http_response_code(400);
    echo 'User was not found';
    die();
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if (!isset($post_vars['id']) || !isset($post_vars['username'])) {
        http_response_code(400);
        echo 'Invalid data';
        die();
    }

    if (strlen($post_vars['username']) <= 2) {
        http_response_code(400);
        echo 'Invalid data: Username lenght is too short';
        die();
    }


    for ($i = 0; $i < count($db); $i++) {
        if ($db[$i]['id'] == $post_vars['id']) {
            $db[$i]['username'] = $post_vars['username'];
            file_put_contents('../db/user.json', json_encode($db));
            echo 'User was edited';
            die();
        }
    }

    http_response_code(400);
    echo 'User was not found';
    die();
} else {
    http_response_code(404);
    echo '404 Not found';
    die();
}
