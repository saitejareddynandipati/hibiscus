<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hibiscus | Manage Subcategory</title>
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
<h2>Manage Subcategory</h2>
      <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL;?>admin">Home</a></li>    
          <li  class="active">Manage Subcategory</li>                 
          
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
                   <section id="cart-view" >
                     <div class="container" > 
                       <div class="row">
                         <div class="col-md-12">
                           <div class="cart-view-area" >
                             <div class="cart-view-table">
                    
                                    <h3>Add New Subcategory</h3>
                                  <hr>
                                  <div class="content">
                                    <form class="form-horizontal" role="" action="<?php echo SITE_URL;?>addnewsubcat"  method="post" enctype="multipart/form-data">
                                      
                                       <div class="form-group">
                                                         <label  class="col-sm-5 control-label" for="form-field-1">Category </label>                                             
                                                           <div class="col-sm-4">
                                                             <select   class="form-control" name="category" id="category_id" required>
                                                                  <option value="">Select category</option>
                                                                    <?php
                                                                       foreach(@$categories as $category)
                                                                       {

                                                                         echo '<option value="'.@$category['category_id'].'" >'.@$category['category_name'].'</option>';
                                                                       }
                                                                    ?>
                                                               </select>
                                                             </div>
                                                              
                                        </div>
                                        
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Subcategory Name <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="15"  class="form-control" placeholder="Subcategory name" name="subcat_name" required>
                                            </div>
                                        </div>
<!-- 
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Subcategory Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30"  class="form-control" id="location" placeholder="Subcategory Title" name="cat_title" required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Subcategory Sub Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30"  class="form-control" id="location" placeholder="Subcategory Sub Title" name="cat_subtitle" required >
                                            </div>
                                        </div> -->

                                        <div class="form-group" id="uploadImage">
                                            <label class="col-sm-5 control-label">Upload Subcategory Image</label>
                                            <div class="col-sm-4">
                                              <input type="hidden" name="txt_image" id="txt_image" value="">
                                              <input type="file" class="form-control" name="image" id="image" required multiple="true" />
                                              <label id="lblIMGFile"></label>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group">
                                          <label class="col-sm-5 control-label">Banner Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30"  class="form-control" id="location" placeholder="Banner Title" name="banner_title" required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Banner Sub Title <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30"  class="form-control" id="location" placeholder="Banner Sub Title" name="banner_subtitle" required >
                                            </div>
                                        </div> -->

                                        

                                         <div class="form-group" id="uploadImage">
                                            <label class="col-sm-5 control-label">Upload Banner Image</label>
                                            <div class="col-sm-4">
                                              <input type="hidden" name="txt_image2" id="txt_image2" value="">
                                              <input type="file" class="form-control" name="image2" id="image" required multiple="true" />
                                              <label id="lblIMGFile"></label>
                                            </div>
                                        </div>
                                                                       
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                             <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>managesubcat"><i class="fa fa-times"></i> Cancel</a>
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
                    
                                    <h3>Edit Subcategory Details</h3>
                                  <hr>
                                  <div class="content">
                                    <form class="form-horizontal" method="post" action="<?php echo SITE_URL;?>managesubcat" enctype="multipart/form-data">
                                        <input type="hidden" name="edit_id" value="<?php echo @$edit_id;?>">
                                        
                                        
                                        
                                          <div class="form-group">
                                                         <label  class="col-sm-5 control-label" for="form-field-1"><b> Category </b> </label>                                             
                                                     <div class="col-sm-4">
                                                      <select name="category_name" id=""  disabled class="form-control"  required>
                                                          <option value="">--Select Category-</option>
                                                          <?php
                                                          foreach($categories as $row1)
                                                          {
                                                            if(@$subcateditview->category_id==@$row1['category_id'])
                                                            {
                                                              echo '<option value="'.@$row1['category_id'].'" selected="selected">'.@$row1['category_name'].'</option>';
                                                            }
                                                            else
                                                            {
                                                              echo '<option value="'.@$row1['category_id'].'">'.@$row1['category_name'].'</option>';
                                                            }
                                                          }?>
                                                       </select>
                                                       </div> 
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Subcategory Name <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30" required class="form-control" id="location" placeholder="Type Name" name="subcat_name" value="<?php echo $subcateditview->subcat_name;  ?>" >
                                            </div>
                                        </div> 

                                         

                                        <div class="form-group " >
                                          <label class="col-sm-5 control-label">Upload Image</label>
                                          <div class="col-sm-4">
                                            <input type="hidden" name="txt_image" id="txt_image" value="<?php echo @$subcateditview->subcat_image?>" >
                                            <input type="file" class="form-control" name="image" id="image" >
                                            <label id="lblIMGFile"></label>
                                          </div>
                                        </div> 
                                        <div class="form-group" >
                                          <label class="col-sm-5 control-label"></label>
                                          <div class="col-sm-4">
                                            
                                              <img src="<?php echo SITE_URL.$obj1->_component_image_path().@$subcateditview->subcat_image;?>" alt="no" class="" width="100" height="100;">
                                              
                                            </div>
                                          </div>

                                        

                                        

                                         <div class="form-group" id="uploadImage">
                                            <label class="col-sm-5 control-label">Upload Image</label>
                                            <div class="col-sm-4">
                                              <input type="hidden" name="txt_image2" required id="txt_image2" value="<?php echo @$subcateditview->banner_image?>">
                                              <input type="file" class="form-control" name="image2" id="image" >
                                              <label id="lblIMGFile"></label>
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                          <label class="col-sm-5 control-label"></label>
                                          <div class="col-sm-4">
                                            
                                              <img src="<?php echo SITE_URL.$obj1->_component_image_path().@$subcateditview->banner_image;?>" alt="no" class="" width="100" height="100;">
                                              
                                            </div>
                                          </div>
                                        
                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                           <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>managesubcat" ><i class="fa fa-times"></i> Cancel</a>
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
              
                            

                 <form action="<?php echo SITE_URL;?>managesubcat" method="post" >
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-md-12 col-sm-12">
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
                                     
                                      foreach(@$subcategories as $subcategory)
                                       {
                                         $selected = ($subcategory['subcat_id']==$subcategory_id)?'selected="selected"':'';
                                         echo '<option value="'.@$subcategory['subcat_id'].'" '.$selected.' >'.@$subcategory['subcat_name'].'</option>';
                                       }
                                      ?>
                                      
                                      </select>
                                      </div>
                                      </div> 
                                      </div>

                                      <div class="col-md-12 col-sm-12"><br>
                                      <div class="form-horizontal">
                                        <label  class="col-sm-2  col-md-2  control-label" for="form-field-1"><b> Status </b></label>                                             
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
                                    </div>
                                  </div>
                                  
                                 
                                </div>
                                <div class="col-sm-12 col-md-12">
