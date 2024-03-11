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
			<th>
				Address
			</th>
		</Tr>
<?php
$q=pg_query("select * from tblcart,tblproduct where tblproduct.pid=tblcart.pid and uid='".$_SESSION['uid']."' and status>=1");
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
			<Td>
			<?php
				$a=$r['addressid'];
					$q2=pg_query("select * from tbladdress where addressid='$a'");
					$r2=pg_fetch_array($q2);
					echo $r2['address']
				?>
			</Td>
			<Td>

				<?php
				$s="";$v="";
				switch ($r["status"]) {
					case 1:$s="Not Yet Dispatched";
						$v="0";
						break;
					case 2:$s="Dispatched";
						$v="25";
						break;
					case 3:$s="Arriving Soon";
						$v="50";
						break;
					case 4:$s="Arriving Today";
						$v="75";
						break;
					case 5:$s="Delivered";
						$v="100";
						break;
					
					default:
						// code...
						break;
				}
				?>
								<label class="form-label" for="customRange1"><?php echo $s;?></label>
<div class="range">

  <input type="range" class="form-range" value="<?php echo $v;?>" id="customRange1" disabled />
</div>
			</Td>
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

<?php include 'footer.php';?>
</body>
</html>