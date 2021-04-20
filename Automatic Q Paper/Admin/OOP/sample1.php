<?php
require_once("classes/FormAssist.class.php");
$fields=array("name"=>"","email"=>"","gender"=>"","dist"=>"","tech"=>"","paswd"=>"","addr"=>"","photo"=>"");
$form=new FormAssist($fields,$_POST);
?>
<html>
 <head>
<style>
form {
  background:rgba( 198, 236,567, 1);
  height: 100%;
   }
  input[type=submit]
  {
     background-color: #4CAF50;
     border: none;
     padding: 7px 19px;
   }
</style>
 </head>
 <body>
  <marquee><h3><font color="red">Registration </font></h3></marquee>
  <center><fieldset style ="width:280px;height:240px;">

  <form method="post" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Name</td>
      <td><?php echo $form->textBox("name",array("placeholder"=>"Full Name")); ?></td>
      <td></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $form->textBox("email",array("placeholder"=>"email","type"=>"email",));?></td></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php
        $gender=array("Male"=>"m","Female"=>"f");
        echo $form->radioGroup("gender",array("class"=>"class1"),$gender);
      ?></td>
      <td></td>
    </tr>

      <td></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $form->passwordBox("paswd",array("placeholder"=>"password","type"=>"password")); ?></td>
      <td></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $form->textArea("addr",array("placeholder"=>"address")); ?></td>
      <td></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><?php echo $form->fileField("photo",array()); ?></td>
      <td></td>
    </tr>
    <br>
    <tr>
      <td>&nbsp;</td>
      <td><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" name="reg" value="Register" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</fieldset>
</center>
</body>

</html>
