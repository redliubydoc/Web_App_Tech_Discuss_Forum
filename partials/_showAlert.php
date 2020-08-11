<?php 
/* logout, signup, login  alert handle   */

  if($_SERVER['REQUEST_METHOD'] == GET && isset($_GET['showAlert']))
  {
    $showAlert = $_GET['showAlert'];
    if($showAlert == 1)
    {
        echo'
            <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
              <strong>Try Again!</strong> No field can be empty.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
    elseif($showAlert == 2)
    {
        echo'
            <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
              <strong>Duplicate Email!</strong> Email already exist, try again using another email id.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
    elseif($showAlert == 3)
    {
        echo'
            <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
              <strong>Password didnot match!</strong> make sure to enter same password.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
    elseif($showAlert == -1)
    {
        echo'
            <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
              <strong>Error!</strong> Cannot signup due to some technical error.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
    elseif($showAlert == 0)
    {
        echo'
            <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Signup Successful!</strong> You are now logged in.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
    elseif($showAlert == -2)
    {
        echo'
            <div class="alert alert-primary alert-dismissible fade show my-0" role="alert">
              <strong>Logout Successful!</strong> You have been logged out.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
    elseif($showAlert == 4)
    {
        echo'
            <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Login Successful!</strong> You are now logged in.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
    elseif($showAlert == -4)
    {
        echo'
            <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
              <strong>Login failed!</strong> Invalid credentials.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            ';
    }
  }
?>