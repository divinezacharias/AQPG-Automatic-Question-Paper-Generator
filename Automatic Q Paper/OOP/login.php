<?php
require_once("classes/FormAssist.class.php");
require_once("classes/DataAccess.class.php");
require_once("classes/FormValidator.class.php");
$fields=array("username"=>"","paswd"=>"");
$rules= array("username"=>array("required"=>"","minlength"=>3,"maxlength"=>20),
				"paswd"=>array("required"=>""),
				);
$labels=array("paswd"=>"Password");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["login"]))
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
		form {
		  background:rgba( 198, 236,590, 1);
		  height: 100%;
		   }
		  input[type=submit]
		  {
		     background-color: #03a5fc;

		     border: none;
		     padding: 7px 19px;
		   }
		</style>
	</head>
	<body>
		<br><br><br><br><br><br><br><br>
		<center> <h3>Login</h3>
		<fieldset style ="width:280px;height:160px;">
		<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<br><td>&nbsp;Userame</td>
				<td><?php echo $form->textBox("username",array("placeholder"=>"Username")); ?></td>
				<td><?php echo $validator->error("username"); ?></td>
			</tr>

			<tr>
				<td>&nbsp;<br>Password</td>
				<td><br><?php echo $form->passwordBox("paswd",array("placeholder"=>"password")); ?></td>
				<td><?php echo $validator->error("paswd"); ?></td>
			</tr>

			<tr>
				<td><br><br>&nbsp;</td>
				<td>&nbsp; &nbsp; &nbsp;<input type="submit" name="login" value="Login" /></td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</form>
</fieldset></center>
	</body>

</html>
