<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hibiscus | Manage Category</title>
    <?php
        $obj1 = new globalFunctions();

      $this->load->view('commons/maintemplate'); 
    ?>
  </head>
  <body>  
   <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
   <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>assets/img/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Manage Category</h2>
      <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL;?>admin">Home</a></li>   
          
          <li  class="active">Manage Category</li>                 
          
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
                        <strong>Success!</strong>Category has been added successfully!
                        </div>';
                    break;   
                    case 2:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong>Category has been Updated successfully!
                        </div>';
                    break; 
                    case 3:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong>Category has been activated successfully!
                        </div>';
                    break;
                    case 4:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong>Category has been Deactivated successfully!
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
                    <strong>Error!</strong>Category With This Name Already existed / Please enter another Category Name.
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
                    
                                    <h3>Add New Category</h3>
                                  <hr>
                                  <div class="content">
                                    <form class="form-horizontal" role="" action="<?php echo SITE_URL;?>addnewcategory"  method="post" enctype="multipart/form-data">
                                      
                                        
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Category Name <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="15" required class="form-control" placeholder="Category name" name="category_name">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                          <label class="col-sm-5 control-label">category Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30" required class="form-control" id="location" placeholder="category Title" name="cat_title"  >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">category Sub Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30" required class="form-control" id="location" placeholder="category Sub Title" name="cat_subtitle"  >
                                            </div>
                                        </div> -->

                                        <div class="form-group" id="uploadImage">
                                            <label class="col-sm-5 control-label">Upload Image</label>
                                            <div class="col-sm-4">
                                              <input type="hidden" name="txt_image" id="txt_image" value="">
                                              <input type="file" class="form-control" name="image" id="image" required>
                                              <label id="lblIMGFile"></label>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                             <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>managecategory"><i class="fa fa-times"></i> Cancel</a>
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
 

                    <?php break;

                    case 2:
                    ?>  
                    <section id="cart-view" >
                     <div class="container" >
                       <div class="row">
                         <div class="col-md-12">
                           <div class="cart-view-area" >
                             <div class="cart-view-table">
                    
                                    <h3>Edit Category Details</h3>
                                  <hr>
                                  <div class="content">
                                    <form class="form-horizontal" method="post" action="<?php echo SITE_URL;?>managecategory"  enctype="multipart/form-data">
                                        <input type="hidden" name="edit_id" value="<?php echo @$edit_id;?>">
                                        
                                        
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">category Name <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30" required class="form-control" id="location" placeholder="category Name" name="category_name" value="<?php echo @$categoryeditview->category_name;  ?>" >
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                          <label class="col-sm-5 control-label">category Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30" required class="form-control" id="location" placeholder="category Name" name="cat_title" value="<?php echo @$categoryeditview->cat_title;  ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">category Sub Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30" required class="form-control" id="location" placeholder="category Name" name="cat_subtitle" value="<?php echo @$categoryeditview->cat_subtitle;  ?>" >
                                            </div>
                                        </div> -->

                                        <div class="form-group " >
                                          <label class="col-sm-5 control-label">Upload Image</label>
                                          <div class="col-sm-4">
                                            <input type="hidden" name="txt_image" id="txt_image" value="<?php echo @$categoryeditview->cat_image?>">
                                            <input type="file" class="form-control" name="image" id="image" required>
                                            <label id="lblIMGFile"></label>
                                          </div>
                                        </div> 
                                        <div class="form-group" >
                                          <label class="col-sm-5 control-label"></label>
                                          <div class="col-sm-4">
                                            
                                              <img src="<?php echo SITE_URL.$obj1->_component_image_path().@$categoryeditview->cat_image;?>" alt="no" class="" width="100" height="100;">
                                              
                                            </div>
                                          </div>
                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button> &nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>managecategory" ><i class="fa fa-times"></i> Cancel</a>
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

                     <?php break;  ?>

                     
                    
                    
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
              
                            <form action="<?php echo SITE_URL;?>managecategory" method="post" >
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-md-12 col-sm-12">
                                    <div class="form-horizontal">
                                      <label class="col-sm-3 col-md-3 control-label" for="form-field-1"><b>Category Name </b></label>                                              
                                        <div class="col-sm-4 col-md-3">
                                      <select   class="form-control" name="category_id" id="">
                                      <option value="">Select Category </option>
                                      <?php
                                      foreach(@$cat as $catt)
                                      {
                                      $selected = ($catt['category_id']==$category_id)?'selected="selected"':'';
                                      echo '<option value="'.@$catt['category_id'].'"  '.$selected.'>'.@$catt['category_name'].'</option>';
                                      }
                                      ?>
                                      </select>
                                      </div>

                                        <label  class="col-sm-2 col-md-1 control-label" for="form-field-1"><b> Status </b></label>                                             
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
                                      </div>
                                    </div>
                                  </div>
                                  
                                  
                                 
                                </div>
                                <div class="col-sm-12 col-md-12"><br>
