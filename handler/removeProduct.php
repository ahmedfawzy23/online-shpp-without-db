<?php 
session_start();
if(isset($_POST['remove'])){
    $index = $_GET['index'];
    $_SESSION['userCart'] = array_values($_SESSION['userCart']);


    unset($_SESSION['userCart'][ $index]);
}
header('Location: ../cart.php');





// 0 1  3



?>