<!DOCTYPE html>
<html>
<head>
	
	<title></title>
<?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?>
<div class="row">
	<div class="col-md-12">
	<table class="table">
		<Tr>
			<th>
				Product Name
			</th>
			<th>
				Product Price
			</th>
			<th>
				Product Qty
			</th>
		
			<th>
				Product Total
			</th>
		</Tr>
<?php
$q=pg_query("select * from tblcart,tblproduct where tblproduct.pid=tblcart.pid and uid='".$_SESSION['uid']."' and status='0'");
while($r=pg_fetch_array($q)){
	?>
		<tr>
			<Td>
				<?php
	echo $r['pname'];?>
			</Td>
		
	
		
			<Td>
				₹<?php
	echo $r['pdprice'];?>/-
			</Td>
			<Td>
				<?php
	echo $r['qty'];?>
			</Td>
		<Td>
				₹<?php
				$z+=$r['qty']*$r['pdprice'];

	echo $r['qty']*$r['pdprice'];?>/-
			</Td>
			
			<td>
				<a href="delete.php?id=<?php echo $r['cartid'];?>">X</a>
			</td>
		
			
		</Tr>
		
	
	
	

<?php
}
?>
<Tr>
	<Td>
		Total Bill:
	</Td>
	<Td>
		<?php echo $z;?>
	</Td>
</Tr>
</table>
<a href="addaddress.php">Add Address</a>
<table class="table">
	<Tr>
		<th>
			Address
		</th>
	</Tr>
<?php
$q1=pg_query("select * from tbladdress where  uid=".$_SESSION['uid']);
while($r1=pg_fetch_array($q1)){
?>
<tr>
	<td>
<?php echo $r1['address'];	?>
</td>
<Td>
	<a href="bill.php?id=<?php echo $r1['addressid'];?>">Choose</a>
	</Td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<?php include 'footer.php';?>
</body>
</html>