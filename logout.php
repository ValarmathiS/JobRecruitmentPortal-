
<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: JobRecruitmentPortal.php"); // Redirecting To Home Page
}
?>
