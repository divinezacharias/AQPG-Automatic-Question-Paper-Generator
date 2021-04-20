<?php
session_start();
$msg="&nbsp;";
if(isset($_GET['id']))
{
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
			$username=$dao->get_scalar("Username","coursehead","CH_ID='".$_GET['id']."'");
			if($dao->update(array("Status"=>"removed"),"coursehead","CH_ID='".$_GET['id']."'"))
			{
				$dao->delete("login","Username='$username'");
			}
			header("location:view_course_heads.php");
}


?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>

<html>
<head>
<title>
 Add_Course
</title>
<style>
	body
	{
	background-color:#F5F2F2;
	padding-top:20px;
	border: 6px solid #5bc0de;
	width:100%;
	height:100%;

	}
	#submit
	{
	align:center;
	}
	.row
	{
	margin-top:1.5%;
	font-size:15px;
	}
	h1
	{
	 height:100%;
	 color:white;
	 font-family:'Ruda', sans-serif;
	 padding-left:20px;
	 width:100%;
	}
	#head
	{
	 height:12%;
	 background-color:#68dff0;
	}
	#d1
	{
	 padding-left:13%;
	}
</style>
</head>
<body>
<?php include("adminHead.php"); ?>
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h1>Admin Panel</h1>
			</div>
			</div>
		    
        </div>
</div>
<body>
</html>
