<?php
session_start();
require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	$msg="&nbsp;";




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
 Add Course Head
</title>
<style>


	body
	{
	background-color:#F5F2F2;
	
	border: 6px solid #5bc0de;
	width:100%;
	padding-bottom:20px;
	mini-height:100%;
    max-height:200%;
	overflow:scroll;
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
	#t1 th, #t1 td
	{
		min-width:100px;
		text-aligh:center;
		padding:5px;
	}
		
</style>
</head>
<?php include("adminHead.php"); ?>
<body>
	<form name="f1" method="post" action="" enctype="multipart/form-data" >
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				View Courses
			</div>
			</div>
			<table border="1" id="t1" width="80%" >
				<tr>
					<th>Course Name</th>
					<th>Course Code</th>
					<th>Course Admin</th>
				</tr>
		    <?php
				$data=$dao->select_array(array("*"),"course","cr_status='active'");
				foreach($data as $row)
				{
				?>
					<tr>
						<td><?php echo $row['cr_name']; ?></td>
						<td><?php echo $row['cr_code']; ?></td>
						<td><?php echo $dao->get_scalar("Name","coursehead","course_code='".$row['cr_code']."' and Status='active' order by CH_ID desc"); ?></td>
						
						
						
					</tr>
				
				
				<?php
				}
				?>
				</table>
        </form>
</div>
<body>
</html>
