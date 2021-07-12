<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Daily Shop | Blog Archive</title>
    <?php 
      $this->load->view('commons/maintemplate'); 
    ?>
  </head>
  <body>
   <!-- wpf loader Two -->
   
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
 
 
  <!-- catg header banner section -->
  <!-- <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Blog Archive</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Blog Archive</li>
        </ol>
      </div>
     </div>
   </div>
  </section> -->
  <!-- / catg header banner section -->

  <!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
              <center>
                <div class="aa-blog-content">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>clothing">Clothing</a></h4>
                        <figure class="aa-blog-img">
                          <a href="<?php echo SITE_URL;?>clothing"><img src="<?php echo SITE_URL;?>assets/img/fashion/3.jpg" alt="fashion img"></a>
                        </figure>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates voluptatum accusamus dolorum ipsam adipisci laudantium laborum ipsa excepturi soluta, dolore similique, velit id, rerum repudiandae enim modi! Quo, debitis, in.</p>
                        <div class="aa-article-bottom">
                          <div class="aa-post-author">
                            Posted By <a href="#">Jackson</a>
                          </div>
                          <div class="aa-post-date">
                            March 26th 2016
                          </div>
                        </div>
                      </article>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>access">Accessories</a></h4>
                        <figure class="aa-blog-img">
                          <a href="<?php echo SITE_URL;?>access"><img src="<?php echo SITE_URL;?>assets/img/fashion/2.jpg" alt="fashion img"></a>
                        </figure>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates voluptatum accusamus dolorum ipsam adipisci laudantium laborum ipsa excepturi soluta, dolore similique, velit id, rerum repudiandae enim modi! Quo, debitis, in.</p>
                        <div class="aa-article-bottom">
                          <div class="aa-post-author">
                            Posted By <a href="#">Jackson</a>
                          </div>
                          <div class="aa-post-date">
                            March 26th 2016
                          </div>
                        </div>
                      </article>
                    </div>     
                  </div>
                </div>

                <div class="aa-blog-content">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>customerdetails">Customer Details</a></h4>
                        <figure class="aa-blog-img">
                          <a href="<?php echo SITE_URL;?>customerdetails"><img src="<?php echo SITE_URL;?>assets/img/fashion/3.jpg" alt="fashion img"></a>
                        </figure>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates voluptatum accusamus dolorum ipsam adipisci laudantium laborum ipsa excepturi soluta, dolore similique, velit id, rerum repudiandae enim modi! Quo, debitis, in.</p>
                        <div class="aa-article-bottom">
                          <div class="aa-post-author">
                            Posted By <a href="#">Jackson</a>
                          </div>
                          <div class="aa-post-date">
                            March 26th 2016
                          </div>
                        </div>
                      </article>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="<?php echo SITE_URL;?>orderdetails">Order Details</a></h4>
                        <figure class="aa-blog-img">
                          <a href="<?php echo SITE_URL;?>orderdetails"><img src="<?php echo SITE_URL;?>assets/img/fashion/2.jpg" alt="fashion img"></a>
                        </figure>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates voluptatum accusamus dolorum ipsam adipisci laudantium laborum ipsa excepturi soluta, dolore similique, velit id, rerum repudiandae enim modi! Quo, debitis, in.</p>
                        <div class="aa-article-bottom">
                          <div class="aa-post-author">
                            Posted By <a href="#">Jackson</a>
                          </div>
                          <div class="aa-post-date">
                            March 26th 2016
                          </div>
                        </div>
                      </article>
                    </div>
                            
                  </div>
                </div>
                </center>
              </div>
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3>Category</h3>
                    <ul class="aa-catg-nav">
                      <li><a href="<?php echo SITE_URL;?>clothing">Clothing</a></li>
                      <li><a href="<?php echo SITE_URL;?>access">Accessories</a></li>
                    </ul>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Products</h3>
                    <ul class="aa-catg-nav">
                      <li><a href="<?php echo SITE_URL;?>addkutties">kurthis</a></li>
                      <li><a href="<?php echo SITE_URL;?>addleggings">Leggings</a></li>
                      <li><a href="<?php echo SITE_URL;?>addsalwars">Salwars</a></li>
                      <li><a href="<?php echo SITE_URL;?>addearrings">Earrings</a></li>
                      <li><a href="<?php echo SITE_URL;?>addnecklaces">Necklaces Sets</a></li>
                      <li><a href="<?php echo SITE_URL;?>addbangles">Bangles</a></li>
                    </ul>
                  </div>
                  </div>
                  <!-- <div class="aa-sidebar-widget">
                    <h3>Recent Post</h3>
                    <div class="aa-recently-views">
                      <ul>
                        <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor sit amet.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>
                        <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>
                         <li>
                          <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                          <div class="aa-cartbox-info">
                            <h4><a href="#">Lorem ipsum dolor.</a></h4>
                            <p>March 26th 2016</p>
                          </div>                    
                        </li>                                      
                      </ul>
                    </div>                            
                  </div> -->
                </aside>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Blog Archive -->
  <?php 
      $this->load->view('commons/mainfooter'); 
 ?>
  </body>
</html>
 