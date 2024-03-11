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
if(isset($_POST['btnaddproduct'])){
	extract($_POST);
	include 'fileupload.php';

	pg_query("INSERT INTO tblproduct(pname, pprice, pdprice, pstock, pdesc, pimage, cid) VALUES ('$txtpname','$txtpprice','$txtpdprice','$txtstock','$txtdesc','$target_file','$cmbcname')");

	
}

?>
<div class="row">
	<div class="col-md-8">
<form method="post" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<Td>
				Choose Category
			</Td>
			<td>
				<select name="cmbcname" class="form-control">
					<?php
					$q=pg_query("select * from tblcategory");
					while ($r=pg_fetch_array($q)) {
						?>
						<option value="<?php echo $r['cid'];?>"><?php echo $r['cname'];?></option>
						<?php
					}
					?>

				</select>
			</td>
		</tr>
		<Tr>
			<td>
				Product Name
			</td>
			<td>
				<input type="text" name="txtpname" class="form-control" required>
			</td>
		</Tr>
		<Tr>
			<td>
				Product Price
			</td>
			<td>
				<input type="text" name="txtpprice" class="form-control" required>
			</td>
		</Tr>
		<Tr>
			<td>
				Product Discount Price
			</td>
			<td>
				<input type="text" name="txtpdprice" class="form-control" required>
			</td>
		</Tr>
		<Tr>
			<td>
				Product Image
			</td>
			<td>
				<input type="file" name="fileToUpload" class="form-control">
			</td>
		</Tr>
		
		<Tr>
			<td>
				Product Stock
			</td>
			<td>
				<input type="text" name="txtstock" class="form-control" required>
			</td>
		</Tr>
		<Tr>
			<td>
				Product Description
			</td>
			<td>
				<textarea name="txtdesc" class="form-control"></textarea>
			</td>
		</Tr>

		<Tr>
			<td>
				<input type="submit" class="btn btn-success" value="Add Product" name="btnaddproduct">
			</td>
		</Tr>
	</table>
</form>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>