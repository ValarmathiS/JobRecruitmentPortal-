<html>
<head>
<title>View Report
</title>
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","viewreport.php?report_type="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<center><p align="right">
<a href="logout.php">Logout</a></p>
<h1>View Reports</h1>
<form name="ranklistform">
Select Report &nbsp;&nbsp;&nbsp;&nbsp;
			<select name= "report" id="report" onchange="showUser(this.value)">
				<option value="CandidateRankList">Candidate Rank List</option>
				<option value="CandidateMarkList">Candidate Mark List</option>
			</select>
		
</form>

<div id="txtHint"><b>Candidate info will be listed here.</b></div>



</center>
</body>
<html>