<?php
include('Connect.php');
header("Content-Type:application/json");
insert_product();
function insert_product()
{
    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);

    $idp=$data["Id_product"];
    $member_id=$data["Id_member"];


    $sql = "SELECT * FROM `product` WHERE `Id_product`=$idp";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
        $Id_product=$data['Id_product'];
        $Product_name=$data['Product_name'];
        $Price=$data['Price'];
        $Description=$data['Description'];
        $Type=$data['Type'];
        $Foodtype=$data['Foodtype'];
        $Picture= $data['Picture'];
        $brand=$data['brand'];
    
    $sql="SELECT * FROM carts_pro WHERE Id_product=$Id_product";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    if($data==NULL){
            $C=1;
            $sql= "insert into carts_pro(MemberID,Id_product,Product_name,Description,Type,Food_type,Picture,Price,Brand,Counter)	
               values('$member_id','$Id_product','$Product_name','$Description','$Type','$Foodtype','$Picture','$Price','$brand','$C')";
    }
    else{
            $C=$data['Counter']+1;
            $sql = "UPDATE carts_pro SET Counter ='$C' WHERE Id_product = $Id_product";
    }
        }        
           
               $result = array();
               $result = mysqli_query($conn, $sql);
           }
           if(mysqli_affected_rows($conn)){
               $response = array(
                   'status' => 1,
                   'status_message' => 'customer Added Succeccfully.'
               );
           }
           else{
               $response = array(
                   'status' => 0,
                   'status_message' => 'customer Addition Failed.'
               );
           }
           print_r($response);
    ?>