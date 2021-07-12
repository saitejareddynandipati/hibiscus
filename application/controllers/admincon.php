<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once (__DIR__).'/../libraries/globalFunctions.php';
require_once (__DIR__).'/../libraries/curl-operations.php';

class admincon extends CI_Controller {
	public function admin()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		$data['nestedView']['heading']=" Accounts ";
		
		$data['nestedView']['cur_page'] = '';
		$data['nestedView']['parent_page'] = '';
		

		
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();	
		$data['nestedView']['pageTitle'] = 'Accounts';
				$ob = new globalFunctions();

		$len = $ob->getDefaultPerPageRecords();
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$notification=array();
		$notification=$this->adminmodel->getallnotifications($start,$len);
		
		$data['notifications_data'] = $notification[0];
		$data['notifications_count'] = $notification[1];

		$this->load->view('admin/adminhome',$data);
	}
	public function product_number_check()
  {
    if(isset($_REQUEST['product_number']))
    {
      $product_number=@$_POST['product_number'];

      echo $this->adminmodel->checkProductNumber($product_number);
    

    }

  }

  public function forgot_password(){
			$data['nestedView']['heading']=" forgot password ";
		
		$data['nestedView']['cur_page'] = '';
		$data['nestedView']['parent_page'] = '';
		

		
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();	
		$data['nestedView']['pageTitle'] = 'forgot password';
		$this->load->view('forgot_password',$data);
	}

	public function reset_password(){
			$data['nestedView']['heading']=" reset password ";
		
		$data['nestedView']['cur_page'] = '';
		$data['nestedView']['parent_page'] = '';
				
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();	
		$data['nestedView']['pageTitle'] = 'reset password';
	$data['user_ids']=$_REQUEST['value']; 


		$this->load->view('reset_password',$data);
	}
	
	
	
	public function account(){
			$data['nestedView']['heading']=" Accounts ";
		
		$data['nestedView']['cur_page'] = '';
		$data['nestedView']['parent_page'] = '';
		

		
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();	
		$data['nestedView']['pageTitle'] = 'Accounts';
		$this->load->view('account',$data);
	}

	////////kosuhik///////
	public function adminhome(){
		$this->load->view('admin/adminhome');	
	}

	public function manageuser()
	{	
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();

		if(isset($_REQUEST['del']))
		{
			$user_id=@$_REQUEST['del'];
			$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->deleteuser($user_id,$user_name);
			header('Location: '.SITE_URL.'manageuser?succ=3');exit;
		}
		if(isset($_REQUEST['activate']))
		{
			$user_id=@$_REQUEST['activate'];
			$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->updateuser($user_id,$user_name);
			header('Location: '.SITE_URL.'manageuser?succ=4');exit;
		}

		 if(isset($_POST['searchuser']))
		{
			$_SESSION['u_name']=@$_POST['user_name'];
			$_SESSION['email']=@$_POST['email'];
			$_SESSION['r_id']=@$_POST['role_id'];
						$_SESSION['status_id']=@$_POST['status_id'];
												$_SESSION['phone_number']=@$_POST['phone_number'];


			
		}
		else if(!isset($_REQUEST['start']))
		{
			unset($_SESSION['u_name']);
			unset($_SESSION['email']);
			unset($_SESSION['r_id']);
						unset($_SESSION['status_id']);
												unset($_SESSION['phone_number']);


		}
		$user_name=@$_SESSION['u_name'];
		$email=@$_SESSION['email'];
		$role_id=@$_SESSION['r_id'];
				$status_id=@$_SESSION['status_id'];
								$phone_number=@$_SESSION['phone_number'];





		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['u_name']);
			unset($_SESSION['email']);
			unset($_SESSION['r_id']);
			unset($_SESSION['status_id']);
			unset($_SESSION['phone_number']);		
		
		

		}


		# Default Records Per Page - always 10
		$ob1 = new globalFunctions();
		$len = $ob1->getDefaultPerPageRecords();
		$page = 'manageuser?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		

		$search_user = array();
		$search_user=$this->adminmodel->searchUser($start,$len,$user_name,$email,$role_id,$status_id,$phone_number);
		$data['role']=$this->adminmodel->getroledetails();

		

			
			if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['usereditview']=$this->adminmodel->usereditview($id);
					$data['edit_id']=$id;
					$_SESSION['s_user_id']=$id;
				}
				if(!empty($_REQUEST['edit']))
				{

					$data['usereditview']=$this->adminmodel->usereditview($_SESSION['s_user_id']);
					$data['edit_id']=$_SESSION['s_user_id'];
				}
				if(isset($_POST['submit']))	
				{
					
					$edit_id=$_POST['edit_id'];
					$user_name=$_POST['user_name'];
					$password=$_POST['password'];
					$email=$_POST['email'];
					$phone_number=$_POST['phone_number'];

					$existed=$this->adminmodel->update_user_details($edit_id,$user_name,$password,$email,$phone_number);
					if($existed==1)
					{
						$edit_id=$_POST['edit_id'];
						$data['edit_id']=$edit_id;
     					$data['usereditview']=$this->adminmodel->usereditview($edit_id);
						header('Location: '.SITE_URL.'manageuser?edit=1&value=2&flg=1');exit;

					}
					else
					{
						header('Location: '.SITE_URL.'manageuser?succ=2');exit;

					}

				}

		$data['search_user'] = $search_user[0];
		$data['count'] = $search_user[1];
		$data['user_name']=$user_name;
		$data['email']=$email;
		$data['role_id']=$role_id;
		$data['status_id']=$status_id;

		$data['statuss']=$this->adminmodel->getproductstatusdetails();



		
	    $this->load->view('admin/manageuser',$data);
	}

	public function addnewuser()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		if(isset($_POST['submit']))
		{
			$user_name = $this->input->post('user_name');
				$password = $this->input->post('password');
 			$email = $this->input->post('email');
 			 			$phone_number = $this->input->post('phone_number');

			$dat1 = array(
				'user_name' => $this->input->post('user_name'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'phone_number' => $this->input->post('phone_number'),

				'role_id' =>1);
		   
		    		
			$existed=$this->adminmodel->insert_user($email,$dat1);

			if($existed==1)
			{

			header('Location: '.SITE_URL.'manageuser?flg=1&value=1');exit;


			}
			else
			{
				header('Location: '.SITE_URL.'manageuser?succ=1');exit;
			}		
		}
	}
	
	public function managecolor()
	{	
	if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}	
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchcolor']))
		{
			$_SESSION['color_name']=@$_POST['color_name'];
			$_SESSION['status_id']=@$_POST['status_id'];

		}
		else if(!isset($_REQUEST['start']))
		{
			unset($_SESSION['color_name']);
						unset($_SESSION['status_id']);

		}
		$color_name=@$_SESSION['color_name'];
				$status_id=@$_SESSION['status_id'];



		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['color_name']);	
						unset($_SESSION['status_id']);		
	

		}


		# Default Records Per Page - always 10
		$ob1 = new globalFunctions();
		$len = $ob1->getDefaultPerPageRecords();
		$page = 'managecolor?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		

		$search_color = array();
		$search_color=$this->adminmodel->searchColor($start,$len,$color_name,$status_id);

		if(isset($_REQUEST['del']))
		{
			$color_id=@$_REQUEST['del'];

			$this->adminmodel->deactivatecolor($color_id);
			header('Location: '.SITE_URL.'managecolor?succ=4');exit;
		}
		if(isset($_REQUEST['activate']))
		{
			$color_id=@$_REQUEST['activate'];
			//$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->activatecolor($color_id);
			header('Location: '.SITE_URL.'managecolor?succ=3');exit;
		}

			
			if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['coloreditview']=$this->adminmodel->coloreditview($id);
					$data['edit_id']=$id;
					$_SESSION['s_color_id']=$id;
				}
				if(!empty($_REQUEST['edit']))
				{
					$data['coloreditview']=$this->adminmodel->coloreditview($_SESSION['s_color_id']);
					$data['edit_id']=$_SESSION['s_color_id'];
				}
				if(isset($_POST['submit']))	
				{
					
					$edit_id=$_POST['edit_id'];
					$color_name=$_POST['color_name'];
					$existed=$this->adminmodel->update_color_details($edit_id,$color_name);
					if($existed==1)
					{
						$edit_id=$_POST['edit_id'];
						$data['edit_id']=$edit_id;
     					$data['coloreditview']=$this->adminmodel->coloreditview($edit_id);
						header('Location: '.SITE_URL.'managecolor?edit=1&value=2&flg=1');exit;

					}
					else
					{
						header('Location: '.SITE_URL.'managecolor?succ=2');exit;

					}

				}

		$data['search_color'] = $search_color[0];
		$data['count'] = $search_color[1];
		$data['color_name']=$color_name;
		$data['status_id']=$status_id;

		$data['statuss']=$this->adminmodel->getproductstatusdetails();
		
	    $this->load->view('admin/managecolor',$data);
	}
	public function addnewcolor()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		if(isset($_POST['submit']))
		{
		    $color_name=$_POST['color_name'];
		    		
			$existed=$this->adminmodel->insert_color($color_name);

			if($existed==1)
			{
			header('Location: '.SITE_URL.'managecolor?flg=1&value=1');exit;
			}
			else
			{
				header('Location: '.SITE_URL.'managecolor?succ=1');exit;
			}		
		}
	}



	public function managesize()
	{		
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchsize']))
		{
			$_SESSION['size_name']=@$_POST['size_name'];
			
			$_SESSION['status_id']=@$_POST['status_id'];


		}
		else if(!isset($_REQUEST['start']))
		{
			unset($_SESSION['size_name']);
			unset($_SESSION['status_id']);

		}	

		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['size_name']);
			unset($_SESSION['status_id']);

		}
		$size_name=@$_SESSION['size_name'];
		$status_id=@$_SESSION['status_id'];



		# Default Records Per Page - always 10
		$ob1 = new globalFunctions();
		$len = $ob1->getDefaultPerPageRecords();
		$page = 'managesize?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		

		$search_size = array();
		$search_size=$this->adminmodel->searchsize($start,$len,$size_name,$status_id);
		



			if(isset($_REQUEST['del']))
		{
			$color_id=@$_REQUEST['del'];

			$this->adminmodel->deactivatesize($color_id);
			header('Location: '.SITE_URL.'managesize?succ=4');exit;
		}
		if(isset($_REQUEST['activate']))
		{
			$color_id=@$_REQUEST['activate'];
			//$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->activatesize($color_id);
			header('Location: '.SITE_URL.'managesize?succ=3');exit;
		}
			if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['sizeeditview']=$this->adminmodel->sizeeditview($id);
					$data['edit_id']=$id;
					$_SESSION['s_size_id']=$id;
				}
				if(!empty($_REQUEST['edit']))
				{
					$data['sizeeditview']=$this->adminmodel->sizeeditview($_SESSION['s_size_id']);
					$data['edit_id']=$_SESSION['s_size_id'];
				}
				if(isset($_POST['submit']))	
				{
					
					$edit_id=$_POST['edit_id'];
					$size_name=$_POST['size_name'];
					$existed=$this->adminmodel->update_size_details($edit_id,$size_name);
					if($existed==1)
					{
						$edit_id=$_POST['edit_id'];
						$data['edit_id']=$edit_id;
     					$data['sizeeditview']=$this->adminmodel->sizeeditview($edit_id);
						header('Location: '.SITE_URL.'managesize?edit=1&value=2&flg=1');exit;

					}
					else
					{
						header('Location: '.SITE_URL.'managesize?succ=1');exit;

					}

				}
		$data['search_size'] = $search_size[0];
		$data['count'] = $search_size[1];
		$data['size_name']=$size_name;
				$data['status_id']=$status_id;

		$data['statuss']=$this->adminmodel->getproductstatusdetails();

		
	    $this->load->view('admin/managesize',$data);
	}

	public function addnewsize()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		if(isset($_POST['submit']))
		{
		    $size_name=$_POST['size_name'];
		    		
			$existed=$this->adminmodel->insert_size($size_name);

			if($existed==1)
			{
			header('Location: '.SITE_URL.'managesize?flg=1&value=1');exit;
			}
			else
			{
				header('Location: '.SITE_URL.'managesize?succ=1');exit;
			}		
		}
	}



