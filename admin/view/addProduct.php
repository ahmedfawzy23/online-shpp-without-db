<?php
session_start();



include "../view/header.php";

include "../view/sidebar.php";
include "../view/navbar.php";

?>


<div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Product</h3>

<?php 

if(isset($_POST['addProduct'])){
  extract($_POST);
  $img = $_FILES['img'];
  $imgName = $img['name'];
  $imgTmpName = $img['tmp_name'];
  $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
  $extensions = ['png', 'jpg', 'jpeg'];

  if(empty($title) || empty($desc) || empty($price) || empty($quantity)){
    echo '<div class="alert alert-danger" role="alert"> all inputs is required </div>';
  } else if(!in_array($imgEx, $extensions)){
    echo '<div class="alert alert-danger" role="alert"> please choose valid image </div>';

  } else {

    $imageNewName = uniqid()."."."$imgEx";


    $products = [

      "title" => $title,
      "cat" => $cat,
      "desc" => $desc,
      "price" => $price,
      "quantity" => $quantity,
      "imgName" => $imageNewName
    ];

    if(!isset($_SESSION['products'])){
      $_SESSION['products'] = [];
    }
    $_SESSION['products'][] = $products;
  
  
move_uploaded_file($imgTmpName, "../upload/$imageNewName");
}
}

if(isset($_SESSION['products'] )){
  print_r($_SESSION['products'] );
}

?>

      
                <form method="POST" action="addProduct.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <select name="cat" class="form-control p_input">
                      <?php foreach ($_SESSION['cat'] as $cat) {?>
                        
                        <option value = "<?= $cat ?>"><?= $cat ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="img" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addProduct" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

<?php 
include "../view/footer.php";
 ?>