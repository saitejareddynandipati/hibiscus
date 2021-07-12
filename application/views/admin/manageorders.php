<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hibiscus | Manage Orders</title>
    <?php
            $obj1 = new globalFunctions();

      $this->load->view('commons/maintemplate'); 
    ?>
  </head>
  <body>  
   <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
   <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>uploads/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Manage Orders</h2>
      <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL;?>admin">Home</a></li>    
          <li  class="active">Manage Orders</li>                 
          
        </ol>
        
      </div>
     
   </div>
  </section>
   <!-- wpf loader Two -->
    <!-- <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>  -->
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
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
                        <strong>Success!</strong>Subcategory has been added successfully!
                        </div>';
                    break;   
                    case 2:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong>Subcategory has been Updated successfully!
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
                    <strong>Error!</strong>Subcategory With This Name Already existed / Please enter another Subcategory Name.
                    </div>';
                    break;         
                    }            
                  } ?>
                  </div>
                  </section>
                  <?php

                  if(isset($_REQUEST['value']))
                  {
                    switch(@$_REQUEST['value'])
                    {  
                    case 1: 
                    ?>             
                            
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
                                                    <div class="simpleLens-big-image-container"><a data-lens-image="<?php echo SITE_URL;?>uploads/<?php echo @$orderdetails->image; ?>" class="simpleLens-lens-image"><img src="<?php echo SITE_URL;?>uploads/<?php echo $orderdetails->image; ?>" class="simpleLens-big-image"></a></div>
                                                  </div>                     
                                                </div>
                                              </div>
                                            </div>
                                            <!-- Modal view content -->
                                          
                                            <div class="col-md-7 col-sm-7 col-xs-12">
                                              <div class="aa-product-view-content">
                                            
                                              
                                                        

                                                <h3><?php echo "Product Number :" . $orderdetails->product_number; ?></h3>
                                                <h3><?php echo "quantity :" . $orderdetails->quantity; ?></h3>

                                                <div class="aa-price-block">
                                                  <span class="aa-product-view-price">₹ <?php echo $orderdetails->price; ?></span>
                                                </div>
                                                <h3>Address</h3>
                                                <p><?php echo $orderdetails->phone; ?></p>

                                                <p><?php echo $orderdetails->address; ?></p>

                                                <p> <?php echo "Landmark: " ,  $orderdetails->landmark;  ?></p>
                                                  <p> <?php echo "State: " ,$orderdetails->state;  ?></p>
                                                  <p> <?php echo "Country: " ,$orderdetails->country;  ?></p>

                                                  <?php 
                                                  if(isset($_REQUEST['status_id']))
                                                  {

                                                      if($_REQUEST['status_id']==6)
                                                      { ?>

                                                      <a href="manageorders?delivery=<?php echo $order_id?>"  onclick="return confirm('Is this product Delivered ?')"><button  class="btn btn-warning"  title="Click here if delivery process is completed"><i class="fa fa-thumbs-o-down"></i> &nbsp;Delivery </button></a>

                                                      <?php }
                                                      else if($_REQUEST['status_id']==5)
                                                      { 
                                                      ?>
                                                      <button  class="btn btn-success"  title="Delivery Completed "><i class="fa fa-thumbs-o-up"></i> &nbsp;Delivered </button>
                                                      <?php 
                                                        }
                                                     }   
                                                         ?>
                                                
                                              
                                               
                                                 
                                              </div>
                                            </div>
                                          </div>
                                        </div>           
                                      </div>
                                    </div>
                                  </div>
                                </div>
  </section>
                   
 <?php 

                     break;

                   
                                         
                    }            
                  }     
                  ?>  
      
    
  <section id="aa-blog-archive">
  <div class="content">
                
    <div class="container">
      
        <div class="col-md-12" >
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-12" >
              
                            

                 <form action="<?php echo SITE_URL;?>manageorders" method="post" >
<div class="col-sm-12 col-md-12">
<div class="col-md-12 col-sm-12">
<br>




<div class="form-horizontal">
<label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b> Order Number </b></label>  
<div class="col-sm-3 col-md-3">
<input type="text" maxlength="30" name="order_number" value="<?php echo @$order_number;?>" id="" class="form-control" placeholder="Order Number" >
</div>


<label  class="col-sm-3 col-md-2 control-label" for="form-field-1"><b> Status </b></label>                                             
<div class="col-sm-3 col-md-3">
<select   class="form-control" name="status_id" id="">
<option value="">Select Status </option>
<?php
foreach(@$statuss as $status)
{
$selected = ($status['status_id']==$status_id)?'selected="selected"':'';
echo '<option value="'.@$status['status_id'].'"  '.$selected.'>'.@$status['status'].'</option>';
}
?>
</select>
</div><br>  <br>
</div>
<div class="form-horizontal">
<label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b> Customer Name </b></label>  
<div class="col-sm-3 col-md-3">
<input type="text" maxlength="30" name="customer_name" value="<?php echo @$customer_name;?>" id="" class="form-control" placeholder="customer Name" >
</div>


