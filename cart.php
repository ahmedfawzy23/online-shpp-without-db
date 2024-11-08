<?php
// session_start();

// $_SESSION['userCart'] = [];
include 'header.php' ?>
<?php include 'navbar.php' ;
if(!isset($_SESSION['login'])){
    header('Location: login.php');
  }

?>

<?php

if(isset($_POST['submit'])){

    $index = $_GET['index'];
    $cart = $_SESSION['products'][$index];
    $userQuantity = $_POST['quantity'];

    if(empty($userQuantity) && $userQuantity!= 0){
        $userQuantity = 1;
    }



        $errors = [];

    if(!is_numeric($userQuantity) || $userQuantity < 1){
        $errors[] = "quantity not valid";
    } else if($userQuantity > $cart['quantity']){
        $errors[] = "quantity not valid";
    } else {
        $_SESSION['products'][$index]['quantity'] -= $userQuantity;
        $quantityOfProduct = ["userQuantity" => $userQuantity];
        $finalCart = array_merge($cart, $quantityOfProduct);

        // print_r($finalCart);

        if(!isset($_SESSION['userCart'])){
            $_SESSION['userCart'];
        }
        $_SESSION['userCart'][] = $finalCart;
        
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        header("Location: shop.php");
    }


    // print_r($_SESSION['products'][$index]);
}

?>

<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    <td>Edit</td>
                </tr>
            </thead>

            <tbody>
<?php if(isset($_SESSION['userCart'])): 
$finalPrice = 0;
$index = 0;

    foreach($_SESSION['userCart'] as $item):
        $subTotal = $item['price'] * $item['userQuantity'];
    ?>
                <tr>
                    <td><img src="admin/upload/<?= $item['imgName']?>" alt="product1"></td>
                    <td><?= $item['title']?></td>
                    <td><?= $item['desc']?></td>
                    <td><?= $item['userQuantity']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $subTotal?></td>
                    
                    <!-- Remove any cart item  -->
            <form action = "handler/removeProduct.php?index=<?= $index?>" method = "post">

                    <td><button type="submit" name = "remove"  class="btn btn-danger">Remove</button></td>
    </form>
                    
                
                </tr>

                <?php
                $finalPrice += $subTotal;
           $index ++;

            endforeach;

            endif; ?>
            </tbody>
            <!-- confirm order  -->

                <td><button type="submit" name="remove" class="btn btn-success">Confirm</button></td>
            
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><?= $finalPrice ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong><?= $finalPrice?></strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section>

    <?php include "footer.php" ?>

