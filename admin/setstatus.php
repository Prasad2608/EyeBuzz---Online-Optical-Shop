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
if(isset($_POST['btnsetstatus'])){
	extract($_POST);
	
	pg_query("update tblcart set status='$cmbstatus' where cartid=".$_GET['id']);
	?>
	<script type="text/javascript">
		window.location.href="orders.php";
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
				Status
			</td>
			<td>
				<select class="form-control" name="cmbstatus">
					<option value="2">Dispatch</option>
					<option value="3">Arriving Soon</option>
					<option value="4">Arriving Today</option>
					<option value="5">Delivered</option>
				</select>
			</td>
		</Tr>
		<Tr>
			<Td colspan=2 align=center>
				<input type="submit" name="btnsetstatus" value="Set Status" class="btn btn-success">
			</Td>
		</Tr>
	</table>
</div>
</div>

<?php include 'footer.php';?>
</body>
</html>