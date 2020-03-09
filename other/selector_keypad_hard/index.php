<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDAPI: Keypad</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

   
    <div id ="keypad">
        <?php

        function newDiv($key)
        {
            $r = rand(0,5);

            if($key == 'del' || $key == '#'){
                return "<div>$key</div>";
            }

            switch($r){
                case 0:
                    return "<div id='$key'></div>";
                break;
                case 1:
                    return "<div class='$key'></div>";
                break;
                case 2:
                    return "<div name='$key'></div>";
                break;
                case 3:
                    return "<div key='$key'></div>";
                break;
                case 4:
                    return "<div $key='key'></div>";
                break;
                case 5:
                    return "<div>$key</div>";
                break;
            }
        }

        $keys = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '#', 'del'];
        shuffle($keys);
        $html = '';

        foreach ($keys as $key) {
            $html .= newDiv($key);
        }
        echo $html;

        ?>
    </div>

        <br><br>
        <span>To do: </span><input type="text" id="todo" readonly>
        <br><br>
        <span>Input: </span><input type="text" id="input" readonly>
        <input type="button" id="submit" value="Click">
        <br><br>
        <div id='output'></div>
    <script src="main.js"></script>
</body>

</html>