<div class="col-sm-9 col-md-9"></div>
 <div class="col-sm-3 col-md-3">
<div class="col-sm-9 col-md-5">
<button type="submit" name="searchsubcat" value="search"  class="btn btn-success"><i class="fa fa-search">&nbsp;</i>Search</button>&nbsp;
</div>
<div class="col-sm-1 col-md-2">
<a href="<?php echo SITE_URL;?>managesubcat?reset=1" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</a></div>
</div></div>
                                
                              </form> 
                                  <div class="col-sm-12 col-md-12">
                                
                                </div> 
                                
                                  <div class="col-sm-12 col-md-12">
                                  <div class="col-md-10 col-sm-9">
                                    <h2>SubCategory List</h2>
                                  </div>
                                  <div class="col-sm-2 col-md-2">
                                   <a href="<?php echo SITE_URL;?>managesubcat?value=1" ><button  class="btn btn-primary"  title="Add New Product"> <i class="fa fa-plus">&nbsp;</i> Add New</button></a>
                                  </div> 
                                 
                                
                                </div>

                <div class="aa-blog-content">
                  <div class="table-responsive" >
                    <table class="table table-bordered hover table-striped table-hover"  >
                          <thead style="background-color:#BFC9C8;">
                              <tr>
                                <th>S.NO</th>

                                <th>Subcategory Name</th>
                                <th>Subcategory Image</th>
                                                                <th>Category Name</th>
                                                                <th>Status</th>


                                
                                
                                
                                <th>Action</th>
                              </tr>
                          </thead>
                            <tbody>
                            <?php
                        if($count>0)
                        { 
                          $inc=$start+1;

                          foreach($search_subcat as $list)
                            { ?>
                              <tr>
                                 <?php echo "<td>" .$inc++."</td>"; ?>

                                 <?php echo "<td>" .$list->subcat_name."</td>"; ?>
                                                                 <?php
if(@$list->subcat_image!='')
{
$path = $obj1->_component_image_path().@$list->subcat_image;

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
                                                                 <?php echo "<td>" .$list->category_name . "</td>"; ?>  
                                                                 <?php echo "<td>" .$list->status_name . "</td>"; ?>  

 
                                  
                                 
                                <td>
                                      <a class="btn btn-default" style="padding:3px 8px;" href="<?php echo SITE_URL;?>managesubcat?value=2&val=<?php echo $list->subcat_id;?>"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                       <?php if($list->status_id=='1')
                                                { ?>
                                                <a class="btn btn-danger" title="InActivate The SubCategory" style="padding:3px 3px;" href="managesubcat?del=<?php echo $list->subcat_id?>"  onclick="return confirm('Are you sure you want to Inactivate?')"><i class="fa fa-trash-o"></i></a>
                                                <?php }
                                                else if($list->status_id=='2')
                                                { 
                                                ?>
                                                <a class="btn btn-info" title="Activate The Subcategory" style="padding:3px 3px;" href="managesubcat?activate=<?php echo $list->subcat_id ?>"  onclick="return confirm('Are you sure you want to Activate?')"><i class="fa fa-check"></i></a>
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
    </div>
  </section>
  <!-- / Blog Archive -->
   <?php 
      $this->load->view('commons/mainfooter'); 
 ?>
  </body>
</html>