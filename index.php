<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Tech_Discuss - Codeing Forums</title>
  </head>
  <body>
    <?php require "./partials/_dbConnect.php";?>
    <?php require "./partials/_header.php";?>
    <?php require "./partials/_showAlert.php";?>
  
    <!-- add category form handle -->
    <?php 
      if($_SERVER['REQUEST_METHOD'] == POST)
      {
        $category = htmlspecialchars($_POST['category']);
        $categoryDescription = htmlspecialchars($_POST['categoryDescription']);
        $userId = $_SESSION['user_id'];

        if(empty($category) or empty($categoryDescription))
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
        else
        {
          $sql = "SELECT * FROM categories WHERE category_name = '$category'";
          $resultTemp = mysqli_query($conn, $sql);
          if(mysqli_num_rows($resultTemp) > 0)
          {
            echo'
                <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
                  <strong>Failed!</strong> Category already exists.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                ';
          }
          else
          {
            $sql = "INSERT INTO categories (category_name, category_description , category_user_id) VALUES ('$category', '$categoryDescription', $userId)";

            $result = mysqli_query($conn, $sql);

            /*  data could be inserted in database  */   

            if($result)
            {
              echo'
                  <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> Category has been inserted.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  ';
            }
            else
            {
              echo'
              <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Failed!</strong> failed to insert category due to some technical error.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              ';
            }
          }
        }
      }
    ?>

    <?php require "./partials/_carousel.html";?>
    
    <!-- create category form  -->
    <?php  

      if(isset($_SESSION['loggedin'])  and  $_SESSION['loggedin'] == true)
      {
        echo'
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0 text-center">
                    <button class="btn btn-outline-secondary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Add New Category
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <form action="/index.php" method="post">
                      <div class="form-group">
                        <label for="category">Category Name</label>
                        <input type="text" class="form-control" id="category" name="category">
                      </div>
                      <div class="form-group">
                        <label for="categoryDescription">Description</label>
                        <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3"></textarea>
                      </div>
                      <button type="submit" class="btn btn-success">Create </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            ';
      }
        
    ?>

    <!--browse category container starts here-->

    <div class="container" style="min-height:800px;">
      <h2 class="text-center mt-5">Tech_Discuss - Browse Categories</h2>
      <div class="row">
          
          <?php 

            $sql = "SELECT * FROM categories";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result))
            {
              $category_id = $row['category_id'];
              $categoryName = $row['category_name'];
              echo 
                '<div class="col-md-4 my-4">
                  <div class="card style="height: : 30rem;"">
                      <img src="https://source.unsplash.com/700x400/?' . $categoryName . ',computer programming" class="card-img-top" alt="...">
                      <div class="card-body text-center">
                        <h5 class="card-title text-center">' . $categoryName . '</h5>
                        <a href="./threads.php?catid=' . $category_id . '&catname=' .$categoryName. '" class="btn btn-primary">View Thread</a>
                      </div>
                  </div>
                </div> 
              ';
            }
          ?>   
      </div>
    </div>
    <?php require "./partials/_footer.html";?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>