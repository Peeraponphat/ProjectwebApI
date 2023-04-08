<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">


    <link rel="stylesheet" href="cs/slide2.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

</head>

<body>
    <div class="container" id="#HIDE">

        <div class="slider owl-carousel">
            <?php
                include "Connect.php";
                    $sql = "SELECT * FROM `product` WHERE `Type`='สุนัข'";
                    $query = mysqli_query($conn,$sql);
                    while ($data=mysqli_fetch_array($query)){

           echo '<div class="card">
                <div class="img">
                    <img src="food img/'.$data['Picture'].'" alt="">
                </div>
                <div class="content">
                    <div class="title">
                    '.$data['Product_name'].'</div>
                    <div class="sub-title">
                    '.$data['brand'].'</div>
                    <div class="btn">
                        <button>Read more</button>
                    </div>
                </div>
            </div>';
            
}?>
        </div>
    </div>

    <script>
    $(".slider").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000, //2000ms = 2s;
        autoplayHoverPause: true,
    });
    </script>

</body>

</html>