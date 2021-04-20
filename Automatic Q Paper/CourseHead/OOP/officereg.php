<?php
require_once("classes/FormAssist.class.php");
require_once("classes/DataAccess.class.php");
require_once("classes/FormValidator.class.php");
$fields=array("name"=>"","email"=>"","phone"=>"","address"=>"","village"=>"","license"=>"");
$rules= array("name"=>array("required"=>"","minlength"=>3,"maxlength"=>20,"alphaspaceonly"=>"","nospecchars"=>""),
        "email"=>array("required"=>"","email"=>""),
        "phone"=>array("required"=>"","integeronly"=>""),
        "address"=>array("required"=>""),
        "village"=>array("required"=>"","alphaspaceonly"=>"","nospecchars"=>""),
        "license"=>array("required"=>""),
        );
$labels=array();
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
if(isset($_POST["Register"]))
{
  if($validator->validate($_POST))
  {
     //var_dump($_POST);
    $data = array("o_name"=>$_POST["name"],"o_email"=>$_POST["email"],"o_phone"=>$_POST["phone"],"o_address"=>$_POST["address"],"o_village"=>$_POST["village"],"o_licno"=>$_POST["license"],"o_status"=>"A");

        if($dao->insert($data,"officeregistration"))
        {
           
            //some msg

        }
        else
        {  
            var_dump($dao->getErrors());
              $msg="Failed ,please try again";
        }
  }
  else
  {
        $msg="Failed ,please try again";
//var_dump($dao->getQuery());

  }
}
else
{
    $error=true;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Officer Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form method="post" enctype="multipart/form-data">
				<img src="img/avatar.svg">
        <br>
				<font color=#2E8B57><h3>OFFICER REGISTRATION</h3></font>
        <br>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="far fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
           		   		<?php echo $form->textBox("name",array("placeholder"=>"Full Name")); ?>
                    <font color=red size=2><?php echo $validator->error("name"); ?>

           		   </div>
           		</div>
            <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-at"></i>
                 </div>
                 <div class="div">
                    
                    <?php echo $form->textBox("email",array("placeholder"=>"Email","type"=>"email")); ?>
                    <?php echo $validator->error("email"); ?>

                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-mobile-alt"></i>
                 </div>
                 <div class="div">
                    
                    <?php echo $form->textBox("phone",array("placeholder"=>"Phone")); ?>
                    <?php echo $validator->error("phone"); ?>

                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="far fa-address-card"></i>
                 </div>
                 <div class="div">
                    
                    <?php echo $form->textBox("address",array("placeholder"=>"Address")); ?></td>
                    <?php echo $validator->error("address"); ?>

                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-map-marker-alt"></i>
                 </div>
                 <div class="div">
                                        
                    <?php echo $form->textBox("village",array("placeholder"=>"Village")); ?></td>
                    <?php echo $validator->error("village"); ?>

                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="far fa-id-badge"></i>
                 </div>
                 <div class="div">

                    <?php echo $form->textBox("license",array("placeholder"=>"License Number")); ?>
                    <?php echo $validator->error("license"); ?>

                 </div>
              </div>
              

            	<input type="submit" class="btn" value="Register" name="Register">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
