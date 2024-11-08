<?php
session_start();
include "../view/header.php";
include "../view/sidebar.php";
include "../view/navbar.php";
?>

<?php
    // $_SES SION['cat'] = [];

if(isset($_POST['addCategory'])){

$errors = [];
  if(empty($_POST['name'])){

    $errors[] = "title is required";

} else if(is_numeric($_POST['name'])){
    $errors[] = "title must be a string";

} else if(strlen($_POST['name']) <= 3){
    $errors[] = "title must be > 3";
}


if(empty($errors)){

  $cat = $_POST['name'];

  if(!isset($_SESSION['cat'])){
    $_SESSION['cat'] = [];
  }
  $_SESSION['cat'][] = $cat;

}

}


?>


      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">

              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Add Category</h3>
                <?php
                if(isset($errors)):

                  foreach ($errors as $error) :
                    

                    echo '<div class="alert alert-danger" role="alert">'.
                    $error.
                  '</div>';
                  
                  endforeach;
                unset($errors);
                endif;
                ?>
                <form method="POST" action="addCategory.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="name" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="addCategory" class="btn btn-primary btn-block enter-btn">Add</button>
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
// print_r($_SESSION['cat']);

 ?>