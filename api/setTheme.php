<?php

session_start();

if(isset($_GET['theme']) && ($_GET['theme'] == 'dark' || $_GET['theme'] == 'light')){
    $_SESSION['theme'] = $_GET['theme'];
}