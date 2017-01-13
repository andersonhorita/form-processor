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
<meta charset="utf-8">
<title>Form Example</title>
</head>

<body>
<div class="main">	
	<h1>Form Example</h1>		
	<form name="form1" id="form1" method="post" >
	
	<?php echo isset($validate->msg_error) ? $validate->msg_error : ''; ?>
	
	<?php 
	if(isset($sendform->msg_return)) : 
		echo $sendform->msg_return;
	?>
	<?php 
	else :
	?>
	<p>* Required Fields</p>
	<table border="0" cellpadding="0" cellspacing="0" style="text-align:left">
	<tr>
	<td>Name*</td>
	<td><strong>
	<input name="name" type="text" class="inputs" id="name" value="<?php echo @$_POST['name']; ?>" />
	</strong></td>
	</tr>
	<tr>
	<td>Email*</td>
	<td><input name="email" type="text" class="inputs" id="email" value="<?php echo @$_POST['email']; ?>" /></td>
	</tr>
	<tr>
	<td>Telephone*</td>
	<td><input name="telephone" type="text" class="inputs" id="telephone" value="<?php echo @$_POST['telephone']; ?>" /></td>
	</tr>
	<tr>
	<td>Company</td>
	<td><input name="company" type="text" class="inputs" id="company" value="<?php echo @$_POST['company']; ?>" /></td>
	</tr>
	<tr>
	<td>Address</td>
	<td><input name="address" type="text" class="inputs" id="address" value="<?php echo @$_POST['address']; ?>" /></td>
	</tr>
	<tr>
	<td>Zip Code</td>
	<td><input name="zipcode" type="text" class="inputs" id="zipcode" size="8" value="<?php echo @$_POST['zipcode']; ?>" /></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Submit" class="button" /></td>
	</tr>
	</table>
	</form>
	<?php 
	endif;
	?>
</div>