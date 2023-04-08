<?php
//https://www.phpflow.com/php/create-php-restful-api-without-rest-framework-dependency/
// Connect to database
include("dbCon.php");
$db = new dbObj();
$connection =  $db->getConnstring();
update_cart();
function update_cart()
{
    global $connection;
    $data = json_decode(file_get_contents('php://input'), true);


    $product_id = $data['Id_product'];
    $product_name = $data['Product_name'];
    $price = $data['Price'];
    


    $query = "UPDATE product
    SET Product_name='$product_name',Price='$price'
    WHERE Id_product='$product_id'";

    
$result = mysqli_query($connection,$query);
if(mysqli_affected_rows($connection))
{
    $response=array('status'=>1,'status_message'=>'TRUE');
}
else{
    $response=array('status'=>0,'status_message'=>'FALSE');
}
header('Content-Type: application/json');
echo json_encode($response);

} 


?>