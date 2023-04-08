<?php 
    session_start();
    include_once('functions.php');
    $userdata = new DB_con();  //create instant class (DB_CON)
    
    
    // if in line 5 is a signin function
    if (isset($_POST['signup'])) {
        $fname = $_POST['fullname'];   // get full name from signin form
        $uname = $_POST['username']; // get user name from signin form
        $uemail = $_POST['email']; // get email from signin form
        $password =$_POST['password']; // get password from signin form

        $sql = $userdata->registration($fname, $uname, $uemail, $password );

        if ($sql) {
            echo "<script>alert('Register Success');</script>";
            echo "<script>window.location.href='login.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try againsignup.');</script>";
            echo "<script>window.location.href='login.php'</script>";
        } // check if success or failed show alert

    } //when click submit then get variable into parameter

    //if in line 26 check username and password
    if (isset($_POST['login'])) {
        $uname = $_POST['usernamelogin'];
        $password = $_POST['passwordlogin'];

        $result = $userdata->login($uname, $password);
        $num = mysqli_fetch_array($result);  //fetch part  array of data & and keep file into session
        
        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['fname'] = $num['fullname'];
            setcookie("TestCookie",$_SESSION['id']);
            echo "<script>alert('Login Success');</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('Something went wrong Please try again login.');</script>";
            
           echo "<script>window.location.href='login.php'</script>";
        }
    }


?>
<?php include('Header_Home.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

</head>

<body>
    <form method="POST">
        <div class="d-flex justify-content-center align-items-center mt-5">


            <div class="card">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item text-center">
                        <a class="nav-link active btl text-white" id="pills-home-tab" data-toggle="pill"
                            style="background-color:#F4B183;" href="#pills-home" role="tab" aria-controls="pills-home"
                            aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link btr text-white" id="pills-profile-tab" data-toggle="pill"
                            style="background-color:#DFA67B;" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Signup</a>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">

                        <div class="form px-4 pt-5">

                            <input type="text" name="usernamelogin" id="usernamelogin" class="form-control"
                                placeholder="Username">

                            <input type="password" name="passwordlogin" id="passwordlogin" class="form-control"
                                placeholder="Password">
                            <button type="submit" name="login" class="btn btn-success btn-block"
                                style="background-color:#8df57e;">Login</button>

                        </div>



                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                        <div class="form px-4">

                            <input type="text" class="form-control" id="username" name="fullname"
                                placeholder="Full Name">

                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="User Name" onblur="checkusername(this.value)">
                            <!-- onblur is call function checkusername when typing in username -->
                            <span id="usernameavailable"></span>
                            <!--use to check username -->
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">

                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">

                            <button type="submit" name="signup" id="signup"
                                class="btn btn-primary btn-block">Signup</button>


                        </div>



                    </div>

                </div>




            </div>


        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    function checkusername(val) {
        $.ajax({
            type: 'POST',
            url: 'checkuser_available.php',
            data: 'username=' + val,
            success: function(data) {
                $('#usernameavailable').html(data);
            }
        });
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
<?php include('Footer.php');?>