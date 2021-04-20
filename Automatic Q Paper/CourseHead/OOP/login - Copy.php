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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>

		* {
		  box-sizing: border-box;
		}

		body {
		  margin: 0;
		  font-family: Arial;
		  font-size: 17px;
		}

		#myVideo {
		  position: fixed;
		  right: 0;
		  bottom: 0;
		min-width: 100%;
		  min-height: 100%;


		}

		.content {
		  position: fixed;
		  bottom: 0;
		  top:0;
		  background: rgba(0, 0, 0,0.5 );
		  color: #f1f1f1;
		  width: 100%;
		  padding: 20px;

		}

		#myBtn {
		  width: 200px;
		  font-size: 18px;
		  padding: 10px;
		  border: none;
		  background: #000;
		  color: #4da6ff;
		  cursor: pointer;
		}

		#myBtn:hover {
		  background: #ddd;
		  color: black;
		}



		body {
		  font-family: ;Times New Roman;

		  //background-image: url('bg-img-1.jpg');
		}




		* {
		box-sizing: border-box;
		}
		/* Add padding to containers */
		.container {
			
		  padding:none;
		  background-color: white;
		height: 400px;

		}
		/* Full-width input fields */
		input[type=text], input[type=password] {
		  width: 100%;
		  padding: 15px;
		  margin: 5px 0 22px 0;
		  display: inline-block;
		  border: none;
		  background: #f1f1f1;
		}
		input[type=text]:focus, input[type=password]:focus {
		  background-color: #ddd;
		  outline: none;
		}
		/* Overwrite default styles of hr */
		hr {
		  border: 1px solid #f1f1f1;
		  margin-bottom: 30px;
		}
		/* Set a style for the submit button */
		.sign {
		  background-color:#1a75ff;
		  color: white;
		  padding: 10px 15px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		  opacity: 0.9;
		  font-family: Times New Roman;
		  font-size: large;
		}
		.sign:hover {
		  opacity: 1;
		}
		.container{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		  max-width: 300px;
		  padding:30px 40px;
		  margin: auto;
		  text-align: center;

		}
		a{

		  text-decoration: none;
		  font-size: 17px;
		  font-family: Times New Roman;
		}
		   }
		</style>
	</head>
	<body>
		<video autoplay muted loop id="myVideo">
		  <source src="video2.mp4" type="video/mp4">
		</video>


		<br><br><br><br><br><br><br><br>
		<center> <h3>Login</h3>
		<fieldset style ="width:280px;height:160px;">
		<form method="post" enctype="multipart/form-data">
			<div class="content">
				<marquee> <h1><br>AQPG</h1></marquee>
				<div class="container">
				    <h2>Login</h2>
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
</div>

	</body>

</html>
