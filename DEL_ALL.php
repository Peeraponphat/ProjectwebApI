<?php
    $member_id=$_COOKIE["TestCookie"];
    $t = (string) $_GET['path']; //for update cart
    $id = $_GET['id_product'];
    include "Connect.php";
    $sql = "DELETE FROM carts_pro WHERE MemberID = $member_id AND Id_product=$id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {                     
     echo "<script>window.location='$t';</script>";
    } 
    else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
    mysqli_close($conn);