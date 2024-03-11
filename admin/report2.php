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




<input type="button" onclick="printDiv('printableArea')" value="print a div!" />
<div id="printableArea">
	<?php
	$q1=pg_query("select count(*) as 'pcount' from tblproduct");
	$r1=pg_fetch_array($q1);
	echo "Total No. Of Product=".$r1['pcount'];
	?>
<table class="table">
		<Tr>
			<Th>
				Product ID
			</Th>
			<Th>
				Product Name
			</Th>
		</Tr>
<?php
$q=pg_query("select * from tblproduct");
while ($r=pg_fetch_array($q)) {
	?>
	
		<tr>
			<td>
				<?php echo $r["pid"];?>
			</td>
			<td>
				<?php echo $r["pname"];?>
			</td>
	
		</tr>
	
	<?php
}
?>
</table>
</div>
<?php include 'footer.php';?>
</body>
</html>