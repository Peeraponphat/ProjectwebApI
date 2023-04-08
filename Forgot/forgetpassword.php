<html>

<body>
    <form action="" method="GET">
        <label>FORGOT PASSWORD</label><br />
        <input type="text" id="username" name="username" placeholder="Enter User Name" required />
        <br /><br />
        <button type="submit" name="forget" id="forget">Forgot</button>
    </form>

    <?php
    include("dbCon.php");

if(isset($_GET['forget'])){
    //$data = json_encode( $data, JSON_UNESCAPED_UNICODE );
    //echo $data;

    if(!empty($_GET["username"]))
			{
				$uname=$_GET["username"];
				get_password($uname);
			}
			
}

/*function get_allpassword()
	{
		global $conn;
		$query="SELECT password FROM tblusers";
		$response=array();
		$result=mysqli_query($conn, $query);
		while($row=mysqli_fetch_assoc($result))
		{
			$response[]=$row;

		}
		header('Content-Type: application/json');
		echo json_encode($response);
    }
  */

    function get_password($uname)
    {
		global $conn;
		$query="SELECT password FROM tblusers WHERE username='$uname'";
		$response=array();
		$result=mysqli_query($conn, $query);
		while($row=mysqli_fetch_assoc($result))
		{
			$response[]=$row;
		}
		//header('Content-Type: application/json');
		//echo json_encode($response);
        $answer = json_encode($response);
        echo "<script type='text/javascript'>alert('$answer');</script>"; 
    }
?>
</body>

</html>