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
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				Faculties 
			</div>
			</div>
			<table border="1" id="t1" width="100%" >
				<tr>
					<th>Name</th>
					<th>Username</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Date of join</th>
					<th>Photo</th>
					<th></th>
					<th></th>
				
				
				</tr>
		    <?php
				if($data=$dao->select_array(array("*"),"faculity","course_code='".$data[0]['course_code']."' and Status='active'"))
				{
				foreach($data as $row)
				{
				?>
					<tr>
						<td><?php echo $row['F_Name']; ?></td>
						<td><?php echo $row['Username']; ?></td>
						
						<td><?php echo $row['Phone']; ?></td>
						<td><?php echo $row['Mail']; ?></td>
						<td><?php echo date("d/M/Y",$row['DOJ']); ?></td>
						<td><img src="assets/photo/<?php echo $row['Photo']; ?>" width="100px" height="100px" /></td>
						
						<td><a href="remove_faculty.php?id=<?php echo $row['F_Id']; ?>">Remove</a></td>
						
						
					</tr>
				
				
				<?php
				}
			}
				?>
				</table>
		    
</div>
<body>
</html>