<label  class="col-sm-3 col-md-2 control-label" for="form-field-1"><b> Phone Number </b></label>                                             
<div class="col-sm-3 col-md-3">
<input type="text" maxlength="30" name="phone_number" value="<?php echo @$phone_number;?>" id="" class="form-control" placeholder="Phone Number" >
</div><br> <br> 
</div>

<div class="form-horizontal">
<label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>From Date</b></label>  
<div class="col-sm-3 col-md-3">
<input type="text" maxlength="30" name="ordered_date" value="<?php echo @$ordered_date;?>" id="ordered_date" class="form-control" placeholder="From Date" >
</div>


<label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>To Date</b></label>  
<div class="col-sm-3 col-md-3">
<input type="text" maxlength="30" name="ordered_date2" value="<?php echo @$ordered_date2;?>" id="ordered_date2" class="form-control" placeholder="To Date " >
</div><br> <br> 
</div>





</div> 
<div class="col-sm-12 col-md-12"> <br>
<div class="col-sm-9 col-md-9"></div>
 <div class="col-sm-3 col-md-3">
<div class="col-sm-9 col-md-5">
<button type="submit" name="searchOrder" value="search" class="btn btn-success"><i class="fa fa-search">&nbsp;</i>Search</button>
</div>
<div class="col-sm-1 col-md-2">
<a href="<?php echo SITE_URL;?>manageorders?reset=1" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</a>
</div>

</div>
<div class="col-sm-2" align="right">
                    <a class="btn btn-success" href="<?php echo $download_path; ?>"><i class="fa fa-cloud-download"></i> Download</a>
 </div>
</div>


</div>
</form>
<div class="col-sm-12 col-md-12">
<br>
</div>

<div class="col-sm-12 col-md-12">
<div class="col-md-10 col-sm-8">
<h2>Orders List</h2>
</div>
 
</div>

                <div class="aa-blog-content">
                  <div class="table-responsive" >
                    <table class="table table-bordered hover table-striped table-hover"  >
                          <thead style="background-color:#BFC9C8;">
                              <tr>
                              <th>S.NO</th>
                                <th>Order Number</th>
                                <th>Customer Name</th>


                                <th>Phone Number</th>
                                <th>Ordered Date</th>
                                <th>Status </th>


                                
                                
                                
                                <th>Action</th>
                              </tr>
                          </thead>
                            <tbody>
                            <?php
                        if(@$count>0)
                        { 
                          $inc=$start+1;

                          foreach(@$search_orders as $list)
                            { ?>
                              <tr>
                                 <?php echo "<td>" .@$inc++."</td>"; ?>

                                 <?php echo "<td>" .@$list->order_number."</td>"; ?>
                                <?php echo "<td>" .$list->user_name . "</td>"; ?>

                                  <?php echo "<td>" .$list->phone . "</td>"; ?>
                                  <?php echo "<td>" .$list->ordered_date. "</td>"; ?>



                                       <?php echo "<td>" .$list->status_name . "</td>"; ?>


<td>
                                      
 <?php if($list->status_id==6)
{ ?>

<a href="manageorders?delivery=<?php echo $list->order_id?>"  onclick="return confirm('Is this product Delivered ?')"><button  class="btn btn-warning"  title="Click here if delivery process is completed"><i class="fa fa-thumbs-o-down"></i> &nbsp;Delivery </button></a>

<!--<a class="btn btn-danger" title="Stop Notifications" style="padding:3px 3px;" href="addkurtis?del=<?php echo $list->itemdetails_id?>"  onclick="return confirm('Are you sure you want to Close?')"><i class="fa fa-times"></i>Stop</a>
--><?php }
else if($list->status_id==5)
{ 
?>
<button  class="btn btn-success"  title="Delivery Completed "><i class="fa fa-thumbs-o-up"></i> &nbsp;Delivered </button>
<!--<a class="btn btn-info " title="Continue Notifications" style="padding:3px 3px;" href="addkurtis?activate=<?php echo $list->itemdetails_id ?>"  onclick="return confirm('Are you sure you want to Open?')"><i class="glyphicon glyphicon-folder-open"></i>  Continue</a>
--><?php   } ?>
<a class="btn btn-default " title="Click to View Order"  href="<?php echo SITE_URL;?>manageorders?value=1&val=<?php echo $list->user_id;?>&status_id=<?php echo $list->status_id;?>&order_id=<?php echo $list->order_id;?>"><i class="fa fa-pencil">&nbsp;</i>View Order</a>
                                       
                                  </td>

                              </tr>
                              <?php
                              }
                              }
                              else
                          {  ?>
                        
                            <tr><td colspan="6" align="center"> No Records Found</td></tr>
                          <?php
                           } 
                          ?>
                        </tbody>
                    </table>       
                  </div>
                  <?php $ob1 = new globalFunctions();
                  $ob1->draw_pagination(@$start,@$count,@$page,@$len);?> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Blog Archive -->
   <?php 
      $this->load->view('commons/mainfooter'); 
 ?>
  </body>
</html>