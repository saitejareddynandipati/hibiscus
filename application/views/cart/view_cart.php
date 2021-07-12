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
               <table class="table">
               <?php  /* All values of cart store in "$cart". */
                     if ($cart = $this->cart->contents()): ?>
                    <thead>
                        <tr>
                            <th><b>Serial Num</b></th>
                            <th><b>Item Name</b></th>
                            <th><b>Description</b></th>
                            <th><b>Price</b></th>
                            <th><b>Qty</b></th>
                            <th><b>Amount</b></th>
                            <th><b>Cancel Product</b></th>
                        </tr>
                     </thead><br> 
                    <?php // Create form and send all values to "updateCart" function. ?>
                   <form action="updateCart?alert=2" method="post">
                        <?php   $grand_total = 0;
                                $i = 1;
                            foreach ($cart as $item):
                            //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                            //  Will produce the following output.
                            // <input type="hidden" name="cart[1][id]" value="1" />
                            
                            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                            echo form_hidden('cart[' . $item['id'] . '][description]', $item['description']);
                            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']); ?>
                        
                            <tr>
                                <td>   <?php echo $i++; ?>                                    </td>                            
                                <td>   <?php echo $item['name']; ?>                           </td>  
                                <td>   <?php echo $item['description']; ?>                    </td>                     
                                <td> ₹ <?php echo number_format($item['price'], 2); ?>        </td> 
                                <td>   <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>   </td>
                                       <?php $grand_total = $grand_total + $item['subtotal']; ?>
                                <td> ₹ <?php echo number_format($item['subtotal'], 2) ?>      </td>                              
                                <td>   <a href="<?php echo SITE_URL;?>cart/remove/<?php echo $item['rowid']; ?>?alert=4" class="btn btn-warning" role="button">Cancel</a>   </td>
                            </tr>
                            <?php endforeach; ?>                           
                            <tr>
                                <td>    <b>Order Total: ₹<?php echo number_format($grand_total, 2); ?></b>    </td>
                                <td colspan="10" align="right">                                    
                                     <input type="button" class ='btn btn-info' value="Save Cart" onclick="save_cart()">
                                    <input type="submit" class ='btn btn-success' value="Update Qty">  
                                    <input type="button" class ='btn btn-danger' value="Clear Cart" onclick="clear_cart()"> 
                                    <input type="button" class ='btn btn-primary' value="Place Order" onclick="window.location = 'orderDetails?alert=5'">
                                </td>
                            </tr>
                        </form>    
                    <?php endif; ?>
                </table>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5">
                        <a href="<?php echo SITE_URL;?>products" class="btn btn-primary" role="button">View More</a>           
                    </div>
                    <div class="col-md-2"></div>
                </div>  
          </div>
      </div>
   </div>
</section>
<?php $this->load->view('commons/mainfooter'); ?>