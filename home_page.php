<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
* {
  box-sizing: border-box;
}

#myInput {

  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 390px;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>
	<center>
<div style="height: 100%px;width: 600px; border-style: solid;"  >

<h2>My Phonebook</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<?php
session_start();
$con=mysqli_connect("localhost","root","","lpu");
if(!$con)
	die("Server could not connected");
$sql = "SELECT * FROM data";
$res= mysqli_query($con,$sql);
$mes= mysqli_query($con,$sql);
$count=0;
while($row = mysqli_fetch_array($res)){
    $count=$count+1;
}
?>
<ul id="myUL">
<?php
while($count>0){
	$row1 = mysqli_fetch_array($mes);
	$_SESSION['Name'] =$row1['Name'];
	echo ' <li><a href="home_page.php">'.$row1['Name'].'<i class="fa fa-caret-down" style="font-size:22px;float:right;" ></i></a></li>';


	$count=$count-1;
}
echo '</ul>';
?>


<?php
$sql = "SELECT * FROM data";
$res= mysqli_query($con,$sql);
$mes= mysqli_query($con,$sql);
$count=0;
while($row = mysqli_fetch_array($res)){
    $count=$count+1;
}
while($count>0){
	$row1 = mysqli_fetch_array($mes);
	$_SESSION['Name'] =$row1['Name'];
	?>
	<div style="border-style: ridge;height: 230px;width: 595px;"> 
			 <form method="post" action="Edit_Contact.php">
		<input readonly style="border:0; font-size:25px;margin-left: -150px;" type="text" name="nm" value="<?php echo $row1['Name'];?>">
		 <br>
		 
		 <input readonly style="border:0; font-size:15px;margin-left: -230px;" type="text" name="dob" value="<?php echo $row1['DOB'];?>"><br>
		  <input readonly style="border:0; font-size:15px;margin-left: -300px;width: 110px;" type="text" name="mob"
		   value="<?php echo "+91 ". $row1['Mobile'];?>"><i style="font-size:24px" class="fa">&#xf095;</i><br>
    <input readonly style="border:0; font-size:15px;margin-left: -130px;width: 300px;" type="text" name="gmail"
		   value="<?php echo  $row1['Gmail'];?>">
		   <br>
	
		 	
		 <input  style="margin-left: 300px;" type="submit" name="edit" value="Edit">
	
		
	
		  	 <br>
  
<br>
		

		 
		  

		</form>
		  <input type="submit" style="margin-left: 300px;" name="Remove" value="Remove" >
</div> 
	<?php

	

	$count=$count-1;
}
?>


<br>

<div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#" class="active">1</a>
  <a href="#">2</a>
  <a href="#">3</a>

  <a href="#">&raquo;</a>
  </div>
  <br>
<a href="Add_New_Contact.php">  <i class="fa fa-plus-circle" onclick="window.location.href='lpu_assignement.php'" style="font-size:36px;margin-left: 550px;margin-top: 80px;"></i>
</a>
</center>
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
<br>
<br>
</body>
</html>