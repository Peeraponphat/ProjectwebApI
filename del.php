<?php

    include('Connect.php');
    header("Content-Type:application/json");
    del_product();
    function del_product()
    {
        global $conn;
        $dataA= json_decode(file_get_contents('php://input'), true);
    
        $idp=$dataA["Id_product"];
        $member_id=$dataA["Id_member"];

        $sql = "DELETE FROM carts_pro WHERE MemberID = $member_id AND Id_product=$idp";
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