<?php
session_start();
$msg="&nbsp;";
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	if(!(isset($_SESSION['q']) and isset($_SESSION['q'])))
	{
		header("location:addexam.php");
	}
	$exid=$_SESSION['examid'];
	//print_r($_SESSION['q']);
	foreach($_SESSION['q'] as $qtype=>$qhardness)
	{
		foreach($qhardness as $module=>$questions)
		{
			foreach($questions as $q)
			{
				foreach($q as $qid)
				{
					$qdetais=$dao->select_array(array("*"),"insertquestion","q_id='$qid'");
					$dao->insert_full(array('',$exid,$qid,$qdetais[0]['q_type'],$qdetais[0]['q_hardness'],$qdetais[0]['q_module'],'act'),"questionpaper");
				
				}
				//print_r($qid);
			}
		}
	}
	
	//header("location:viewQpaper.php?exid=$exid");



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
 Add Faculity
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
	
</style>
</head>
<body>
<?php include("courseHead.php"); ?>
<form name="f1" method="post" action="" enctype="multipart/form-data" >
<div class="container-fluid">
            <div id="head" class="row" style="ovrflow:hidden;">
			</div>
			<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h4>Question Paper generated, You can only see the question paper on or after the date of Examination.....</h4>
			</div>
			
			
			</div>
<body>
</html>
