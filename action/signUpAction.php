<?php   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( isset($_POST['firstName'], $_POST['lastName'], $_POST['age'], $_POST['contact'], $_POST['email'], $_POST['password'],$_POST['confirmPassword']) && !empty(basename($_FILES["profileImage"]["name"]))  ) {       
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $firstName = test_input($_POST["firstName"]);
            $lastName = test_input($_POST["lastName"]);
            if(17 < $_POST["age"] && $_POST["age"] < 61 ){
                $age = test_input($_POST["age"]);
            }else{
                echo "<script>alert('Age should be in between 18 to 60.'); window.location.href='../index.php';</script> ";
                exit();
            }
            if(strlen($_POST["contact"])==10){
                if(0000000000 < $_POST["contact"] && $_POST["contact"] < 100000000000 ){
                    $contact = test_input($_POST["contact"]);
                }else{
                    echo "<script>alert('Contact Filed must contain 10 Digits.'); window.location.href='../index.php';</script> ";
                    exit();
                }
            }else{
                echo "<script>alert('Contact Filed must contain 10 Digits.'); window.location.href='../index.php';</script> ";
                exit();
            }    
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $email = test_input($_POST["email"]);
            }
            else {
                echo "<script>alert('Please Enter Valid Email ID'); window.location.href='../index.php';</script> ";
                exit();
            }
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];
            if($password != $confirmPassword){
                echo "<script>alert('Password & Confirm Password Does Not Match'); window.location.href='../index.php';</script> ";
                exit();
            }
            $password = $_POST["password"];
            $upload_image=$_FILES["profileImage"]["name"];
            include('../database/database.php'); 
            $sql = "SELECT * FROM users WHERE email ='$email';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<script>alert('Email Id Already Registered'); window.location.href='../index.php';</script> ";
                exit();
            } else {
                $sql2 = "INSERT INTO users (firstName, lastName, age, contact, email, password, profileImage )
                VALUES ('$firstName', '$lastName', $age, '$contact', '$email', '$password', '$upload_image');";

                if ($conn->multi_query($sql2) === TRUE) {

                    $folder="../users/usersProfileImage/".$email."/";
                    mkdir($folder);
                    move_uploaded_file($_FILES["profileImage"]["tmp_name"], "$folder".$_FILES["profileImage"]["name"]);
                } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->error;
                    exit();
                }

                $conn->close();
                echo "<script>window.location.href='../index.php?showAcountCreatedPopUp=1';</script> ";
                exit();
            }
        } else {
            echo "<script>alert('Form Value Missing, Please Fill All Fileds.'); window.location.href='../index.php';</script> ";
        }
        
    } else {
        echo "<script>alert('No POST Request Found'); window.location.href='../index.php';</script> ";
        exit();
    }
?>