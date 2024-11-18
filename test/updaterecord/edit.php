<?php
//Database Connection
include 'conn.php';
//Get ID from Database
if(isset($_GET['edit_id'])){
	$sql = "SELECT * FROM data WHERE empid =" .$_GET['edit_id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['btn-update'])){
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$department = $_POST['department'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$update = "UPDATE data SET name='$name', gender='$gender',department='$department',address='$address',mobile='$mobile',email='$email' WHERE empid=". $_GET['edit_id'];
	$up = mysqli_query($conn, $update);
	if(!isset($sql)){
		die ("Error $sql" .mysqli_connect_error());
	}
	else
	{
		header("location: disp.php");
	}
}
?>
<!--Create Edit form -->
<!doctype html>
<html>
<body>
<form method="post">
<h1>Edit Employee Information</h1>
<label>Name:</label><input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>"><br/><br/>
<label>Gender:</label><input type="text" name="gender" placeholder="Gender" value="<?php echo $row['gender']; ?>"><br/><br/>
<label>Department:</label><input type="text" name="department" placeholder="Department" value="<?php echo $row['department']; ?>"><br/><br/>
<label>Address:</label><input type="text" name="address" placeholder="Address" value="<?php echo $row['address']; ?>"><br/><br/>
<label>Mobile:</label><input type="text" name="mobile" placeholder="Mobile" value="<?php echo $row['mobile']; ?>"><br/><br/>
<label>Email:</label><input type="text" name="email" placeholder="email" value="<?php echo $row['email']; ?>"><br/><br/>
<button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
<a href="disp.php"><button type="button" value="button">Cancel</button></a>
</form>
<!-- Alert for Updating -->
<script>
function update(){
	var x;
	if(confirm("Updated data Sucessfully") == true){
		x= "update";
	}
}
</script>
</body>
</html>