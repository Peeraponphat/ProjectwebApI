<!DOCTYPE html>
<html lang="en">

<head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<body>
    <!-- Messenger ปลั๊กอินแชท Code -->
    <div id="fb-root"></div>

    <!-- Your ปลั๊กอินแชท code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "129890238583310");
    chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v16.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php
include 'Header_Home.php';?>
    <?php
include 'Landing.php';
include 'Productslide.php';
include 'Service.php';
include 'Footer.php';
?>

</body>

</html>