<!DOCTYPE html>
<html lang="en">

<head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cs/Carts.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
    @font-face {
        font-family: myFirstFont;
        src: url(src/Samuel.ttf);
    }

    #font {
        font-family: myFirstFont;
        font-weight: Bold;
        font-size: 25px;
    }
    </style>
</head>

<body>

    <div class="wrap cf">
        <h1 class="projTitle" style="background-color:#FFF2CC" id="font" style="font-size:50px;">
            Ineku<span>-Cat&Dog-</span>
            Shopping Cart</h1>
        <div class="heading cf">
            <h1 id="font" style="font-size:30px; font-weight:Bold ;">My Cart</h1>
            <a href="Market.php" class="continue" style="background-color:#DFA67B" id="font" ;>Continue Shopping</a>
        </div>
        <div class="cart">
            <!--    <ul class="tableHead">
      <li class="prodHeader">Product</li>
      <li>Quantity</li>
      <li>Total</li>
       <li>Remove</li>
    </ul>-->
            <ul class="cartWrap">

                <?php
include "Connect.php";

$sql = "SELECT * FROM carts_pro WHERE MemberID = $_COOKIE[TestCookie]";
$query = mysqli_query($conn,$sql);
$sum=0;
while ($data=mysqli_fetch_array($query)){

$prototal;
$prototal = $data['Price']*$data['Counter'];
$sum = $sum + $prototal;

if($data==NULL){
echo '"Your cart is empty"';
}
else{

              echo  '<li class="items odd">

                    <div class="infoWrap" id="font">
                        <div class="cartSection">
                            <img src="food img/'.$data['Picture'].'" alt="" class="itemImg" />
                            <p class="itemNumber" id="font">00'.$data['Id_product'].'</p>
                            <h3 id="font">'.$data['Product_name'].'</h3>

                            <p id="font">'.$data['Price'].' x '.$data['Counter'].'</p>';
                            echo '<div class="page-wrapper">';
                            echo '<form action="" method="POST">';
                            echo '<input type="text" id="'.$data['Id_product'].'" name="'.$data['Id_product'].'" value="'.$data['Id_product'].'" required />';
                            echo ' <input id="font" type="submit" name="submit" value="DEL THIS" class="btn" required
                                    style="background-color:#DFA67B;"/>';
                            echo '</form>';
                            if(isset($_POST['submit'])){
                                $dataA["Id_product"] =$_POST[''.$data['Id_product'].''];
                                $dataA["Id_member"] =$_COOKIE['TestCookie'];
                                $dataA= json_encode($dataA, JSON_UNESCAPED_UNICODE);
                               
                                $ch = curl_init('http://127.0.0.1/WebProject/del.php');
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataA);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            
                                $response = curl_exec($ch);
                                curl_close($ch);
                                $result = json_decode($response);
                                echo "<script type = 'text/javascript'>";
                                echo "window.location=Cart.php";
                                echo "</script>";
                                }

                            echo '</div>
                            <p class="stockStatus" id="font"> In Stock</p>
                        </div>


                        <div class="prodTotal cartSection">
                            <p id="font" style="font-size:30px;">'.$prototal.' ฿</p>
                        </div>+
                    </div>
                </li>';
            }
              
        }       
        ?>
            </ul>
        </div>

        <div class="promoCode"><label for="promo" id="font">Have A Promo Code?</label><input type="text" name="promo"
                placholder="Enter Code" />
            <a href="#" class="btn" style="background-color:#DFA67B"></a>
        </div>

        <div class="subtotal cf" id="font">
            <ul>
                <li class="totalRow"><span class="label" id="font">Subtotal</span><span
                        class="value"><?php echo $sum; ?> ฿</span>
                </li>

                <li class="totalRow"><span class="label" id="font">Shipping</span><span class="value">5.00 ฿</span></li>

                <li class="totalRow final"><span class="label" id="font">Total</span><span
                        class="value"><?php echo $sum+5; ?></span> ฿</li>
                <li class="totalRow"><a href="info.php" class="btn continue" style="background-color:#DFA67B"
                        id="font">Checkout</a></li>
            </ul>
        </div>
    </div>
    <script src="/jss/Carts.js"></script>
    <script src="http//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>

</html>