<?php
session_start();
$msg="&nbsp;";
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	




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
Change Password
</title>
<style>
    #sbmt
	{
	 height:40px;
	 width:75px;
	 font-size:20px;
	 border-radius:5px;
	}
	#sbmt:hover
	{
	background-color:#5bc0de;
	border:solid #F5F2F2 1px;
	}
    input[type="text"]
	{
	 width:250px;
	 height:35px;
	 
	}
	body
	{
	background-color:#F5F2F2;

	width:100%;
	padding-bottom:20px;
	}
	.row
	{
	margin-top:1.5%;
	font-size:15px;
	}
	#head
	{
	 background-color:#68dff0;
	 color:white;
	 font-family:Baskerville Old Face;
	 padding-left:20px;
	 
	 font-size:40px;
	}
	#d1
	{
	 padding-left:13%;
	}
	.container-fluid
	{
	min-height:100%;
    max-height:200%;
	overflow:scroll;
	}
	#t1 td, #t1 th
	{
		padding:5px;
	}
	
</style>
</head>
<body>
<?php include("courseHead.php"); ?>
<form name="f1" method="post"  >
	<form method="post">
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h1>Change Password</h1>
			</div>
		   
		   </div>
			<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Old Password     :
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
						<input type="password" name='oldp'  required />
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div></div>
				<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					New Password     :
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
						<input type="password" name='newp'  required />
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div></div>
				<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Confirm Password     :
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
						<input type="password" name='cp'  required />
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div></div>
		
			
		
			<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
				<button type="submit" class="btn btn-info" id="sbmt" name= "add">View</button>
			</div>
        </div>
			
			
		
</form>
</div>
<body>
</html>
