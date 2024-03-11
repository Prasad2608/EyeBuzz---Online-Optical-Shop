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
				User Name
			</th>
			<th>
				User Email
			</th>
			<th>
				User Phone
			</th>
			<th>
				User Address
			</th>
		</Tr>
<?php
$q=pg_query("select * from tbluser where uid='".$_SESSION['uid']."'");
while($r=pg_fetch_array($q)){
	?>
		<tr>
			<Td>
				<?php
	echo $r['uname'];?>
			</Td>
		
	
		
			<Td>
				<?php
	echo $r['email'];?>
			</Td>
			<Td>
				<?php
	echo $r['phoneno'];?>
			</Td>
			<td>
				<?php
				$q2=pg_query("Select * from tbladdress where addressid='".$_GET['id']."'");
				$r2=pg_fetch_array($q2);
	echo $r2['address'];?>
			</td>
		
			
		</Tr>
		
	
	
	

<?php
}
?>
</table>
</div>
</div>
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
$q=pg_query("select * from tblcart,tblproduct where tblproduct.pid=tblcart.pid and uid='".$_SESSION['uid']."' and status=0");
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

</div>
</div>
<form method="post">
	<table class="table">
		<Tr>
			<Td>
				Choose Payment Method
			</Td>
			<td>
				<select name="cmbpayment">
					<option value="Online">Online</option>
					<option value="COD">COD</option>
				</select>
			</td>
		</Tr>
		<tR>
			<tD>
				<input type="submit" name="btnpay" value="Pay">
			</tD>
		</tR>
	</table>
</form>

<?php
if(isset($_POST['btnpay'])){
	extract($_POST);
	$ddate=date('Y-m-d');
	$ttime=date('H:i:s');
	$year=date('Y');
	pg_query("update tblcart set year='$year', status='1',pmethod='$cmbpayment',ddate='$ddate',ttime='$ttime',addressid='".$_GET['id']."' where status='0' and uid='".$_SESSION['uid']."'");
	?>
	<script type="text/javascript">
		window.location.href="done.php";
	</script>
	<?php
}
?>
<?php include 'footer.php';?>
</body>
</html>