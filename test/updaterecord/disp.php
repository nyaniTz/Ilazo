<?php
//Connection for database
include 'conn.php';
//Select Database
$sql = "SELECT * FROM data";
$result = $conn->query($sql);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Employee Details</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Employee ID</th>
<th>Name</th>
<th>Gender</th>
<th>Department</th>
<th>Address</th>
<th>Mobile Number</th>
<th>Email</th>
</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		?>
		<tr>
        <td><?php echo $row['empid']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['mobile']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <!--Edit option -->
        <td><a href="edit.php?edit_id=<?php echo $row['empid']; ?>" alt="edit" >Edit</a></td>
        </tr>
        <?php
	}
}
else
{
	?>
	<tr>
    <th colspan="2">There's No data found!!!</th>
    </tr>
    <?php
}
?>
</table>
</body>
</html>