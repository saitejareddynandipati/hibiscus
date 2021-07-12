 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once (__DIR__).'\..\libraries\globalFunctions.php';
?>


 <head>
    <title>Hibiscus Fashion | <?php echo $sub_banner[0]->subcat_name; ?></title>
    <?php 
      $this->load->view('commons/maintemplate'); 
    ?>
 </head>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img class="img-responsive" src="<?php echo SITE_URL;?>uploads/<?php echo $sub_banner[0]->banner_image; ?>" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php //$products->category_id; ?></h2>
        <ol class="breadcrumb"><br><br><br><br><br><br>
          <li class="active"><h1><b><?php echo $sub_banner[0]->subcat_name;?></b></h1></li><br>
          <li><a href="<?php echo SITE_URL;?>products"><h5><b>Home</b></h5></a></li>         
          <!--<li class="active"><h4>/<?php echo $sub_banner[0]->subcat_name;?></h4></li> -->         
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
   <section id="aa-product-category">
    <div class="container">
      <div class="row">
         <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
               
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body" id="product_loading">
              <ul class="aa-product-catg">  
                <!-- start single product item -->
                <form method="POST" action="">

                  <?php foreach($sub_item_details as $product) : ?>
                  <li>
                    <figure>
                      <a class="aa-product-img" href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?> "><img class="subitems_size" src="<?php echo SITE_URL;?>uploads/<?php echo $product->image; ?>" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn"href="<?php echo SITE_URL;?>item_details?value=<?php echo $product->item_id; ?> "><span class="fa fa-shopping-cart"></span>Quick View</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="<?php echo SITE_URL;?>item_details?<?php echo $product->item_id; ?>"><?php echo $product->product_name; ?></a></h4>
                     
                       <input type="hidden" name="item_number" value="<?php echo $product->item_id; ?>">
                        <input type="hidden" name="price" value="<?php echo $product->discounted_price; ?>">
                        <input type="hidden" name="name" value="<?php echo $product->description; ?>">
                         <input type="hidden" name="itemsubcat_id" value="<?php echo $product->itemsubcat_id; ?>">

                        
                        <span class="aa-product-price">₹ <?php echo $product->discounted_price?></span><span class="aa-product-price"><del>₹ <?php echo $product->actual_price?></del></span>
                        <p class="aa-product-descrip"><?php echo $product->description; ?></p>
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
                 </form>  
            </ul>
             
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                         </div>
                        
                        <!-- Modal view content -->
                        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">₹34.99</span>
                              <p class="aa-product-avilability">Availability : <span>In stock</span></p>
                            </div>
                            <p><?php echo $product->description; ?>/p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div> -->
                      </div>
                    </div> 

                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>

              <!-- / quick view modal -->   
            </div>

          </div>

        </div>

          <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Categories</h3>
              <ul class="aa-catg-nav">
                <?php foreach($subcategory as $subcat){ ?>
                <li><a href="sub_items?value=<?php echo $subcat['subcat_id'];?>"><?php echo $subcat['subcat_name']; ?></a></li>  
          <?php    } ?>
               
              </ul>
            </div>           
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
                 <form action="">
                   <input type="range" name="points" min="100" max="10000" step="100" value="1000" id="min_price" name="min_price">
                   <span id="price_range"></span>
                  
                 </form>
              </div>    
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget" >
              <h3>Shop By Color</h3>
              <span id="shop_color"></span>
              <div class="aa-color-tag">
                     <form action="">
                 <select name="search_color" id="search_color" >
                 <option value=""selected>Select Colour</option>
                 <?php foreach($colors as $color)
                 {
                   echo '<option value="'.$color['color_id'].'" >'.$color['color'].'</option>';


                 }
                 ?>
                 </select>
                 </form>
              </div>                            
            </div>
           <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Latest Designs</h3>
              <div class="aa-recently-views">
                <ul> <?php foreach($latest as $lat )
                {?>
                  <li>
                      <a href="<?php echo SITE_URL;?>item_details?value=<?php echo $lat['item_id']; ?>" class="aa-cartbox-img"><img alt="img" src="<?php echo SITE_URL;?>uploads/<?php echo $lat['image'] ; ?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $lat['item_id']; ?>s"><?php echo $lat['product_name'];?></a></h4>
                       <span class="aa-product-price">₹ <?php echo $lat['discounted_price'];?></span><span class="aa-product-price"><del>₹<?php echo $lat['actual_price']; ?> </del></span>
                    </div>                    
                  </li>
                  <?php
                }
                ?>                                    
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Viewed</h3>
              <div class="aa-recently-views">
               <ul> <?php foreach($popular as $lat )
                {?>
                  <li>
                      <a href="<?php echo SITE_URL;?>item_details?value=<?php echo $lat['item_id']; ?>" class="aa-cartbox-img"><img alt="img" src="<?php echo SITE_URL;?>uploads/<?php echo $lat['image'] ; ?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="<?php echo SITE_URL;?>item_details?value=<?php echo $lat['item_id']; ?>s"><?php echo $lat['product_name'];?></a></h4>
                       <span class="aa-product-price">₹ <?php echo $lat['discounted_price'];?></span><span class="aa-product-price"><del>₹<?php echo $lat['actual_price']; ?> </del></span>
                    </div>                    
                  </li>
                  <?php
                }
                ?>                                    
                </ul>
              </div>                            
            </div>

          </aside>


        </div>   <?php $ob1 = new globalFunctions();
            $ob1->draw_pagination($start,$count,$page,$length);?>
      </div>

     </div>

    </section>
     
              
              

    <?php $this->load->view('commons/mainfooter'); ?>
    
  <script>
  $(document).ready(function(){    
      $('#search_color,#min_price').change(function(){    
        var price = $('#min_price').val();
        var color=$('#search_color').val();
        $("#price_range").text("Product under price Rs." +price);
        $.ajax({
          url:'load_product',
          method:"POST",
          type: 'html',
          data:{price:price,color:color},
          success:function(data){
            $("#product_loading").fadeIn(50).html(data);
          }
          });
      });

    });
  $(document).ready(function(){
    $('#search_color,#min_price').change(function(){
      var price=$('#min_price').val();
      var color=$('#search_color').val();
      $.ajax({
        url:'load_color',
        method:"POST",
        type:'html',
        data:{color:color,price:price},
       success :function(data){
        $("#product_loading").fadeIn(50).html(data);
       }
      });

    });
  });
  </script>