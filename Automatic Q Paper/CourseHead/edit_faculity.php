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
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				Edit Faculity
			</div>
			</div>
		    <div class="row">
		    <div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				 ID      :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			        
							<select id="day" name="day">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						
			    
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
			</div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				First Name    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "First_nme" id= "First_nme" placeholder="Name"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Last Name    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text"  class="form-control" name= "lst_nme" id="lst_nme" placeholder="Last Name"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Password    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="password" name= " class="form-control" password" id= "password" placeholder="password"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Status    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="radio" name= "Status" value="Enable"/>Enable   
				<input type="radio" name= "Status" value="Disable"/>Disable  
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Gender    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="radio" name= "Gender" value="male"/>Male
				<input type="radio" name= "Gender" value="female"/>FeMale
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
            <div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Date of Birth    :
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="day" name="day">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="month" name="month">
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-2 col-lg-2">
							<select id="year" name="year">
								<option value="1">2015</option>
								<option value="2">2016</option>
								<option value="3">2017</option>
								<option value="4">2018</option>
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
							<select id="day" name="day">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="month" name="month">
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
							</select>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-2 col-lg-2">
							<select id="year" name="year">
								<option value="1">2015</option>
								<option value="2">2016</option>
								<option value="3">2017</option>
								<option value="4">2018</option>
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
			    <textarea name= "addrs" class="form-control" id= "adsrs" cols="30" rows="3" placeholder="Address"></textarea>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Phone No    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "phno" id="phno" placeholder="0987654321"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Mail    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="text" class="form-control" name= "mail" id="mail" placeholder="abc@abc.com"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Photo    :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <input type="file" name= "file" id="file"/>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>


						


		<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
			    <input type="Submit" id="sbmt" name= "Crse_sbmt"/>
			</div>
        </div>
</div>
<body>
</html>