<html>
<body>

<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="JobRecruitmentPortal.php">Home</a></p>
<center>

<?php

//echo "Saved";


    // collect value of input field
    $name = $_POST['name'];
	//echo "$name";
	$dob = $_POST['dob'];
	//echo "$dob";
	$gender = $_POST['gender'];
	//echo "$gender";
	$address = $_POST['address'];
	//echo "$address";
	$college = $_POST['clg'];
	//echo "$college";
	$degree = $_POST['degree'];
	//echo "$degree";
	$branch = $_POST['branch'];
	//echo "$branch";
	$cgpa = $_POST['cgpa'];
	//echo "$cgpa";
	$email = $_POST['email'];
	//echo "$email";
	$phno = $_POST['phno'];
	//echo "$phno";



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
//Insert Candidate
//$sql = "Insert into Candidate(Cand_Name, DOB, gender, Address, College, Degree, Branch, CGPA, Email_id, Ph_no) values("'$name'","'$dob'","'$gender'","'$address'","'$college'","'$degree'","'$branch'", $cgpa, "'$email'",$phno)";
//$sql = "Insert into Candidate(Cand_Name, DOB, gender, Address, College, Degree, Branch, CGPA, Email_id, Ph_no) values('Valarmathi','1993-01-10','female','Erode','CEG','MCA','Computer Application', 8, 'valarmathi@gmail.com',1234567890)";
$sql = "Insert into Candidate(Cand_Name, DOB, gender, Address, College, Degree, Branch, CGPA, Email_id, Ph_no) values('$name','$dob','$gender','$address','$college','$degree','$branch', $cgpa, '$email',$phno)";
if(mysqli_query($conn, $sql))
{
	echo "Candidate Registered Successfully";
}
else
{
	echo "Candidate Not Registered";
}

/*
// Create database
$sql = "CREATE DATABASE JobRecruitment";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
*/

//to close connection
mysqli_close($conn);
?>

</center>
</body>
</html>