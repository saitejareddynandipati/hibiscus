<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hibiscus | Manage Users</title>
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
<h2>Manage Users</h2>
      <ol class="breadcrumb">
          <li><a href="<?php echo SITE_URL;?>admin">Home</a></li>    
          <li  class="active">Manage Users</li>                 
          
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
                        <strong>Success!</strong> User has been added successfully!
                        </div>';
                    break;   
                    case 2:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong> User has been Updated successfully!
                        </div>';
                    break;
                    case 3:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong> User has been Deactivated successfully!
                        </div>';
                    break;  
                    case 4:
                    echo '<div class="alert alert-success alert-white rounded">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <div class="icon"><i class="fa fa-check"></i></div>
                        <strong>Success!</strong> User has been Activated successfully!
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
                    <strong>Error!</strong>User With This Email ID Already existed / Please enter another Email ID.
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
                    
                                    <h3>Add New User</h3>
                                  <hr>
                                  <div class="content">
                                    <form class="form-horizontal" role="" action="<?php echo SITE_URL;?>addnewuser"  method="post">
                                      <input type="hidden" name="location_id">
                                        
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">User Name <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="15" required class="form-control" id="location" placeholder="User name" name="user_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Password <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="15" required class="form-control" id="location" placeholder="Password" name="password" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Email <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="email" maxlength="45" required class="form-control"  placeholder="Email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Phone Number <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="15" required class="form-control"  placeholder="Phone Number" name="phone_number">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                             <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button> &nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>manageuser"><i class="fa fa-times"></i> Cancel</a>
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
                    
                                    <h3>Edit User Details</h3>
                                  <hr>
                                  <div class="content">
                                    <form class="form-horizontal" method="post" action="<?php echo SITE_URL;?>manageuser" >
                                        <input type="hidden" name="edit_id" value="<?php echo @$edit_id;?>">
                                        
                                        
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">User Name <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="30" required class="form-control" placeholder="User Name"  name="user_name" value="<?php foreach($usereditview as $user){echo @$user['user_name'];}  ?>" >
                                            </div>
                                        </div>

                                         <div class="form-group">
                                          <label class="col-sm-5 control-label">Password <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="10" required class="form-control" placeholder="password"  name="password" value="<?php foreach($usereditview as $user){echo @$user['password'];}  ?>" >
                                            </div>
                                        </div>

                                         <div class="form-group">
                                          <label class="col-sm-5 control-label">Email <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="email" maxlength="30" required class="form-control"  placeholder="email" name="email" value="<?php foreach($usereditview as $user){echo @$user['email'];}  ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-sm-5 control-label">Phone Number <span class="req-fld">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="text" maxlength="15" required class="form-control"  placeholder="Phone Number" name="phone_number" value="<?php foreach($usereditview as $user){echo @$user['phone_number'];}  ?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-6 col-sm-5">
                                            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-check"></i> Submit</button> &nbsp;
                                              <a class="btn btn-danger" href="<?php echo SITE_URL;?>manageuser" ><i class="fa fa-times"></i> Cancel</a>
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
                   

                  <form action="<?php echo SITE_URL;?>manageuser" method="post" >
                                <div class="col-sm-12 col-md-12">
                                  <div class="col-md-12 col-sm-12">
                                    <div class="form-horizontal">
                                      <label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>User Name </b></label>                                              
                                        <div class="col-sm-3 col-md-3">
                                          <input type="text" name="user_name" maxlength="25" value="<?php echo @$user_name; ?>"  class="form-control" placeholder="User Name">
                                        </div>

                                        <label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>User Email </b></label>                                              
                                        <div class="col-sm-3 col-md-3">
                                          <input type="text" name="email" maxlength="25" value="<?php echo @$email; ?>" id="color_name" class="form-control" placeholder="User Email">
                                        </div>


                                    </div>
                                  </div>


                                  <div class="col-md-12 col-sm-12"><br>
                                    <div class="form-horizontal">
                                       <label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>Phone Number </b></label>                                              
                                        <div class="col-sm-3 col-md-3">
                                          <input type="text" name="phone_number" maxlength="14" value="<?php echo @$phone_number; ?>" id="phone_number" class="form-control" placeholder="Phone Number">
                                        </div>

                                        <label class="col-sm-3 col-md-2 control-label" for="form-field-1"><b>User Type </b></label>                                              
                                       <div class="col-sm-3">
                                       <select   class="form-control" name="role_id" id="role_id">
                                          <option value="">Select User Type </option>
                                            <?php
                                              foreach(@$role as $rolee)
                                                {
                                                  $selected = ($rolee['role_id']==$role_id)?'selected="selected"':'';
                                                      echo '<option value="'.@$rolee['role_id'].'" '.$selected.' >'.@$rolee['role_name'].'</option>';
                                                }
                                                ?>
                                        </select>
                                        </div>
                                        



                                    </div>
                                  </div>
                                  


                                  <div class="col-md-12 col-sm-12"><br>
                                    <div class="form-horizontal">
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
                                      </div>
                                      </div>
                                      </div>
                                 
                                </div>
                                 <!-- <div class="col-md-12 col-sm-2">
                                <div class="col-sm-3 col-md-10"></div> 
                                  <div class="col-sm-3 col-md-1">
                                    <button type="submit" name="searchuser" value="search"  class="btn btn-success"><i class="fa fa-search">&nbsp;</i>Search</button>&nbsp;
                                  </div>
                                  <div class="col-md-1">
                                    <a href="<?php echo SITE_URL;?>manageuser?reset=1" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</a>
                                  </div>
                                  </div> -->
                                  <div class="col-sm-12 col-md-12"><br>
