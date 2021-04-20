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
	#t1 th
	{
		min-width:100px;
		text-aligh:center;
		}
		tr:nth-child(even)
		{
			background-color:white;
		}
		
</style>
</head>
<?php include("adminHead.php"); ?>
<body>
	<form name="f1" method="post" action="" enctype="multipart/form-data" >
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				View Course Admins
			</div>
			</div>
			<table border="0" id="t1" width="99%" style="margin-top:10px" >
				<tr style="height:20px">
					<th>Name</th>
					<th>Username</th>
					<th>Course</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Date of join</th>
					<th>Photo</th>
					<th></th>
					
				
				
				</tr>
		    <?php
				$data=$dao->select_array(array("*"),"coursehead","1 order by Status");
				foreach($data as $row)
				{
				?>
					<tr>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['Username']; ?></td>
						<td><?php echo $row['course_code']; ?></td>
						<td><?php echo $row['Phone']; ?></td>
						<td><?php echo $row['Mail']; ?></td>
						<td><?php echo date("d/M/Y",$row['DOJ']); ?></td>
						<td><img src="assets/photo/<?php echo $row['Photo']; ?>" width="100px" height="100px" /></td>
						<?php
						if($row['Status']=='active')
						{
						?>
						<td><a href="remove_course_admin.php?id=<?php echo $row['CH_ID']; ?>">Remove</a></td>
						<?php
						}
						else
						{
							?>
							<td>Removed</td>
							<?php
							
						}
					
						?>
						
					</tr>
				
				
				<?php
				}
				?>
				</table>
        </form>
</div>
<body>
</html>
