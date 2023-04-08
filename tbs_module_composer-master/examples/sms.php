<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <label>Phone number:</label><br />
        <input type="text" name="phonenum" id="phonenum" placeholder="Enter Phone-Number" required />
        <br /><br />
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
if(isset($_POST['submit'])){

require_once __DIR__ . "/../src/thaibulksms-api/sms.php";


$apiKey = 'eg9g4cFksyo5cg7ZzATU0z6jU-PToC';
$apiSecretKey = '_HkJSk81e3_HzmSuWoU6rcYPxjHx4w';

$sms = new \THAIBULKSMS_API\SMS\SMS($apiKey, $apiSecretKey); 

$body = [
    'msisdn' => ''.$_POST['phonenum'].'',
    'message' => 'แจ้งเลขพัสดุภายใน2-3วันครับ',
    // 'sender' => '',
    // 'scheduled_delivery' => '',
    // 'force' => ''
];
$res = $sms->sendSMS($body);

if ($res->httpStatusCode == 201) {
    echo "Succes";
    var_dump($res);
} else {
    echo "Error";
    var_dump($res);
}
echo "<script type = 'text/javascript'>";
echo "window.location ='http://127.0.0.1/WebProject/Market.php'";
echo "</script>";
}

?>
</body>

</html>