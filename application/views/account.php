<?php
$this->load->view('commons/maintemplate'); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hibiscus Fashion | Accounts</title>
  </head>
  <body>
  <!-- catg header banner section -->
   <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>assets/img/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Register Now</h2>
      <ol class="breadcrumb">
          <li class="active">Home</li>                   
          
        </ol>
        
      </div>
     
   </div>
  </section>
  <!-- / catg header banner section -->

  
  
   <!-- wpf loader Two -->
    <!-- <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>  -->
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
  <!-- catg header banner section -->

  
  
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view"  >
                     <div class="container"  > <br>
 
 <?php
               if(isset($_REQUEST['flg']))
              {
              switch(@$_REQUEST['flg'])
                {
                case 1:
                echo '<div class="alert alert-danger alert-white rounded"><div class="icon"><i class="fa fa-check"></i></div>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        
                        <strong>failed!</strong> user id already exists!
                        </div>';
                break;           
                case 2:
                echo '<div class="alert alert-success alert-white rounded">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <div class="icon"><i class="fa fa-check"></i></div>
                    <strong>Success!</strong> your registration is succesfully completed!
                    </div>';
                break;
                  case 3:
                          echo '<div class="alert alert-danger alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                 
                                                  <strong></strong> please register and log into your account before place to order!
                                               </div>';
                          break;
                case 4:
                          echo '<div class="alert alert-danger alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                 
                                                  <strong></strong> please log into your account before save your cart!
                                               </div>';
                          break; 
                            case 5:
                          echo '<div class="alert alert-danger alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                 
                                                  <strong></strong> Email ID is already existed! &nbsp; Register with another Email ID!
                                               </div>';
                          break;  

                            case 6:
                          echo '<div class="alert alert-success alert-white rounded">
                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <div class="icon"><i class="fa fa-check"></i></div>
                                                  
                                                 
                                                  <strong></strong> password link is send to your mail!
                                               </div>';
                          break;              
                         
              }
            }
            ?>
  
     
                       <div class="row">
                         <div class="col-md-12">
                           <div class="cart-view-area"  >
                             <div class="cart-view-table"  style="background-color:#e0e0d1;">
                              <h3>Register Now</h3>
                                  <hr>
                                  <!-- <div class="content">
              <p class="bg-danger">
            <?php if ($this->session->flashdata('login_failed')): ?>
            <?php echo $this->session->flashdata('login_failed'); ?>
            <?php endif; ?>
          </p>
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="<?php echo SITE_URL;?>login"  method="post" class="aa-login-form">
                  <label for="">Username <span>*</span></label>
                   <input type="text" name="user_name" id="user_name" placeholder="Username " required maxlength="35">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <button type="submit" name="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div> -->
              
              <form class="form-horizontal" action="<?php echo SITE_URL;?>register"  method="post">
                                      
                                        
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">UserName <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" class="form-control"  name="user_name" placeholder="Username "  title="five or more characters"  minlength="5" required maxlength="35">
                                            </div>
                                        </div>
                                        
                                          
                                        
                                         
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Email ID <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="email" name="email_id" id="email_id" placeholder="emailid"  required class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Password <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="password" name="password" id="password" placeholder="Password"  required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Phone Number <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" name="phone_number" id="" placeholder="Phone Number"  required class="form-control">
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                             <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>products"><i class="fa fa-times"></i> Cancel</a>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="col-sm-offset-5 col-sm-6">
                                        <p>Already have an account? <a href="#" style="color:black"  data-toggle="modal" data-target="#login-modal"><u>login</u></a></p>
                                        </div>
                                        </div>
                                         
                                    </form>
            </div>          
        
       </div>
     </div>
   </div>
   </div>

 </section> 
 <div class="col-sm-12">
 <br><br>
 </div>
 <!-- / Cart view section -->

  <?php 
      $this->load->view('commons/mainfooter'); 
    ?>
  </body>
</html>