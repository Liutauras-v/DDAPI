<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/accounts.css">
    <title>Accounts</title>
</head>

<body>
    <?php
    require_once('./mod/header.php');
    $listData = json_decode(file_get_contents('./db/db.json'), true);

    // Render List
    $html = '<table><th>ID</th><th>Name</th><th>Surname</th><th>IBAN</th><th>SSN</th><th>Balance</th><th><a href="./add_account.php">+Add account</a></th>';
    for ($row = 0; $row < count($listData); $row++) {
        $html .= '<tr>';
        foreach ($listData[$row] as $key => $val) {
            $html .= '<td '. ($key == 'balance' ? 'class=\'balance\' ': '' ). '>' . htmlspecialchars($val) . ($key == 'balance' ? '€' : '') . '</td>';
        }
        $html .= '<td>
        <a href="./add_funds.php?&id=' . $listData[$row]['id'] . '">+</a>
        <a href="./remove_funds.php?&id=' . $listData[$row]['id'] . '">-</a>
        <a class="remove" href="./remove_account.php?&id=' . $listData[$row]['id'] . '">X</a>
        </td></tr>';
    }
    echo $html . '</table>';
    echo file_get_contents('./mod/accounts.html');
    ?>


</body>

</html>