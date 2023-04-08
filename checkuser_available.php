<?php

    include_once('functions.php');

    $usernamecheck = new DB_con();

    // Getting post value
    $uname = $_POST['username'];

    // call function usernameavailable
    $sql = $usernamecheck->usernameavailable($uname);

    $num = mysqli_num_rows($sql);

    if ($num > 0) {
        echo "<span style='color: red;'>Username already associated with another account.</span>";
        echo "<script>$('#signup').prop('disabled', true);</script>"; //change button register to disable if username has already 
    } else {
        echo "<span style='color: blue;'>Username available for registration.</span>";
        echo "<script>$('#signup').prop('disabled', false);</script>";
    }

?>