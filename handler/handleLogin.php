<?php 

session_start();

if(isset($_POST['submit'])){

    extract($_POST);



    // username => required | string | min:3
    // email => required | email | unique
    // password => required | string | min:3
    // phone => required | string | min:10
    // address => required | string | min:5

    $errors = [];



    if(empty($email)){

        $errors[] = "email is required";

    }

    if(empty($password)){

        $errors[] = "password is required";

    }



    if(empty($errors)){


        
    $email_col = array_column($_SESSION['users'], 'email');
    $password_col = array_column($_SESSION['users'], 'password');


    $email_key = array_search($email, $email_col);
    $password_key = array_search($password, $password_col);


if($email == "admin@gmail.com" && $password == "admin"){
    header("location: ../admin/view/layout.php");
} else if(in_array($email, $email_col) && in_array($password, $password_col) && $email_key == $password_key){


    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = [];
    }

$_SESSION['user'] = $_SESSION['users'][$email_key];

if(!isset($_SESSION['login'])){
    $_SESSION['login'] = [];
}

$_SESSION['login'] = true;

header('Location: ../shop.php');

} else {
    if(!isset($_SESSION['errors'])){
        $_SESSION['errors'] = [];
    }
    $_SESSION['errors'][] = "email or password is wrong";
    header('Location: ../login.php');

}




    } else {

        if(!isset($_SESSION['errors'])){
            $_SESSION['errors'] = [];
        }
        $_SESSION['errors'] = $errors;
        header('Location: ../login.php');
    }


} else {
    header('Location: ../login.php');
}

?>