public function managetype()
	{	
	if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}	
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchtype']))
		{
			$_SESSION['itemcat_id']=@$_POST['itemcat_id'];
		$_SESSION['status_id']=@$_POST['status_id'];

		}
		else if(!isset($_REQUEST['start']))
		{
			unset($_SESSION['itemcat_id']);
						unset($_SESSION['status_id']);

		}
		$itemcat_id=@$_SESSION['itemcat_id'];
				$status_id=@$_SESSION['status_id'];


		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['itemcat_id']);
						unset($_SESSION['status_id']);

		}


		# Default Records Per Page - always 10
		$ob1 = new globalFunctions();
		$len = $ob1->getDefaultPerPageRecords();
		$page = 'managetype?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		

		$search_type = array();
		$search_type=$this->adminmodel->searchType($start,$len,$itemcat_id,$status_id);

		if(isset($_REQUEST['del']))
		{
			$type_id=@$_REQUEST['del'];

			$this->adminmodel->deactivatetype($type_id);
			header('Location: '.SITE_URL.'managetype?succ=4');exit;
		}
		if(isset($_REQUEST['activate']))
		{
			$cat_id=@$_REQUEST['activate'];
			//$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->activatetype($cat_id);
			header('Location: '.SITE_URL.'managetype?succ=3');exit;
		}

		

			
			if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['typeeditview']=$this->adminmodel->typeeditview($id);
					$data['edit_id']=$id;
					$_SESSION['s_type_id']=$id;
				}
				if(!empty($_REQUEST['edit']))
				{
					$data['typeeditview']=$this->adminmodel->typeeditview($_SESSION['s_type_id']);
					$data['edit_id']=$_SESSION['s_type_id'];
				}
				if(isset($_POST['submit']))	
				{
					
					$edit_id=$_POST['edit_id'];
					$type_name=$_POST['type_name'];
					$existed=$this->adminmodel->update_type_details($edit_id,$type_name);
					if($existed==1)
					{
						$edit_id=$_POST['edit_id'];
						$data['edit_id']=$edit_id;
     					$data['typeeditview']=$this->adminmodel->typeeditview($edit_id);
						header('Location: '.SITE_URL.'managetype?edit=1&value=2&flg=1');exit;

					}
					else
					{

						header('Location: '.SITE_URL.'managetype?succ=1');exit;

					}

				}

		$data['categories']=$this->adminmodel->getcategorydetails();
		$data['type']=$this->adminmodel->gettypedetails();

		$data['search_type'] = $search_type[0];
		$data['count'] = $search_type[1];
		$data['itemcat_id']=$itemcat_id;
		$data['status_id']=$status_id;

		$data['statuss']=$this->adminmodel->getproductstatusdetails();
		
	    $this->load->view('admin/managetype',$data);
	}
	

	public function addnewtype()
	{
		
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		if(isset($_POST['submit']))
		{
		    $type_name=$_POST['type_name']; 
		    		
			$existed=$this->adminmodel->insert_type($type_name);

			if($existed==1)
			{
			header('Location: '.SITE_URL.'managetype?flg=1&value=1');exit;
			}
			else
			{
				header('Location: '.SITE_URL.'managetype?succ=1');exit;
			}		
		}
	}

	



	public function managecategory()
	{	
	if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}	
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchcategory']))
		{
			$_SESSION['category_name']=@$_POST['category_name'];
			$_SESSION['status_id']=@$_POST['status_id'];
			$_SESSION['category_id']=@$_POST['category_id'];

		}
		else if(!isset($_REQUEST['start']))
		{
			unset($_SESSION['category_name']);
			unset($_SESSION['status_id']);
			unset($_SESSION['category_id']);

		}
		$category_name=@$_SESSION['category_name'];
		$status_id=@$_SESSION['status_id'];
		$category_id=@$_SESSION['category_id'];

		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['category_name']);
			unset($_SESSION['status_id']);
			unset($_SESSION['category_id']);

		}
		if(isset($_REQUEST['del']))
		{
			$cat_id=@$_REQUEST['del'];

			$this->adminmodel->deactivatecategory($cat_id);
			header('Location: '.SITE_URL.'managecategory?succ=4');exit;
		}
		if(isset($_REQUEST['activate']))
		{
			$cat_id=@$_REQUEST['activate'];
			//$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->activatecategory($cat_id);
			header('Location: '.SITE_URL.'managecategory?succ=3');exit;
		}


		# Default Records Per Page - always 10
		$ob1 = new globalFunctions();
		$len = $ob1->getDefaultPerPageRecords();
		$page = 'managecategory?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		

		$search_category = array();
		$search_category=$this->adminmodel->searchcategory($start,$len,$category_name,$status_id,$category_id);

		

			
			if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['categoryeditview']=$this->adminmodel->categoryeditview($id);
					$data['edit_id']=$id;
					$_SESSION['s_category_id']=$id;
				}
				if(!empty($_REQUEST['edit']))
				{
					$data['categoryeditview']=$this->adminmodel->categoryeditview($_SESSION['s_category_id']);
					$data['edit_id']=$_SESSION['s_category_id'];
				}
				if(isset($_POST['submit']))	
				{
					
					$txt_image = @$_POST['txt_image'];
					

					$obj1 = new globalFunctions();
					if($_FILES['image']['name']=='') 
					{ 
						$image=$txt_image;  
					} 
					else
					{
					
						if(@$_FILES['image']['name']!='') 
						{
							$filename1=$_FILES['image']['name'];
							$time=date("Ymdhis");
							$flenme1=explode(".",$filename1);
							$extension=$flenme1[count($flenme1)-1]; 
							$image=$time.".".$extension;  
							$targetpath=$obj1->_component_image_path().$image;
							move_uploaded_file($_FILES['image']['tmp_name'],$targetpath);
						}
					}
					

					$edit_id=$_POST['edit_id'];
					$category_name=$_POST['category_name'];
					$existed=$this->adminmodel->update_category_details($edit_id,$category_name,$image);
					if($existed==1)
					{
						$edit_id=$_POST['edit_id'];
						$data['edit_id']=$edit_id;
     					$data['categoryeditview']=$this->adminmodel->categoryeditview($edit_id);
						header('Location: '.SITE_URL.'managecategory?edit=1&value=2&flg=1');exit;

					}
					else
					{
						header('Location: '.SITE_URL.'managecategory?succ=2s');exit;

					}

				}

	

		$data['search_category'] = $search_category[0];
		$data['count'] = $search_category[1];
		$data['category_name']=$category_name;
		$data['status_id']=$status_id;
		$data['category_id']=$category_id;

		$data['statuss']=$this->adminmodel->getproductstatusdetails();
		$data['cat']=$this->adminmodel->getproductcatdetails();
		
	    $this->load->view('admin/managecategory',$data);
	}
	public function addnewcategory()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		if(isset($_POST['submit']))
		{
		    $category_name=$_POST['category_name'];
		/*    $cat_title=$_POST['cat_title'];
		    $cat_subtitle=$_POST['cat_subtitle'];*/

		   // $category_id=$_POST['category'];

		    $txt_image = @$_POST['txt_image'];


			$obj1 = new globalFunctions();
			
			if(@$_FILES['image']['name']!='') 
			{
				$filename1=$_FILES['image']['name'];
				$time=date("YmdHis");
				$flenme1=explode(".",$filename1);
				$extension=$flenme1[count($flenme1)-1]; 
				$image=$time.".".$extension;  
				$targetpath=$obj1->_component_image_path().$image;
				move_uploaded_file($_FILES['image']['tmp_name'],$targetpath);
			}
					

		    		
			$existed=$this->adminmodel->insert_category($category_name,@$image);

			if($existed==1)
			{
			header('Location: '.SITE_URL.'managecategory?flg=1&value=1');exit;
			}
			else
			{
				header('Location: '.SITE_URL.'managecategory?succ=1');exit;
			}		
		}
	}

	public function managesubcategory()
	{	
	if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}	
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchsubcat']))
			{
			$_SESSION['category_id']=@$_POST['category_name'];
			$_SESSION['subcategory_id']=@$_POST['subcategory_name'];
			$_SESSION['status_id']=@$_POST['status_id'];	
	
			}
			else if(!isset($_REQUEST['start']))
			{
				unset($_SESSION['category_id']);
				unset($_SESSION['subcategory_id']);	
								unset($_SESSION['status_id']);	

			}



			if(isset($_REQUEST['reset']))
			{
				
				unset($_SESSION['category_id']);
				unset($_SESSION['subcategory_id']);
								unset($_SESSION['status_id']);

			}
			$category_id=@$_SESSION['category_id'];
			$subcategory_id=@$_SESSION['subcategory_id'];
			$status_id=@$_SESSION['status_id'];



		# Default Records Per Page - always 10
		$ob1 = new globalFunctions();
		$len = $ob1->getDefaultPerPageRecords();
		$page = 'managesubcat?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		

		$search_subcat = array();
		$search_subcat=$this->adminmodel->searchsubcat($start,$len,$category_id,$subcategory_id,$status_id);

		

					if(isset($_REQUEST['del']))
		{
			$subcat_id=@$_REQUEST['del'];

			$this->adminmodel->deactivatesubcategory($subcat_id);
			header('Location: '.SITE_URL.'managesubcat?succ=4');exit;
		}
		if(isset($_REQUEST['activate']))
		{
			$subcat_id=@$_REQUEST['activate'];
			//$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->activatesubcategory($subcat_id);
			header('Location: '.SITE_URL.'managesubcat?succ=3');exit;
		}
			if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['subcateditview']=$this->adminmodel->subcateditview($id);
					$data['edit_id']=$id;
					$_SESSION['s_subcat_id']=$id;
				}
				if(!empty($_REQUEST['edit']))
				{
					$data['subcateditview']=$this->adminmodel->subcateditview($_SESSION['s_subcat_id']);
					$data['edit_id']=$_SESSION['s_subcat_id'];
				}
				if(isset($_POST['submit']))	
				{
					$txt_image = @$_POST['txt_image'];
					


					$obj1 = new globalFunctions();
					if($_FILES['image']['name']=='') 
					{ 
						$image=$txt_image;  
					} 
					else
					{
					
						if(@$_FILES['image']['name']!='') 
						{
							$filename1=$_FILES['image']['name'];
							$time=date("Ymdhis").'-1';
							$flenme1=explode(".",$filename1);
							$extension=$flenme1[count($flenme1)-1]; 
							$image=$time.".".$extension;  
							$targetpath=$obj1->_component_image_path().$image;
							move_uploaded_file($_FILES['image']['tmp_name'],$targetpath);
						}
					}

					$txt_image2 = @$_POST['txt_image2'];


					if($_FILES['image']['name']=='') 
					{ 
						$image2=$txt_image2;  
					}
					else
					{
						if(@$_FILES['image2']['name']!='') 
						{
							$filename2=$_FILES['image2']['name'];
							$time=date("Ymdhis").'-2';
							$flenme2=explode(".",$filename2);
							$extension=$flenme2[count($flenme2)-1]; 
							$image2=$time.".".$extension;  
							$targetpath=$obj1->_component_image_path().$image2;
							move_uploaded_file($_FILES['image2']['tmp_name'],$targetpath);
						}
					}


					$edit_id=$_POST['edit_id'];
					//$category_id=$_POST['category_name'];
					$subcat_name=$_POST['subcat_name'];
					$existed=$this->adminmodel->update_subcat_details($edit_id,$subcat_name,$image,$image2);
					if($existed==1)
					{
						$edit_id=$_POST['edit_id'];
						$data['edit_id']=$edit_id;
     					$data['subcateditview']=$this->adminmodel->subcateditview($edit_id);
						header('Location: '.SITE_URL.'managesubcat?edit=1&value=2&flg=1');exit;

					}
					else
					{
							if($existed==3)
						{
							$edit_id=$_POST['edit_id'];
							$data['edit_id']=$edit_id;
	     					$data['subcateditview']=$this->adminmodel->subcateditview($edit_id);
							header('Location: '.SITE_URL.'managesubcat?edit=1&value=2&flg=2');exit;

						}
							else
							{
							header('Location: '.SITE_URL.'managesubcat?succ=1');exit;
							}
					}

				}
		$fillsubcategory = array();
		$fillsubcategory = $this->adminmodel->getSubcategorySearch($category_id);

		$data['categories']=$this->adminmodel->getaddcategorydetails();
		$data['subcategories']=$this->adminmodel->getsubcategorydetails();
		$data['type']=$this->adminmodel->gettypedetails();
			$data['category_id']=$category_id;
		$data['subcategory_id']=$subcategory_id;

		 $data['fillsubcategory'] = $fillsubcategory[0];
		$data['subcategoryCountSearch'] = $fillsubcategory[1];
		$data['status_id']=$status_id;

		$data['statuss']=$this->adminmodel->getproductstatusdetails();

		$data['search_subcat'] = $search_subcat[0];
		$data['count'] = $search_subcat[1];
		
	    $this->load->view('admin/managesubcat',$data);
	}
	public function addnewsubcategory()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		if(isset($_POST['submit']))
		{
		    $subcat_name=$_POST['subcat_name'];
		    $category_id=$_POST['category'];
		   
		     
		   // $category_id=$_POST['category'];

		    $txt_image = @$_POST['txt_image'];


			$obj1 = new globalFunctions();
			
			if(@$_FILES['image']['name']!='') 
			{
				$filename1=$_FILES['image']['name'];
				$time=date("YmdHis").'-1';
				$flenme1=explode(".",$filename1);
				$extension=$flenme1[count($flenme1)-1]; 
				$image=$time.".".$extension;  
				$targetpath=$obj1->_component_image_path().$image;
				move_uploaded_file($_FILES['image']['tmp_name'],$targetpath);
			}
			
		    		
		    		$txt_image2 = @$_POST['txt_image2'];


			
			if(@$_FILES['image2']['name']!='') 
			{
				$filename2=$_FILES['image2']['name'];
				$time=date("Ymdhis").'-2';
				$flenme2=explode(".",$filename2);
				$extension=$flenme2[count($flenme2)-1]; 
				$image2=$time.".".$extension;  
				$targetpath=$obj1->_component_image_path().$image2;
				move_uploaded_file($_FILES['image2']['tmp_name'],$targetpath);
			}

			


			$existed=$this->adminmodel->insert_subcat($subcat_name,$category_id,$image,@$image2);

			if($existed==1)
			{
			header('Location: '.SITE_URL.'managesubcat?flg=1&value=1');exit;
			}
			else
			{
				header('Location: '.SITE_URL.'managesubcat?succ=1');exit;
			}		
		}
	}


