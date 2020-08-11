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

    

    <?php 
      if($_SERVER['REQUEST_METHOD'] == GET)
      {
        $flag = false;

        $searchStr = $_GET['search'];

        echo'
            <div class="container-fluid" style="min-height:800px;">
              <h2 class="text-center mt-5">Search Results for <em>"'.$searchStr.'"</em></h2>
                <div class="container bg-light">
            ';

        $sql = "SELECT * FROM threads WHERE MATCH (thread_topic, thread_description) against ('$searchStr')";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
          $flag = true;
          $threadId = $row['thread_id'];
          $threadTitle = $row['thread_topic'];
          $threadDescription = $row['thread_description'];

          echo'
              <div class="media">
                <div class="media-body">
                  <h6 class="mt-0 text-success py-2"><a  class="font-italic"  href="./answers.php?quesid='.$threadId.'&title='.$threadTitle.'&description='.$threadDescription.'">' . $threadTitle . '</a></h6>
                    <small>' .
                      $threadDescription 
                    . '</small>
                </div>
              </div>
              <br>
            ';
        }

        if($flag == false)
        {
          echo'
              <div class="alert alert-warning" role="alert">
                No search result found!
              </div>
              ';
        }
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