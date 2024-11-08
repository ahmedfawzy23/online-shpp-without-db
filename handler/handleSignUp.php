<?php 

session_start();

if(isset($_POST['submit'])){

    extract($_POST);


    //validation :

    // username => required | string | min:3
    // email => required | email | unique
    // password => required | string | min:3
    // phone => required | string | min:10
    // address => required | string | min:5

    $errors = [];


    if(empty($username)){

        $errors[] = "Username is required";

    } else if(is_numeric($username)){
        $errors[] = "Username must be a string";

    } else if(strlen($username) <= 3){
        $errors[] = "Username must be > 3";
    }
    
    if(!isset($_SESSION['users'])){
        $_SESSION['users'] = [];
    }
    $email_col = array_column($_SESSION['users'], 'email');
    if(empty($email)){

        $errors[] = "email is required";

    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "email is not valid"; 

    } else if(in_array($email, $email_col)){
        $errors[] = "email is already exist"; 

    }

    if(empty($password)){

        $errors[] = "password is required";

    } else if(!is_string($password)){
        $errors[] = "password must be a string";

    } else if(strlen($password) <= 3){
        $errors[] = "password must be > 3";
    }


    if(empty($phone)){

        $errors[] = "phone is required";

    } else if(!is_string($phone)){
        $errors[] = "phone must be a string";

    } else if(strlen($phone) <= 10){
        $errors[] = "phone must be > 10";
    }


    if(empty($address)){

        $errors[] = "address is required";

    } else if(!is_string($address)){
        $errors[] = "address must be a string";

    } else if(strlen($address) <= 5){
        $errors[] = "address must be > 5";
    }


    if(empty($errors)){

        $user = [

            "username" => $username,
            "email" => $email,
            "password" => $password,
            "phone" => $phone,
            "address" => $address
        ];


        
        $_SESSION['users'][] = $user;

        // echo "<pre>";
        // print_r( $email_col);

    header('Location: ../login.php');


    } else {

        if(!isset($_SESSION['errors'])){
            $_SESSION['errors'] = [];
        }
        $_SESSION['errors'] = $errors;
        header('Location: ../signup.php');
    }


} else {
    header('Location: ../signup.php');
}

?>