<?php
session_start();
$uname=$_SESSION['chead'];
	require_once("classes/data_access.class.php");
	//require_once("OOP/classes/DataAccess.class.php");
	require_once("OOP/classes/FormValidator.class.php");
	require_once("OOP/classes/FormAssist.class.php");

	$rules= array("fname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>""),
					"lname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
					"uname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
					"password"=>array("required"=>"","regexp"=>'/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{6,30}$/',"compare"=>array("compareto"=>"email","operator"=>"!=")),
					"course"=>array("required"=>""),
					"addr"=>array("required"=>""),
					"phone"=>array("required"=>""),
					"email"=>array("required"=>"","email"=>"")

					);
	$labels=array("fname"=>"first name","lname"=>"last name","uname"=>"user name","password"=>"password","course"=>"course","addr"=>"address","phone"=>"phone","email"=>"email");
	$validator=new FormValidator($rules,$labels);
	$dao=new DataAccess();
	$data=$dao->select_array(array("*"),"coursehead","Username='".$uname."'");

$msg="&nbsp;";
if(isset($_POST['fname']))
{
	if($validator->validate($_POST))
	{
	require_once("classes/data_access.class.php");
	$dao=new DataAccess();
	if(isset($_FILES['photo']))
	{
		if($photo=$dao->upload_file($_FILES['photo'],array(".jpg",".png",".bmp"),2000,"assets/photo"))
		{
			$dob=mktime(0,0,0,$_POST['dob']['month'],$_POST['dob']['day'],$_POST['dob']['year']);
			$doj=mktime(0,0,0,$_POST['doj']['month'],$_POST['doj']['day'],$_POST['doj']['year']);
			$arr=array('',$_POST['fname']." ".$_POST['lname'],$_POST['uname'],$data[0]['course_code'],$_POST['addr'],$photo,$_POST['phone'],$_POST['email'],$dob,$doj,"active");
			if($dao->insert_full($arr,"faculity"))
			{
				if($dao->insert_full(array($_POST['uname'],$_POST['password'],"faculty"),"login"))
				{
					$msg="Faculty added";
				}
			}
		}
		else
			$msg="Invalid File Format";
	}
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
				Add Faculty
			</div>
			</div>

			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				First Name    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "fname" id= "First_nme"  required placeholder="Name"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
<?php echo $validator->error("fname"); ?>
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Last Name    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "lname" id="lst_nme" required placeholder="Last Name"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
<?php echo $validator->error("lname"); ?>
			</div>
		    </div>
		    <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				User Name    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "uname" id="uname" required placeholder="Username"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
<?php echo $validator->error("uname"); ?>
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Password    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="password" class="form-control" class="form-control"  name="password" id="password" required placeholder="password"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
<?php echo $validator->error("password"); ?>
			</div>
		    </div>


            <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Date of Birth    :
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="dob[day]" name="dob[day]" required>
								<option value="" selected="selected" disabled="disabled">DD</option>
								<?php
								$i=1;
								while($i<=31)
								{
									echo "<option value='$i'>$i</option>";
									$i++;
								}

								?>

							</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="dob[month]" name="dob[month]"required>
								<option value="" selected="selected" disabled="disabled">MM</option>
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
								<option value="5">May</option>
								<option value="6">Jun</option>
								<option value="7">Jul</option>
								<option value="8">Aug</option>
								<option value="9">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>

							</select>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-2 col-lg-2">
							<select id="dob[year]" name="dob[year]" required>
								<option value="" selected="selected" disabled="disabled">YYYY</option>
									<?php
								$i=1920;
								while($i<=1998)
								{
									echo "<option value='$i'>$i</option>";
									$i++;
								}

								?>
								</select>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 c3">

				</div>
			</div>
            <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Date of Joining    :
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="" name="doj[day]" required >
								<option value="" selected="selected" disabled="disabled">DD</option>
								<?php
									$i=1;
									while($i<=31)
									{
										echo "<option value='$i'>$i</option>";
										$i++;
									}

								?>
							</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="month" name="doj[month]"required>
								<option value="" selected="selected" disabled="disabled">MM</option>
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
								<option value="5">May</option>
								<option value="6">Jun</option>
								<option value="7">Jul</option>
								<option value="8">Aug</option>
								<option value="9">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>

							</select>

						</div>
						<div class="col-md-2 col-sm-4 col-xs-2 col-lg-2">
							<select id="year" name="doj[year]"required>
								<option value="" selected="selected" disabled="disabled">YYYY</option>
									<?php
								$i=2000;
								while($i<=2021)
								{
									echo "<option value='$i'>$i</option>";
									$i++;
								}

								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Address    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <textarea class="form-control" name= "addr" id= "adsrs" cols="30" rows="3" required placeholder="Address"></textarea>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
							<?php echo $validator->error("addr"); ?>
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Phone No    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name="phone" id="phno" onblur="validation5()" required placeholder="Phone"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
							<?php echo $validator->error("phone"); ?>
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Mail    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name="email" id="mail" required placeholder="abc@abc.com"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
<?php echo $validator->error("email"); ?>
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Photo    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="file" name="photo" required id="file"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">

			</div>
		    </div>
			<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
				<button type="submit" class="btn btn-info" id="sbmt" name= "Crse_sbmt">Submit</button>
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
        </form>
<body>
</html>
