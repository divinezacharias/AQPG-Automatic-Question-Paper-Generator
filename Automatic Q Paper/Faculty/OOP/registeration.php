<?php
require_once("classes/FormAssist.class.php");
require_once("classes/DataAccess.class.php");
require_once("classes/FormValidator.class.php");
$fields=array("name"=>"","email"=>"","phone"=>"","gender"=>"","paswd"=>"","cpaswd"=>"");
$rules= array("name"=>array("required"=>"","minlength"=>3,"maxlength"=>20),
				"email"=>array("required"=>"","email"=>""),
				"phone"=>array("required"=>"","phone"=>""),
				"gender"=>array("required"=>"","exist"=>array("m","f")),
				"paswd"=>array("required"=>"","compare"=>array("compareto"=>"email","operator"=>"!=")),
				"cpaswd"=>array("required"=>"","compare"=>array("compareto"=>"paswd","operator"=>"="))
				);
$labels=array("paswd"=>"Password","cpaswd"=>"Confirm Password");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["reg"]))
{
	if($validator->validate($_POST))
	{
		//process form

	}
}
?>
<html>
	<head>
		<style>


			 .register {
			 	position: fixed;
			 	top: 50%;
			 	left: 50%;
			 	margin: -150px 0 0 -150px;
			 	width:360px;
			 	height:480px;
			 	padding:none;

			 background-color: white;

			 	color: #f1f1f1;
			 }

			 #myVideo {
			   position: fixed;
			   right: 0;
			   bottom: 0;
			 min-width: 100%;
			   min-height: 100%;
			 }

			 input {
			 	width: 100%;
			 	margin-bottom: 10px;
			 	background: rgba(0,0,0,0.3);
			 	border: none;
			 	outline: none;
			 	padding: 10px;
			 	font-size: 13px;
			 	color: #fff;
			 	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
			 	border: 1px solid rgba(0,0,0,0.3);
			 	border-radius: 4px;
			 	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
			 	-webkit-transition: box-shadow .5s ease;
			 	-moz-transition: box-shadow .5s ease;
			 	-o-transition: box-shadow .5s ease;
			 	-ms-transition: box-shadow .5s ease;
			 	transition: box-shadow .5s ease;
			 }
			 input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

		</style>
	</head>
	<body>
		<video autoplay muted loop id="myVideo">
		  <source src="001.webm" type="video/webm">
		</video>

		<br><br>
		<div class="register">
		<center> <h3>Registeration</h3>

		<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<br><td>&nbsp;Name</td>
				<td><?php echo $form->textBox("name",array("placeholder"=>"Full Name")); ?></td>
				<td><?php echo $validator->error("name"); ?></td>
			</tr>
			<tr>
				<td>&nbsp;Email</td>
				<td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email")); ?></td>
				<td><?php echo $validator->error("email"); ?></td>
			</tr>
			<tr>
				<td>&nbsp;Phone</td>
				<td><?php echo $form->textBox("phone",array("placeholder"=>"phone")); ?></td>
				<td><?php echo $validator->error("phone"); ?></td>
			</tr>

			<tr>
				<td>&nbsp;Gender</td>
				<td><?php
					$gender=array("Male"=>"m","Female"=>"f");
					echo $form->radioGroup("gender",array("class"=>"class1"),$gender);
				?></td>
				<td><?php echo $validator->error("gender"); ?></td>
			</tr>

			<tr>
				<td>&nbsp;Password</td>
				<td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password")); ?></td>
				<td><?php echo $validator->error("paswd"); ?></td>
			</tr>
			<tr>
				<td>&nbsp;Confirm &nbsp;Password</td>
				<td><?php echo $form->passwordBox("cpaswd",array("placeholder"=>"password")); ?></td>
				<td><?php echo $validator->error("cpaswd"); ?></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="reg" value="Register" /></td>
				<td>&nbsp;</td>
			</tr>
		</table>

		</center>
	</form>
</div>

	</body>

</html>
