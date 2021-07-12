 <head>
    <title>Hibiscus Fashion | Cart Details</title>
    <?php $this->load->view('commons/maintemplate'); ?>   
          <script type="text/javascript">
               // To conform clear all data in cart.
               function clear_cart() {
                     var result = confirm('Are you sure want to clear all bookings?');
                     if (result) {
                         window.location = "<?php echo SITE_URL;?>cart/remove/all?alert=1";
                         } else {
                         return false; // cancel button
                     }
                }
          </script>
     <link type="text/css" href="<?php echo SITE_URL;?>assets/css/table.css" rel="stylesheet">       
 </head>
 <!-- Cart view section -->
 <body>
  <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>assets/img/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Cart Details</h2>
      
        
      </div>
     
   </div>
  </section>
 
 <section id="cart-view">
     <div class="container">
          <div class="row">
               <div class="col-md-12"><br>
               <?php
    if(isset($_REQUEST['flg']))
    {
      switch(@$_REQUEST['flg'])
      {
        
        case 2:
        echo '<div class="alert alert-success alert-white rounded">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <div class="icon"><i class="fa fa-check"></i></div>
                    <strong>Success!</strong> Item saved successfully!
                   </div>';
        break;           
        case 3:
        echo '<div class="alert alert-success alert-white rounded">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <div class="icon"><i class="fa fa-check"></i></div>
                    <strong>Success!</strong> Item updated successfully!
                   </div>';
        break;  
        case 4:
        echo '<div class="alert alert-success alert-white rounded">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <div class="icon"><i class="fa fa-check"></i></div>
                    <strong>'.$product_name.'</strong> reomoved successfully!
                   </div>';
        break;          
         
      }
    }  
    if($count>0)
    {  ?>

  
              <form method="post" action="<?php echo SITE_URL;?>place_order" >
                   <table class="table">              
                    <thead>
                        <tr>
                            <th><b>Serial No</b></th>
                            <th><b>Item Name</b></th>
                            <th><b>Description</b></th>
                            <th><b>Price</b></th>
                            <!--<th><b>Qty</b></th>-->
                            <th><b>Sub Total</b></th>
                            <th><b>Cancel Product</b></th>
                        </tr>
                     </thead><br>                    
                      <?php $i=1; ?>
                      <?php foreach($cart_details as $row): ?>
                    
                      <tr>
                         <td><?php echo $i++; ?></td>
                         <td><?php echo $row->product_name; ?></td>
                          <td><?php echo $row->description; ?></td>
                           <td><?php echo $row->discounted_price; ?></td>
                           <!-- <td><input type="number" maxlength="1" min="1" max="3" value="<?php echo $row->quantity; ?>" style="width:40px;" name="quantity">
                                <input type="submit" class="btn btn-link" type="submit" name="save_quantity" value=""> 
                                  
                            </td>-->
                             <td><?php 
                                  $price = $row->discounted_price; 
                                  $quantity =  $row->quantity;                           
                                $subtotal = $quantity*$price; 
                                  echo $subtotal; 
                                ?></td>
                            <td><a href="<?php echo SITE_URL;?>deleteItem?del=<?php echo $row->cart_id; ?>" onclick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger" role="button"><i class="fa fa-trash-o"></i></a></td>
                       </tr> 
                       <input type="hidden" name="cart_id" value="<?php echo $row->cart_id; ?>">
                    <input type="hidden" name="category_id" value="<?php echo $row->category_id; ?>">
                   <input type="hidden" name="discounted_price" value="<?php echo $row->discounted_price; ?>">
                   <input type="hidden" name="product_name" value="<?php echo $row->product_name; ?>">
                   <input type="hidden" name="description" value="<?php echo $row->description; ?>">
                   <input type="hidden" name="color_id" value="<?php echo $row->color_id; ?>">  
                   <input type="hidden" name="quantity" value="<?php echo $row->quantity; ?>">                                             
                       <?php endforeach; ?> 
                        <tr>
                         
                          <td colspan="10" align="right">
                             <!-- <a href="" onclick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger" role="button"><i class="fa fa-trash-o"></i>  Clear Cart</a> -->
                            <!-- <a href="<?php// echo SITE_URL;?>products" class="btn btn-primary" role="button">View More</a>-->
                            <input type="submit" class ='btn btn-success' name='place_order' value="Place Order">
                         <input type="button" class ='btn btn-warning' name='place_order' value="Buy More" onclick="window.location = 'sub_items?value=<?php echo $row->subcat_id; ?>'">
                                    
                          </td>
                        </tr>
                  </table>
                 </form> 
               </div>
            </div>
            <div class="row">
               
              
             
               <div class="col-md-4">
                 <?php
                 }
     else 
     {
      ?>   <br><br><?php 
       echo '<div class="alert alert-danger alert-white rounded">
                    
                    <div class="icon"><i class="fa fa-times-circle"></i></div>
                    <strong>Sorry!</strong>Currently no products are added to your cart.!
                    </div>'; ?>
      
        <div class="col-md-4">
                  <a href="<?php echo SITE_URL;?>products" class="btn btn-primary" role="button">View More</a><br><br><br><br><br>
               </div>
    <?php  } ?> 
    

               </div>
            </div>  <br> 
      </div>
</section>               

 <?php $this->load->view('commons/mainfooter'); ?>
 </body>