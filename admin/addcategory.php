<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include 'head.php';?>
</head>
<body>
<?php include 'menu.php';?>

<?php
if(isset($_POST['btnaddcategory'])){
	extract($_POST);
	pg_query("insert into tblcategory(cname)values('$txtcname')");

	?>
	<script type="text/javascript">
		alert("Category Added");
		window.location.href="addcategory.php";
	</script>
	<?php
}

?>
<div class="row">
	<div class="col-md-6">
<form method="post">
	<table class="table">
		<Tr>
			<td>
				Category Name
			</td>
			<td>
				<input type="text" name="txtcname" class="form-control" required>
			</td>
		</Tr>
		<Tr>
			<td>
				<input type="submit" class="btn btn-success" value="Add Category" name="btnaddcategory">
			</td>
		</Tr>
	</table>
</form>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>