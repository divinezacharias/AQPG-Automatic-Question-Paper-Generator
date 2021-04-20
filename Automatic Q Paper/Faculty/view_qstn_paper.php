<?php
session_start();
$msg="&nbsp;";
$uname=$_SESSION['faculty'];
require_once("classes/data_access.class.php");
$dao=new DataAccess();

$data=$dao->select_array(array("*"),"faculity","Username='".$uname."'");

	
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
 Subject and Course
</title>
<style>
	body
	{
	background-color:#F5F2F2;
	padding-top:20px;
	border: 6px solid #5bc0de;
	width:100%;
	height:150%;

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
	mini-height:100%;
    max-height:200%;
	overflow:scroll;
	}
	#t1 th, #t1 td
	{
		padding:5px;
	}
</style>
</head>
<body>
<?php include("Faculty.php"); ?>

<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h1>Questions</h1>
			</div>
			</div>
			<?php
			if($data=$dao->select_array(array("*"),"insertquestion","fac_username='".$uname."' order by q_id desc"))
			{
			?>
		   <table border="1" id="t1" width="100%" >
				<tr>
					<th style="width:50%">Question</th>
					<th>Type</th>
					<th>Hardness</th>
					<th>Subject</th>
					<th>Sem</th>
					<th>Module</th>
					<th>Syllabus</th>
					
					
					
				
				
				</tr>
		    <?php
				$data=$dao->select_array(array("*"),"insertquestion","fac_username='".$uname."' order by q_id desc");
				foreach($data as $row)
				{
				?>
					<tr>
						<td><?php echo $row['Question']; ?></td>
						<td><?php echo $row['q_type']; ?></td>
						<td><?php echo $row['q_hardness']; ?></td>
						<?php
						
							$sub=$dao->select_array(array("*"),"subject","sub_id='".$row['s_id']."'");
						?>
						<td><?php echo $sub[0]['sub_code'] ?></td>
						<td><?php echo $sub[0]['sub_sem'] ?></td>
						<td><?php echo $row['q_module'] ?></td>
						<td><?php echo $sub[0]['sub_syl_year'] ?></td>
						
						
					</tr>
				
				
				<?php
				}
				?>
				</table>
			<?php
			
		}
		?>
</div>
<body>
</html>
