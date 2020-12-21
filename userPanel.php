<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/userPanelStyle.css">  
</head>
<body>
<?php
session_start();
if( isset($_SESSION['userID']) && isset($_SESSION["userEmail"]) ) {
    $userID = $_SESSION['userID'];
    $userLoginEmail = $_SESSION['userEmail'];
    include('database/database.php'); 
    $sql = "SELECT * FROM users WHERE  userID = $userID and email ='$userLoginEmail';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
        ?>
        <div class="container">
            <div class="logoutLblPos">
                <button onclick="location.href = 'action/singOutAction.php'" class="singOutButton"> Sing Out </button>  
            </div>
            <div class="row">
                <div class="col-100">
                   <center> <img  src="users/usersProfileImage/<?php echo $row['email'];?>/<?php echo $row['profileImage'];?>" class="avatar"></center>
                    <center><h2><?php echo $row["firstName"]." ".$row["lastName"]; ?></h2></center>  
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-100">
                    <center><h3>Other Registered Users</h3></center>
                    <div style="overflow-x:auto;">
                        <table>
                            <tr>
                                <th>Profile Image</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Contact</th>
                                <th>Email</th>
                            </tr>
                            <?php 
                                $sql = "SELECT * FROM users;";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                              
                                        <td><center><img  src="users/usersProfileImage/<?php echo $row['email'];?>/<?php echo $row['profileImage'];?>" class="tabelAvatar"></center></td>
                                        <td><?php echo $row["firstName"]." ".$row["lastName"]; ?></td>
                                        <td><?php echo $row["age"]; ?></td>
                                        <td><?php echo $row["contact"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                
                            </tr>
                            <?php
                                    }
                                }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
         $conn->close();
  }
    } else {
        echo "<script>window.location.href='../index.php';</script> ";
        exit();
    }
} else {
    echo "<script>window.location.href='index.php';</script> ";
    exit();
}
?>
</body>
</html>