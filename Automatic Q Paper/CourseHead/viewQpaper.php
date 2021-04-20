<?php
session_start();
$msg="&nbsp;";
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	if(isset($_SESSION['examid']) or isset($_REQUEST['exid']))
	{
		if(isset($_SESSION['examid']))
		{
			$exid=$_SESSION['examid'];
		}
		else
		{
			$exid=$_REQUEST['exid'];
		}
	}
	else
	{
		header("location:viewexams.php");
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
	.tbl1
	{
		margin:20px;
		width:100%;
	}
	
	tr:nth-child(even)
	{
		background-color:white;
	}
	tr,th,td
	{
		height:40px;
	}
</style>
</head>
<body>
<?php include("courseHead.php"); ?>
<form name="f1" method="post" action="" enctype="multipart/form-data" >
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h3>View Question Paper</h3>
			</div>
			</div>
			
			
			<?php
			$qtypes=array();
			$arr=$dao->select_distinct('qp_qtype',"questionpaper","qp_examid='$exid'");
			
			$qsno=0;
			foreach($arr as $qtype)
			{
				$qtypes[]=$qtype[0];
			}
			
		//	print_r($qtypes);
			
			if(in_array("oneword",$qtypes))
			{
				$questions=$dao->select_array(array("*"),"questionpaper","qp_examid='$exid' and qp_qtype='oneword' order by qp_module");
				?>
				<table class="tbl1">
					<tr>
						<th colspan="4" align="center">One word Questions</th>
					</tr>
					<tr>
						<th>No.</th>
						<th>Question</th>
						<th>Module</th>
						<th>Hardness</th>
					</tr>
				<?php
				foreach($questions as $question)
				{
				?>
				<tr>
					<td><?php  echo ++$qsno;?></td>
					<td><?php echo $dao->get_scalar("Question","insertquestion","q_id='".$question['qp_qid']."'"); ?></td>
					<td><?php echo $question['qp_module']; ?></td>
					<td><?php echo $question['qp_hardness']; ?></td>
					
				</tr>	
			
				<?php
				}
				echo "</table>";
				
			}
			if(in_array("short",$qtypes))
			{
				$questions=$dao->select_array(array("*"),"questionpaper","qp_examid='$exid' and qp_qtype='short' order by qp_module");
				?>
				<table class="tbl1">
					<tr>
						<th colspan="4" align="center">Short Questions</th>
					</tr>
					<tr>
						<th>No.</th>
						<th>Question</th>
						<th>Module</th>
						<th>Hardness</th>
					</tr>
				<?php
				foreach($questions as $question)
				{
				?>
				<tr>
					<td><?php  echo ++$qsno;?></td>
					<td><?php echo $dao->get_scalar("Question","insertquestion","q_id='".$question['qp_qid']."'"); ?></td>
					<td><?php echo $question['qp_module']; ?></td>
					<td><?php echo $question['qp_hardness']; ?></td>
					
				</tr>	
			
				<?php
				}
				echo "</table>";
			}
			if(in_array("brief",$qtypes))
			{
				$questions=$dao->select_array(array("*"),"questionpaper","qp_examid='$exid' and qp_qtype='brief' order by qp_module");
				?>
				<table  class="tbl1">
					<tr>
						<th colspan="4" align="center">Brief Questions</th>
					</tr>
					<tr>
						<th>No.</th>
						<th>Question</th>
						<th>Module</th>
						<th>Hardness</th>
					</tr>
					
				<?php
				foreach($questions as $question)
				{
				?>
				<tr>
					<td><?php  echo ++$qsno;?></td>
					<td><?php echo $dao->get_scalar("Question","insertquestion","q_id='".$question['qp_qid']."'"); ?></td>
					<td><?php echo $question['qp_module']; ?></td>
					<td><?php echo $question['qp_hardness']; ?></td>
					
				</tr>	
			
				<?php
				}
				echo "</table>";
			}
			if(in_array("essay",$qtypes))
			{
				$questions=$dao->select_array(array("*"),"questionpaper","qp_examid='$exid' and qp_qtype='essay' order by qp_module");
				?>
				<table class="tbl1">
					<tr>
						<th colspan="4" align="center">Essay Questions</th>
					</tr>
					<tr>
						<th>No.</th>
						<th>Question</th>
						<th>Module</th>
						<th>Hardness</th>
					</tr>
				<?php
				foreach($questions as $question)
				{
				?>
				<tr>
					<td><?php  echo ++$qsno;?></td>
					<td><?php echo $dao->get_scalar("Question","insertquestion","q_id='".$question['qp_qid']."'"); ?></td>
					<td><?php echo $question['qp_module']; ?></td>
					<td><?php echo $question['qp_hardness']; ?></td>
					
				</tr>	
			
				<?php
				}
				echo "</table>";
			}
			
			
			if(isset($_SESSION['q']))
			{
				unset($_SESSION['q']);
			}
			
		if(isset($_SESSION['examid']))
			{
				unset($_SESSION['examid']);
			}
			
			?>
			</div>
<body>
</html>
