<script>
    var SITE_URL = "<?php echo SITE_URL; ?>";
</script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo SITE_URL;?>assets/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="<?php echo SITE_URL;?>assets/js/sequence.js"></script>
  <script src="<?php echo SITE_URL;?>assets/js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript " src="<?php echo SITE_URL;?>assets/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/slick.js"></script>
   <!-- Price picker slider -->
  <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="<?php echo SITE_URL;?>assets/js/custom.js"></script> 
   

    <!--mine -->
  <!--<script src="<?php echo SITE_URL;?>assets/js/jquery.js"></script> 
  <script src="<?php echo SITE_URL;?>assets/js/jquery-ui.js"></script> -->

    <script src="<?php echo SITE_URL;?>assets/js/jquery-ui.min.js" type="text/javascript"></script>

    <script src="<?php echo SITE_URL;?>assets/js/jquery.parsley/parsley.js"></script>
      <script src="<?php echo SITE_URL;?>assets/js/hibiscus/discount.js"></script> 
            <script src="<?php echo SITE_URL;?>assets/js/hibiscus/product_number.js"></script> 

        <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/jquery.magnific-popup/dist/jquery.magnific-popup.min.js"></script>
         <script type="text/javascript" src="<?php echo SITE_URL;?>assets/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

      <script>


      $('.image-zoom').magnificPopup({ 
      type: 'image',
      mainClass: 'mfp-with-zoom', // this class is for CSS animation below
      zoom: {
      enabled: true, // By default it's false, so don't forget to enable it
  
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function 
  
      // The "opener" function should return the element from which popup will be zoomed in
      // and to which popup will be scaled down
      // By defailt it looks for an image tag:
      opener: function(openerElement) {
        // openerElement is the element on which popup was initialized, in this case its <a> tag
        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
        var parent = $(openerElement).parents("div.img");
        return parent;
      }
      }
  
      });
	  
	  $("#ordered_date").datepicker({
            dateFormat: "yy-mm-dd",
      changeMonth: true,
          changeYear: true,
           // minDate: 0,
            onSelect: function (date) {
               
                var date2 = $(this).datepicker('getDate');
                $('#ordered_date2').datepicker('option', 'minDate', date2);
            }
        });
      $("#ordered_date2").datepicker({
            dateFormat: "yy-mm-dd",
      changeMonth: true,
          changeYear: true,
           // minDate: 0,
            onSelect: function (date) {
               
                var date2 = $(this).datepicker('getDate');
                $('#ordered_date2').datepicker('option', 'minDate', date2);
            }
        });
	  
    // WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>
<!--<?php
  if(count($js_includes)>0)
  {
    foreach($js_includes as $js_file)
    {
      ?>
      <script src="<?php echo SITE_URL;?>assets/js/<?php echo $js_file;?>"></script>
      <?php
    }
  }
  ?>-->


<!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
            <div class="col-md-3 col-sm-6"></div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Sitemap</h3>
                  <ul class="aa-footer-nav">
                    <?php 
              if(@$_SESSION['role_id']==1)
                {?>
              <a href="<?php echo SITE_URL;?>admin" style="color:white">Home</a></li>
              <?php
            }
            else
              {?>
              <a href="<?php echo SITE_URL;?>products" style="color:white">Home</a></li>
              <?php
            }
              ?>                 
                    <li><a href="<?php echo SITE_URL;?>contact">Contact Us</a></li>
                  </ul>
                </div>
              </div>              
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <center><p class="color" >Designed by <a href="http://www.entransys.com" style="color:orange">Entransys Pvt Ltd</a></p></center>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
   <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login </h4>
          <?php echo $this->session->flashdata('login_failed'); ?>
          <form class="aa-login-form" action="<?php echo SITE_URL;?>login" method="post">
            <input type="hidden" name="current_page" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <label for="">Username<span>*</span></label>

            <input type="text" placeholder="Username " name="user_name">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password" name="password">
            <button type="submit" name="submit" class="aa-browse-btn">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="<?php echo SITE_URL;?>forgot_password">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="<?php echo SITE_URL;?>account">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <?php if(@$_SESSION['login_error']==1){

  @$_SESSION['login_error']= "" ; ?>  
  <script>
  jQuery('#login-modal').modal('show');

  </script>  <?php } ?>

  </html>