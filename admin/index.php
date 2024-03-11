<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include 'head.php';?>
</head>
<body>
	<center>
		<h1>Admin Panel</h1>
<form method="post">
	<table>
		<Tr>
			<Td>
				Admin Username
			</Td>
			<Td>
				<input type="text" name="txtname">
			</Td>
		</Tr>
		<Tr>
			<Td>
				Admin Password
			</Td>
			<Td>
				<input type="password" name="txtpass">
			</Td>
		</Tr>
		<tR>
			<Td>
				<input type="submit" name="btnlogin" value="Login">
			</Td>
		</tR>
	</table>
</form>
<?php
if(isset($_POST['btnlogin'])){
	extract($_POST);
	$q1=pg_query("select * from tbladmin where username='$txtname' and password='$txtpass'");
	if(pg_num_rows($q1)>0){
		header("location:addcategory.php");
	}
	else{
		?>
		<script type="text/javascript">
			alert("Invalid Credentials");
		</script>
		<?php
	}
}
?>
</center>
</body>
</html>