<?php
include_once "send-form.php";
include_once "validate-form.php";
$validate = new validateForm();
$validate->field_required_arr = array("name","email","telephone");
$validate->field_email_arr = array("email");
if($validate->dataValidateForm()){
	$sendform = new SendForm();
	$sendform->sendEmail();
} 
?>
<!doctype html>
<html lang="en-us">
<head>
	<title>Form Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">	
	<h1>Form Example</h1>		
	<form name="form1" class="form-horizontal" method="post" >
	
	<?php echo isset($validate->msg_error) ? $validate->msg_error : ''; ?>
	
	<?php 
	if(isset($sendform->msg_return)) : 
		echo $sendform->msg_return;
	?>
	<?php 
	else :
	?>
		<p>* Required Fields</p>
		<div class="form-group">
			<label for="name" class="control-label col-sm-2">Name*</label>
			<div class="col-sm-10">
				<input name="name" type="text" class="form-control" value="<?php echo @$_POST['name']; ?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="control-label col-sm-2">Email*</label>
			<div class="col-sm-10">
				<input name="email" type="email" class="form-control" value="<?php echo @$_POST['email']; ?>" />
			</div>			
		</div>
		<div class="form-group">
			<label for="telephone" class="control-label col-sm-2">Telephone*</label>
			<div class="col-sm-10">
				<input name="telephone" type="text" class="form-control" value="<?php echo @$_POST['telephone']; ?>" />
			</div>			
		</div>
		<div class="form-group">
			<label for="company" class="control-label col-sm-2">Company</label>
			<div class="col-sm-10">
				<input name="company" type="text" class="form-control" value="<?php echo @$_POST['company']; ?>" />
			</div>			
		</div>
		<div class="form-group">
			<label for="zip" class="control-label col-sm-2">Zip Code</label>
			<div class="col-sm-10">
				<input name="zipcode" type="text" class="form-control" size="8" value="<?php echo @$_POST['zipcode']; ?>" />
			</div>			
		</div>			
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="submit" value="Submit" class="btn btn-default" />
			</div>
		</div>
	</form>	
	<?php 
	endif;
	?>
</div>