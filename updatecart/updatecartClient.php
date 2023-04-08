<html>

<body>
    <form action="" method="PUT">
        <label>Enter Data:</label><br />

        <input type="number" id="product_id" name="product_id" placeholder="ID Product" required />
        <br /><br />

        <input type="text" id="product_name" name="product_name" placeholder="Enter Product Name" required />
        <br /><br />

        <input type="number" id="price" name="price" placeholder="Enter Price" required />
        <br /><br />

        <button type="submit" name="change" id="change">Change</button>
    </form>


    <?php
if(isset($_GET['change'])){
    $id=$_GET['product_id'];
    $data["Id_product"] =$_GET['product_id'];
    $data["Product_name"] =$_GET['product_name']; 
    $data["Price"] =$_GET['price'];

    $data = json_encode( $data, JSON_UNESCAPED_UNICODE );
    echo $data;

    $ch = curl_init("http://localhost/WebProject/updatecart/updatecartService.php?");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response);
    print_r($result);
        echo "<script type='text/javascript'>"; 
        echo "alert('Update data Successfull');";
        echo "window.location=updatecartService.php;";
        echo "</script>"; 
}
?>
</body>

</html>