<div class="col-sm-9 col-md-9"></div>
 <div class="col-sm-3 col-md-3">
<div class="col-sm-9 col-md-5">
<button type="submit" name="searchcategory" value="search"  class="btn btn-success"><i class="fa fa-search">&nbsp;</i>Search</button>&nbsp;
</div>
<div class="col-sm-1 col-md-2">
<a href="<?php echo SITE_URL;?>managecategory?reset=1" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</a></div>
</div>
</div>

                                
                          
                              </form> 
                                  <div class="col-sm-12 col-md-12">
                                
                                </div> 
                                
                                  <div class="col-sm-12 col-md-12">
                                  <div class="col-md-10 col-sm-9">
                                    <h2>Category List</h2>
                                  </div>
                                  <div class="col-sm-2 col-md-2">
                                   <a href="<?php echo SITE_URL;?>managecategory?value=1" ><button  class="btn btn-primary"  title="Add New Product"> <i class="fa fa-plus">&nbsp;</i> Add New</button></a>
                                  </div> 
                                 
                                
                                </div>
                               
                                                         
                 


                                                 
                               
                              
                            
                          
                   
                  
                
                  <div class="row" >
                    <table class="table table-bordered table-striped table-hover"  >
                          <thead style="background-color:#BFC9C8;">
                              <tr>
                               <th>S.No</th>

                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th> 
                                <th>Action</th>
                              </tr>
                          </thead>
                            <tbody>
                            <?php
                        if($count>0)
                        { 
                          $inc=$start+1;

                          foreach($search_category as $list)
                            { ?>
                              <tr>
                                  <?php echo "<td>" .$inc++."</td>"; ?>

                                 <?php echo "<td>" .$list->category_name."</td>"; ?>
                                 <?php
if(@$list->cat_image!='')
{
$path = $obj1->_component_image_path().@$list->cat_image;

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
       <?php echo "<td>" .$list->status_name."</td>"; ?>


                                  
                                 
                                <td>
                                      <a class="btn btn-default" style="padding:3px 8px;" href="<?php echo SITE_URL;?>managecategory?value=2&val=<?php echo $list->category_id;?>"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                       <?php if($list->status_id=='1')
                                                { ?>
                                                <a class="btn btn-danger" title="InActivate The Category" style="padding:3px 3px;" href="managecategory?del=<?php echo $list->category_id?>"  onclick="return confirm('Are you sure you want to Inactivate?')"><i class="fa fa-trash-o"></i></a>
                                                <?php }
                                                else if($list->status_id=='2')
                                                { 
                                                ?>
                                                <a class="btn btn-info" title="Activate The Category" style="padding:3px 3px;" href="managecategory?activate=<?php echo $list->category_id ?>"  onclick="return confirm('Are you sure you want to Activate?')"><i class="fa fa-check"></i></a>
                                          <?php   } ?>
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
                  $ob1->draw_pagination($start,$count,$page,$len);?> 
              
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