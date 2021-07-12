<?php 
//require_once (__DIR__).'/../libraries/globalFunctions.php';
//require_once (__DIR__).'/../libraries/curl-operations.php';

class user extends CI_Controller {
	public function login()
	{
		
		$data['nestedView']['heading']="Hibiscus Home Page ";
		
		$data['nestedView']['cur_page'] = '';
		$data['nestedView']['parent_page'] = '';
		

		
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();	
		$data['nestedView']['pageTitle'] = 'Home Page';

		if(isset($_POST['submit']))
		{
			
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
		
				// getting of  employee Id 
			$user_ids = $this->loginmodel->user_login($user_name,$password);
			@$_SESSION['user_id']=$user_ids[0]->user_id;


			//echo $_SESSION['user_id'];exit;
			
			if(@$_SESSION['user_id'])
			{
					//getting of user details
				$details = $this->loginmodel->user_details($_SESSION['user_id']);
				@$_SESSION['user_id'] = $details[0]->user_id;
				@$_SESSION['user_name']=$details[0]->user_name;
				//$_SESSION['name'] = $details[0]->first_name;

				if($details[0]->role_id == 1|| $details[0]->role_id == 2)
				{
					if($details[0]->role_id == 1) 
					{
						@$_SESSION['role_id'] =$details[0]->role_id;
						@$_SESSION['role_name'] = 'admin';
					}
					else
					{
						
								@$_SESSION['role_id'] = $details[0]->role_id;

								@$_SESSION['role_name'] = 'customer';

					} 
				}
				
				
				if($_SESSION['role_id']==1)
				{
				header('Location: '.SITE_URL.'home');exit;
				}
				else
				{
				$cur_page= $this->input->post('current_page',true);
				header('Location: '.$cur_page);exit;
				}

				
			}
			else
			{
				
				$this->session->set_flashdata('login_failed','please enter valid user ID and password');
				$this->session->set_userdata(array('login_error'=>1));
				$cur_page= $this->input->post('current_page',true);
				header('Location: '.$cur_page);exit;
				
			} 

		}
				
		else
		{

			/* get all categories*/	
		$products = $this->product_model->get_cat_items();
		$data['products'] = $products[0];

		/* get all salwars*/	
		$salwars = $this->product_model->get_salwars();
		$data['salwars'] = $salwars[0];

		/* get all kurties*/	
		$kurties = $this->product_model->get_kurties();
		$data['kurties'] = $kurties[0];

		/* get all leggings*/	
		$leggings = $this->product_model->get_leggings();
		$data['leggings'] = $leggings[0];

		/* get all earrings*/	
		$earrings = $this->product_model->get_earrings();
		$data['earrings'] = $earrings[0];

		/* get all bangles*/	
		$bangles = $this->product_model->get_bangles();
		$data['bangles'] = $bangles[0];

		/* get all bangles*/	
		$necklace = $this->product_model->get_necklace();
		$data['necklace'] = $necklace[0];

		/* get all sub categories*/	
		$subcategory = $this->product_model->get_subcat_items();
		$data['subcategory'] = $subcategory[0];

		$data['nestedView']['pageTitle'] = 'Hibiscus Fashion | Home';

		$this->load->view('products/all_products',$data);
		} 
	}

	public function register()
	{
		$data['nestedView']['heading']="Hibiscus Home Page ";
		
		$data['nestedView']['cur_page'] = '';
		$data['nestedView']['parent_page'] = '';
		

		
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();	
		$data['nestedView']['pageTitle'] = 'Home Page';

		if(isset($_POST['submit']))
		{
			$dat=array(
				'user_name'=>$_POST['user_name'],
				'password'=>$_POST['password'],
				'role_id'=>2,
				'email'=>$_POST['email_id'],
								'phone_number'=>$_POST['phone_number']

				);
			$user_name=$_POST['user_name'];
		    $password=$_POST['password'];
		    $email=$_POST['email_id'];
		    $phone_number=$_POST['phone_number'];

			$count=$this->loginmodel->count($user_name,$password);
			$count1=$this->loginmodel->count1($email);
			if($count==1)
			{
                header('Location: '.SITE_URL.'account?flg=1');exit;
                
			}
			elseif($count1==1)
			{
                 header('Location: '.SITE_URL.'account?flg=5');exit;
			}
			else
			{
             $this->loginmodel->create_users($dat);
              header('Location: '.SITE_URL.'account?flg=2');exit;
              
			}
			
		}

	}



	public function change_password()
	{
		if(isset($_POST['submit']))
		{
			$user_name=$_POST['user_name'];


			//getting user name from database
			$user_ids = $this->loginmodel->forgot_login($user_name);
			@$_SESSION['users_id']=$user_ids[0]->user_id;

			if(@$_SESSION['users_id'])
			{
					//getting of user details
				$details = $this->loginmodel->user_details($_SESSION['users_id']);
				@$_SESSION['users_id'] = $details[0]->user_id;
				@$_SESSION['users_name']=$details[0]->user_name;
				@$_SESSION['emails'] = $details[0]->email;


				$emails=@$_SESSION['emails'];

				 
  
  
  

      		$from='rajender.jakka@gmail.com';
        	$to=$emails; 
        	$body=  '<div class="alert alert-danger alert-white rounded">
                                                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                  <strong></strong> please register and log into your account before place to order!
                                                    <a href="'.SITE_URL.'reset_password?value='.@$_SESSION['users_id'].'">click here </a> 
                                               </div>';
  			 
  				$subject = "Password Reset";

        	
  				
        	$attachments=array('abc.png','xyx.png' );
         	 entransys_send_email($from, $to,$body, $cc=NULL, $bcc=NULL, $replyto=NULL, $subject,  $attachments);
          header('Location: '.SITE_URL.'account?flg=6');exit;
			

			}
			else
			{
				
				header('Location: '.SITE_URL.'forgot_password?flg=1');exit;
			} 

		}
	}

	public function reset_pwd()
	{
	if(isset($_POST['submit']))
	{
		$user_ids=$_POST['user_ids'];
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];
		if($password==$confirm_password)
		{
			$this->loginmodel->reset_password($user_ids,$password);
			header('Location: '.SITE_URL.'products?flg=1');exit;

		}
		else
		{
			header('Location: '.SITE_URL.'reset_password?flg=1');exit;
		}
	}
}

	public function signout()
	{
		$this->session->sess_destroy();
		
		redirect('login');
	}

}
?>