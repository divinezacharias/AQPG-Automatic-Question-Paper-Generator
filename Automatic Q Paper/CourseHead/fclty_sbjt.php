<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>

<html>
<head>
<title>
 Faculity and Subject
</title>
<style>
	body
	{
	background-color:#F5F2F2;
	padding-top:20px;
	border: 6px solid #5bc0de;
	width:100%;
	height:100%;

	}
	#submit
	{
	align:center;
	}
	.row
	{
	margin-top:1.5%;
	font-size:15px;
	}
	h1
	{
	 height:100%;
	 color:white;
	 font-family:'Ruda', sans-serif;
	 padding-left:20px;
	 width:100%;
	}
	#head
	{
	 height:12%;
	 background-color:#68dff0;
	}
	#d1
	{
	 padding-left:13%;
	}
</style>
</head>
<body>
<?php include("courseHead.php"); ?>
<div class="container-fluid">
            <div id="head" class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h1>Faculity and Subject</h1>
			</div>
			</div>
		    <div class="row">
		    <div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Faculity ID      :
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="=s_id" name="s_id">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
			</div>
			</div>
			<div class="row">
			<div id="d1" class="col-md-4 col-xs-4 col-sm-4">
				Subject  ID:
			</div>
			<div class="col-md-4 col-xs-4 col-sm-4">
			    <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
							<select id="=c_id" name="c_id">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
			</div>
			</div>
            <div class="col-md-4 col-xs-4 col-sm-4">
			    
			</div>
		    </div>
		<div id="submit" class="row">
		<div class="row">
			<div class="col-md-4 col-xs-4 col-sm-4">

			</div>
			<div class="col-md-8 col-xs-8 col-sm-8">
			    <input type="Submit" name= "Crse_sbmt"/>
			</div>
        </div>
</div>
<body>
</html>