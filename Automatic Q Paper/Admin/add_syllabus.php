<?php
session_start();
$msg="&nbsp;";
if(isset($_POST['year']))
{
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
			
			$arr=array('',$_POST['year'],'active');
			if($_POST['year']>(date("Y")-20) && $_POST['year']<=date("Y"))
			{
				if(!$dao->if_exists("syl_year",$_POST['year'],"syllabus"))
				{
					if($dao->insert_full($arr,"syllabus"))
					{
						$msg=$_POST['year']." Syllabus Added";
					}
					else
						$msg="Failed...";
				}
				else
				{
					$msg=$_POST['year']." Already exists";
				}
				
			}
			else
			{
				$msg="Year should be between ".(date("Y")-20)." and ".date("Y");
			}
		
		
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
<form method="post">
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h1>Add Syllabus</h1>
			</div>
			</div>
		    <div class="row">
		    <div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Syllabus Year      :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="number" class="form-control" name="year" id="Crse_id" placeholder="Year" value="<?php echo date("Y"); ?>" required />
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
			</div>
			
		<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
			    <button class="btn btn-info" name="add">Add</button>
			</div>
        </div>
         <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
		
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			   <?php echo $msg; ?>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
</div>
</form>
<body>
</html>
