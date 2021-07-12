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
      
        
      </div>
     
   </div>
  </section>
	
 	<div class="container">
 	 <div class="row">
      		<div class="col-md-12">
      		 <div class="col-sm-12 col-md-12"><br><br>
                                  <div class="col-md-10 col-sm-9">
                                    <h2>Order Summary</h2>
                                  </div>
                                  <div class="col-sm-2 col-md-2">
                                   <input type="button" class ='btn btn-warning'name='place_order' value="Buy More" onclick="window.location = '<?php echo SITE_URL;?>products'">
                                  </div> 
                                 
                                
                                </div>
      		<form method="post" action="<?php echo SITE_URL;?>update_quantity">
				 <table class="table table-bordered table-striped table-hover"  >
                          <thead style="background-color:#BFC9C8;">
				    <tr>
				      <th>#</th>
				      <th>Item</th>
				      <th>Description</th>
				      <th>Price</th>
				      <th>Qty</th>
				      <th>subtotal</th>
				     <th>cancel</th>
				    </tr>
				  </thead>
				  <tbody>
                   
				    <?php 
				     $i=1;
				    foreach($products as $product)
				    {

				     ?>
                                         
                      <tr>
                         <td><?php echo $i++; ?></td>
                         <td><?php echo $product['product_name']; ?></td>
                          <td><?php echo $product['description']; ?></td>
                          <td><?php echo $product['discounted_price']; ?></td>
                           <td>
                         <input type="number"  maxlength="1" min="1" max=<?php echo $product['item_quantity'];?> class="quantity" data-item-id="<?php echo $product['cart_id'];?>" value="<?php echo $product['quantity']; ?>" style="width:40px;" name="quantity" data-max-qty="<?php echo $product['item_quantity'];?>">
                          </td>
                          <td>
                          <?php 
                                  $price =$product['discounted_price']; 
                                  $quantity =  $product['quantity'];                           
                                $subtotal = $quantity*$price;?>
                                 <span id="subtotal<?php echo $product['cart_id'];?>"><?php echo $subtotal;?> </span>
                                 <span id="wronginput"></span>
                                  </td> 

                            <td><a href="<?php echo SITE_URL;?>deleteItem?del=<?php echo $product['cart_id']; ?>" onclick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger" role="button"><i class="fa fa-trash-o"></i></a></td>
                       </tr> 
                  
                    <input type="hidden" name="category_id[]" value="<?php echo $product['category_id']; ?>">
                    <input type="hidden" name="cart_id[]" value="<?php echo $product['cart_id']; ?>">
                       <input type="hidden" name="subcat_id[]" value="<?php echo $product['subcat_id']; ?>">
                       <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">

                   <input type="hidden" name="discounted_price[]" id="discounted_price<?php echo $product['cart_id'];?>" value="<?php echo $product['discounted_price']; ?>">
                    <input type="hidden" name="item_id[]"   id="item_id<?php echo $product['cart_id'];?>" value="<?php echo $product['item_id']; ?>">
                   <input type="hidden" name="item_quantity[]" id="item_quantity" value="<?php echo $product['item_quantity']; ?>">
                   <input type="hidden" name="itemcat_name[]" value="<?php echo $product['itemcat_name']; ?>">
                   <input type="hidden" name="description[]" value="<?php echo $product['description']; ?>">
                   <input type="hidden" name="color_id[]" value="<?php echo $product['color_id']; ?>">
                    <input type="hidden" name="item_name[]" value="<?php echo $product['product_name']; ?>">
                     <input type="hidden" name="status[]" value="<?php echo $product['status']; ?>">
                     
                         <?php }    
                        ?>

                       
                        
                      <!--  <form method="post"  action="<?php echo SITE_URL;?>submitAddress?alert=3">
                         <input type="hidden" name="its" value="<?php echo $i; ?>">  -->
                        
                 
                        

                                                     
                     
                        		
                       
                       	    </form>
				  </tbody>

				</table>
				
				   
      		</div>
      	</div>
 	
 	      
      <div class="row">
      		<div class="col-md-3"></div>	
 			<div class="col-md-6">
                <div class="aa-myaccount-register"> 
                <br>                
                 <h3 align="center" style="color:blue"><u>Delivery Address</u></h3><br>
                
                 <form method="POST" action="submitAddress?alert=3">
				  <div class="form-group row">
				    <label for="inputEmail3" class="col-sm-2 form-control-label">Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="name" value="<?php echo @$addresss->name;?>"id="" placeholder="" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 form-control-label">Pincode</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="pincode"  value="<?php echo @$addresss->zip_code;?>" id=""  placeholder="" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 form-control-label">Address</label>
				    <div class="col-sm-10">
				       <textarea class="form-control" name="address" id="exampleTextarea"   rows="3" required><?php echo @$addresss->address;?></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 form-control-label">Landmark</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="landmark"  value="<?php echo @$addresss->landmark;?>"  id="inputPassword3" placeholder="Optional">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 form-control-label">City</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="city"  value="<?php echo @$addresss->city;?>" id="inputPassword3" >
				    </div>
				  </div>
				   <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 form-control-label">state</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="state"  value="<?php echo @$addresss->state;?>" id="inputPassword3" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 form-control-label" >Country</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="country"  value="<?php echo @$addresss->country;?>" id="inputPassword3" placeholder="" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword3" class="col-sm-2 form-control-label">Phone No</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="phone_no"  value="<?php echo @$addresss->phone;?>" id="inputPassword3" maxlength="12" minlength="10"  placeholder="" required>
				    </div>
				  </div>
				   <?php $i=1;
				    foreach($products as $product)
				    { $i++;
				    	?>
				   <input type="hidden" name="item_id[]" value="<?php echo $product['item_id']; ?>">
                    <input type="hidden" name="category_id[]" value="<?php echo $product['category_id']; ?>">
                    <input type="hidden" name="cart_id[]" value="<?php echo $product['cart_id']; ?>">
                       <input type="hidden" name="subcat_id[]" value="<?php echo $product['subcat_id']; ?>">
                         <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">
                          <input type="hidden" name="item_quantity[]" value="<?php echo $product['item_quantity']; ?>">
                   <input type="hidden" name="discounted_price[]" value="<?php echo $product['discounted_price']; ?>">
                   <input type="hidden" name="itemcat_name[]" value="<?php echo $product['itemcat_name']; ?>">
                   <input type="hidden" name="description[]" value="<?php echo $product['description']; ?>">
                   <input type="hidden" name="color_id[]" value="<?php echo $product['color_id']; ?>">
                    <input type="hidden" name="item_name[]" value="<?php echo $product['product_name']; ?>">
                     <input type="hidden" name="status[]" value="<?php echo $product['status']; ?>">
				 
                   <?php
                   }?>
                  <input type="hidden" name="its" value="<?php echo $i;?>">


				
				 
				  <div class="form-group row">
				    <div class="col-sm-offset-2 col-sm-10">
				      	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						&nbsp; &nbsp; &nbsp; &nbsp;
				      <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;Submit</button>
				    </div>
  </div>
</form>
                </div>
              </div>
        </div>
    </div>  
<?php $this->load->view('commons/mainfooter'); ?>
<script>
     $(document).ready(function(){  
    $('.quantity').change(function(){    
      var quantity = parseInt($(this).val());
      var item_id=$(this).data('item-id');
      var maxqty = $(this).data('max-qty');
      if(quantity>maxqty)
      {
        
        $(this).val(maxqty);
        alert('Available quantity is'+maxqty);
        quantity = maxqty;
      }
      var discounted_price=parseInt($('#discounted_price'+item_id).val());
        $('#subtotal'+item_id).text(quantity*discounted_price);
        $.ajax({
          url:'update_quantity',
          method:"POST",
          type: 'html',
          data:{quantity:quantity,item_id:item_id,discounted_price:discounted_price}
          
        });
    });
    });    
</script>