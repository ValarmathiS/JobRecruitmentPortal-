<!Doctype Html>
<html>
<head>
<title>Job Recruitment Portal</title>

</head>
<body>
<?php
session_start();

?>
<center>
<p align="right">
<a href="logout.php">Logout</a></p>
<h1>Welcome to Job Recruitment Portal</h1>
<form name="myForm" method ="POST" action="ViewRankList.php"> 
<table>
	<tr>
		<td>Select Candidate</td><td></td>
		<td>
			<select name= "cid" id="CID">
			
			//<?php
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
				
				$Cand_ID_sql = "select * from candidate";

				$id = mysqli_query($conn, $Cand_ID_sql);

				foreach($id as $rows){
					// echo $row['Rec_ID'];
					echo '<option value="'.$rows['Cand_ID'].'">'.$rows['Cand_ID'].'</option>';
   
				}
				//to close connection
				mysqli_close($conn);
			
			?>
			
			
			
				<!--<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>-->
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>Mark</td><td></td>
		<td>
			<select name= "mark" id="mark">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
	
</table><br /><button type="button" onclick="updateMark()">Rate</button><br />
<input type="submit" name="submit" value="Submit"> 
<script>
	function updateMark()
	{
		
		//Values sent to php
		var ajaxRequest;  // The variable that makes Ajax possible!
		try{
   
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
			}catch (e){
      
				// Internet Explorer Browsers
				try{
						ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
					}catch (e) {
         
					try{
						ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
					}catch (e){
                     // Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
		
	
	ajaxRequest.onreadystatechange = function()
	{
   
		if(ajaxRequest.readyState == 4)
		{
			alert("Rated Successfully");
		}
	}
		// Now get the value from user and pass it to
		// server script.
		
		var CID = document.getElementById("CID").value;
		var mark = document.getElementById("mark").value;
		var queryString = "?CID=" + CID ;
		
		queryString +=  "&mark=" + mark;
		ajaxRequest.open("GET", "updatemark.php" + queryString, true);
		ajaxRequest.send(null);

		//Alert for Rating
		//alert("Rated Successfully");
	}

</script>

</form><!--<div id='ratemsg'>Rating Started</div>-->
</center>
</body>
</html>