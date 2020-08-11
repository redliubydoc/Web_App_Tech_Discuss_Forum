<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<title>Tech_Discusss - Codeing Forums</title>
	</head>
	<body>
		<?php require "./partials/_dbConnect.php";?>	
	    <?php require "./partials/_header.php";?>
	    <?php require "./partials/_dbConnect.php";?>

	    <!-- form handle -->

	    <?php

	     	$answerThreadId = htmlspecialchars($_GET['quesid']);
			$threadTitle = htmlspecialchars($_GET['title']);
			$threadDescription = htmlspecialchars($_GET['description']);
		
	      if($_SERVER['REQUEST_METHOD'] == POST and isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == true)
	      {
	        $answer = $_POST['answer'];

	        if(empty($answer))
	        {
	          echo'
	                <div class="alert alert-warning alert-dismissible fade show" role="alert">
	                  <strong>Your answer cannot be added! </strong> Answer cannot be empty.
	                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                  </button>
	                </div>
	              ';
	        }
	        else
	        {
	        	$userId = $_SESSION['user_id'];

	        	$sql = "INSERT INTO answers (answer_thread_id, answer_user_id, answer_answer) VALUES ($answerThreadId, $userId, '$answer')";
	          
	          	$showAlert = mysqli_query($conn, $sql);
	        
	          	if($showAlert)
	          	{
	            	echo'
	                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
	                    	<strong>Success! </strong> Your answer has been added.
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
	                    	<strong>Your answer cannot be added! </strong> Site is down due to some technical issue, sorry for inconvenience
	                    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                      	<span aria-hidden="true">&times;</span>
	                    	</button>
	                  	</div>
	                	';
	          	}
	        }
	      }
	    ?>

	    <?php
			
				/*- display question and its description*/

				echo'
				<div class="container my-5 bg-success">
				<div class="jumbotron p-2">
				  <h4 class="font-weight-bold">' . $threadTitle . '</h4>
				  <p class="">' . $threadDescription . '</p>
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
						        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
						          <div class="form-group">
						            <label for="answer">Post your Answer</label>
						            <textarea class="form-control" id="answer"  name="answer" rows="3"></textarea>
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
	              <h3 for="threadTitle" class="my-3">Post Answer</h3>
	              <div class="alert alert-primary" role="alert">
	                Login to post answer...
	              </div>
	            </div>
	              ';
	      }
			?>

	     <?php
				$sql = "SELECT * FROM answers WHERE answer_thread_id=$answerThreadId";
				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result)>0)
				{
					echo'
			            <div class="container" style="min-height:800px;">
			            <h3 class="text-capitalize mb-4">Answers</h3>
			          ';

					while($record = mysqli_fetch_assoc($result))
					{
						$answerUserId = $record['answer_user_id'];
						$answer = $record['answer_answer'];
						$answerUserId = $record['answer_user_id'];
						$answerCreationTime = $record['answer_creation_time'];
						$answerUserId = $record['answer_user_id'];

						$sql = "SELECT * FROM users WHERE user_id=$answerUserId";
						$resultTemp = mysqli_query($conn, $sql);
						$record = mysqli_fetch_assoc($resultTemp);
						$userName = $record['user_name'];

						echo'
						    <div class="media">
						      <img class="mr-3" src="./drawables/default_user.png" width="50px"alt="">
						      <div class="media-body">
						        <p class="font-weight-bold font-italic text-muted"> answered by ' . $userName . ' on ' . $answerCreationTime . ' </p>
						        <p class="mt-0  text-dark">' . $answer . '</p>
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