<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDAPI: Distance</title>

</head>

<body>

    <h1>Distance calculator</h1>

    <p>Gets a distance between two cities</p>

    <form action="" method="GET">
        <span>From:</span>
        <input type="text" name="from" value="">
        <span>To:</span>
        <input type="text" name="to" value="">
        <input type="submit" name="btn" value="Get distance">
    </form>

    <?php
    if (isset($_GET['from']) && isset($_GET['to']) && !empty($_GET['from']) && !empty($_GET['to'])) {
        $dist = json_decode(file_get_contents('https://www.distance24.org/route.json?stops=Vilnius|Kaunas'), 1)['distance'];
        echo htmlentities('Distance between ' . $_GET['from'] . ' and ' .$_GET['to'] . ' is ' . $dist . 'km');
    } else {
        if (isset($_GET['btn'])) {
            echo '<br>Bad input data';
        }
    }
    ?>

</body>

</html>