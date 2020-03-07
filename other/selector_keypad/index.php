<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDAPI: Keypad</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

    


    <form action="" method="GET">
        <input type="text" name="from">
        <input type="text" name="to">
        <input type="submit" value="Click">
    </form>




    <?php

    if(isset($_GET['from']) && isset($_GET['to'])){

        // _dc( json_decode(file_get_contents('https://www.distance24.org/route.json?stops=Vilnius|Kaunas'), true)['distance']);
    }

    echo file_get_contents('https://liutaurasvijeikis.com/ddapi/api/user.php');

    ?>


















    <div>
        <?php

        // function newDiv($key)
        // {
        //     $r = rand(0,5);

        //     if($key == 'del' || $key == '#'){
        //         return "<div id='$key'>$key</div>";
        //     }

        //     switch($r){
        //         case 0:
        //             return "<div id='$key'></div>";
        //         break;
        //         case 1:
        //             return "<div class='$key'></div>";
        //         break;
        //         case 2:
        //             return "<div name='$key'></div>";
        //         break;
        //         case 3:
        //             return "<div key='$key'></div>";
        //         break;
        //         case 4:
        //             return "<div $key='key'></div>";
        //         break;
        //         case 5:
        //             return "<div'>$key</div>";
        //         break;
        //     }
        // }

        // $keys = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '#', 'del'];
        // shuffle($keys);
        // $html = '';

        // foreach ($keys as $key) {
        //     $html .= newDiv($key);
        // }
        // echo $html;

        ?>
    </div>

    <script src="main.js"></script>
</body>

</html>