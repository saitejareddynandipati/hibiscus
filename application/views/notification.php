<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once (__DIR__).'/../libraries/globalFunctions.php';
require_once (__DIR__).'/../libraries/curl-operations.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hibiscus | notifications</title>
    <?php
        $obj1 = new globalFunctions();

      $this->load->view('commons/maintemplate',$nestedView); 
    ?>
   
  </head>
  <body>  
   <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
   <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>assets/img/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Notifications</h2>
      <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL;?>addkurtis">Manage Products</a></li>    
          <li  class="active">Notifications</li>                 
          
        </ol>
        
      </div>
     
   </div>
  </section>
  <section id="cart-view" >
                     <div class="container" ><br>

   
        <?php
            if(isset($_REQUEST['succ']))
                {
                  switch(@$_REQUEST['succ'])
                   {
	                    case 1:
	                    echo '<div class="alert alert-success alert-white rounded">
	                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	                        <div class="icon"><i class="fa fa-check"></i></div>
	                        <strong>Success!</strong> Product has been added successfully!
	                        </div>';
	                    break;                         
                    }
                } 
            if(isset($_REQUEST['flg']))
                {
                   switch(@$_REQUEST['flg'])
                    {
                
                            case 1:
		                    echo '<div class="alert alert-danger alert-white rounded">
		                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		                    <div class="icon"><i class="fa fa-times-circle"></i></div>
		                    <strong>Error!</strong> Company With This Name Already existed / Please enter another Company Name.
		                    </div>';
		                    break;         
                    }            
                } ?>
                </div></section>
                <?php

                  if(isset($_REQUEST['value']))
                  {	
                    switch(@$_REQUEST['value'])
                    {                
                        
						  case 1:
						    ?>
						       <section id="cart-view" >
                     	<div class="container" >
                       		<div class="row">
                        		<div class="col-md-12">
                           			<div class="cart-view-area" >
                            		 	<div class="cart-view-table">
                             				<h3>Edit Product Details</h3>
								                       <hr>
								                        <div class="content">
								                            <form class="form-horizontal" role="" action="<?php echo SITE_URL;?>notification" parsley-validate novalidate method="post" enctype="multipart/form-data">
<input type="hidden" name="edit_id" value="<?php echo @$edit_id;?>">
<input type="hidden" name="req" value="<?php echo @$req;?>">
<div class="form-group">
<label class="col-sm-5 control-label">Category <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control" id="" readonly  name="category_name" value="<?php echo @$productTypeList->category_name;  ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Sub Category <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control" id="" readonly  name="subcategory_name" value="<?php echo @$productTypeList->subcategory_name;  ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Type <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control" id="" readonly  name="subcategory_name" value="<?php echo @$productTypeList->itemcat_name;  ?>" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-5 control-label"> Product Number <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control" id="" readonly  name="product_number" value="<?php echo @$productTypeList->product_number; ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label"> Product Name <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control" id=""   name="product_name" value="<?php echo @$productTypeList->product_name;  ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Description <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  class="form-control"  placeholder="Description" name="description" id="" value="<?php echo @$productTypeList->description;  ?>" required >
</div>
</div>

<div class="form-group">
<label class="col-sm-5 control-label">Actual Price <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  class="form-control"  placeholder="Price" name="actual_price" id="price" value="<?php echo @$productTypeList->actual_price;  ?>" required onkeypress="javascript:return isNumber(event)">
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">discount(%) <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30" class="form-control"  placeholder="discount" name="discount" id="discount" value="<?php echo @$productTypeList->discount;  ?>" required onkeypress="javascript:return isNumber(event)">
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">After Discounted Price <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control" id="actual_price" readonly placeholder="Price After Discount" name="price_after_discount" value="<?php echo @$productTypeList->price_after_discount; ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Min Quantity <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30" required class="form-control" id="location" placeholder="" name="min_quantity" value="<?php echo @$productTypeList->min_quantity;  ?>" onkeypress="javascript:return isNumber(event)">
</div>
</div>

<div class="form-group">
<label class="col-sm-5 control-label">Total Quantity <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30" required class="form-control" id="location" placeholder="quantity" name="quantity" value="<?php echo @$productTypeList->quantity;  ?>" onkeypress="javascript:return isNumber(event)" >
</div>
</div>

<div class="form-group " >
<label class="col-sm-5 control-label">Upload Image</label>
<div class="col-sm-3">
<input type="hidden" name="txt_image" id="txt_image" value="<?php echo @$productTypeList->image;  ?>">
<input type="file" class="form-control" name="image" id="image">
<label id="lblIMGFile"></label>
</div>
</div> 

<div class="form-group" >
<label class="col-sm-5 control-label"></label>
<div class="col-sm-3">

<img src="<?php echo SITE_URL.$obj1->_component_image_path().@$productTypeList->image;?>" alt="no" class="" width="100" height="100;">

</div>
</div>


<div class="form-group">
<div class="col-sm-offset-5 col-sm-5">
<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;&nbsp;&nbsp;
<a class="btn btn-danger" href="<?php echo SITE_URL;?>notification"><i class="fa fa-times"></i> Cancel</a>
</div>
</div>
</form>
								                        </div>
								              		</div>
								    			 </div>
								  			 </div>
								  		</div>
								  	</div>
								 </section>
							 
							<?php
						}            
					}     
				 ?>  
								      
			 		 
  				<section id="aa-blog-archive">
  				
				
 
                  			  <div class="container">
      				<div class="col-md-12">
			        	<div class="aa-blog-archive-area">
			            	<div class="row">
			              		<div class="col-md-12">
			              		 <div class="col-sm-12 col-md-12">
			                  		<a href="<?php echo SITE_URL;?>addkurtis" ><button  class="btn btn-info pull-right"  title=""><i class="fa fa-reply-all"></i>&nbsp;&nbsp;Back to Manage Products </button></a>
			                        </div>
			                        <div class="col-sm-12 col-md-12">
                                <br>
                                </div> 
			                       <div class="aa-blog-content">
			                			<div class="row">
			                    			<table class="table table-bordered table-striped table-hover">
					                      	    <thead style="background-color:#BFC9C8;">
					                        	    <tr>
					                        	       <th>S.NO</th>
						                                <th>Product Number</th>
						                                <th>Available Quantity </th>
						                                <th>Action</th>
						                                <th>Notifications</th>
					                              </tr>
					                          </thead>
					                            <tbody>
							                        <?php
							                        	if($notifications_count>0)
														{
															$inc=$start+1;
							                         
							                          foreach($notifications_data as $list)
							                            { ?>
							                              <tr>
							                              	  <?php echo "<td>" .$inc++."</td>"; ?>

							                                 <?php echo "<td>" .$list->product_number."</td>"; ?>
							                                 
							                                 <?php echo "<td>" .$list->quantity."</td>"; ?>
							                                <td>
							                                <a href="<?php echo SITE_URL;?>notification?value=1&val=<?php echo $list->itemdetails_id;?>" ><button  class="btn btn-default"  title=""><i class="fa fa-pencil"></i> Edit </button></a>
							                                  </td>
							                                  <td>
							                                  <?php if($list->status_id==1)
											                            	{ ?>
											                            		<a  style="padding:3px 3px;" href="notification?del=<?php echo $list->itemdetails_id?>"  onclick="return confirm('Are you sure  want to Stop Notification from This Product ?')"><button  class="btn btn-warning"  title="To Stop Notifications Inactivate It"><i class="fa fa-thumbs-o-down"></i> &nbsp;Stop </button></a>

											                          		<?php }
											                          		else if($list->status_id==2)
											                          		{ 
											                          			?>
											                            		<a style="padding:3px 3px;" href="notification?activate=<?php echo $list->itemdetails_id ?>"  onclick="return confirm('Are you sure  want to Get Notification from this product  ?')"><button  class="btn btn-success"  title="To Get Notifications Activate It"><i class="fa fa-thumbs-o-up"></i> &nbsp;Get </button></a>
											                				<?php   } ?>
							                             	</td>
							                              </tr>
							                              <?php
							                              }
							                          }
							                          else
														{
														?>
															<tr><td colspan="6" align="center"> No Records Found</td></tr>
														<?php
														}
							                          ?>
					                      		</tbody>
					                   		</table>       
			                  			</div>
			                		</div>
			              		</div>
			            	</div>
			          	</div>
			        	  	<?php $ob1 = new globalFunctions();
							$ob1->draw_pagination($start,$notifications_count,$page,$len);?>
			       </div>
			    </div>
			
			</section>
	

			
   <?php
      $this->load->view('commons/mainfooter'); 
 	?>
  </body>
</html>