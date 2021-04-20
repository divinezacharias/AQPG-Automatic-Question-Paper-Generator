<?php
session_start();
$msg="&nbsp;";
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	$course=$data[0]['course_code'];
	


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
View Faculity
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
	padding-top:1.5%;
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
	.row:nth-child(even){
		background-color:white;
	}
	
</style>
</head>
<body>
<?php include("courseHead.php"); ?>
<form name="f1" method="post" action="" enctype="multipart/form-data" >
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				Newly added Questions 
			</div>
			</div>
			<div class="row" style="background-color:yellowgreen">
				<div  class="col-md-5 col-xs-5 col-sm-5" style="font-size:20px;">
					Question
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					Faculty
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					Subject
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					Module
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					Sem
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					Syllabus
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					&nbsp;
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					&nbsp;
				</div>
		    </div>
			<?php
			if($questions=$dao->select_array(array("*"),"insertquestion","q_course='$course' and q_status='pending'"))
			{
			foreach($questions as $q)
			{
			?>
			<div class="row">
				<div  class="col-md-5 col-xs-5 col-sm-5">
					<?php echo $q['Question']; ?>
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1">
					<?php echo $q['fac_username']; 
					$sub=$dao->select_array(array("*"),"subject","sub_id='".$q['s_id']."'");
					?>
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1">
					<?php echo $sub[0]['sub_code'] ?>
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1">
					<?php echo $q['q_module'] ?>
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1">
					<?php echo $sub[0]['sub_sem'] ?>
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1">
					<?php echo $sub[0]['sub_syl_year'] ?>
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1">
					<a href="approve.php?id=<?php echo $q['q_id']; ?>">Approve</a>
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1">
					 <a href="remove.php?id=<?php echo $q['q_id']; ?>">Remove</a>
				</div>
		    </div>
		    <?php
			}}
			else
			{
				echo "<p>No New Questions Added</p>";
			}
		?>
		    
</div>
<body>
</html>
