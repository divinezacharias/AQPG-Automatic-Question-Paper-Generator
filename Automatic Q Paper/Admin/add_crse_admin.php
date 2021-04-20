<?php
session_start();
require_once("classes/data_access.class.php");
//require_once("OOP/classes/DataAccess.class.php");
require_once("OOP/classes/FormValidator.class.php");
require_once("OOP/classes/FormAssist.class.php");

$rules= array("fname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>""),
				"lname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
				"uname"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaonly"=>""),
				"password"=>array("required"=>"","regexp"=>'/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{6,30}$/',"compare"=>array("compareto"=>"email","operator"=>"!=")),
				"c_password"=>array("required"=>"","compare"=>array("compareto"=>"password","operator"=>"=")),
				"course"=>array("required"=>""),
				"addr"=>array("required"=>""),
				"phone"=>array("required"=>""),
				"email"=>array("required"=>"","email"=>"")

				);
$labels=array("fname"=>"first name","lname"=>"last name","uname"=>"user name","password"=>"password","c_password"=>"confirm password","course"=>"course","addr"=>"address","phone"=>"phone","email"=>"email");
$validator=new FormValidator($rules,$labels);

	$dao=new DataAccess();
$msg="&nbsp;";
if(isset($_POST['fname']))
{
if($validator->validate($_POST))
{
	if(isset($_FILES['photo']))
	{
		if($photo=$dao->upload_file($_FILES['photo'],array(".jpg",".png",".bmp"),200,"assets/photo"))
		{
			$dob=mktime(0,0,0,$_POST['dob']['month'],$_POST['dob']['day'],$_POST['dob']['year']);
			$doj=mktime(0,0,0,$_POST['doj']['month'],$_POST['doj']['day'],$_POST['doj']['year']);
			$arr=array('',$_POST['fname']." ".$_POST['lname'],$_POST['uname'],$_POST['course'],$_POST['addr'],$photo,$_POST['phone'],$_POST['email'],$dob,$doj,"active");
			if($dao->insert_full($arr,"coursehead"))
			{
				if($dao->insert_full(array($_POST['uname'],$_POST['password'],"chead"),"login"))
				{
					$msg="Course admin added";
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
</style>
</head>
<?php include("adminHead.php"); ?>
<body>
	<form name="f1" method="post" action="" enctype="multipart/form-data" >
<div class="container-fluid">
		<h5><?= $msg ?></h5>
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				Add Course Admin
			</div>
			</div>

			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				First Name    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "fname" id= "First_nme" value="<?php echo isset($_POST["fname"])?$_POST["fname"]:""; ?>" required placeholder="Name"/>
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
			    <input type="text" class="form-control" name= "lname" id="lst_nme" value="<?php echo isset($_POST["lname"])?$_POST["lname"]:""; ?>" required  placeholder="Last Name"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4" id="err_lname">
							<?php echo $validator->error("lname"); ?>
			</div>
		    </div>

				<script>
				document.getElementById('lst_nme').onblur=function()
				{
					if(this.value=="")
					{
						document.getElementById('err_lname').innerHTML="required";
					}
				};
				</script>


		    <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				User Name    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "uname" id="uname" value="<?php echo isset($_POST["uname"])?$_POST["uname"]:""; ?>" required  placeholder="Username"/>
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
			    <input type="password" class="form-control" class="form-control"  required   name="password" id= "password" placeholder="password"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
 						<?php echo $validator->error("password"); ?>
			</div>
		    </div>

				<div class="row">
				<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
					Confirm Password    :
				</div>
				<div class="col-md-4 col-xs-4 col-sm-4">
						<input type="password" class="form-control" class="form-control"  required   name="c_password" id= "c_password" placeholder="confirm password"/>
				</div>
							<div class="col-md-4 col-xs-4 col-sm-4">
							<?php echo $validator->error("c_password"); ?>
				</div>
					</div>

			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Course    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			   <select name="course"  required >
					<option selected="selected" disabled="disabled">Select Course</option>
					<?php
						echo $dao->create_option("","cr_code","course","1");

					?>
			   </select>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
							<?php echo $validator->error("course"); ?>
			</div>
		    </div>
            <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Date of Birth    :
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="dob[day]" name="dob[day]"  required >
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
							<select id="dob[month]" name="dob[month]"  required >
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
							<select id="dob[year]" name="dob[year]"  required >
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
							<select id="" name="doj[day]"  required >
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
							<select id="month" name="doj[month]"  required >
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
							<select id="year" name="doj[year]"  required >
								<option value="" selected="selected" disabled="disabled">YYYY</option>
									<?php
								$i=2000;
								while($i<=2016)
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
			    <textarea class="form-control" name="addr"  required  id= "adsrs" cols="30" rows="3" value="<?php echo isset($_POST["addr"])?$_POST["addr"]:""; ?>" placeholder="Address"></textarea>
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
			    <input type="text" class="form-control"  name="phone" id="phno" value="<?php echo isset($_POST["phone"])?$_POST["phone"]:""; ?>" placeholder="Phone"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4" id="err_phone">
							<?php echo $validator->error("phone"); ?>
			</div>
		    </div>

				<script>
				document.getElementById('phno').onblur=function()
				{
					var regexp_phone=/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
					if(this.value=="")
					{
						document.getElementById('err_phone').innerHTML="required";
					}
					else if(regexp_phone.test(this.value)==false) {
						document.getElementById('err_phone').innerHTML="invalid phone number";
					}
					else {
						document.getElementById('err_phone').innerHTML="";
					}
				};
				</script>

			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Mail    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="email"  required  class="form-control" name="email" id="mail" value="<?php echo isset($_POST["email"])?$_POST["email"]:""; ?>" placeholder="abc@abc.com"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4" id="err_email">
							<?php echo $validator->error("email"); ?>
			</div>
		    </div>


			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Photo    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="file" name="photo" id="file" value="<?php echo isset($_POST["photo"])?$_POST["photo"]:""; ?>" required />
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
</div>
<body>
</html>
