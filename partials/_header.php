<?php 
  session_start();
  if(isset($_SESSION['loggedin'])  and  $_SESSION['loggedin'] == true)
    {
      $flag=true;
    }
    else
    {
      $flag=false;
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="./index.php">Tech_Discuss</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active"> 
        <a class="nav-link" href="./about.php">About </a>
      </li>
      <li class="nav-item dropdown active ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php  

          $sql = "SELECT category_id, category_name FROM categories";
          $result = mysqli_query($conn, $sql); 
          while ($row = mysqli_fetch_assoc($result))
          {
            $categoryId = $row['category_id'];
            $categoryName = $row['category_name'];

            echo'
                <a class="dropdown-item" href="/threads.php?catid='.$categoryId.'&catname='.$categoryName.'">'.$categoryName.'</a>
                ';
          }

        ?>

        </div>
      </li>
    </ul>

    <div class="row mx-2">
      <form class="form-inline my-2 my-lg-0" action="/search.php" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        <!-- welcome messege -->
        <?php  
        if($flag == true)
          {
            echo'
                  <span class="text-center text-light font-weight-bold mx-2 text-capitalize">welcome '.$_SESSION["user_name"].' </span> 
                ';
          }
        ?>
      </form>
      
      <?php 
        if($flag == false)
        {
          echo'
              <!-- Button trigger loginModal -->
              <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login </button>

              <!-- Button trigger signupModal -->
              <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#signupModal">Signup </button>
              ';
        }
        elseif($flag == true)
        {
          echo'
              <!-- Button trigger logout -->
              <button type="button" class="btn btn-outline-danger"><a href="/partials/_logoutHandle.php" class="text-danger">Logout </a></button>
              ';
        }
      ?>

    </div>
  </div>
</nav>

<?php require "./partials/_loginModal.php";?>
<?php require "./partials/_signupModal.php";?>