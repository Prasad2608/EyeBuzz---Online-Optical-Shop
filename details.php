<!DOCTYPE html>
<html>
<head>
	
	<title></title>
<?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?>
<?php

if(isset($_POST['btnaddcart'])){
extract($_POST);
$q2=pg_query("select * from tblproduct where pid=".$_GET['id']);
$r2=pg_fetch_array($q2);?>
<script>
	window.location.href="bill.php";
</script>
<?php
$dbval= $r2['pstock'];
$selectedqty=$txtqty;
$remstock=$dbval-$selectedqty;

if($remstock>=0){
pg_query("update tblproduct set pstock='$remstock' where pid=".$_GET['id']);
pg_query("INSERT INTO tblcart(uid, pid, qty,status) VALUES ('".$_SESSION['uid']."','".$_GET["id"]."','$txtqty','0')");
}else{
	?>
	<script type="text/javascript">
		alert("Out Of Stock");
	</script>
	<?php
}
}

?>
<div class="row">
<?php
$q=pg_query("select * from tblproduct where pid=".$_GET['id']);
$r=pg_fetch_array($q);
	?>
	<div class="col-md-6">
		<form method="post">
	<table class="table">
		<Tr>
			<td>
				Product Name:
			</td>
			<Td>
				<?php
	echo $r['pname'];?>
			</Td>
		</Tr>
		<Tr>
			<td>
				Product Price:
			</td>
			<Td>
				₹<strike><?php
	echo $r['pprice'];?></strike>/-
			</Td>
		</Tr>
		<Tr>
			<td>
				Product Discount Price:
			</td>
			<Td>
				₹<?php
	echo $r['pdprice'];?>/-
			</Td>
		</Tr>
		<Tr>
			<td>
				Discount %
			</td>
			<Td>
				<?php
 echo $z=100-($r['pdprice']/$r['pprice'])*100;
	
?>%
		
			</Td>
		</Tr>
		<Tr>
			<td>
				Description
			</td>
			<Td>
				<?php
 echo $r['pdesc'];
	
?>
		
			</Td>
		</Tr>
		<Tr>
			<td>
				Quantity
			</td>
			<Td>
				<select name="txtqty" class="form-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
		</Tr>
		<tr>
			<td>
				<input type="submit" name="btnaddcart" class="btn btn-primary btn-floating" value="Add2Cart">
				
			</td>
		</tr>
		
	</table>
	</div>
	
</div>
<?php include 'footer.php';?>
</body>
</html>