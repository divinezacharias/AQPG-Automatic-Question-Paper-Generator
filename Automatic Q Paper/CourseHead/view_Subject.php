<?php
session_start();
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	
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
	#t1 td, #t1 th
	{
		padding:5px;
	}
	
	
</style>
</head>
<body>
<?php include("courseHead.php"); ?>
<form name="f1" method="post" action="" enctype="multipart/form-data" >
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				Add Subject
			</div>
			</div>
		    
			
		    <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Syllabus    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			   <select name="sem">
				<option selected="selected"disabled="disabled">Sem</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
			   
			   </select>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Syllabus    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			   <select name="year">
				<option selected="selected"diasbled="disabled">Syllabus</option>
				<?php
					echo $dao->create_option("","syl_year","syllabus","syl_status='active'");
				?>
			   
			   </select>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
		    
			
			<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
				<button type="submit" class="btn btn-info" id="sbmt" name= "add">View</button>
			</div>
        </div>
        
        </form>
        <?php
			if(isset($_POST['sem']))
			{
				if($data=$dao->select_array(array("*"),"subject","sub_sem='".$_POST['sem']."' and sub_syl_year='".$_POST['year']."' and sub_course_code='".$data[0]['course_code']."'"))
				{
				
					?>
					<table border="1" id="t1" width="100%" >
					<tr>
						<th>Subject Name</th>
						<th>Subject Code</th>
						<th>Semenster</th>
						<th>Syllabus</th>
						
					</tr>
			   <?php
					
					foreach($data as $row)
					{
					?>
						<tr>
							<td><?php echo $row['sub_name']; ?></td>
							<td><?php echo $row['sub_code']; ?></td>
							<td><?php echo $row['sub_sem']; ?></td>
							<td><?php echo $row['sub_syl_year']; ?></td>
						</tr>
					<?php
					}
				?>
				</table>
				<?php
			}
			else
				echo "<p align='center'>No Subjects Found</p>";
			}
				?>
				

<body>
</html>
