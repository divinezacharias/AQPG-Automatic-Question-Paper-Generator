<?php
session_start();
$msg="&nbsp;";
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	if(isset($_POST['sem']) && isset($_POST['year']) && isset($_POST['sub']))
	{
		$date=mktime(0,0,0,$_POST['month'],$_POST['day'],$_POST['dyear']);
		if($date>=mktime(0,0,0,date("n"),date("j"),date("Y")))
		{
			$dao->insert_full(array('',$data[0]['course_code'],$date,$_POST['year'],$_POST['sub'],$uname,$_POST['details'],'pend'),"exams");
			$_SESSION['examid']=$dao->max("exam_id","exams","1");
			header("location:custexam.php");
		}
		else
		{
			$msg="Past date not Allowed";
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
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				New Exam
			</div>
			</div>
			
			
			<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Semenster     :
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="sem" required>
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
				Subject
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<select class="form-control"  id="sub" name="sub"  required >
								<option selected="selected" disabled="disabled">Subject</option>
								
						</select>  
			</div>
			</div>
			
			</div>
			
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Exam Date 
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="day" name="day"  required >
								<?php
								$i=1;
								while($i<=31)
								{
									if($i==date("j"))
									{
										echo "<option selected value='$i'>$i</option>";
									}
									else
									{
										echo "<option value='$i'>$i</option>";
									}
									$i++;
								}
								
								?>
								
							</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="month" name="month"  required >
								<option value="1" <?php if(date("n")==1){ echo "selected"; } ?>>Jan</option>
								<option value="2" <?php if(date("n")==2){ echo "selected"; } ?>>Feb</option>
								<option value="3" <?php if(date("n")==3){ echo "selected"; } ?>>Mar</option>
								<option value="4" <?php if(date("n")==4){ echo "selected"; } ?>>Apr</option>
								<option value="5" <?php if(date("n")==5){ echo "selected"; } ?>>May</option>
								<option value="6" <?php if(date("n")==6){ echo "selected"; } ?>>Jun</option>
								<option value="7" <?php if(date("n")==7){ echo "selected"; } ?>>Jul</option>
								<option value="8" <?php if(date("n")==8){ echo "selected"; } ?>>Aug</option>
								<option value="9" <?php if(date("n")==9){ echo "selected"; } ?>>Sep</option>
								<option value="10" <?php if(date("n")==10){ echo "selected"; } ?>>Oct</option>
								<option value="11" <?php if(date("n")==11){ echo "selected"; } ?>>Nov</option>
								<option value="12" <?php if(date("n")==12){ echo "selected"; } ?>>Dec</option>
								
							</select>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-2 col-lg-2">
							<select id="year" name="dyear"  required >
									<?php
								$i=date("Y");
								while($i<=date("Y")+1)
								{
									if($i==date("Y"))
									{
										echo "<option value='$i' selected='selected'>$i</option>";
									}
									else
									{
										echo "<option value='$i'>$i</option>";
									}
									$i++;
								}
								
								?>
								</select>
						</div>
					</div>
				</div>
				
				 <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
			
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
						<?php echo $msg; ?>
			</div>
			</div>
			
			</div>
            
		    </div>
				 <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
			Description
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<textarea name="details" cols="40" rows="5"></textarea>
			</div>
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
			
			<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
				<button type="submit" class="btn btn-info" id="sbmt" name= "add">Add</button>
			</div>
			</div>
        </div>
<body>
</html>
