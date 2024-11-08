<?php 

session_start();
if(isset($_GET['lang'])){

    if(!isset($_SESSION['lang'])){
        $_SESSION['lang'] = 'en';
    }

    if($_GET['lang'] == 'en'){
        $_SESSION['lang'] = 'en';

    } else {
        $_SESSION['lang'] = 'ar';
    }

    // echo "<pre>"
    // ;    print_r($_SERVER);
}
header('location: '.$_SERVER['HTTP_REFERER']);