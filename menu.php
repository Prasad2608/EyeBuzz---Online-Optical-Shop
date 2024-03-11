 <?php
 session_start();
pg_connect("host=localhost user=postgres password=postgres dbname=dbopticals");
?>

  <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
 
         <!-- header inner -->
        
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo2.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <?php
                              if($_SESSION['email']==null){
                              ?><li class="nav-item">
                                 <a class="nav-link" href="register.php">Register</a>
                              </li>
                             
                              <li class="nav-item">
                                 <a class="nav-link" href="login.php">Login</a>
                              </li>
                             <?php
                          }
                          else{
                             ?>
                             
                              <li class="nav-item">
                                 <a class="nav-link" href="ourglass.php">Shop</a>
                              </li>
                               <li class="nav-item">
                                 <a class="nav-link" href="viewcart.php">View Cart</a>
                              </li>
                               <li class="nav-item">
                                 <a class="nav-link" href="orders.php">Orders</a>
                              </li>
                               <li class="nav-item">
                                 <a class="nav-link" href="logout.php">Logout</a>
                              </li>
                             <?php
                          }
                          ?>

                              
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>

