<!DOCTYPE html>
<html>
<head>
	<title>Add contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php
	$con=mysqli_connect("localhost","root","","lpu");
if(!$con)
	die("Server could not connected");
$x=$_POST['nm'];


?>
<center>
	<form method="post">
		<div style="border-style: solid; height: 380px;width: 300px;margin-top: 60px;">
		<h3>Edit Contact</h3>
		Name:
		<br>
			<input type="text" name="name" value="<?$_POST['nm']; ?>"placeholder="Name" style="height: 30px;">
			<br>
				DOB:
		<br>
			<input type="text" name="dob" placeholder="dd/mm//yy" style="height: 30px;" value="<?php  $_POST['dob']; ?>">
			<br>
	Mobile Number:
		<br>
			<input type="text" value="<?php $_POST['mob']; ?>" name="mob" placeholder="+91-XXXXXXXXXX" style="height: 30px; width: 150px;"><i style="margin-left: 10px;" class="fa fa-plus-circle" style="font-size:24px"></i>
			<br>
		Email:
		<br>
			<input type="gmail" name="email" value="<?php $_POST['gmail']; ?>" placeholder="abc@gmail.com" style="height: 30px;width: 150px;"><i style="margin-left: 10px;" class="fa fa-plus-circle" style="font-size:24px"></i>
			<br>
			<br>
			<input style="text-align: right;background-color: green;" type="submit" name="" value="update">
		</div>

	</form>

</center>


</body>
</html>