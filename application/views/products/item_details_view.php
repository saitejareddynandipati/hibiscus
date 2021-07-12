 <head>
    <title><?php $pageTitle ?></title>
    <?php 
      $this->load->view('commons/maintemplate'); 
    ?>
 </head>
 	 <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="<?php echo SITE_URL;?>uploads/<?php echo $item_details->image; ?>" class="simpleLens-lens-image"><img src="<?php echo SITE_URL;?>uploads/<?php echo $item_details->image; ?>" class="simpleLens-big-image"></a></div>
                      </div>                     
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                 <form method="post" action="addTocart?alert=2">
                   <?php
                    if(isset($_REQUEST['alert'])) {
                      switch(@$_REQUEST['alert']) {
                        case 1:
                        echo '<div class="alert alert-success alert-white rounded">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <div class="icon"><i class="fa fa-check"></i></div>
                                    <strong>Success!</strong> Password Updated Successfully!
                                   </div>';
                        break;           
                        case 2:
                        echo '<div class="alert alert-danger alert-white rounded">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <div class="icon"><i class="fa fa-times-circle"></i></div>
                                    <strong>Error!</strong> Invalid Old Password / Please Enter a Valid Password.
                                   </div>';
                        break;  
                      }
                    }
                    ?>
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <input type="hidden" name="item_id" value="<?php echo $item_details->item_id; ?>">
                    <input type="hidden" name="category_id" value="<?php echo $item_details->category_id; ?>">
                    <input type="hidden" name="subcat_id" value="<?php echo $item_details->subcat_id; ?>">
                   <input type="hidden" name="discounted_price" value="<?php echo $item_details->discounted_price; ?>">
                   <input type="hidden" name="itemcat_name" value="<?php echo $item_details->itemcat_name; ?>">
                   <input type="hidden" name="description" value="<?php echo $item_details->description; ?>">
                   <input type="hidden" name="color_id" value="<?php echo $item_details->color_id; ?>">
                    <input type="hidden" name="item_name" value="<?php echo $item_details->product_name; ?>">

                   <h3><b><?php echo $item_details->description; ?></b></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price" >₹ <?php echo $item_details->discounted_price; ?></span>
                      <p class="aa-product-avilability">Avilability: <?php if($qty->quantity==0){ ?> <span style="color:red">Out Of Stock</span>
                       <?php } else { ?> <span style="color:#18A509">In stock</span>  <?php } ?> </p>
                    </div>
                    <p><?php echo $item_details->description; ?></p>
                  <p> <?php //echo "product id" , $product->id; ?></p>
                      <p> <?php //echo "category id" ,$product->category_id;  ?></p>
                      <p> <?php //echo "colour id" ,$product->color_id;  ?></p>
                    <h4>Size</h4>
                         <div class="aa-prod-view-size">
                            <?php //foreach($size as $row){ ?>
                               <!-- <input type="radio" name=sizes  value="<?php //echo $row['size_id']; ?>" checked> <?php //echo $row['size']; ?><br>-->
                              <button type="button" name="submit_cart" class="btn btn-info"><?php echo $item_details->size; ?></button>
                              <?php //} ?>
                            </div>
                            <?php if($item_details->subcat_id==5) { ?>
                    <img src="<?php echo SITE_URL;?>uploads/size-chart.jpg" class="img-responsive" width="300" height="90">
                    <?php } ?><br>
                    <?php if($item_details->subcat_id==1) { ?>
                    <img src="<?php echo SITE_URL;?>uploads/dress-chart.JPG" class="img-responsive" width="300" height="90">
                    <?php } ?>
                    <?php if($item_details->subcat_id==2) { ?>
                    <img src="<?php echo SITE_URL;?>uploads/dress-chart.JPG" class="img-responsive" width="300" height="90">
                    <?php } ?>
                    <?php if($item_details->subcat_id==3) { ?>
                    <img src="<?php echo SITE_URL;?>uploads/leg-size.JPG" class="img-responsive" width="500" height="100">
                    <?php } ?><br>

                    <div class="aa-prod-quantity">                      
                      <p class="aa-prod-category">
                        Category: <a href="#"><?php echo $item_details->itemcat_name;?></a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                     <button type="submit" name="submit_cart"  data-role-name="<?php echo @$_SESSION['role_name']; ?>" class="btn btn-info submit_cart" <?php if($qty->quantity==0){ ?> disabled <?php

                     }  ?>>Add To Cart</button>
                       <button class="btn btn-success submit_cart" type="submit" name="submitItem" data-role-name="<?php echo @$_SESSION['role_name']; ?>"  <?php if($qty->quantity==0){ ?> disabled <?php   }  ?> > Buy Now</button>                      

                      <input type="button" class ='btn btn-warning'name='place_order' value="Buy More" onclick="window.location = 'sub_items?value=<?php echo $item_details->subcat_id; ?>'">
                      </form>                 
                    </div>
                     
                  </div>
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


  <?php $this->load->view('commons/mainfooter'); ?>
  </body>
  <script type="text/javascript">
    $(".submit_cart").click(function(){
      var role_name = $(this).data('role-name');
      if(role_name==="")
      {
        $("#login-btn").click();
        return false;
      }
    });

  </script>