<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="cs/Cart1.css" rel="stylesheet" />
    <link href="web/css/styles.css" rel="stylesheet" />
    <style>
    .filterDiv {
        text-align: center;

        display: none;
    }

    .show {
        display: block;
    }

    .container1 {
        overflow: hidden;
    }

    /* Style the buttons */
    .btn1 {
        border: none;
        outline: none;
        /*padding: 12px 16px;*/
        background-color: white;
        cursor: pointer;
    }

    .btn1:hover {
        background-color: #ddd;
    }

    .btn1.active {
        background-color: white;
        color: white;
    }
    </style>
</head>

<body>
    <!-- Header-->
    <header class="bg-white py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-dark">
                <div id="myBtnContainer">
                    <button class="btn1 active" onclick="filterSelection('Jerhigh')"><img src="src/jer.png" alt=""
                            width="250px" height="150px"></button>
                    <button class="btn1 active" onclick="filterSelection('Pedigree')"><img src="src/ped.png" alt=""
                            width="250px" height="150px"></button>
                    <button class="btn1 active" onclick="filterSelection('Smartheart')"><img src="src/smart.png" alt=""
                            width="280px" height="180px"></button>

                </div>
            </div>
        </div>
    </header>
    <!-- Section-->



    <section class="py-5" style="background-color:#FFF2CC;">
        <div class="container px-4 px-lg-5 mt-5" style="background-color:#FFF2CC;">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
                style="background-color:#FFF2CC;">
                <?php
                include "Connect.php";
                    $sql = "SELECT * FROM `product` WHERE `Type`='สุนัข'";
                    $query = mysqli_query($conn,$sql);
                    while ($data=mysqli_fetch_array($query)){
                        echo ' <div class="filterDiv '.$data['brand'].$data['Foodtype'].' ">';
                    echo '<div class="col mb-5" >';
                        echo '<div class="card h-100">';
                            //Product image-->
                            echo '<img class="card-img-top" src="food img/'.$data['Picture'].'" alt="..." />';
                            //<!-- Product details-->
                            echo '<div class="card-body p-4">';
                                echo '<div class="text-center">';
                                    //<!-- Product name-->
                                    echo '<h5 class="fw-bolder">'. $data['Product_name'].'</h5>';
                                    //<!-- Product reviews-->
                                    echo '<div class="d-flex justify-content-center small text-warning mb-2">';
                                        echo '<div class="bi-star-fill"></div>';
                                        echo '<div class="bi-star-fill"></div>';
                                        echo '<div class="bi-star-fill"></div>';
                                        echo '<div class="bi-star-fill"></div>';
                                        echo '<div class="bi-star-fill"></div>';
                                    echo '</div>';
                                    //<!-- Product price-->
                                    echo $data['Price'];
                                echo '</div>';
                            echo '</div>';
                            //<!-- Product actions-->
                            
                            echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                                echo '<div class="text-center">';
                                echo '<div class="page-wrapper">';
                                echo '<form action="" method="POST">';
                                echo '<input type="text" id="'.$data['Id_product'].'" name="'.$data['Id_product'].'" value="'.$data['Id_product'].'" required />';
                                echo ' <input id="font" type="submit" name="submit" value="BUY THIS" class="btn" required
                                    style="background-color:#DFA67B;"/>';
                                echo '</form>';
                                
                                if(isset($_POST['submit'])){
                                    $data["Id_product"] =$_POST[''.$data['Id_product'].''];
                                    $data["Id_member"] =$_COOKIE['TestCookie'];
                                    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
                                    
                                    $ch = curl_init('http://127.0.0.1/WebProject/add.php');
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                
                                    $response = curl_exec($ch);
                                    curl_close($ch);
                                    $result = json_decode($response);
                                    echo "<script type = 'text/javascript'>";
                                    echo "window.history.back()";
                                    echo "</script>";
                                    }
                                echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';}
                
                ?>


                <?php

echo '<a href="Cart.php">';
echo   ' <div id="cart" class="cart" data-totalitems="" style="margin-top:20%;">';
echo        '<i class="fas fa-shopping-cart"></i>';
echo    '</div>';
echo '</a>';
?>


            </div>
        </div>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="web/js/scripts.js"></script>
    <script src="jss/Add1.js"></script>
    <script>
    filterSelection("all")

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
    </script>
</body>

</html>