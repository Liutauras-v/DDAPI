<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/global.css">
    <title>Bank</title>
</head>
<body>
    <?php 
    require_once('./mod/header.php');
    // require_once('../../../__backdoor/Conn.php');

    //$db = new Conn();
    ?>
    <div class="index">
        <a href="./accounts.php">Manage accounts</a>
        <a href="./add_funds.php">Send money</a>
        <a href="./remove_funds.php">Remove money</a>
    </div>
    
</body>
</html>