 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once (__DIR__).'\..\libraries\globalFunctions.php';
?>
<?php
  $this->load->view('commons/maintemplate',$nestedView);
?>



 <head>
 <title>Hibiscus Fashion | Home</title>
    
 </head>
  <body>
<!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
     <?php
               if(isset($_REQUEST['flg']))
              {
              switch(@$_REQUEST['flg'])
                {
                case 1: 
                echo '<div class="alert alert-success alert-white rounded"><div class="icon"><i class="fa fa-check"></i></div>
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        
                        <strong>Success!</strong> Successfully changed your password ,please login!
                        </div>';
                break;           
                                      
              }
            }
            ?>
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
         
            <!-- single slide item -->
            <?php foreach($products as $product) : ?>
            <li>
              <div class="seq-model">
                <img class="img-responsive" data-seq src="<?php echo SITE_URL;?>uploads/<?php echo $product->cat_image; ?>" alt="Men slide img" />
              </div>
             <!--  <div class="seq-title">
              <span data-seq>Save Up to 75% Off</span>              
                <h2 data-seq><?php // echo $product->cat_title; ?></h2>                
                <p data-seq><?php  //echo $product->cat_title; ?></p>-->
               <!--  <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a> 
              </div>-->
            </li>
             <?php endforeach; ?>  
            <!-- single slide item -->                    
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
            <?php foreach($subcategory as $product) : ?>
              <div class="col-md-4 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="<?php echo SITE_URL;?>uploads/<?php echo $product->subcat_image; ?>"/>                    
                    <div class="aa-prom-content">
                      <h4><a href="<?php echo SITE_URL;?>sub_items?value=<?php echo $product->subcat_id; ?> "><span><?php echo $product->subcat_name; ?></span></a></h4>
                      <!--<h4><a href="<?php// echo SITE_URL;?>sub_items?value=<?php// echo $product->subcat_id; ?> "><?php //echo $product->subcat_title; ?></a></h4> -->                     
                    </div>
                  </div>
                </div>
              </div> 
                <?php endforeach; ?>            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="<?php echo SITE_URL;?>uploads/fashion-banner.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- Clothing tabs Section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Salwars</a></li>
                <li><a href="#featured" data-toggle="tab">Kurtis</a></li>
                <li><a href="#latest" data-toggle="tab">Leggings</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">   
                  <?php foreach($salwars as $product) : ?>                    
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><img class="subitems_size" src="<?php echo SITE_URL;?>uploads/<?php echo $product->image; ?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><span class="fa fa-shopping-cart"></span>Quick View</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><?php echo $product->product_number;?></a></h4>
                          <span class="aa-product-price">₹<?php echo $product->discounted_price;?></span><span class="aa-product-price"><del>₹<?php echo $product->actual_price;?></del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <?php if($product->quantity>0&&$product->discount>0) 
                    { ?>
                    <span class="aa-badge aa-hot" href="#">offer!</span>
                    <?php
                        }
                        else if($product->quantity>0&&$product->discount==0) {
                    ?>
                      <input type="hidden" name="itemsubcat_id" value="<?php echo $product->itemsubcat_id; ?>">
                    <?php }
                    else
                    { ?>
                       <span class="aa-badge aa-sold-out" href="#">sold out!</span>
                    <?php } ?>
                    </li>  
                    <?php endforeach; ?>                                                                                 
                  </ul>
                  <a class="aa-browse-btn" href="<?php echo SITE_URL;?>sub_items?value=<?php echo $product->subcat_id; ?>">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                 <!-- <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>-->
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider"> 
                     <?php foreach($kurties as $product) : ?>                          
                    <li>
                      <figure>
                        <a class="aa-product-img" href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><img class="subitems_size" src="<?php echo SITE_URL;?>uploads/<?php echo $product->image; ?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><span class="fa fa-shopping-cart"></span>Quick View</a>
                         <figcaption>
                         <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><?php echo $product->product_number;?></a></h4>
                          <span class="aa-product-price">₹<?php echo $product->discounted_price;?></span><span class="aa-product-price"><del>₹<?php echo $product->actual_price;?></del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <?php if($product->quantity>0&&$product->discount>0) 
                    { ?>
                    <span class="aa-badge aa-hot" href="#">offer!</span>
                    <?php
                        }
                        else if($product->quantity>0&&$product->discount==0) {
                    ?>
                      <input type="hidden" name="itemsubcat_id" value="<?php echo $product->itemsubcat_id; ?>">
                    <?php }
                    else
                    { ?>
                       <span class="aa-badge aa-sold-out" href="#">sold out!</span>
                    <?php } ?>
                    </li>
                    <?php endforeach; ?>                                                                                      
                  </ul>
                  <a class="aa-browse-btn" href="<?php echo SITE_URL;?>sub_items?value=<?php echo $product->subcat_id; ?>">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider"> 
                  <?php foreach($leggings as $product) : ?>                       
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><img class="subitems_size" src="<?php echo SITE_URL;?>uploads/<?php echo $product->image; ?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><span class="fa fa-shopping-cart"></span>Quick View</a>
                         <figcaption>
                         <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><?php echo $product->product_number;?></a></h4>
                          <span class="aa-product-price">₹<?php echo $product->discounted_price;?></span><span class="aa-product-price"><del>₹<?php echo $product->actual_price;?></del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <?php if($product->quantity>0&&$product->discount>0) 
                    { ?>
                    <span class="aa-badge aa-hot" href="#">offer!</span>
                    <?php
                        }
                        else if($product->quantity>0&&$product->discount==0) {
                    ?>
                      <input type="hidden" name="itemsubcat_id" value="<?php echo $product->itemsubcat_id; ?>">
                    <?php }
                    else
                    { ?>
                       <span class="aa-badge aa-sold-out" href="#">sold out!</span>
                    <?php } ?>
                    </li>
                    <?php endforeach; ?>                                                                                    
                  </ul>
                  <a class="aa-browse-btn" href="<?php echo SITE_URL;?>sub_items?value=<?php echo $product->subcat_id; ?>">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / Clothing tabs section -->
     <!-- Clothing tabs Section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#ear" data-toggle="tab">Ear Rings</a></li>
                <li><a href="#kurta" data-toggle="tab">Bangles</a></li>
                <li><a href="#leggings" data-toggle="tab">Necklaces</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="ear">
                  <ul class="aa-product-catg aa-popular-slider">   
                  <?php foreach($earrings as $product) : ?>                    
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><img class="subitems_size" src="<?php echo SITE_URL;?>uploads/<?php echo $product->image; ?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><span class="fa fa-shopping-cart"></span>Quick View</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><?php echo $product->product_number;?></a></h4>
                          <span class="aa-product-price">₹<?php echo $product->discounted_price;?></span><span class="aa-product-price"><del>₹<?php echo $product->actual_price;?></del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <?php if($product->quantity>0&&$product->discount>0) 
                    { ?>
                    <span class="aa-badge aa-hot" href="#">offer!</span>
                    <?php
                        }
                        else if($product->quantity>0&&$product->discount==0) {
                    ?>
                      <input type="hidden" name="itemsubcat_id" value="<?php echo $product->itemsubcat_id; ?>">
                    <?php }
                    else
                    { ?>
                       <span class="aa-badge aa-sold-out" href="#">sold out!</span>
                    <?php } ?>
                    </li>  
                    <?php endforeach; ?>                                                                                 
                  </ul>
                  <a class="aa-browse-btn" href="<?php echo SITE_URL;?>sub_items?value=<?php echo $product->subcat_id; ?>">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                 <!-- <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>-->
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="kurta">
                 <ul class="aa-product-catg aa-featured-slider"> 
                     <?php foreach($bangles as $product) : ?>                          
                    <li>
                      <figure>
                        <a class="aa-product-img" href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><img class="subitems_size" src="<?php echo SITE_URL;?>uploads/<?php echo $product->image; ?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><span class="fa fa-shopping-cart"></span>Quick View</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><?php echo $product->product_number;?></a></h4>
                          <span class="aa-product-price">₹<?php echo $product->discounted_price;?></span><span class="aa-product-price"><del>₹<?php echo $product->actual_price;?></del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <?php if($product->quantity>0&&$product->discount>0) 
                    { ?>
                    <span class="aa-badge aa-hot" href="#">offer!</span>
                    <?php
                        }
                        else if($product->quantity>0&&$product->discount==0) {
                    ?>
                      <input type="hidden" name="itemsubcat_id" value="<?php echo $product->itemsubcat_id; ?>">
                    <?php }
                    else
                    { ?>
                       <span class="aa-badge aa-sold-out" href="#">sold out!</span>
                    <?php } ?>
                    </li>
                    <?php endforeach; ?>                                                                                      
                  </ul>
                  <a class="aa-browse-btn" href="<?php echo SITE_URL;?>sub_items?value=<?php echo $product->subcat_id; ?>">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="leggings">
                  <ul class="aa-product-catg aa-latest-slider"> 
                  <?php foreach($necklace as $product) : ?>                       
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><img class="subitems_size" src="<?php echo SITE_URL;?>uploads/<?php echo $product->image; ?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><span class="fa fa-shopping-cart"></span>Quick View</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?>"><?php echo $product->product_number;?></a></h4>
                          <span class="aa-product-price">₹<?php echo $product->discounted_price;?></span><span class="aa-product-price"><del>₹<?php echo $product->actual_price;?></del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <?php if($product->quantity>0&&$product->discount>0) 
                    { ?>
                    <span class="aa-badge aa-hot" href="#">offer!</span>
                    <?php
                        }
                        else if($product->quantity>0&&$product->discount==0) {
                    ?>
                      <input type="hidden" name="itemsubcat_id" value="<?php echo $product->itemsubcat_id; ?>">
                    <?php }
                    else
                    { ?>
                       <span class="aa-badge aa-sold-out" href="#">sold out!</span>
                    <?php } ?>
                    </li>
                    <?php endforeach; ?>                                                                                    
                  </ul>
                  <a class="aa-browse-btn" href="<?php echo SITE_URL;?>sub_items?value=<?php echo $product->subcat_id; ?>">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / Clothing tabs section -->



    

     
              
              

   
     </body>
     <?php
  $this->load->view('commons/mainfooter',$nestedView);
?>