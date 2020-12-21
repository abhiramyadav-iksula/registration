<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/indexStyle.css">  
</head>
<body>
<?php
if (isset($_GET['showAcountCreatedPopUp'])) {
if($_GET['showAcountCreatedPopUp'] == 1){
  ?>
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Congratulation Your Account is Created. Please Sign-in In Your Accout With Your Email ID & Password</h2>
    </div>
  </div>
  <script>
    myFunction();
    function myFunction() {
    // Get the modal
    let modal = document.getElementById("myModal");
    let span = document.getElementsByClassName("close")[0];
    modal.style.display = "block";
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }
  </script>
<?php  
}
}
?>

<div class="showContentWrapper">
    <nav class="contentTabs">
      <div class="selector"></div>
      <a href="#" class="active tablinks" onclick="openCity(event, 'singUpContentBox')"><i class="fab fa-superpowers"></i>Sing Up</a>
      <a href="#" class="tablinks"onclick="openCity(event, 'singInContentBox')"><i class="fas fa-burn"></i>Sing In</a>
    </nav>
</div>

<div id="singUpContentBox" class="tabcontent" style="display:block;">

<div class="container">
  <center><h2>SING UP</h2></center>  
  <form action="action/signUpAction.php"  enctype="multipart/form-data"  method="POST" autocomplete="off">
  <div class="row">
      <div class="col-50">
        <label>First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <p id="firstNameErrorMessage"></p>

      </div>
      <div class="col-50">
        <label>Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        <p id="lastNameErrorMessage"></p>
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label>Age:</label>
        <input type="number" id="age" name="age" min="18" max="60"  required>
        <p id="ageErrorMessage"></p>
      </div>
      <div class="col-50">
        <label>Contact No:</label>
        <input type="text" id="contact" name="contact"  maxlength="10" required>
        <p id="contactErrorMessage"></p>
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label>Email ID:</label>
        <input type="email" id="email" name="email" required>
        <p id="emailErrorMessage"></p>
      </div>
      <div class="col-50">
        <label>Password:</label>
        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Must contain at least one number and one uppercase and lowercase letter, 
        and at least 8 or more characters" required>
        <div id="passwordErrorMessage">
          <h4>Password must contain the following:</h4>
          <p id="passwordLowerCaseErrorMessage" class="invalid">A <b>lowercase</b> letter</p>
          <p id="passwordUpperCaseErrorMessage" class="invalid">A <b>capital (uppercase)</b> letter</p>
          <p id="passwordNumberErrorMessage" class="invalid">A <b>number</b></p>
          <p id="passwordLengthErrorMessage" class="invalid">Minimum <b>8 characters</b></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label>Confirm Passwod:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <p id="confirmPasswordErrorMessage"></p>
      </div>
      <div class="col-50">
        <label>Profile Image:</label>
        <div style="text-align: center">
          <div class="button_outer">
              <div class="btn_upload">
                <input type="file" accept="image/*" id="upload_file" name="profileImage" required>
                Upload Profile Image
              </div>
              <div class="processing_bar"></div>
              <div class="success_box"></div>
          </div>
          <div class="error_msg"></div>
          <div class="uploaded_file_view" id="uploaded_view">
            <span class="file_remove">X</span>
          </div>
        </div>
        <img id="output_image"/>
      </div>
    </div>
    <br>
    <div class="row">
    <center><input type="submit" value="Submit"></center>
    </div>
  </form>
</div>
</div>

<div id="singInContentBox" class="tabcontent">
<div class="container">
  <center><h2>SING IN</h2></center>  
  <form action="action/singInAction.php"  enctype="multipart/form-data"  method="POST" autocomplete="off">
    <div class="row">
      <div class="col-50">
        <label>Email ID:</label>
        <input type="email" id="loginEmail" name="loginEmail" required>
        <div id="loginEmailErrorMessage"></div>
      </div>
      <div class="col-50">
        <label>Password:</label>
        <input type="password" id="loginPassword" name="loginPassword" required>
        <div id="loginPasswordErrorMessage"></div>
      </div>
    </div>
    <br>
    <div class="row">
      <center><input type="submit" value="Submit"></center>
    </div>
  </form>
</div>
</div>
</body>
</html>
<script src="js/indexScript.js"></script> 
