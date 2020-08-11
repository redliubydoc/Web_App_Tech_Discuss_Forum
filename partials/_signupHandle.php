  <!-- signup form handle -->
    <?php 
        if($_SERVER['REQUEST_METHOD'] == POST)
        {
            $showAlert = -1;

            $emailId = htmlspecialchars($_POST['emailId']);
            $name = htmlspecialchars($_POST['userName']);
            $user_password = htmlspecialchars($_POST['password']);
            $cPassword = htmlspecialchars($_POST['cPassword']);

            require "./_dbConnect.php";

            /*  empty field   */

            if(empty($emailId) or empty($name) or empty($user_password) or empty($cPassword))
            {
                $showAlert = 1;
            }

            /*  dublicate email  */

            if ($showAlert == -1) 
            {   
                $sql = "SELECT * FROM users WHERE user_email_id = '$emailId'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0)
                {
                    $showAlert = 2;
                }
            }
            if ($showAlert == -1 and $user_password != $cPassword)
            {   
                $showAlert = 3;
            }
            if ($showAlert == -1) 
            { 
                $hash = password_hash($user_password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (user_name, user_email_id, user_password) VALUES ('$name', '$emailId', '$hash')";
                $result = mysqli_query($conn, $sql);

                /*  data count be inserted in database  */   

                if($result)
                {
                    $sql = "SELECT * FROM users WHERE user_email_id = '$emailId'";
                    $resultTemp = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($resultTemp);

                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_email_id'] = $row['user_email_id'];

                    $showAlert = 0;
                }
            }
            header("Location: /index.php?showAlert=$showAlert");
        }
    ?>