 <!-- signup form handle -->
<?php 

    if($_SERVER['REQUEST_METHOD'] == POST)
    {
      $showAlert = -4;

      $emailId = htmlspecialchars($_POST['emailId']);
      $user_password = htmlspecialchars($_POST['password']);

      require "./_dbConnect.php";

      $sql = "SELECT * FROM users WHERE user_email_id='$emailId'";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) == 1) 
      {
        $row = mysqli_fetch_assoc($result);

      /* login successful */

      if(password_verify($user_password, $row['user_password']))
      {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['user_email_id'] = $row['user_email_id'];

        $showAlert = 4;
      }                    
    }
    header("Location: /index.php?showAlert=$showAlert");
  }

?>