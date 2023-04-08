<?php
$conn = mysqli_connect("localhost", "root", "", "register_oop");
if(mysqli_connect_errno()){
    echo"Failed to connect to MySQL:".mysqli_connect_error();
    die();
}
  else {
    echo "connected success";
  }
?>