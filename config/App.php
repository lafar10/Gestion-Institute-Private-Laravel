<?php

session_start();
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_DATABASE','php');
define('DB_PASSWORD','');
define('SITE_URL','http://localhost/PHP_POO/');

include_once('DBConnection.php');

$db = new DBConnection;


function base_url($slug)
{
    echo SITE_URL.$slug;
}

function isAdmin()
{
    if ($_SESSION['user_role_as'] === '1') {
        return true;
    } else {
        redirectTo('Access Denied As You Are An Admin', 'pages/Home.php');
    }
}
function redirectTo($message,$page)
{
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    
    header("Location: $redirectTo");
    exit();
}

function validateInput($dbcon,$input)
{
    return mysqli_real_escape_string($dbcon,$input);
}


?>