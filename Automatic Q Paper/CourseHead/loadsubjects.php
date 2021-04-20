<?php
session_start();
if(isset($_GET['sem']) && isset($_GET['year']))
{
	$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	
		echo $dao->create_option("sub_id","sub_code","subject","sub_course_code='".$data[0]['course_code']."' and sub_syl_year='".$_GET['year']."' and sub_sem='".$_GET['sem']."'");
}


?>
