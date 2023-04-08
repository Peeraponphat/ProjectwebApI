<?php
header("Content-Type:application/json");
if(isset($_GET['pro_id']) && $_GET['pro_id']!=""){

include('dbCon.php');
$pro_id = $_GET['pro_id'];
//$cus_id = "C001";
$sql = "DELETE FROM product WHERE Id_product=$pro_id";
$result = mysqli_query($conn,$sql);

}


?>