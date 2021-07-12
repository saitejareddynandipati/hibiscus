<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once (__DIR__).'/../libraries/globalFunctions.php';
require_once (__DIR__).'/../libraries/curl-operations.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hibiscus | Manage Products</title>
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
<h2>Manage Products</h2>
<ol class="breadcrumb">
<li><a href="<?php echo SITE_URL;?>admin">Home</a></li>   

<li  class="active">Manage Product</li>                 

</ol>

</div>

</div>
</section>


<?php
if($notifications_count=='')
{
$notifications_count=0;
}


?>

<?php
if(isset($_REQUEST['succ']))
{
switch(@$_REQUEST['succ'])
{
case 1:
echo '<div class="alert alert-success alert-white rounded">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<div class="icon"><i class="fa fa-check"></i></div>
<strong>Success!</strong> Product  has been added successfully!
</div>';
break; 
case 2:
echo '<div class="alert alert-success alert-white rounded">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<div class="icon"><i class="fa fa-check"></i></div>
<strong>Success!</strong> Product  has been Updated successfully!
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
<strong>Error!</strong> product With This Name Already existed / Please enter another Company Name.
</div>';
break;  

}            
} 

if(isset($_REQUEST['value']))
{	
switch(@$_REQUEST['value'])
{                
case 1:


$accDivCls  = '';
$sizeCls='hidden';
?>
<section id="cart-view" >
<div class="container" >
<div class="row">
<div class="col-md-12">
<div class="cart-view-area" >
<div class="cart-view-table">
<h3>Add New Product Details</h3>
<hr>

<div class="content">
<form class="form-horizontal"  action="<?php echo SITE_URL;?>submitaddkurtis" autofill="on"   parsley-validate novalidate method="post" enctype="multipart/form-data"   >

<div class="form-group">
<label class="col-sm-5 control-label">Product Number <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control"  placeholder="Product Number" name="product_number" id="product_number"  value="" >
    <span id="product_no" class="text-danger"> </span>

</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Product Name <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control"  placeholder="Product Name" name="product_name" id=""  value="" >

</div>
</div>
<div class="form-group">
<label  class="col-sm-5 control-label" for="form-field-1">Category </label>                                             
<div class="col-sm-3">
<select   class="form-control" name="category" id="addp_category_id" required>
<option value="">Select category</option>
<?php
foreach($category as $category)
{

echo '<option value="'.$category['category_id'].'" >'.$category['category_name'].'</option>';
}
?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-5 control-label" for="form-field-1">Subcategory </label>                                             
<div class="col-sm-3">
<select   class="form-control" name="sub_category" id="addp_subcategory_id" required>
<option value="">Select Subcategory</option>
<?php
if(@$category_name!='')
{
$data='';
foreach($type_name as $type)
{

echo '<option value="'.$type['subcat_id'].'" >'.$type['subcat_name'].'</option>';
}
echo $data;
}  
?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-5 control-label" for="form-field-1">Material/Metal Type </label>                                             
<div class="col-sm-3">
<select   class="form-control" name="type" id="addp_itemcategory_id" >
<option value=""> Material/Metal Type</option>
<?php
if(@$category_name!='')
{
$data='';
foreach($type_name as $type)
{

echo '<option value="'.$type['item_category_id'].'" >'.$type['item_category_name'].'</option>';
}
echo $data;
}  
?>
</select>
</div>
</div>
<div class="form-group">
<label  class="col-sm-5 control-label" for="form-field-1">Color </label>                                             
<div class="col-sm-3">
<select   class="form-control" name="color_name" id="company_name" required>
<option value="">Select color </option>
<?php
foreach($colors as $color)
{

echo '<option value="'.$color['color_id'].'" >'.$color['color'].'</option>';
}
?>
</select>
</div>
</div>
<div id="divAcc" class="spCls <?php echo $accDivCls;?>">
<input type="hidden" name="sp_dim" value="<?php echo @$componentCount[0]->sp_dim?>" id="sp_dim">
<div class="form-group">
<label  class="col-sm-5 control-label" for="form-field-1">Size <span class="symbol required"></span></label>                                             
<div class="col-sm-3">
<select   class="form-control" name="size_name" id="size_id" >
<option value="">Select Size</option>
<?php
foreach($sizes as $size)
{

echo '<option value="'.$size['size_id'].'" >'.$size['size'].'</option>';
}
?>
</select>
</div>
</div>
</div>


<div id="sizeDiv" class="spCls <?php echo $sizeCls;?>">
<div class="form-group" >
<label class="col-sm-5 control-label"></label>
<div class="col-sm-3">

<img src="<?php echo SITE_URL;?>uploads/sizechart.png" alt="no" class="" width="300" height="200;">

</div>
</div>

</div>



<div class="form-group">
<label class="col-sm-5 control-label">Actual Price <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30"  required class="form-control"  placeholder="Price" name="actual_price" id="price"  value="" onkeypress="javascript:return isNumber(event)">
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Discount(%) <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30" class="form-control"  placeholder="discount" name="discount" id="discount"  onkeypress="javascript:return isNumber(event)">
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label"> Discounted Price <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30" required class="form-control" id="actual_price" readonly placeholder="Actual Price" name="price_after_discount" value="" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Description <span class="req-fld">*</span></label>
<div class="col-sm-3">
<textarea class="form-control"  placeholder="description" name="description"  required></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Min Quantity <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30" required class="form-control" id="min_quantity" placeholder="Min Quantity" name="min_quantity" value="" required onkeypress="javascript:return isNumber(event)">
</div>
</div>
<div class="form-group">
<label class="col-sm-5 control-label">Total Quantity <span class="req-fld">*</span></label>
<div class="col-sm-3">
<input type="text" maxlength="30" class="form-control"  placeholder="quantity" name="quantity"  required onkeypress="javascript:return isNumber(event)">
</div>
</div>
<div class="form-group" id="uploadImage">
<label class="col-sm-5 control-label">Upload Image</label>
<div class="col-sm-3">
<input type="hidden" name="txt_image" id="txt_image" value="">
<input type="file" class="form-control" name="image" id="image" required>
<label id="lblIMGFile"></label>
</div>
</div>                                    

<div class="form-group">
<div class="col-sm-offset-5 col-sm-5">
<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;&nbsp;&nbsp;
<a class="btn btn-danger" href="<?php echo SITE_URL;?>addkurtis"><i class="fa fa-times"></i> Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php
break;


case 3:
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
<form class="form-horizontal" role="" action="<?php echo SITE_URL;?>addkurtis" parsley-validate novalidate method="post" enctype="multipart/form-data">
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
<a class="btn btn-danger" href="<?php echo SITE_URL;?>addkurtis"><i class="fa fa-times"></i> Cancel</a>
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
<div class="content">

<div class="container">

<div class="col-md-12" >
<div class="aa-blog-archive-area">
<div class="row">
<div class="col-md-12" >


<a href="<?php echo SITE_URL;?>notification" ><button  class="pull-right"> <i class="fa fa-bell" aria-hidden="true"></i> Notifications(<?php echo $notifications_count; ?>)</button></a></div></div>
<form action="<?php echo SITE_URL;?>addkurtis" method="post" >
<div class="col-sm-12 col-md-12">
<div class="col-md-12 col-sm-12">
<br>



<div class="form-horizontal">
<label  class="col-sm-2 col-md-2 control-label" for="form-field-1"><b> Category </b> </label>                                             
<div class="col-sm-4 col-md-3">
<select   class="form-control" name="category_name" id="category_id">
<option value="">Select Category </option>
<?php
foreach(@$categories as $category)
{
$selected = ($category['category_id']==$category_id)?'selected="selected"':'';
echo '<option value="'.@$category['category_id'].'" '.$selected.' >'.@$category['category_name'].'</option>';
}
?>
</select>
</div>                          
<label  class="col-sm-2 col-md-2 control-label" for="form-field-1"><b> Subcategory </b> </label>                                             
<div class="col-sm-4 col-md-3">
<select   class="form-control" name="subcategory_name" id="subcategory_id">
<option value="">Select Sub Category </option>


<?php
if(@$category_id!='')
{
$data='';
if($subcategoryCountSearch>0){
foreach($fillsubcategory as $row1)					
{
if($subcategory_id==$row1->subcat_id)
{
$data.='<option value="'.$row1->subcat_id.'" selected="selected">'.$row1->subcat_name.'</option>';
}
else
{
$data.='<option value="'.$row1->subcat_id.'">'.$row1->subcat_name.'</option>';
}
}
} 
else 
{
$data.='<option value="">No subcategory Types</option>';
}
echo $data;
}
?>
</select>
</div>
</div><br><br>
<div class="form-horizontal">
<label class="col-sm-2 col-md-2 control-label" for="form-field-1"><b> ProductNo. </b></label>  
<div class="col-sm-4 col-md-3">
<input type="text" maxlength="30" name="product_number" value="<?php echo @$product_number;?>" id="product_number" class="form-control" placeholder=" Product Number">
</div>                           
<label  class="col-sm-2 col-md-2 control-label" for="form-field-1"><b> Color </b> </label>                                             
<div class="col-sm-4 col-md-3">
<select   class="form-control" name="color_name" id="">
<option value="">Select color </option>
<?php
foreach(@$colors as $colorr)
{
$selected = ($colorr['color_id']==$color)?'selected="selected"':'';
echo '<option value="'.@$colorr['color_id'].'" '.$selected.' >'.@$colorr['color'].'</option>';
}
?>
</select>
</div>
</div> <br> <br>

<div class="form-horizontal">
<label class="col-sm-2 col-md-2 control-label" for="form-field-1"><b>Description </b></label>  
<div class="col-sm-4 col-md-3">
<input type="text" maxlength="30" name="description" value="<?php echo @$description;?>" id="" class="form-control" placeholder="Description" >
</div>


<label  class="col-sm-2 col-md-2 control-label" for="form-field-1"><b> Size </b></label>                                             
<div class="col-sm-4 col-md-3">
<select   class="form-control" name="size_name" id="">
<option value="">Select Size </option>
<?php
foreach(@$sizes as $sizee)
{
$selected = ($sizee['size_id']==$size)?'selected="selected"':'';
echo '<option value="'.@$sizee['size_id'].'"  '.$selected.'>'.@$sizee['size'].'</option>';
}
?>
</select>
</div>  
</div><br><br>



<div class="form-horizontal">
<label class="col-sm-2 col-md-2 control-label" for="form-field-1"><b> Discount </b></label>  
<div class="col-sm-4 col-md-3">
<input type="text" maxlength="30" name="discount" value="<?php echo @$discount;?>" id="empiD" class="form-control" placeholder="Discount" onkeypress="javascript:return isNumber(event)">
</div>


<label  class="col-sm-2 col-md-2 control-label" for="form-field-1"><b> Status </b></label>                                             
<div class="col-sm-4 col-md-3">
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
</div> 
</div><br> <br>










<div class="col-sm-12 col-md-12"><br>
<div class="col-sm-9 col-md-9"></div>
 <div class="col-sm-3 col-md-3">
<div class="col-sm-9 col-md-5">
<button type="submit" name="searchProduct" value="search" class="btn btn-success"><i class="fa fa-search">&nbsp;</i>Search</button>
</div>
<div class="col-sm-1 col-md-2">
<a href="<?php echo SITE_URL;?>addkurtis?reset=1" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</a>
</div>
</div>
</div>



</div>


</div>
</form>
<div class="col-sm-12 col-md-12">
<br>
</div>

<div class="col-sm-12 col-md-12">
<div class="col-md-10 col-sm-9">
<h2>Product List</h2>
</div>
<div class="col-sm-2 col-md-2">
<a href="<?php echo SITE_URL;?>addkurtis?value=1" ><button  class="btn btn-primary"  title="Add New Product"> <i class="fa fa-plus">&nbsp;</i> Add New</button></a>
</div> 
</div>



<div class="row">


<table class="table table-bordered table-striped table-hover">
<thead style="background-color:#BFC9C8;">
<tr>
<th>S.NO</th>

<th>Product Number</th>
<th>Image</th>
<th>Description</th>
<th>Color</th>
<th>Size</th>


<th>Actual Price/item</th>
<th>Discount/item(%)</th>
<th>Discounted Price/item</th>

<th>Total Quantity </th>
<th>Status</th>
<th>Action</th>
<th>Notifications</th>
</tr>
</thead>
<tbody>
<?php
$inc=$start+1;
if($count>0)
{
	

foreach($search_products as $list)
{ ?>
<tr>
<?php echo "<td>" .$inc++."</td>"; ?>

<?php echo "<td>" .$list->product_number."</td>"; ?>
<?php
if(@$list->image!='')
{
$path = $obj1->_component_image_path().@$list->image;

$img = '<div class="img">
<img src="'.$path.'" style="max-width:60px;max-height:60px;">
<div class="over">
<div class="func">
<a href="'.$path.'" class="image-zoom">
<i class="fa fa-search"></i></a>
</div>
</div>
</div>';
}
else @$img = '';
echo '<td class="item">'.$img.'</td>';
?>
<?php echo "<td>" .$list->description . "</td>"; ?>  

<?php echo "<td>" .$list->color_name . "</td>"; ?>  
<?php echo "<td>" .$list->size_name."</td>"; ?>
<?php echo "<td>" .$list->price."</td>"; ?>

<?php echo "<td>" .$list->discount . "</td>"; ?>
<?php echo "<td>" .$list->price_after_discount . "</td>"; ?>


<?php echo "<td>" .$list->quantity."</td>"; ?>
<?php echo "<td>" .$list->status_name . "</td>"; ?>

<td>
<a href="<?php echo SITE_URL;?>addkurtis?value=3&val=<?php echo $list->itemdetails_id;?>" ><button  class="btn btn-default"  title="Edit Product Details"><i class="fa fa-pencil"></i> Edit </button></a>

</td>
<td>
<?php if($list->status_id==1)
{ ?>

<a href="addkurtis?del=<?php echo $list->itemdetails_id?>"  onclick="return confirm('Are you sure  want to Stop Notification from This Product ?')"><button  class="btn btn-warning"  title="To Stop Notifications Inactivate It"><i class="fa fa-thumbs-o-down"></i> &nbsp;Stop </button></a>

<!--<a class="btn btn-danger" title="Stop Notifications" style="padding:3px 3px;" href="addkurtis?del=<?php echo $list->itemdetails_id?>"  onclick="return confirm('Are you sure you want to Close?')"><i class="fa fa-times"></i>Stop</a>
--><?php }
else if($list->status_id==2)
{ 
?>
<a href="addkurtis?activate=<?php echo $list->itemdetails_id ?>"  onclick="return confirm('Are you sure  want to Get Notification from this product  ?')"><button  class="btn btn-success"  title="To Get Notifications Activate It"><i class="fa fa-thumbs-o-up"></i> &nbsp;Get </button></a>
<!--<a class="btn btn-info " title="Continue Notifications" style="padding:3px 3px;" href="addkurtis?activate=<?php echo $list->itemdetails_id ?>"  onclick="return confirm('Are you sure you want to Open?')"><i class="glyphicon glyphicon-folder-open"></i>  Continue</a>
--><?php   } ?>
</td>
</tr>
<?php

}
}
else
{
?>
<tr><td colspan="6" align="center"> No Records Found</td></tr>;
<?php
}
?>
</tbody>
</table>       
</div>

<?php $ob1 = new globalFunctions();
$ob1->draw_pagination($start,$count,$page,$len);?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>




<?php
$this->load->view('commons/mainfooter'); 
?>
</body>
</html>