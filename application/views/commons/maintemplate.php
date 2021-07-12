<html>
<script>
    var SITE_URL = "<?php echo SITE_URL; ?>";
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Font awesome -->
    <link type="text/css" href="<?php echo SITE_URL;?>assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" href="<?php echo SITE_URL;?>assets/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link type="text/css" href="<?php echo SITE_URL;?>assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="<?php echo SITE_URL;?>assets/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="<?php echo SITE_URL;?>assets/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="<?php echo SITE_URL;?>assets/css/style.css" rel="stylesheet"> 
    <link rel="shortcut icon" href="<?php echo SITE_URL;?>assets/img/smallicon.png">   

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="<?php echo SITE_URL;?>assets/css/jquery.mobile-1.4.5.min.css">
    <script src="<?php echo SITE_URL;?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo SITE_URL;?>assets/js/jquery.mobile-1.4.5.min.js"></script> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- mine -->
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/css/jquery-ui.css" />
                  <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>assets/js/jquery.magnific-popup/dist/magnific-popup.css" />
                   <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>/assets/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />



<!-- <div data-role="page">
  <div data-role="header" data-position="fixed"> -->
<header id="aa-header" >
    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
              <?php 
              if(@$_SESSION['role_id']==1)
                {?>
              <a href="<?php echo SITE_URL;?>admin" title="Go to Home"><img src="<?php echo SITE_URL;?>assets/img/hibiscus.png" width="250px" style="margin-top:0px;"></a>
              <?php
            }
            else
              {?>
              <a href="<?php echo SITE_URL;?>products" title="Go to Home"><img src="<?php echo SITE_URL;?>assets/img/hibiscus.png" width="250px" style="margin-top:0px;"></a>
              <?php
            }
              ?>

              </div>
              <!-- / logo  -->
              <!-- search box -->
           
              <div class="aa-search-box">
               <form action="<?php echo SITE_URL;?>search" method="post">
                  <input type="text" name="search" id="" placeholder="So, What are you wishing for today? ">
                  <button type="submit" name="submit"  style="width:50px; height:40px;"><span class="fa fa-search"></span></button>
                </form>
              </div>
                      
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
    <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li>
              <?php 
              if(@$_SESSION['role_id']==1)
                {?>
              <a href="<?php echo SITE_URL;?>admin">Home</a></li>
              <?php
            }
            else
              {?>
              <a href="<?php echo SITE_URL;?>products">Home</a></li>
              <?php
            }
              ?>

              <?php 
              if(@$_SESSION['role_id']==1)
              {
                ?>
                 <li><a href="<?php echo SITE_URL;?>home">Manage<span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="<?php echo SITE_URL;?>addkurtis"> Products</a></li>  
                   <li><a href="<?php echo SITE_URL;?>manageorders"> Orders</a></li>  
                  <li><a href="<?php echo SITE_URL;?>manageuser"> Users</a></li>  
                  <li><a href="<?php echo SITE_URL;?>managecategory"> Category</a></li>  
                  <li><a href="<?php echo SITE_URL;?>managesubcat"> Subcategory</a></li>  
                  <li><a href="<?php echo SITE_URL;?>managetype"> Material/Metal </a></li>  
                  <li><a href="<?php echo SITE_URL;?>managerelation">Assign Meterial/Metal To Subcategory</a></li>  
                  <li><a href="<?php echo SITE_URL;?>managesize">Size</a></li>  
                  <li><a href="<?php echo SITE_URL;?>managecolor"> Color</a></li>  
          
          
         
                  
                </ul>
              </li>

                <?php
              }

                ?>

              <li><a href="#">Categories<span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Clothing<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo SITE_URL;?>sub_items?value=1">Kurtis</a></li>
                      <li><a href="<?php echo SITE_URL;?>sub_items?value=2">Salwars</a></li>
                      <li><a href="<?php echo SITE_URL;?>sub_items?value=3">leggings</a></li>                                      
                    </ul>
                  </li>           
                  <li><a href="#">Accessories<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo SITE_URL;?>sub_items?value=4">Earrings</a></li>
                      <li><a href="<?php echo SITE_URL;?>sub_items?value=5">Bangles</a></li>
                      <li><a href="<?php echo SITE_URL;?>sub_items?value=6">Necklaces </a></li>                                      
                    </ul>
                  </li>
                </ul>
              </li>

              <li><a href="<?php echo SITE_URL;?>contactUs">Contact</a></li>
               
             
          
              <div class="navbar navbar-right navbar-collapse collapse">
                  <ul class="nav navbar-nav">
          
                     <li><a href="<?php echo SITE_URL;?>view_cart_details" >Cart</a></li>
                     <?php 
                 if (@$_SESSION['user_name']=='') 
                  {?>
              <li><a href="#"  data-toggle="modal" id="login-btn" data-target="#login-modal">login</a></li>
              <?php }  
              else
              { ?>
                
                <li><a href="<?php echo SITE_URL;?>signout">signout</a></li>
           <?php   } ?>
                    
                  </ul>
              </div>
            

              
           </ul>
          </div><!--/.nav-collapse -->
        </div>
        
      </div> 
      </div>
    </div>
  </section>
  <!-- / menu -->  
<!-- </div></div> -->

  <!-- / header section -->