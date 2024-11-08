
<?php
// session_start();

include "header.php";
include "navbar.php";
// print_r($_SESSION['errors']);
?>






              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Register</h3>
                <?php
                if(isset($_SESSION['errors'])):

                  foreach ($_SESSION['errors'] as $error) :
                    

                    echo '<div class="alert alert-danger" role="alert">'.
                    $error.
                  '</div>';
                  
                  endforeach;
                unset($_SESSION['errors']);
                endif;
                ?>
                <form action = "handler/handleSignUp.php" method = "post">
                  <div class="form-group">
                    <label>Username</label>
                    <input name = "username" type="text" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name = "email" type="email" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input name = "password" type="text" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input name = "phone" type="text" class="form-control p_input" >
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input name = "address" type="text" class="form-control p_input" >
                  </div>
              
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button name = "submit" type="submit"  class="btn btn-primary btn-block enter-btn">Signup</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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

    <?php include "footer.php" ?>