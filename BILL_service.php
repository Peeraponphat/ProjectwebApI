<?php
include('Connect.php');
header("Content-Type:application/json");

insert_customer();

function insert_customer()
{

    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);
    echo ($data);

    $Bill_Firstname=$data["Firstname"] ;
    $Bill_Email=$data["Email"] ;
    $Bill_Address=$data["Address"] ;
    $Bill_City=$data["City"] ;
    $Bill_State=$data["State"] ;
    $Bill_Zip=$data["Zip"];
    $Bill_Member=$data["ID"] ;
    $Bill_TOTAL=$data["TOTAL"];

    $query = "insert into billza(id_member,Firstname,Email,Address,City,State,Zip,total,Time)
    values('$Bill_Member','$Bill_Firstname','$Bill_Email','$Bill_Address','$Bill_City','$Bill_State','$Bill_Zip','$Bill_TOTAL',NOW())";
echo $query;
    $result = array();
    $result = mysqli_query($conn, $query);
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