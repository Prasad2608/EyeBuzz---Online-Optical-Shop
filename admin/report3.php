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
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>


<form method="post">
	<table>
		<Tr>
			<Td>
				Choose Year
			</Td>
			<td>
				<select name="cmbyear">
					<option value="2022">2022</option>
					<option value="2023">2023</option>
				</select>
			</td>
		</Tr>
		<Tr>
			<td>
				<input type="submit" name="btnyear" value="Sort By Year">
			</td>
		</Tr>
	</table>

<input type="button" onclick="printDiv('printableArea')" value="print a div!" />
<div id="printableArea">
	
<table class="table">
		<Tr>
			<Th>
				Product ID
			</Th>
			<Th>
				Product Name
			</Th>
			<Th>
				Product Price
			</Th>
		</Tr>
<?php
if(isset($_POST["btnyear"])){
	extract($_POST);
$q=pg_query("select * from tblproduct,tblcart where tblcart.pid=tblproduct.pid and year='$cmbyear' and status=5");
}
while ($r=pg_fetch_array($q)) {
	?>
	
		<tr>
			<td>
				<?php echo $r["pid"];?>
			</td>
			<td>
				<?php echo $r["pname"];?>
			</td>
			<td>
				<?php 

				echo $r["pdprice"];?>
			</td>
			<Td>
				<?php
	echo $r['qty'];?>
			</Td>
		<Td>
				₹<?php
				$z+=$r['qty']*$r['pdprice'];

	echo $r['qty']*$r['pdprice'];?>/-
			</Td>
			

	
		</tr>
	
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
</div>
<?php include 'footer.php';?>
</body>
</html>