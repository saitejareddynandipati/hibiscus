
<!DOCTYPE html>
<html lang="en">
<?php
$this->load->view('commons/maintemplate',$nestedView); 
?>
<?php
if($notifications_count=='')
{
$notifications_count=0;
}


?>
  <head>
    <title>Hibiscus | Admin home</title>
  </head>
  <body>
        
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

 
  <!-- catg header banner section -->
   <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>uploads/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Admin page</h2>
      <ol class="breadcrumb">
          <li class="active">Home</li>                   
          
        </ol>
        
      </div>
     
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Blog Archive -->
 
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
      
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-12">
              <a href="<?php echo SITE_URL;?>notification" ><button  class="pull-right"> <i class="fa fa-bell" aria-hidden="true"></i> Notifications(<?php echo $notifications_count; ?>)</button></a></div></div>

              <center>
                <div class="aa-blog-content">
                  <div class="row">
                    
                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>addkurtis">Manage Products</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12 " data-toggle="tooltip" data-placement="bottom" title="Go to Manage Products" href="<?php echo SITE_URL;?>addkurtis"><img src="<?php echo SITE_URL;?>assets/img/admin/product.jpg" alt="product img"></a>
                          
                      </a>
                        </figure>
                      </article>
                    </div>
                    
                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>manageorders">Manage Orders</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12 " data-toggle="tooltip" data-placement="bottom" title="Go to Manage Orders" href="<?php echo SITE_URL;?>manageorders"><img src="<?php echo SITE_URL;?>assets/img/admin/order.jpg" alt="order img" ></a>
                        </figure>
                      </article>
                    </div> 

                    
                    
                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>manageuser">Manage Users</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12" data-toggle="tooltip" data-placement="bottom" title="Go to Manage Users" href="<?php echo SITE_URL;?>manageuser"><img src="<?php echo SITE_URL;?>assets/img/admin/user.jpg" alt="user img"></a>
                        </figure>
                      </article>
                    </div>
  

                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>managecategory">Manage Category</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12" data-toggle="tooltip" data-placement="bottom" title="Go to Manage Category" href="<?php echo SITE_URL;?>managecategory"><img src="<?php echo SITE_URL;?>assets/img/admin/category.jpg" alt="category img"></a>
                        </figure>
                      </article>
                    </div>

                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>managesubcat">Manage SubCategory</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12" data-toggle="tooltip" data-placement="bottom" title="Go to Manage SubCategory" href="<?php echo SITE_URL;?>managesubcat"><img src="<?php echo SITE_URL;?>assets/img/admin/subcat.jpg" alt="Subcategory img"></a>
                        </figure>
                      </article>
                    </div>

                     <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>managetype">Manage Material/Metal Type</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12 " data-toggle="tooltip" data-placement="bottom"  title="Go to Manage fabric/metal type" href="<?php echo SITE_URL;?>managetype"><img src="<?php echo SITE_URL;?>assets/img/admin/metal.jpg" alt="fashion img"></a>
                        </figure>
                      </article>
                    </div>


                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>managerelation">Assign Meterial/Metal To Subcategory</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12" data-toggle="tooltip" data-placement="bottom" title="Go to Manage Relation" href="<?php echo SITE_URL;?>managerelation"><img src="<?php echo SITE_URL;?>assets/img/admin/relation.jpg" alt="relation img"></a>
                        </figure>
                      </article>
                    </div>


                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>managesize">Manage Sizes</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12" data-toggle="tooltip" data-placement="bottom" title="Go to Manage Sizes" href="<?php echo SITE_URL;?>managesize"><img src="<?php echo SITE_URL;?>assets/img/admin/size.jpg" alt="size img"></a>
                        </figure>
                      </article>
                    </div>
                    <div class="col-md-3 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>managecolor">Manage Colors</a></h4>
                        <figure class="aa-blog-img">
                          <a class="col-xs-12" data-toggle="tooltip" data-placement="bottom" title="Go to Manage Colors" href="<?php echo SITE_URL;?>managecolor"><img src="<?php echo SITE_URL;?>assets/img/admin/color.jpg" alt="color img"></a>
                        </figure>
                      </article>
                    </div>
                   
                          
                  </div>
                </div>
                </center>
               
              </div>
              
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Blog Archive -->
  <?php
$this->load->view('commons/mainfooter',$nestedView); 
?>
  </body>
</html>