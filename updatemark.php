<?php
// Connecting DB and Updating mark to candidates
session_start();

 $Iusername = $_SESSION["login_user"];
 
 //echo "$Iusername";
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
//echo " Connected successfully";

// Retrieve data from Query String
$CID = $_GET['CID'];
$mark = $_GET['mark'];

// Escape User Input to help prevent SQL Injection
//$CID = mysqli_real_escape_string($CID);
//$mark = mysqli_real_escape_string($mark);
//echo $CID;
//echo $mark;

$Rec_ID_sql = "select * from recruiter where username = '$Iusername'";

$id = mysqli_query($conn, $Rec_ID_sql);

while($row = mysqli_fetch_array($id)){
   //echo $row['Rec_ID'];
   global $Rec_ID;
   $Rec_ID = $row['Rec_ID'];
   
}
//$Rec_ID=2;
//$CID = 2;
//$mark =3;

// check candidate already registered
function checkCandidate()
{
	global $flag, $Rec_ID, $CID, $conn;
	$check_id_sql = "SELECT * FROM recruitercandidate WHERE Rec_ID = $Rec_ID AND Cand_ID =$CID";
	$check_list = mysqli_query($conn, $check_id_sql);
	
	if(mysqli_num_rows($check_list) == 1)
	{
		return false;
	}
	else 
	{
		//echo "TRUE INSIDE FUNCTION";
		return true;
	} 
	
}
$flag = checkCandidate();
//echo $flag;
if($flag)
//if(checkCandidate())
{
	//echo "Inside loop";
	$sql = "Insert into recruitercandidate(Rec_ID, Cand_ID,Mark) values($Rec_ID,$CID,$mark)";
	if(mysqli_query($conn, $sql))
	{
		//echo "Candidate mark Registered Successfully";
	}
	else
	{
		//echo "Candidate Not Registered";
	}


	$avg_mark = $mark/3;

	//echo $avg_mark;

	$mark_sql = "UPDATE candidate SET TMark=TMark+$avg_mark WHERE Cand_ID=$CID";

	if(mysqli_query($conn, $mark_sql))
	{
		//echo "Candidate mark updated Successfully";
	}
	else
	{
		//echo "Candidate Not Registered";
	}	
}
else
{
	echo "already rated for this candidate";
}

//to close connection
mysqli_close($conn);

?>