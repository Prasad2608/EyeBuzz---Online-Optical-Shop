<?php
include 'menu.php';
pg_query("delete from tblcart where cartid=".$_GET['id']);

?>
<script type="text/javascript">
	window.location.href="viewcart.php";
</script>