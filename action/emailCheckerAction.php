<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','assignment');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM users WHERE email = '".$q."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  echo "email id alreday Register";
}
mysqli_close($con);
?>
