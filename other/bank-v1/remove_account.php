<?php
    $listData = json_decode(file_get_contents('./db/db.json'), true);
    for ($row=0; $row < count($listData); $row++) { 
        if($_GET['id'] == $listData[$row]['id']){
            if($listData[$row]['balance'] != 0){
                $message = "Can't delete a user with balance";
                echo "<script type='text/javascript'>
                alert('$message');
                window.location.replace('/ddapi/other/bank-v1/accounts.php');
                </script>";
            }
            else{
                array_splice($listData, $row, 1);
            }
        }
    }
    file_put_contents('./db/db.json', json_encode($listData));
    echo "<script type='text/javascript'>
    window.location.replace('/ddapi/other/bank-v1/accounts.php');
    </script>";
    header('/ddapi/other/bank-v1/accounts.php');
    die();
?>