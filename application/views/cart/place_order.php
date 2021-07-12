 <head>
    <title><?php $pageTitle ?></title>
    <?php $this->load->view('commons/maintemplate'); ?> 
         
 </head>
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br>
                <?php
                  if(isset($_REQUEST['alert']))
                  {
                      switch(@$_REQUEST['alert'])
                      {
                          case 1:
                          echo '<div class="alert alert-info alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                  
                                                  <strong>Success!</strong> Items Removed from cart!
                                               </div>';
                          break;                   
                          case 2:
                          echo '<div class="alert alert-info alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                  
                                                  <strong></strong> Qty has been updated successfully!
                                               </div>';
                          break;  
                          case 3:
                          echo '<div class="alert alert-success alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                 
                                                  <strong>'.$name.'</strong>  added to your cart!
                                               </div>';
                          break;  
                          case 4:
                          echo '<div class="alert alert-danger alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                 
                                                  <strong></strong> Item has been removed successfully!
                                               </div>';
                          break;
                          case 5:
                          echo '<div class="alert alert-success alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                 
                                                  <strong>Orders</strong>  placed successfully!
                                               </div>';
                          break;       
                      }
                  }
                  ?>
                  <?php
					//echo $_SESSION['user_name'];
				?>
                <table class = "table table-striped">
   <caption>Striped Table Layout</caption>
   
   <thead>
      <tr>
         <th>Name</th>
         <th>Description</th>
         <th>price</th>
         <!--<th>Qty</th>-->
      </tr>
   </thead>
   
   <tbody>
   <?php 
    foreach($cartDetails as $product) : ?>
      <tr>  
         <td><?php echo $product->cat_name; ?></td>
         <td><?php echo $product->description; ?></td>
         <td><?php echo $product->product_price; ?></td>
         <!-- <td><?php //echo $product->qty; ?></td>-->
      </tr>
       <?php endforeach; ?>    
   </tbody>
   
</table> 
            </div>
        </div>
    </div>
</section>            

 <?php $this->load->view('commons/mainfooter'); ?>
