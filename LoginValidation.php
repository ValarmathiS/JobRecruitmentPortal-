<!Doctype Html>
<html>
<head>
<title>Job Recruitment Portal</title>
</head>
<body>
<?php 

session_start();

	$uname = $_POST['uname'];
	//echo "$uname";
	$pwd = $_POST['pwd'];
	//echo "$pwd";

	//$uname = "dharshini12";
	//$pwd = "dharsh_1";
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "JobRecruitment";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$sql = "SELECT * from recruiter WHERE username = '$uname' AND password='$pwd'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION["login_user"]=$uname; // Initializing Session
header("location: RecruiterHome.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
echo "$error";
}
//echo "Redirected";
//to close connection
mysqli_close($conn);
?>




</body>
</html>