<!Doctype HTML>
<html>
<head>
<title>Candidate Registration
</title>

<style>
.error {color: #FF0000;}
</style>


</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["dob"])) {
     $dobErr = "DOB is required";
   } else {
     $dob = test_input($_POST["dob"]);
   }
   
   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
   
   if (empty($_POST["address"])) {
     $addressErr = "Address is required";
   } else {
     $address = test_input($_POST["address"]);
   }
   
   if (empty($_POST["clg"])) {
     $clgErr = "College Name is required";
   } else {
     $clg = test_input($_POST["clg"]);
   }
   
    if (empty($_POST["degree"])) {
     $degreeErr = "Degree is required";
   } else {
     $degree = test_input($_POST["degree"]);
   }
   
   if (empty($_POST["branch"])) {
     $branchErr = "Branch is required";
   } else {
     $branch = test_input($_POST["branch"]);
   }
   
   if (empty($_POST["cgpa"])) {
     $cgpaErr = "CGPA is required";
   } else {
     $cgpa = test_input($_POST["cgpa"]);
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
   
   if (empty($_POST["phno"])) {
     $phnoErr = "Phone Number is required";
   } else {
     $phno = test_input($_POST["phno"]);
   }
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="JobRecruitmentPortal.php">Home</a></p>

<center>


<h2>Candidate Registration</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="SaveCandidate.php"> 
<table>
   <tr><td>
   Name:</td><td> <input type="text" name="name" required="required">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br></td></tr>
   
   <tr><td>
   DOB:</td><td> <input type="Date" name="dob" required="required">
   <span class="error">* <?php //echo $dobErr;?></span>
   <br><br></td></tr>
   
   <tr><td>
   Gender:</td><td>
   <input type="radio" name="gender" value="female" required="required">Female
   <input type="radio" name="gender" value="male" required="required">Male
   <span class="error">* <?php echo $genderErr;?></span></td><tr>
   
    <tr><td>
   Address:</td><td> <textarea name="address" rows="5" cols="40"></textarea>
   <span class="error">* <?php //echo $addressErr;
   ?></span>
   <br><br>
   </td></tr>
   
   <tr><td>
   College:</td><td> <input type="text" name="clg">
   <span class="error">* <?php //echo $clgErr;
   ?></span>
   <br><br></td></tr>
   
   <tr><td>
   Degree:</td><td> <input type="text" name="degree">
   <span class="error">* <?php //echo $degreeErr;
   ?></span>
   <br><br></td></tr>
   
   <tr><td>
   Branch:</td><td> <input type="text" name="branch">
   <span class="error">* <?php //echo $branchErr;
   ?></span>
   <br><br></td></tr>
   
   <tr><td>
   CGPA:</td><td> <input type="text" name="cgpa">
   <span class="error">* <?php //echo $cgpaErr;
   ?></span>
   <br><br></td></tr>
   
   <tr><td>
      E-mail: </td><td><input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   </td></tr>
  
   <tr><td>
   Phone No:</td><td> <input type="text" name="phno">
   <span class="error">* <?php //echo $phnoErr;
   ?></span>
   <br><br></td></tr>
   </table>
   <br>
   <input type="submit" name="submit" value="Submit"> 
</form>

</center>
</body>
</html>