<div class="col-sm-9 col-md-9"></div>
 <div class="col-sm-3 col-md-3">
<div class="col-sm-9 col-md-5">
<button type="submit" name="searchuser" value="search" class="btn btn-success"><i class="fa fa-search">&nbsp;</i>Search</button>
</div>
<div class="col-sm-1 col-md-2">
<a href="<?php echo SITE_URL;?>manageuser?reset=1" class="btn btn-success"><i class="fa fa-refresh"></i> Reset</a>
</div>
</div>
</div>
                              </form> 
                                  <div class="col-sm-12 col-md-12">
                                <br>
                                </div> 
                                
                                  <div class="col-sm-12 col-md-12">
                                  <div class="col-md-10 col-sm-9">
                                    <h2>Users List</h2>
                                  </div>
                                  <?php 
                                  if($role_id==1)
                                  {
                                    ?>
                                 
                                  <div class="col-sm-2 col-md-2">
                                   <a href="<?php echo SITE_URL;?>manageuser?value=1" ><button  class="btn btn-primary"  title="Add New color"> <i class="fa fa-plus">&nbsp;</i> Add New User</button></a>
                                  </div>
                                  <?php
                                  }
                                  ?> 
                                </div>
                                    

                <div class="aa-blog-content">
                  <div class="row" >
                    <table class="table table-bordered table-striped table-hover"  >
                          <thead style="background-color:#BFC9C8;">
                              <tr>
                               <th>S.NO</th>

                                <th>User Name</th>
                                <th>Email </th>
                                  <th>Phone Number </th>

                                <th>User Type</th>
                                

                                <th>status</th>
                                <th>Action</th>
                              </tr>
                          </thead>
                            <tbody>
                            <?php
                        if($count>0)
                        { 
                          $inc=$start+1;

                          foreach($search_user as $list)
                            { ?>
                              <tr>
                               <?php echo "<td>" .$inc++ . "</td>"; ?>  

                                <?php echo "<td>" .$list->user_name . "</td>"; ?>  
                                 <?php echo "<td>" .$list->email."</td>"; ?>
                                    <?php echo "<td>" .$list->phone_number."</td>"; ?>

                                  <?php echo "<td>" .$list->role_name."</td>"; ?>
                                  <?php echo "<td>" .$list->status_name."</td>"; ?>
                                <td>
                                      <a class="btn btn-default" style="padding:3px 8px;" href="<?php echo SITE_URL;?>manageuser?value=2&val=<?php echo $list->user_id;?>"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                                      <?php if($list->status_id=='1')
                                                { ?>
                                                <a class="btn btn-danger" title="Inactivate The User" style="padding:3px 3px;" href="manageuser?del=<?php echo $list->user_id?>"  onclick="return confirm('Are you sure you want to Inactivate?')"><i class="fa fa-trash-o"></i></a>
                                                <?php }
                                                else if($list->status_id=='2')
                                                { 
                                                ?>
                                                <a class="btn btn-info" title="Activate The User" style="padding:3px 3px;" href="manageuser?activate=<?php echo $list->user_id ?>"  onclick="return confirm('Are you sure you want to Activate?')"><i class="fa fa-check"></i></a>
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