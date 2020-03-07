<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDAPI: Distance</title>

    <style>
        form, form * {
            display: block;
        }

        input[type="submit"]{
            margin-top: 20px;
        }

    </style>

</head>

<body>

    <h1>Distance calculator</h1>

    <p>Gets a distance between two cities</p>

    <form action="" method="GET">
        <span class="from">From:</span>
        <input id="from" type="text" name="from" value="">
        <span class="to">To:</span>
        <input id="to" type="text" name="to" value="">
        <input id="btn" type="submit" name="btn" value="Get distance">
    </form>

    <?php
    if (isset($_GET['from']) && isset($_GET['to']) && !empty($_GET['from']) && !empty($_GET['to'])) {
        $dist = json_decode(file_get_contents('https://www.distance24.org/route.json?stops=' . $_GET['to'] . '|' . $_GET['from'] . ''), 1)['distance'];
        echo '<div id="output">' . htmlentities('Distance between ' . $_GET['from'] . ' and ' . $_GET['to'] . ' is ' . $dist . 'km') . '</div>';
    } else {
        if (isset($_GET['btn'])) {
            echo '<div id = "output">Bad input data</div>';
        }
    }
    ?>

</body>

</html>