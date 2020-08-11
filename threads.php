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
    
    <!-- form handle -->

    <?php

      $categoryId = $_GET['catid'];
      $categoryName = $_GET['catname'];

      if($_SERVER['REQUEST_METHOD'] == POST and isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == true)
      {
        $threadTitle = htmlspecialchars($_POST['threadTitle']);
        $threadDescription = htmlspecialchars($_POST['threadDescription']);

        if(empty($threadTitle) or empty($threadDescription))
        {
          echo'
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Your question cannot be added! </strong> Title or Description cannot be empty.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              ';
        }
        else
        {
          
          $userId = $_SESSION['user_id'];

          $sql = "INSERT INTO threads (thread_category_id, thread_user_id, thread_topic, thread_description) VALUES ($categoryId, $userId, '$threadTitle', '$threadDescription')";
          $showAlert = mysqli_query($conn, $sql);
        
          if($showAlert)
          {
            echo'
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> Your question has been added, please wait for community to respond.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
          }
          else
          {
            echo'
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Your question cannot be added! </strong> Site is down due to some technical issue, sorry for inconvenience
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                ';
          }
        }
      }
    ?>

    <!-- display category title and details in jumbotron -->

    <?php
      
      $sql = "SELECT * FROM categories WHERE category_id=$categoryId";

      $result = mysqli_query($conn, $sql);
      $record = mysqli_fetch_assoc($result);

      $categoryDescription = $record['category_description'];
      $categoryCreationTime = $record['category_creation_time'];
      $categoryUserId = $record['category_user_id'];

      $sql = "SELECT * FROM users WHERE user_id=$categoryUserId";
      $result = mysqli_query($conn, $sql);

      $record = mysqli_fetch_assoc($result);
      $userName = $record['user_name'];

      echo'
      <div class="container my-5">
        <div class="jumbotron">
          <h2 class="display-4 text-center pb-4">Welcome To ' . $categoryName . ' Forum</h2>
          <p class="lead">' . $categoryDescription . '</p>
          <p class="text-right font-weight-bold font-italic text-muted">category created by ' . $userName . ' on ' . $categoryCreationTime . '</p>
          <hr class="my-4">
          <p class="font-weight-bold">Forum Rules <br>1. No Spam / Advertising / Self-promote in the forums <br>2. Do not post copyright-infringing material <br>3. Do not post “offensive” posts, links or images <br>4. Do not cross post questions <br> 5. Do not PM users asking for help <br>6. Remain respectful of other members at all times</p>
        </div>
      </div>
      ';
    ?>

    <!-- display question post form -->
    <?php  

      if(isset($_SESSION['loggedin'])  and  $_SESSION['loggedin'] == true)
      {
        echo'
              <div class="container">
                  <h3 for="threadTitle" class="my-5">Ask Qusetion</h3>
                  <form action="'. $_SERVER["REQUEST_URI"] .'"  method="post">
                    <div class="form-group">
                      <label for="threadTitle">Title</label>
                      <input type="text" class="form-control" id="threadTitle" name="threadTitle">
                    </div>
                  
                    <div class="form-group">
                      <label for="threadDescription">Elaborate</label>
                      <textarea class="form-control" id="threadDescription"  name="threadDescription" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
              </div>
            ';
      }

      else
      {
        echo'
            <div class="container">
              <h3 for="threadTitle" class="my-3">Ask Qusetion</h3>
              <div class="alert alert-primary" role="alert">
                Login to ask questions...
              </div>
            </div>
              ';
      }

    ?>

    <?php
      $sql = "SELECT * FROM threads WHERE thread_category_id=$categoryId";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result)>0)
      {

        echo'
              <div class="container" style="min-height:800px;">
              <h3 class="text-capitalize my-4">browse questions</h3>
            ';

        while($record = mysqli_fetch_assoc($result))
        {

          $threadId = $record['thread_id'];
          $threadTopic = $record['thread_topic'];
          $threadDescription = $record['thread_description'];
          $threadCreationTime = $record['thread_creation_time'];
          $threadUserId = $record['thread_user_id'];

          $sql = "SELECT * FROM users WHERE user_id=$threadUserId";
          $resultTemp = mysqli_query($conn, $sql);
          $record = mysqli_fetch_assoc($resultTemp);
          $userName = $record['user_name'];
          echo'
              <div class="media">
                <img class="mr-3" src="./drawables/default_user.png" width="50px"alt="">
                <div class="media-body">
                  <h5 class="mt-0 font-weight-bold text-success"><a href="./answers.php?quesid='.$threadId.'&title='.$threadTopic.'&description='.$threadDescription.'">' . $threadTopic . '</a></h5>
                  <p class="font-weight-bold font-italic text-muted"> posted by ' . $userName . ' on ' . $threadCreationTime . ' </p>
                    ' .
                      $threadDescription 
                    . '
                </div>
              </div>
              <br>
            ';
        }
        echo"</div>"; 
      }
      else
      {
        echo'<div class="container" style="min-height:800px;"></div>';
      }

    ?>
    <?php require "./partials/_footer.html";?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>