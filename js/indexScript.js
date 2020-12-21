var btnUpload = $("#upload_file"),
btnOuter = $(".button_outer");
btnUpload.on("change", function(e){
var ext = btnUpload.val().split('.').pop().toLowerCase();
if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
	$(".error_msg").text("Please Upload Image File only...");
} else {
	  $(".error_msg").text("");
    btnOuter.addClass("file_uploading");
    setTimeout(function(){
      btnOuter.addClass("file_uploaded");
    },3000);
    var uploadedFile = URL.createObjectURL(e.target.files[0]);
    setTimeout(function(){
      $("#uploaded_view").append('<img src="'+uploadedFile+'" />').addClass("show");
    },3500);
  }
});
$(".file_remove").on("click", function(e){
  $("#uploaded_view").removeClass("show");
  $("#uploaded_view").find("img").remove();
  btnOuter.removeClass("file_uploading");
  btnOuter.removeClass("file_uploaded");
});

$("input[name=firstName]").on("keyup focus", function(e){
  let myval = $(this).val();
  if(myval.length <= 0) {
     document.getElementById("firstNameErrorMessage").innerHTML = "Firstname field should not be empty.";
    $(this).focus();
  } else {
    document.getElementById("firstNameErrorMessage").innerHTML = "";
    $(this).focus();
  }
});

$("input[name=lastName]").on("keyup focus", function(e){
  let myval = $(this).val();
  if(myval.length <= 0) {
     document.getElementById("lastNameErrorMessage").innerHTML = "Lastname field should not be empty.";
    $(this).focus();
  } else {
    document.getElementById("lastNameErrorMessage").innerHTML = "";
    $(this).focus();
  }
});

$("input[name=loginPassword]").on("keyup focus", function(e){
  let myval = $(this).val();
  if(myval.length <= 0) {
     document.getElementById("loginPasswordErrorMessage").innerHTML = "Password field should not be empty.";
    $(this).focus();
  } else {
    document.getElementById("loginPasswordErrorMessage").innerHTML = "";
    $(this).focus();
  }
});

$("input[name=age]").on("keyup focus", function(e){
  let range = $(this).val();
  if(17 < range && range < 61 ) {
    document.getElementById("ageErrorMessage").innerHTML = "";
    $(this).focus();
  }else {
    document.getElementById("ageErrorMessage").innerHTML = "Age should be in between 18 to 60.";
    $(this).focus();
  }
});

$("input[name=email]").on("change", function(e){
  let range = $(this).val();
  let atposition=range.indexOf("@");
  let dotposition=range.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=range.length){
  document.getElementById("emailErrorMessage").innerHTML = "Please enter a valid e-mail address";
  }else {
    function showUser(str) {
      if (str=="") {
        document.getElementById("emailErrorMessage").innerHTML="";
        return;
      }
      var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
        document.getElementById("emailErrorMessage").innerHTML=this.responseText;
      }
      xmlhttp.open("GET","action/emailCheckerAction.php?q="+str,true);
      xmlhttp.send();
    }
    showUser(this.value);
  }
});


$("input[name=loginEmail]").on("change", function(e){
  let range = $(this).val();
  let atposition=range.indexOf("@");
  let dotposition=range.lastIndexOf(".");
  if (atposition<1 || dotposition<atposition+2 || dotposition+2>=range.length){
  document.getElementById("loginEmailErrorMessage").innerHTML = "Please enter a valid e-mail address";
  return false;
  }else {
    document.getElementById("loginEmailErrorMessage").innerHTML = "";
    $(this).focus();
  }
});

$("input[name=contact]").on("change", function(e){
  let myval = $(this).val();
  if(myval.length < 10) {
     document.getElementById("contactErrorMessage").innerHTML = "Contact Filed must contain 10 Digits.";
    $(this).focus();
  } else {
    document.getElementById("contactErrorMessage").innerHTML = "";
    $(this).focus();
  }
});
$(function() {
  var regExp = /[0-9\.\,]/;
  $('#contact').on('keydown keyup', function(e) {
    var value = String.fromCharCode(e.which) || e.key;
    // Only numbers, dots and commas
    if (!regExp.test(value)
      && e.which != 188 // ,
      && e.which != 190 // .
      && e.which != 8   // backspace
      && e.which != 46  // delete
      && (e.which < 37  || e.which > 40)//arrow keys
      && (e.which < 96  || e.which > 105)){
        e.preventDefault();
        return false;
      }
  });
});



// When the user clicks on the password field, show the message box
document.getElementById("password").onfocus = function() {
  document.getElementById("passwordErrorMessage").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
document.getElementById("password").onblur = function() {
  document.getElementById("passwordErrorMessage").style.display = "none";
}

// When the user starts to type something inside the password field
document.getElementById("password").onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(document.getElementById("password").value.match(lowerCaseLetters)) {  
    document.getElementById("passwordLowerCaseErrorMessage").classList.remove("invalid");
    document.getElementById("passwordLowerCaseErrorMessage").classList.add("valid");
  } else {
    document.getElementById("passwordLowerCaseErrorMessage").classList.remove("valid");
    document.getElementById("passwordLowerCaseErrorMessage").classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(document.getElementById("password").value.match(upperCaseLetters)) {  
    document.getElementById("passwordUpperCaseErrorMessage").classList.remove("invalid");
    document.getElementById("passwordUpperCaseErrorMessage").classList.add("valid");
  } else {
    document.getElementById("passwordUpperCaseErrorMessage").classList.remove("valid");
    document.getElementById("passwordUpperCaseErrorMessage").classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(document.getElementById("password").value.match(numbers)) {  
    document.getElementById("passwordNumberErrorMessage").classList.remove("invalid");
    document.getElementById("passwordNumberErrorMessage").classList.add("valid");
  } else {
    document.getElementById("passwordNumberErrorMessage").classList.remove("valid");
    document.getElementById("passwordNumberErrorMessage").classList.add("invalid");
  }
  
  // Validate length
  if(document.getElementById("password").value.length >= 5) {
    document.getElementById("passwordLengthErrorMessage").classList.remove("invalid");
    document.getElementById("passwordLengthErrorMessage").classList.add("valid");
  } else {
    document.getElementById("passwordLengthErrorMessage").classList.remove("valid");
    document.getElementById("passwordLengthErrorMessage").classList.add("invalid");
  }
}


$("input[name=confirmPassword]").on("change", function(e){
  let confirmPassword = $(this).val();
  let password = document.getElementById('password').value;
  if(confirmPassword != password){
    document.getElementById("confirmPasswordErrorMessage").innerHTML = "Confirm-Password & Password Does Not Match.";
  } else{
    document.getElementById("confirmPasswordErrorMessage").innerHTML = "";
  }
});

function myFunction() {
// Get the modal
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];
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

function openCity(evt, cityName) {
  let i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

var contentTabs = $('.contentTabs');
var selector = $('.contentTabs').find('a').length;
//var selector = $(".tabs").find(".selector");
var activeItem = contentTabs.find('.active');
var activeWidth = activeItem.innerWidth();
$(".selector").css({
  "left": activeItem.position.left + "px",
  "width": activeWidth + "px"
});

$(".contentTabs").on("click","a",function(e){
  e.preventDefault();
  $('.contentTabs a').removeClass("active");
  $(this).addClass('active');
  var activeWidth = $(this).innerWidth();
  var itemPos = $(this).position();
  $(".selector").css({
    "left":itemPos.left + "px",
    "width": activeWidth + "px"
  });
});