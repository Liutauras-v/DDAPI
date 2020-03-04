<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/add_account.css">
    <title>Add user</title>
</head>

<body>

    <?php
    require_once('./mod/header.php');

    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['SSN'])) {
        $listData = json_decode(file_get_contents('./db/db.json'), true);

        if(strlen($_POST['name']) < 3 || strlen($_POST['surname']) < 3){
            $message = "Name or Surname is too short";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location.replace('/ddapi/other/bank-v1/accounts.php');
            </script>";
            header('/ddapi/other/bank-v1/accounts.php');
            die();
        }

        if (!validSSN($listData, $_POST['SSN'])) {
            $message = "Invalid SSN";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location.replace('/ddapi/other/bank-v1/accounts.php');
            </script>";
            header('/ddapi/other/bank-v1/accounts.php');
            die();
        }


        $newData = new stdClass();
        $newData->id = genUID($listData);
        $newData->name = $_POST['name'];
        $newData->surname = $_POST['surname'];
        $newData->IBAN = genIBAN($listData);
        $newData->SSN = $_POST['SSN'];
        $newData->balance = 0;


        array_push($listData, $newData);
        file_put_contents('./db/db.json', json_encode($listData));


        header('Location: /ddapi/other/bank-v1/accounts.php');
        die();
    }

    function genUID($listData)
    {
        $id = rand(0, 99999);
        for ($row = 0; $row < count($listData); $row++) {
            if ($id == $listData[$row]['id']) {
                return genUID($listData);
            }
        }

        return $id;
    }

    function genIBAN($listData)
    {
        $IBAN = 'LT2414000';
        for ($i = 0; $i < 11; $i++) {
            $IBAN .= rand(0, 9);
        }
        for ($row = 0; $row < count($listData); $row++) {
            if ($IBAN == $listData[$row]['IBAN']) {
                return genIBAN($listData);
            }
        }

        return $IBAN;
    }

    function validSSN($listData, $SSN)
    {
        if (strlen($SSN) != 11 || !is_numeric($SSN) || is_float(intval($SSN))) {
            return false;
        }

        if (!preg_match('/[1-6]/', substr($SSN, 0, 1))) {
            return false;
        }

        if(!validDateFromSSN($SSN)){
            return false;
        }

        for ($row = 0; $row < count($listData); $row++) {
            if ($SSN == $listData[$row]['SSN']) {
                return false;
            }
        }
        return true;
    }

    function validDateFromSSN($SSN){
        $day = substr($SSN, 5, 2);
        $month = substr($SSN, 3, 2);
        $year = null;
        if(substr($SSN, 0, 1) == 1 || substr($SSN, 0, 1) == 2){
            $year = '18';
        }
        else if(substr($SSN, 0, 1) == 3 || substr($SSN, 0, 1) == 4){
            $year = '19';
        }
        else if(substr($SSN, 0, 1) == 5 || substr($SSN, 0, 1) == 6){
            $year = '20';
        }
        else{
            return false;
        }
        $year .= substr($SSN, 1, 2);

        return checkdate($month, $day, $year);
    }


    ?>

    <h1>Create a new user</h1>
    <div class="form">
        <form action="" method="POST">
            <span>First name:</span>
            <input type="text" name="name" value="">
            <span>Last name:</span>
            <input type="text" name="surname" value="">
            <span>SSN:</span>
            <input type="text" name="SSN" value="">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>