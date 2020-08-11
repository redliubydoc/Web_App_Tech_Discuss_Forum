<!-- logout functionality -->

  <?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: /index.php?showAlert=-2");
    exit; 
  ?>
    