<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="cs/Bill.css">

    <style>
    @font-face {
        font-family: myFirstFont;
        src: url(src/Samuel.ttf);
    }

    #font {
        font-family: myFirstFont;
        /*font-weight: Bold;*/
        font-size: 10px;
    }
    </style>
</head>

<body>
    <?php
	include "Header.php";
	?>

    <!--================Order Details Area =================-->
    <?php
    include "Connect.php";
    $sql ="SELECT * FROM billza WHERE id_member=$_COOKIE[TestCookie]";
    $query = mysqli_query($conn, $sql);
    while ($data=mysqli_fetch_array($query)){
    echo       ' <section class="order_details section-margin--small" >';
    echo            ' <div class="container">';
    echo             '<p class="text-center billing-alert" id="font">Thank you. Your order has been received.</p>';
    echo             '<div class="row mb-5">';
    echo                '<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">';
    echo                ' <div class="confirmation-card">';
    echo                    ' <h3 class="billing-title" >Order Info</h3>';
    echo                    ' <table class="order-rable">';
    echo                     '<tr >';
    echo                         '<td>Order number</td>';
    echo                         '<td>:'.$data['id_bill'].'</td>';
    echo                     '</tr>';
    echo                    '<tr >';
    echo                         '<td>Date</td>';
    echo                         '<td>:'.$data['Time'].'</td>';
    echo                       ' <td>Total</td>';
    echo                         '<td>:'.$data['total'].' Baht</td>';
    echo                    '</tr>';
    echo                    '<tr >';
    echo                        '<td>Payment method</td>';
    echo                        '<td>:'.$data['Check'].'</td>';
    echo                    '</tr>';
    echo                  ' </table>';
    echo               ' </div>';
    echo              ' </div>';
    echo              ' <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">';
    echo              '<div class="confirmation-card">';
    echo                  '<h3 class="billing-title" >Billing Address</h3>';
    echo                  '<table class="order-rable">';
    echo                  '<tr>';
    echo                      '<td>Street</td>';
    echo                     ' <td>: '.$data['Address'].'</td>';
    echo                  '</tr>';
    echo                 '<tr>';
    echo                     '<td>City</td>';
    echo                     '<td>:'.$data['City'].'</td>';
    echo                   '</tr>';
    echo                 ' <tr>';
    echo                       '<td>Country</td>';
    echo                       '<td>:'.$data['State'].'</td>';
    echo                 ' </tr>';
    echo                  '<tr>';
    echo                      '<td>Postcode</td>';
    echo                      '<td>:'.$data['Zip'].'</td>';
    echo                  '</tr>';
    echo                 '</table>';
    echo              '</div>';
    echo              '</div>';
    echo              '<div class="col-md-6 col-xl-4 mb-4 mb-xl-0">';
    echo             '<div class="confirmation-card">';
    echo                  '<h3 class="billing-title">User Data</h3>';
    echo                  '<table class="order-rable">';
    echo                  '<tr>';
    echo                      '<td>Name</td>';
    echo                      '<td>: '.$data['Firstname'].'</td>';
    echo                  '</tr>';
    echo                   '<tr>';
    echo                       '<td>E-mail</td>';
    echo                      '<td>:'.$data['Email'].'</td>';
    echo                  '</tr>';
    echo                  '</table>';
    echo              '</div>';
    echo              '</div>';
    echo          '</div>';
    echo         '</div>';
    echo     '</section>';
        }
  ?>
    <?php
    include "Footer.php";
?>
</body>

</html>