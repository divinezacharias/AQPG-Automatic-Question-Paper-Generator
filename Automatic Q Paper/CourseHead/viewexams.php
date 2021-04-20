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
	#t1 td, #t1 th
	{
		padding:5px;
	}
	
</style>
</head>
<body>
<?php include("courseHead.php"); ?>
<form name="f1" method="post"  >
	<form method="post">
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h1>View Exams</h1>
			</div>
			</div>
		   
			<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Semenster    :
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="sem"  required >
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
							<select class="form-control"  id="sub" name="sub" required>
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
				<button type="submit" class="btn btn-info" id="sbmt" name= "add">View</button>
			</div>
        </div>
			<?php
			if(isset($_REQUEST['sem']) && isset($_REQUEST['year']) && isset($_REQUEST['sub']))
			{
				
			if($exams=$dao->select_array(array("*"),"exams","exam_sub_id='".$_REQUEST['sub']."' order by exam_date desc"))
			{
			?>
			<div class="row" style="background-color:yellowgreen">
				<div  class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
				</div>
				<div  class="col-md-2 col-xs-2 col-sm-2" style="font-size:20px; padding-right:3px;">
					Date
				</div>
				<div  class="col-md-2 col-xs-2 col-sm-2" style="font-size:20px;">
					Head
				</div>
				
				
				<div  class="col-md-2 col-xs-2 col-sm-2" style="font-size:20px;">
					Syllabus
				</div>
				<div  class="col-md-2 col-xs-2 col-sm-2" style="font-size:20px;">
					Subject
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
					Sem
				</div>
				
				<div class="col-md-2 col-xs-2 col-sm-2" style="font-size:20px;">
					Questions
				</div>
		    </div>
			<?php
			foreach($exams as $q)
			{
			?>
			
			<div class="row">
				<div  class="col-md-1 col-xs-1 col-sm-1" style="font-size:20px;">
				
				</div>
				<div  class="col-md-2 col-xs-2 col-sm-2"  style="padding-right:3px;">
					<?php echo date("d/M/Y",$q['exam_date']); ?>
				</div>
				<div  class="col-md-2 col-xs-2 col-sm-2">
					<?php echo $q['exam_person']; 
					
					?>
				</div>
				
				<div  class="col-md-2 col-xs-2 col-sm-2">
					<?php echo $q['exam_syllabus']; 
					
					?>
				</div>
				<div  class="col-md-2 col-xs-2 col-sm-2">
					<?php echo $dao->get_scalar("sub_code","subject","sub_id='".$q['exam_sub_id']."'"); 
					
					?>
				</div>
				<div  class="col-md-1 col-xs-1 col-sm-1">
					<?php echo $dao->get_scalar("sub_sem","subject","sub_id='".$q['exam_sub_id']."'"); 
					
					?>
				</div>
				<?php
				if(time()>$q["exam_date"])
				{
				?>
				<div class="col-md-1 col-xs-1 col-sm-1">
					
							<a href="viewQpaper.php?exid=<?php echo $q['exam_id'] ?>" target="_blank">Qpaper</a>
				
				</div>
				<div class="col-md-1 col-xs-1 col-sm-1">
					
							<a href="printQpaper.php?exid=<?php echo $q['exam_id'] ?>" target="_blank">Print</a>
				
				</div>
				<?php
				}
				?>
				</div>
				<?php
				
				
				
				}
			}
			else
			{
				echo "<h3 align='center'>No Exams Found</h3>";
			}
		}
		
	
		
		?>
</form>
</div>
<body>
</html>
