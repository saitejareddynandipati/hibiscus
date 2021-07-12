<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hibiscus | Assign Meterial/Metal To Subcategory</title>
    <?php
      $this->load->view('commons/maintemplate'); 
    ?>
  </head>
  <body>  
   <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
   <section id="aa-catg-head-banner" >
   <img src="<?php echo SITE_URL;?>assets/img/admin.png" alt="#" style="height:100px; width:100px;">
   <div class="aa-catg-head-banner-area">
    
        
      <div class="aa-catg-head-banner-content">
<h2>Assign Relation</h2>
      <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL;?>admin">Home</a></li>   
          
          <li  class="active">Assign Relation</li>                 
          
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
                        <strong>Success!</strong> Material Type has been added successfully!
                        </div>';
                    break;   
                    case 2:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong>Material Type has been Updated successfully!
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
                    <strong>Error!</strong>Material Type With This Name Already existed / Please enter another Material Type.
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
                    
                                <h3>Add New Relation Type</h3>
                                  <hr>
                                    <div class="content">
                                      <form class="form-horizontal" role="" action="<?php echo SITE_URL;?>addnewrelation"  method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo @$edit_id;?>">
                                        
                                         <div class="form-group">
                                       <label  class="col-sm-6  col-md-5 control-label" for="form-field-1"><b> Subcategory </b> </label>                                             
                                                     <div class="col-sm-6 col-md-4">
                                                       <select   class="form-control" name="subcat_id" id="category_id">
                                                            <option value="">Select Subcategory </option>
                                                              <?php
                                                                 foreach(@$subcategories as $subcategory)
                                                                 {
                                                                   echo '<option value="'.@$subcategory['subcat_id'].'"  >'.@$subcategory['subcat_name'].'</option>';
                                                                 }
                                                              ?>
                                                         </select>
                                                       </div>
                                    </div>
                                      <div class="form-group">
                                       <label  class="col-sm-6  col-md-5 control-label" for="form-field-1"><b> Material/Metal Type </b> </label>                                             
                                                     <div class="col-sm-6 col-md-4">
                                                       <select   class="form-control" name="itemcat_id" id="category_id">
                                                            <option value="">Select Material/Metal Type </option>
                                                              <?php
                                                                 foreach(@$types as $type)
                                                                 {
                                                                   echo '<option value="'.@$type['itemcat_id'].'" >'.@$type['itemcat_name'].'</option>';
                                                                 }
                                                              ?>
                                                         </select>
                                                       </div>
                                    </div>

                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                             <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>managerelation"><i class="fa fa-times"></i> Cancel</a>
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
                    
                                    <h3>Edit Relation Details</h3>
                                  <hr>
                                  <div class="content">
                                    <form class="form-horizontal" method="post" action="<?php echo SITE_URL;?>managerelation" >
                                        <input type="hidden" name="edit_id" value="<?php echo @$edit_id;?>">
                                        
                                        
                                        
                                          <div class="form-group">
                                                         <label  class="col-sm-5 control-label" for="form-field-1"><b> Category </b> </label>                                             
                                                     <div class="col-sm-4">
                                                      <select name="subcategory_name" id="" class="form-control" required>
                                                          <option value="">--Select Category-</option>
                                                          <?php
                                                          foreach($subcategories as $row1)
                                                          {
                                                            if(@$relationeditview[0]->subcat_id==@$row1['subcat_id'])
                                                            {
                                                              echo '<option value="'.@$row1['subcat_id'].'" selected="selected">'.@$row1['subcat_name'].'</option>';
                                                            }
                                                            else
                                                            {
                                                              echo '<option value="'.@$row1['subcat_id'].'">'.@$row1['subcat_name'].'</option>';
                                                            }
                                                          }?>
                                                       </select>
                                                       </div> 
                                        </div>
                                        <div class="form-group">
                                                         <label  class="col-sm-5 control-label" for="form-field-1"><b> Subcategory </b> </label>                                             
                                                     <div class="col-sm-4">
                                                      <select name="type_name" id="" class="form-control" required>
                                                          <option value="">--Select Category-</option>
                                                          <?php
                                                          foreach($types as $row2)
                                                          {
                                                            if(@$relationeditview[0]->itemcat_id==@$row2['itemcat_id'])
                                                            {
                                                              echo '<option value="'.@$row2['itemcat_id'].'" selected="selected">'.@$row2['itemcat_name'].'</option>';
                                                            }
                                                            else
                                                            {
                                                              echo '<option value="'.@$row2['itemcat_id'].'">'.@$row2['itemcat_name'].'</option>';
                                                            }
                                                          }?>
                                                       </select>
                                                       </div> 
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                           <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button>&nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>managerelation" ><i class="fa fa-times"></i> Cancel</a>
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
              
                            
                              
                                                      
                 
                             <form action="<?php echo SITE_URL;?>managerelation" method="post" >
                                
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-md-12 col-sm-12">
                                    <div class="form-horizontal">
                                      <label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>Sub Category </b></label>                                              
                                        <div class="col-sm-3 col-md-3">
                                      <select   class="form-control" name="subcat_id" id="subcategory_id">
                                                            <option value="">Select Subcategory </option>
                                                              <?php
                                                                 foreach(@$subcategories as $subcategory)
                                                                 {
                                                                   $selected = ($subcategory['subcat_id']==$subcat_id)?'selected="selected"':'';
                                                                   echo '<option value="'.@$subcategory['subcat_id'].'" '.$selected.' >'.@$subcategory['subcat_name'].'</option>';
                                                                 }
                                                              ?>
                                                         </select>
                                      </div>

                                        <label  class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>Type Category </b></label>                                             
                                      <div class="col-sm-3 col-md-3">
                                      <select   class="form-control" name="itemcat_id" id="itemcategory_id">
                                                            <option value="">Select Typecategory </option>
                                                              <?php
                                                                 foreach(@$types as $type)
                                                                 {
                                                                   $selected = ($type['itemcat_id']==$itemcat_id)?'selected="selected"':'';
                                                                   echo '<option value="'.@$type['itemcat_id'].'" '.$selected.' >'.@$type['itemcat_name'].'</option>';
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
                                <div class="col-sm-12 col-md-12"><br>
                                    <div class="col-sm-9 col-md-9"></div>
                                      <div class="col-sm-3 col-md-3">
                                        <div class="col-sm-9 col-md-5">
                                          <button type="submit" name="searchrelation" value="search"  class="btn btn-success"><i class="fa fa-search">&nbsp;</i>Search</button>&nbsp;
                                        </div>
                                      <div class="col-sm-1 col-md-2">
                                        <a href="<?php echo SITE_URL;?>managerelation?reset=1" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</a>
                                      </div>
                                      </div>
                                </div>
                                
                              </form> 
                                <div class="col-sm-12 col-md-12">
                              
                                </div>
                                  <div class="col-sm-12 col-md-12">
                                  <div class="col-md-10 col-sm-9">
                                    <h2>Relation Type List</h2>
                                  </div>
                                  <div class="col-sm-2 col-md-2">
                                   <a href="<?php echo SITE_URL;?>managerelation?value=1" ><button  class="btn btn-primary"  title="Add New Relation type"> <i class="fa fa-plus">&nbsp;</i> Add New</button></a>
                                  </div> 
                                 
                                
                                </div>

                                                 
                               
                              
                            
                          
                   
                 
                <div class="aa-blog-content">
                  <div class="row" >
                    <table class="table table-bordered table-striped table-hover"  >
                          <thead style="background-color:#BFC9C8;">
                              <tr>
                                <th>S.NO</th>

                                <th>Subcategory Name</th>
                                <th>Material/Metal Name</th>
                                
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                          </thead>
                            <tbody>
                            <?php
                        if($count>0)
                        { 
                          $inc=$start+1;
                          foreach($search_relation as $list)
                            { ?>
                              <tr>
                                <?php echo "<td>" .$inc++ . "</td>"; ?>  

                                <?php echo "<td>" .$list->subcat_name . "</td>"; ?>  
                                 <?php echo "<td>" .$list->itemcat_name."</td>"; ?>
                                  <?php echo "<td>" .$list->status_name."</td>"; ?>

                                  
                                 
                                <td>
                                      <a class="btn btn-default" style="padding:3px 8px;" href="<?php echo SITE_URL;?>managerelation?value=2&val=<?php echo $list->itemsubcat_id;?>"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                       <?php if($list->status_id=='1')
                                                { ?>
                                                <a class="btn btn-danger" title="InActivate The Relation" style="padding:3px 3px;" href="managerelation?del=<?php echo $list->itemsubcat_id?>"  onclick="return confirm('Are you sure you want to Inactivate?')"><i class="fa fa-trash-o"></i></a>
                                                <?php }
                                                else if($list->status_id=='2')
                                                { 
                                                ?>
                                                <a class="btn btn-info" title="Activate The Relation" style="padding:3px 3px;" href="managerelation?activate=<?php echo $list->itemsubcat_id ?>"  onclick="return confirm('Are you sure you want to Activate?')"><i class="fa fa-check"></i></a>
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