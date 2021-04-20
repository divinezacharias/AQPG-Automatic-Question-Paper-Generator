<?php
session_start();

if(!isset($_SESSION['examid']))
	{
		header("location:addexam.php");
	}

$msg="&nbsp;";
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");
	$exid=$_SESSION['examid'];
	$exarr=$dao->select_array(array("*"),"exams","exam_id='".$exid."'");
	$subid=$exarr[0]['exam_sub_id'];
	//print_r($exarr);
	if(isset($_POST['module']))
	{
		$module=$_POST['module'];
		$qtype=$_POST['qtype'];
		$qnos=$_POST['qnos'];
		$qhardness=$_POST['qhardness'];
		$qs=array();
		if($questions=$dao->select_array(array("q_id"),"insertquestion","s_id='$subid' and q_module='$module' and q_type='$qtype' and q_hardness='$qhardness' and q_status='approved'"))
		{
			//print_r($questions);
			$qcount=count($questions);
			if($_POST['qnos']<count($questions))
			{
				if(isset($_SESSION['q'][$qtype][$qhardness][$module]))
				{
					$msg="$qtype($qhardness) already added from module $module";
				}
				else
				{
					$i=0;
					while($i<$qnos)
					{
						do
						{
							$qno=rand(0,$qcount-1); //value between 0 and number of questions in questions array
							if(!in_array($qno,$qs))
							{
								$qs[$i]=$qno;
								break;
							}
							
						}while(1);
						$i++;
					}
					//print_r($qs);
					$qsarr=array();
					foreach($qs as $val)
					{
						$qsarr[]=$questions[$val][0];
					}
				//	print_r($qsarr);
					$_SESSION['q'][$qtype][$qhardness][$module]=$qsarr;
					$msg="request Added";
				}
				
			}
			else
			{
				$msg="Not enough questions - request cancelled";
			}
		}
		else
		{
			$msg="No Questions available - request cancelled";
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
<form name="f1" method="post" action="" enctype="" >
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				Customize Exam Questions 
				
			</div>
			</div>
			<h4><?php $sub=$dao->select_array(array("*"),"subject","sub_id='".$subid."'"); 
				echo $sub[0]['sub_name']."(".$sub[0]['sub_code'].") - ".$exarr[0]['exam_syllabus'];
				
				?>
				
				<span style="margin-left:10px;"><a href="reset.php">Reset all</a></span>
				<?php
					if(isset($_SESSION['q']))
					{
						?>
						<span style="margin-left:10px;"><a href="generate.php">Generate</a></span>
						<?php
					}
				
				?>
				</h4>
			<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Module
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="module" required style="width:100px">
									<option selected="selected" disabled="disabled">module</option>
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
					Question Type
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="qtype" style="width:100px" required>
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
					Number of Questions
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="qnos" required style="width:100px">
									<option selected="selected" disabled="disabled">select</option>
									<?php
									$i=1;
									while($i<=20)
									{
										echo "<option value='$i'>$i</option>";
										$i++;
									}
									?>
									
									
							</select>  
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div>
				</div>
				
				<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Toughness
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<select class="form-control"  id="s_id" name="qhardness" style="width:100px" required>
									<option selected="selected" disabled="disabled">Type</option>
									<option value="easy">easy</option>
									<option value="medium">medium</option>
									<option value="hard">hard</option>	
							</select>  
							
					</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
					
				</div>
				</div>
				</div>
				<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
				<button type="submit" class="btn btn-info" id="sbmt" name= "add">Add</button><?php echo $msg;?>
			</div>
			</div>
			</div>
</div>
</form>

			</body>
</html>
