<?php
session_start();
$msg="&nbsp;";
$uname=$_SESSION['faculty'];
require_once("classes/data_access.class.php");
$dao=new DataAccess();

$data=$dao->select_array(array("*"),"faculity","Username='".$uname."'");
if(isset($_POST['question']))
{	
	$course=$dao->get_scalar("course_code","faculity","Username='$uname'");
	$arr=array('',$_POST['sub'],$course,$uname,$_POST['question'],$_POST['qtype'],$_POST['hardness'],$_POST['module'],"pending");
	if($dao->insert_full($arr,"insertquestion"))
	{
		$msg="Question added";
		
	}
	else
	{
		$msg="Failed To add Question";
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
</style>
</head>
<body>
<?php include("Faculty.php"); ?>
<form method="post">
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h1>Add Questions</h1>
			</div>
			</div>
		   
			<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Semenster     :
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="sem" required >
									<option selected="selected" disabled="disabled">sem</option>
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
				</div></div>
		
			
			
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Syllabus
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<select class="form-control"  id="f_id" name="year" required >
								<option selected="selected" disabled="disabled">Syllabus</option>
								<?php
									echo $dao->create_option("","syl_year","syllabus","syl_status='active'");
								?>
						</select>  
			</div>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
		    <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Syllabus
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<select class="form-control"  id="sub" name="sub" required >
								<option selected="selected" disabled="disabled">Subject</option>
								
						</select>  
			</div>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
			<script language="javascript">
			var xmlhtobj;
			if(window.XMLHttpRequest)
			{
				xmlhtobj=new XMLHttpRequest();
			}
			else
			{
				xmlhtobj=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			
			
			document.getElementById("f_id").onchange=function(){
				//alert("sds");
				xmlhtobj.onreadystatechange=function(){
				
					if(xmlhtobj.readyState==4 && xmlhtobj.status==200)
					{
						//alert(xmlhtobj.responseText);
						document.getElementById("sub").innerHTML="<option selected='selected' disabled='disabled'>Subject</option>"+xmlhtobj.responseText;
					}
				
				};
				url="loadsubjects.php?sem="+document.getElementById("s_id").value+"&year="+document.getElementById("f_id").value;
				xmlhtobj.open("GET",url,true);
				xmlhtobj.send();
				
			};

			
			</script>
			<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Module
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="module"  required >
									<option selected="selected" disabled="disabled">Module</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
							</select>  
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div>
				</div>
						<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Enter The Question Here    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <textarea class="form-control" name="question" id= "adsrs" cols="60" rows="5"  required ></textarea>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			</div>
		    </div>
			
			<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Question Type
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="qtype"  required >
									<option selected="selected" disabled="disabled">Type</option>
									<option value="oneword">One Word</option>
									<option value="short">Short Question</option>
									<option value="brief">Brief Question</option>
									<option value="essay">Essay</option>
									
							</select>  
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div>
				</div>
				
				<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Hardness
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="hardness"  required >
									<option selected="selected" disabled="disabled">Hardness</option>
									<option value="easy">Easy</option>
									<option value="medium">Medium</option>
									<option value="hard">Hard</option>
									
							</select>  
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div>
				</div>
		
		<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
			
				<button class="btn btn-info"name="smbt_qppr">Add</button> <?php echo $msg; ?>
			</div>
        </div>
        </div>
         <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			  
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
		    <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			&nbsp;
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
</div></form>
<body>
</html>
