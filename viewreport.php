<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
session_start();
$Iusername = $_SESSION["login_user"];

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

//get value from str
$report_type = $_GET['report_type'];

echo "$report_type";

if($report_type == "CandidateMarkList")   //Candidates mark List from InterviewerCandidate table
{
	$Rec_ID_sql = "select * from recruiter where username = '$Iusername'";
	$id = mysqli_query($conn, $Rec_ID_sql);
	
	
	
	while($row = mysqli_fetch_array($id))
	{
		// echo $row['Rec_ID'];
		global $Rec_ID;
		$Rec_ID = $row['Rec_ID'];
   
	}
	
	//$Interviewer_mar_sql="SELECT * FROM recruitercandidate WHERE Rec_ID=$Rec_ID";
	//$result = mysqli_query($conn, $Interviewer_mar_sql);
	
	$query2 = "SELECT RC.Rec_ID, RC.Cand_ID, C.Cand_Name, C.Degree, C.Branch, RC.Mark from recruitercandidate RC, candidate C WHERE RC.Rec_ID=$Rec_ID AND C.Cand_ID= RC.Cand_ID ";
	$result = mysqli_query($conn, $query2);
	
	
	
	echo "<table>
			<tr>
				<th>Rec_ID</th>
				<th>Cand_ID</th>
				<th>Cand_Name</th>
				<th>Degree</th>
				<th>Branch</th>
				<th>Mark</th>
			</tr>";
			
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
				echo "<td>" . $row['Rec_ID'] . "</td>";
				echo "<td>" . $row['Cand_ID'] . "</td>";
				echo "<td>" . $row['Cand_Name'] . "</td>";
				echo "<td>" . $row['Degree'] . "</td>";
				echo "<td>" . $row['Branch'] . "</td>";
				echo "<td>" . $row['Mark'] . "</td>";
				echo "</tr>";
			}
	echo "</table>";
}
else if($report_type == "CandidateRankList")  // Candidate rank list from Candidate table
{
	$ranklist_sql = "SELECT * FROM candidate ORDER BY TMark DESC";
	$result = mysqli_query($conn, $ranklist_sql);
	
	echo "<table>
			<tr>
				<th>Cand_ID</th>
				<th>Cand_Name</th>
				<th>Degree</th>
				<th>Branch</th>
				<th>Mark</th>
			</tr>";
			
			while($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
				echo "<td>" . $row['Cand_ID'] . "</td>";
				echo "<td>" . $row['Cand_Name'] . "</td>";
				echo "<td>" . $row['Degree'] . "</td>";
				echo "<td>" . $row['Branch'] . "</td>";
				echo "<td>" . $row['TMark'] . "</td>";
				echo "</tr>";
			}
	echo "</table>";
}

//to close connection
mysqli_close($conn);

?>
</body>
</html>

