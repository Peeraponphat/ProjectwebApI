<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="DELETE">
        <label>Enter Product ID:</label><br />
        <input type="text" name="product_id" id="product_id" placeholder="Enter Product ID" required />
        <br /><br />
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
if (isset($_GET['product_id']) && $_GET['product_id']!="") {
 $product_id = $_GET['product_id'];
 echo  $product_id;
 $url = "http://localhost/WebProject/deletecart/deletecartService.php?pro_id=".$product_id;
 $client = curl_init();
    curl_setopt($client, CURLOPT_URL, $url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($client);
    if($result === false) {
    } else {
        echo $result;
        $result = json_decode($result, true);
    }
    curl_close($client);
    print_r($result);
    echo "<script type='text/javascript'>"; 
    echo "alert('Delete data Successfull');";
    echo "</script>";

}
    ?>
</body>

</html>