public function managerelation()
	{	
	if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}	
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchrelation']))
		{
			$_SESSION['subcat_id']=@$_POST['subcat_id'];
			$_SESSION['itemcat_id']=@$_POST['itemcat_id'];
						$_SESSION['status_id']=@$_POST['status_id'];


		}
		else if(!isset($_REQUEST['start']))
		{
			unset($_SESSION['subcat_id']);
			unset($_SESSION['itemcat_id']);
						unset($_SESSION['status_id']);

		}
			

		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['subcat_id']);
			unset($_SESSION['itemcat_id']);
						unset($_SESSION['status_id']);

		}

			$subcat_id=@$_SESSION['subcat_id'];
		$itemcat_id=@$_SESSION['itemcat_id'];
				$status_id=@$_SESSION['status_id'];

				if(isset($_REQUEST['del']))
		{
			$itemsubcat_id=@$_REQUEST['del'];

			$this->adminmodel->deactivaterelation($itemsubcat_id);
			header('Location: '.SITE_URL.'managerelation?succ=4');exit;
		}
		if(isset($_REQUEST['activate']))
		{
			$itemsubcat_id=@$_REQUEST['activate'];
			//$user_name=@$_REQUEST['user_name'];
			$this->adminmodel->activaterelation($itemsubcat_id);
			header('Location: '.SITE_URL.'managerelation?succ=3');exit;
		}



		# Default Records Per Page - always 10
		$ob1 = new globalFunctions();
		$len = $ob1->getDefaultPerPageRecords();
		$page = 'managerelation?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		

		$search_relation = array();
		$search_relation=$this->adminmodel->searchrelation($start,$len,$subcat_id,$itemcat_id,$status_id);

		

			
			if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['relationeditview']=$this->adminmodel->relationeditview($id);
					$data['edit_id']=$id;
					$_SESSION['s_relation_id']=$id;
				}
				if(!empty($_REQUEST['edit']))
				{
					$data['relationeditview']=$this->adminmodel->relationeditview($_SESSION['s_relation_id']);
					$data['edit_id']=$_SESSION['s_relation_id'];
				}
				if(isset($_POST['submit']))	
				{
					
					$edit_id=$_POST['edit_id'];
					//$type_name=$_POST['type_name'];
					$subcat_id=$_POST['subcategory_name'];
					$itemcat_id=$_POST['type_name'];
					$existed=$this->adminmodel->update_relation_details($edit_id,$subcat_id,$itemcat_id);
					if($existed==1)
					{
						$edit_id=$_POST['edit_id'];
						$data['edit_id']=$edit_id;
     					$data['relationeditview']=$this->adminmodel->typeeditview($edit_id);
						header('Location: '.SITE_URL.'managerelation?edit=1&value=2&flg=1');exit;

					}
					else
					{
						header('Location: '.SITE_URL.'managerelation?succ=1');exit;

					}

				}

		$data['subcategories']=$this->adminmodel->getadddropdownsubcategorydetails();
		$data['types']=$this->adminmodel->getadddropdowntypedetails();

		$data['search_relation'] = $search_relation[0];
		$data['count'] = $search_relation[1];
		$data['subcat_id']=$subcat_id;
		$data['itemcat_id']=$itemcat_id;
		$data['status_id']=$status_id;

		$data['statuss']=$this->adminmodel->getproductstatusdetails();
		//$data['type_name']=$type_name;
		
	    $this->load->view('admin/managerelation',$data);
	}
	

	public function addnewrelation()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		if(isset($_POST['submit']))
				{
				    $subcat_id=$_POST['subcat_id'];
				    $itemcat_id=$_POST['itemcat_id'];
				    		
					$existed=$this->adminmodel->insert_typerelation($itemcat_id,$subcat_id);

					if($existed==1)
					{
					header('Location: '.SITE_URL.'managerelation?flg=1&value=1');exit;
					}
					else
					{
						header('Location: '.SITE_URL.'managerelation?succ=1');exit;
					}		
				}
	}








	public function get_Subcategory_by_categoryId()
	{
			$category_id=@$_POST['category_id'];

			$this->adminmodel->getSubcategorybycategoryId($category_id);


	}

	public function addp_get_Subcategory_by_categoryId()
	{
			$category_id=@$_POST['category_id'];

			$this->adminmodel->addp_getSubcategorybycategoryId($category_id);


	}

	public function addkurtis()
	{

if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		$data['nestedView']['js_includes'] = array('hibiscus/product_number.js','hibiscus/discount.js',);
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchProduct']))
		{
			$_SESSION['product_number']=@$_POST['product_number'];
			$_SESSION['color']=@$_POST['color_name'];
			$_SESSION['size']=@$_POST['size_name'];
			$_SESSION['discount']=@$_POST['discount'];
			$_SESSION['price']=@$_POST['price'];
			$_SESSION['description']=@$_POST['description'];
			$_SESSION['category_id']=@$_POST['category_name'];
			$_SESSION['subcategory_id']=@$_POST['subcategory_name'];
			$_SESSION['status_id']=@$_POST['status_id'];

		}
		else if(!isset($_REQUEST['start']))

		{

			unset($_SESSION['product_number']);
			unset($_SESSION['color']);
			unset($_SESSION['size']);
			unset($_SESSION['discount']);
			unset($_SESSION['price']);
			unset($_SESSION['description']);
			unset($_SESSION['category_id']);
			unset($_SESSION['subcategory_id']);
			unset($_SESSION['status_id']);

		}
		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['product_number']);
			unset($_SESSION['color']);
			unset($_SESSION['size']);
			unset($_SESSION['discount']);
			unset($_SESSION['price']);
			unset($_SESSION['description']);
			unset($_SESSION['category_id']);
			unset($_SESSION['subcategory_id']);
			unset($_SESSION['status_id']);

		}
		$product_number=@$_SESSION['product_number'];
		$color=@$_SESSION['color'];
		$size=@	$_SESSION['size'];
		$discount=@$_SESSION['discount'];
		$price=@$_SESSION['price'];
		$description=@$_SESSION['description'];
		$category_id=@$_SESSION['category_id'];
		$subcategory_id=@$_SESSION['subcategory_id'];
		$status_id=@$_SESSION['status_id'];
