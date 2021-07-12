
 <head>
    <title><?php $pageTitle ?></title>
    <?php 
      $this->load->view('commons/maintemplate'); 
    ?>
 </head>
 <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>assets/img/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Order Summary</h2>
      <ol class="breadcrumb">
            
          
          <li  class="active">Order Summary</li>                 
          
        </ol>
        
      </div>
     
   </div>
  </section>
  <div class="container">
      <div class="row">      
          <div class="col-md-12">
          <div class="col-sm-12 col-md-12"><br><br>
          <?php
  if(@$flg) {
    switch(@$flg) {
      case 1:
      echo '<div class="alert alert-success alert-white rounded">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                  <div class="icon"><i class="fa fa-check"></i></div>
                  <strong>Success!</strong> Your order Success.Please check your mail!
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
                                  <div class="col-md-10 col-sm-9">
                                    <h2>Order Summary</h2>
                                  </div>
                                  <div class="col-sm-2 col-md-2">
                                   <input type="button" class ='btn btn-warning'name='place_order' value="Buy More" onclick="window.location = '<?php echo SITE_URL;?>products'">
                                  </div> 
                                 
                                
                                </div>
           <br><br>
           <!-- Password Validation Checks -->
  
        <table class="table table-bordered table-striped table-hover"  >
                          <thead style="background-color:#BFC9C8;">
          
            <tr>
              <th>#</th>
              <th>Item</th>
              <th>Description</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php  $i=1;
            foreach($order_details as $orderSummary)
            { ?>                
                      <tr>
                         <td><?php echo $i++; ?></td>
                         <td><?php echo $orderSummary['product_name']; ?></td>
                          <td><?php echo $orderSummary['description']; ?></td>
                          <td><?php echo $orderSummary['quantity'] ?></td>
                           <td><?php echo $orderSummary['total_price']; ?></td>
                           
                       </tr>    <?php }
                       ?>                                          
                    
                                  
          </tbody>
        </table>
          </div>
        </div>
     </div>     
  <?php $this->load->view('commons/mainfooter'); ?>