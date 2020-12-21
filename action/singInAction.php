<?php
// Start the session
session_start();
?>
<?php   

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if ( isset($_POST['loginEmail'], $_POST['loginPassword'] ) ){       
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
           
            if (filter_var($_POST["loginEmail"], FILTER_VALIDATE_EMAIL)) {
                $email = test_input($_POST["loginEmail"]);
            }
            else {
                echo "<script>alert('Please Enter Valid Email ID'); window.location.href='../index.php';</script> ";
                exit();
            }
            $password = $_POST["loginPassword"];

            
            include('../database/database.php'); 
                                   
            $sql = "SELECT * FROM users WHERE email='".$email."' AND password='".$password."';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $_SESSION["userID"] = $row['userID'];
                    $_SESSION["userEmail"] = $row['email'];
                    echo "<script> window.location.href='../userPanel.php';</script> ";
                    exit();
                }
            } else {
                echo "<script>alert('No User Found Please Enter Valid Credentials'); window.location.href='../index.php';</script> ";
                exit();
            }
            
            $conn->close();

        }
    }else {
        echo "<script>alert('No User Found Please Enter Valid Credentials'); window.location.href='../index.php';</script> ";
        exit();
    }
?>