/*		echo $category_id;
		exit;*/


		# Default Records Per Page - always 10
		$ob = new globalFunctions();
		$len = $ob->getDefaultPerPageRecords();
		$page = 'addkurtis?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;

		$fillsubcategory = array();
		$fillsubcategory = $this->adminmodel->getSubcategorySearch($category_id);

		$search_products = array();
		$search_products=$this->adminmodel->searchproductlist($start,$len,$category_id,$subcategory_id,$description,$product_number,$color,$size,$discount,$price,$status_id);

		$data['category']=$this->adminmodel->getaddcategorydetails();
		$data['type']=$this->adminmodel->gettypedetails();
		$data['colors']=$this->adminmodel->getcolordetails();
		$data['sizes']=$this->adminmodel->getsizedetails();
		$data['categories']=$this->adminmodel->getcategorydetails();
		$data['subcategories']=$this->adminmodel->getsubcategorydetails();
		$data['statuss']=$this->adminmodel->getproductstatusdetails();


		if(!empty($_REQUEST['val']))
			{
				$id = $_REQUEST['val'];

				$data['productTypeList']=$this->adminmodel->productTypeList($id);
				$data['edit_id']=$id;
			}
		if(isset($_POST['submit']))	
		{
			$txt_image = @$_POST['txt_image'];


					if($_FILES['image']['name']=='') 
					{ 

						$image=$txt_image;  
					} 
					else
					{
					
						if(@$_FILES['image']['name']!='') 
						{
							$filename1=$_FILES['image']['name'];
							$time=date("Ymdhis");
							$flenme1=explode(".",$filename1);
							$extension=$flenme1[count($flenme1)-1]; 
							$image=$time.".".$extension;  
							$targetpath=$ob->_component_image_path().$image;
							move_uploaded_file($_FILES['image']['tmp_name'],$targetpath);
						}
					}
					
			$actual_price=$_POST['actual_price'];
			$product_name=$_POST['product_name'];
			$description=$_POST['description'];
			$discount=$_POST['discount'];
			$price_after_discount=$_POST['price_after_discount'];
				
			$edit_id=$_POST['edit_id'];
			$quantity=$_POST['quantity'];
			$min_quantity=$_POST['min_quantity'];
			$this->adminmodel->editProductCostAndPrice($product_name,$description,$actual_price,$discount,$price_after_discount,$edit_id,$quantity,$min_quantity,$image);

			header('Location: '.SITE_URL.'addkurtis?succ=2');exit;
		}
	    if(isset($_REQUEST['del']))
	    {
	      $id=@$_REQUEST['del'];
	      $this->adminmodel->inactivatebatch($id);
	      header('Location: '.SITE_URL.'addkurtis');exit;
	    }
		if(isset($_REQUEST['activate']))
		    {
		      $id=@$_REQUEST['activate'];
		      $this->adminmodel->activatebatch($id);
		      header('Location: '.SITE_URL.'addkurtis');exit;
		    }

        $data['fillsubcategory'] = $fillsubcategory[0];
		$data['subcategoryCountSearch'] = $fillsubcategory[1];



         $notification=array();
		$notification=$this->adminmodel->getallnotifications($start,$len);
		
		$data['notifications_data'] = $notification[0];
		$data['notifications_count'] = $notification[1];




		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		$data['price']=$price;
		$data['discount']=$discount;
		$data['product_number']=$product_number;
		$data['category_id']=$category_id;
		$data['subcategory_id']=$subcategory_id;
		$data['color']=$color;
		$data['size']=$size;
		$data['description']=$description;
		$data['status_id']=$status_id;
		
		$data['search_products'] = $search_products[0];
		$data['count'] = $search_products[1];

		$this->load->view('addkurtis',$data);		
	}
	public function notification()
		{

if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
			$data['nestedView']['js_includes'] = array('hibiscus/discount.js',);
		$data['nestedView']['css_includes'] = array();
		$ob = new globalFunctions();
		$len = $ob->getDefaultPerPageRecords();
		$page = 'notification?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;
		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;

		$notification=array();
		$notification=$this->adminmodel->getallnotifications($start,$len);
		
		$data['notifications_data'] = $notification[0];
		$data['notifications_count'] = $notification[1];

		if(!empty($_REQUEST['val']))
				{
					$id = $_REQUEST['val'];

					$data['productTypeList']=$this->adminmodel->productTypeList($id);
					$data['edit_id']=$id;
				}
			/*if(isset($_POST['submit']))	
			{
				

				
				$edit_id=$_POST['edit_id'];
				$quantity=$_POST['quantity'];
				$min_quantity=$_POST['min_quantity'];
				$this->adminmodel->notificationEdit($edit_id,$quantity,$min_quantity);

				//header('Location: '.SITE_URL.'notification');exit;
			}*/
			if(isset($_POST['submit']))	
		{
			$txt_image = @$_POST['txt_image'];


					if($_FILES['image']['name']=='') 
					{ 

						$image=$txt_image;  
					} 
					else
					{
					
						if(@$_FILES['image']['name']!='') 
						{
							$filename1=$_FILES['image']['name'];
							$time=date("Ymdhis");
							$flenme1=explode(".",$filename1);
							$extension=$flenme1[count($flenme1)-1]; 
							$image=$time.".".$extension;  
							$targetpath=$ob->_component_image_path().$image;
							move_uploaded_file($_FILES['image']['tmp_name'],$targetpath);
						}
					}
					
			$actual_price=$_POST['actual_price'];
			$product_name=$_POST['product_name'];
			$description=$_POST['description'];
			$discount=$_POST['discount'];
			$price_after_discount=$_POST['price_after_discount'];
				
			$edit_id=$_POST['edit_id'];
			$quantity=$_POST['quantity'];
			$min_quantity=$_POST['min_quantity'];
			$this->adminmodel->editProductCostAndPrice($product_name,$description,$actual_price,$discount,$price_after_discount,$edit_id,$quantity,$min_quantity,$image);

			header('Location: '.SITE_URL.'notification?succ=1');exit;
		}
			    if(isset($_REQUEST['del']))
			    {
			      $id=@$_REQUEST['del'];
			      $this->adminmodel->inactivatebatch($id);
			      header('Location: '.SITE_URL.'notification');exit;
			    }
	

		

		
		$this->load->view('notification',$data);		
	}

	public function submitaddkurtis()

	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();		
		if(isset($_POST['submit']))
		{
			//$itemdetails_id=@$_POST[''];
			$product_number=$_POST['product_number'];
			$product_name=$_POST['product_name'];

			$category_id=$_POST['category'];
			$subcategory_id=$_POST['sub_category'];
			$itemcategory_id=$_POST['type'];
			$color_id=$_POST['color_name'];
		if($subcategory_id==5)
			{
				$size_id=$_POST['size_name'];
			}
			else
			{
				$size_id = ($category_id==2)?1:$_POST['size_name'];
			}	
			$price=$_POST['actual_price'];
			$discount=$_POST['discount'];
			$price_after_discount=$_POST['price_after_discount'];
			$description=$_POST['description'];
			$min_quantity=$_POST['min_quantity'];
			$quantity=$_POST['quantity'];
			$txt_image = @$_POST['txt_image'];


			$obj1 = new globalFunctions();
			if(empty($itemdetails_id))
			{

			if(@$_FILES['image']['name']!='') 
			{
				$filename1=$_FILES['image']['name'];
				$time=date("Ymdhis");
				$flenme1=explode(".",$filename1);
				$extension=$flenme1[count($flenme1)-1]; 
				$image=$time.".".$extension;  
				$targetpath=$obj1->_component_image_path().$image;
				move_uploaded_file($_FILES['image']['tmp_name'],$targetpath);
			}
					
			$this->adminmodel->insert_item_subcategory_id($product_number,$product_name,$subcategory_id,$itemcategory_id,$color_id,$size_id,$price,$discount,$price_after_discount,$description,$min_quantity,$quantity,@$image);

	     	header('Location: '.SITE_URL.'addkurtis?succ=1');exit;
	     }

		}

	}

	public function productnumberautofill()
	{

    $this->adminmodel->productnumberautofill();


	}

	

	
	public function addp_get_type_by_SubcategoryId()
	{
			$subcategory_id=@$_POST['subcategory_id'];

			$this->adminmodel->addp_getTypeBySubCategoryId($subcategory_id);


	}

	public function manageorders()
	{
		if(!isset($_SESSION['role_id']) )
			{
				header('Location: '.SITE_URL.'products');exit;		
			}
			else
			{
				if(@$_SESSION['role_id']==2)
				{
				header('Location: '.SITE_URL.'products');exit;	
				}
			}

		$data['nestedView']['js_includes'] = array('hibiscus/product_number.js',);
		$data['nestedView']['css_includes'] = array();

		 if(isset($_POST['searchOrder']))
		{
			$_SESSION['order_number']=@$_POST['order_number'];
			$_SESSION['status_id']=@$_POST['status_id'];
			$_SESSION['phone_number']=@$_POST['phone_number'];
			$_SESSION['customer_name']=@$_POST['customer_name'];
			$_SESSION['ordered_date']=@$_POST['ordered_date'];
			$_SESSION['ordered_date2']=@$_POST['ordered_date2'];		

		}
		else if(!isset($_REQUEST['start']))
		{
			unset($_SESSION['order_number']);
			unset($_SESSION['status_id']);
			unset($_SESSION['phone_number']);
			unset($_SESSION['customer_name']);
			unset($_SESSION['ordered_date']);
			unset($_SESSION['ordered_date2']);
		}
		if(isset($_REQUEST['reset']))
		{
			unset($_SESSION['order_number']);
			unset($_SESSION['status_id']);
			unset($_SESSION['phone_number']);
			unset($_SESSION['customer_name']);
			unset($_SESSION['ordered_date']);
			unset($_SESSION['ordered_date2']);
		}
		//$order_number=@$_SESSION['order_number'];
		$status_id=@$_SESSION['status_id'];
		$phone_number=@	$_SESSION['phone_number'];
		$customer_name=@$_SESSION['customer_name'];
		$ordered_date=@$_SESSION['ordered_date'];
		$ordered_date2=@$_SESSION['ordered_date2'];

		/*echo $ordered_date;
		exit;*/
		$order_number=@$_SESSION['order_number'];
		$page='export_orders'; $i=1; $params_str = '';
		$dparams = array('order_number'=>@$order_number,'status_id'=>@$status_id,'phone_number'=>@$phone_number,'customer_name'=>@$customer_name,'ordered_date'=>@$ordered_date,'ordered_date2'=>@$ordered_date2);
		foreach($dparams as $key=>$value)
		{

			if($i==1)
			{
				$params_str.='?'.$key.'='.$value;

			}
			else
			{
				$params_str.='&'.$key.'='.$value;
			}
			$i++;
		}
		$data['download_path']=$page.$params_str;


		$ob = new globalFunctions();
		$len = $ob->getDefaultPerPageRecords();
		$page = 'manageorders?l=1';
		$start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;


		$search_orders = array();
		$search_orders=$this->adminmodel->searchOrderlist($start,$len,$order_number,$status_id,$customer_name,$phone_number,$ordered_date,$ordered_date2);

		
		$data['statuss']=$this->adminmodel->getOrderStatusDetails();


		if(!empty($_REQUEST['val']))
			{
				$id = $_REQUEST['val'];
				$data['order_id']=$_REQUEST['order_id'];
				$data['orderdetails']=$this->adminmodel->orderDetails($id);
				
			}
		
	    if(isset($_REQUEST['delivery']))
	    {
	      $id=@$_REQUEST['delivery'];
	      $this->adminmodel->deliverProduct($id);
	      header('Location: '.SITE_URL.'manageorders');exit;
	    }
		$data['len'] = $len;
		$data['page'] = $page;
		$data['start'] = $start;
		
		$data['order_number']=$order_number;
		$data['phone_number']=$phone_number;
		$data['status_id']=$status_id;
		$data['customer_name']=$customer_name;
				$data['ordered_date']=$ordered_date;
								$data['ordered_date2']=$ordered_date2;


		
		$data['search_orders'] = $search_orders[0];
		$data['count'] = $search_orders[1];
		
	
		$this->load->view('admin/manageorders',$data);
	}








}
?>
