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
if(isset($_POST['btnaddaddress'])){
  extract($_POST);
  pg_query("INSERT INTO tbladdress(address, uid) VALUES ('$txtaddress','".$_SESSION['uid']."')");
  ?>
  <script type="text/javascript">
    alert("Address Added Successfully");
    window.location.href="viewcart.php";
  </script>
  <?php
}

?>


<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <form method="post">
      <table class="table">
        <Tr>
          <Td>
            Address
          </Td>
          <td>
           <textarea name="txtaddress" class="form-control"></textarea>
          </td>
        </Tr>
        
        <Tr>
          <Td colspan=2 align=center>
            <input type="submit" name="btnaddaddress" value="Add Address" class="btn btn-dark">
          </Td>
          
        </Tr>
      </table>
    </form>
  </div>
</div>

<?php include 'footer.php';?>
</body>
</html>