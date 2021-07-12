 <head>
    <title><?php $pageTitle ?></title>
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
                    <strong>'.$name.'</strong> reomoved successfully!
                   </div>';
        break;          
         
      }
    }?>
             
                   <table class="table">              
                    <thead>
                        <tr>
                            <th><b>Serial No</b></th>
                            <th><b>Item Name</b></th>
                            <th><b>Description</b></th>
                            <th><b>Price</b></th>
                            <th><b>Qty</b></th>
                            <th><b>Amount</b></th>
                           
                        </tr>
                     </thead><br>                    
                      <?php $i=1; ?>
                      <?php foreach($customerSaveCartDetails as $row): ?>
                    
                      <tr>
                         <td><?php echo $i++; ?></td>
                         <td><?php echo $row->cat_name; ?></td>
                          <td><?php echo $row->description; ?></td>
                           <td><?php echo $row->product_price; ?></td>
                            <td> <div class="col-xs-5"><input type="text" class="form-control"><button type="button" class="btn btn-link">update</button></div></td>
                            <td><?php echo $row->product_price; ?></td>
                       </tr>                                              
                       <?php endforeach; ?> 
                        <tr>
                          <td>    <b></b>    </td>
                          <td colspan="10" align="right">
                             <!-- <a href="" onclick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger" role="button"><i class="fa fa-trash-o"></i>  Clear Cart</a> -->

                            <input type="button" class ='btn btn-success'name='place_order' value="Continue" onclick="window.location = '<?php echo SITE_URL;?>placeOrder'">
                        
                                    
                          </td>
                        </tr>
                  </table>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                 
               </div>
               <div class="col-md-4">
                  <a href="<?php echo SITE_URL;?>products" class="btn btn-primary" role="button">View More</a>
               </div>
               <div class="col-md-4">
                 
               </div>
            </div>  <br> 
      </div>
</section>               
</body>
 <?php $this->load->view('commons/mainfooter'); ?>
 