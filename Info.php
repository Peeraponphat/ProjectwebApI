<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
    }

    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #04AA6D;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }

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

    <div class="row">
        <div class="col-75">
            <div class="container">


                <form action="" method="post">
                    <div class="row" id="font">
                        <div class="col-50" style="background-color:#FFF2CC;">
                            <h2 id="font">Checkout Form</h2>
                            <h3 id="font">Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>

                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required />

                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com" required />


                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required />


                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York" required />
                            <div class="row">
                                <div class="col-50">

                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY" required />
                                </div>
                                <div class="col-50">

                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001" required />

                                </div>
                            </div>
                        </div>
                    </div>
                    <label id="font">

                        <input type="checkbox" checked="checked" name="sameadr" required /> Shipping address same as
                        billing

                    </label>

                    <input id="font" type="submit" name="submit" value="Continue to checkout" class="btn" required
                        style="background-color:#DFA67B;" />
                </form>
                <a class="btn btn-primary" href="Cart.php" role="button" style="background-color:#E5BA73;"
                    id="font">Back</a>
            </div>
        </div>



        <div class="col-25">
            <div class="container">

                <h4 id="font">Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>

                            <?php
$total=0;
include "Connect.php";
    $sql = "SELECT * FROM carts_pro WHERE MemberID = $_COOKIE[TestCookie]";
    $query = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($query)) {
        if($data==NULL){
            $total=0;
    }
        else{
        $total=$total+$data['Counter'];
    }
    }
echo $total;
?>

                        </b></span>
                </h4>


                <?php
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
                echo '<p><a href="cart.php" id="font">'.$data['Product_name'].'</a> <span class="price" id="font">'.$data['Price'].' ฿</span></p>';

                echo '<hr>';
                }
            }
            ?>
                <p id="font">Total <span class="price" style="color:black"><b><?php echo $sum+5 ?> ฿</b></span></p>

            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['submit'])){
    $data["Firstname"] = $_POST['firstname'];
    $data["Email"] = $_POST['email'];
    $data["Address"] = $_POST['address'];
    $data["City"] = $_POST['city'];
    $data["State"] = $_POST['state'];
    $data["Zip"] = $_POST['zip'];
    $data["ID"] =$_COOKIE["TestCookie"];
    $data["TOTAL"] =$sum+5;
    $money=$sum+5;
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);

    $ch = curl_init('http://127.0.0.1/WebProject/BILL_service.php');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response);
    print_r($result);
    echo "<script type = 'text/javascript'>";
    echo "alert('add data Successfull');";
    echo "</script>";
    echo "<script type = 'text/javascript'>";
    echo "window.location = 'http://127.0.0.1/WebProject/ppay/index.php?Money=$money';";
    echo "</script>";
    }
?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>