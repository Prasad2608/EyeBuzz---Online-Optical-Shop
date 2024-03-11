   <title></title>
<?php include 'head.php';?>
</head>
<body>

<?php include 'menu.php';?>

<div class="row">
   <div class="col-md-6">
<form method="post">
   <table>
      <Tr>
         <Td>
            Category
         </Td>
         <td>
            <select name="cmbcname" class="form-control">
               <option value="0">All Category</option>
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
         <td>
            <input type="submit" name="btnsearchbycategory" value="Search By Category">
         </td>
      </Tr>
   </table>
</form>
</div>
<div class="col-md-6">
<form method="post">
   <table>
      <Tr>
         <Td>
            Search
         </Td>
         
         <td>
            <input type="text" class="form-control" name="txtsearch">
         </td>
      
         <td>
            <input type="submit" name="btnsearch" value="Search..">
         </td>
      </Tr>
   </table>
</form>
</div>
</div>
<?php
if(isset($_POST['btnsearch'])){
extract($_POST);
   $query="select * from tblproduct where pname like '%".$txtsearch."%'";
}
else{
   $query="select * from tblproduct order by pid desc";
}
?>
<?php
if(isset($_POST['btnsearchbycategory'])){
extract($_POST);
if($cmbcname==0){
$query="select * from tblproduct";
}
else{
$query="select * from tblproduct where cid = '".$cmbcname."'";
}
}
?>
<!-- Our  Glasses section -->
   <div class="glasses">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>COMPUTER GLASSES STARTING AT RS.1000</h2>
                     <p>Buy 1 Get 1 Free</p>
                  </div>
               </div>
            </div>
         </div>
         <?php
$q=pg_query($query);
while($r=pg_fetch_array($q)){
   ?>
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                 <div class="card">
                  <figure><img src=admin/<?php
   echo $r['pimage'];?> height=200px width=200px>
</figure>
                   <h1><?php
   echo $r['pname'];?></h1>
                   <p class="price"><?php
   echo $r['pprice'];?></p>
                      <p>Amethyst Full Rim Hustlr Eyeglasses</p>
                    <button class="btn btn-success">Add to Cart</button>
               </div>
            </div>

               </div>
            </div>
         </div>
         <?php }?>
      </body>
      <!-- end Our  Glasses section --> 
      <?php include 'footer.php';?> 