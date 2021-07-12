<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends CI_Controller
 {
 	public $paypal_data = '';
 	public $tax;
 	public $shipping;
 	public $total = 0;
 	public $grand_total;

 	/* Function for cart index*/
	public function index()
	{
		$this->load->view('cart/view_cart.php');
	}

	/* Function for add to cart */
	public function addTocart()
	{
		
          if(isset($_POST['submitItem']))
         	{    $total_price=0;
         		$user_id= @$_SESSION['user_id']; 
			     $item_id=@$_POST['item_id']; 
			     $discounted_price = @$_POST['discounted_price'];
				 $quantity = 1;

				 $total_price=$discounted_price*$quantity;

				 $status=7;
			
               $this->product_model->saveCart($user_id,$item_id,$total_price,$quantity,$status);
	        	$data['products']=$this->product_model->item_details($item_id,$user_id);
	        	$data['addresss']=$this->product_model->retreve_address($user_id);
	      

			    $this->load->view('cart/delivery_address.php',$data);

         	}
         	else if(isset($_POST['submit_cart']))
         	{
              $user_id= @$_SESSION['user_id']; 
			  $item_id=@$_POST['item_id']; 
			  $discounted_price = @$_POST['discounted_price'];
			  $quantity = 1;
			  $status=7;
			   $total_price=$discounted_price*$quantity;
			$this->product_model->saveCart($user_id,$item_id,$total_price,$quantity,$status);
             $cart_details = $this->product_model->retrieveItemDetails($user_id);
				 $data['cart_details'] = $cart_details[0];
	              $data['count'] = $cart_details[1];
				 $this->load->view('cart/customerCartSaveDetails.php',$data);

			     
         	}  
         
		}
		public function place_order()
		{
			if(isset($_POST['place_order']))
			{ 

               $user_id= @$_SESSION['user_id'];   
               if($user_id)
                {
		         
		        $data['products']=$this->product_model->cart_details($user_id);
		        $data['addresss']=$this->product_model->retreve_address($user_id);
	      

			    $this->load->view('cart/delivery_address.php',$data);
			     }
			}
		}

public function deliveryAddress()
	{
		if(isset($_POST['submit']))
		{  				     //inesrting data into database
			//echo "<pre>";
			//	print_r($_POST);
			//echo "</pre>";
			//die();	
		//	if(count($_POST['item_id']>0)){
			//	foreach ($_POST['item_id'] as $k1=>$value) {

				# code...
					$user_id = @$_SESSION['user_id'];
					$name = $_POST['name'];
					$zip_code = $_POST['pincode'];
					$address = $_POST['address'];
					$landmark = $_POST['landmark'];
					$city = $_POST['city'];
					$state=$_POST['state'];
					$country = $_POST['country'];
					$phone = $_POST['phone_no'];		
			
			
			
	         //for retreving of data based on item_id,user_id
		    $item_id=$_POST['item_id']; 
		   $its=$_POST['its'];


			//inserting
			$this->product_model->saveAddress($user_id,$name,$phone,$address,$city,$country,$landmark,$state,$zip_code);
			//retreving addressid from userinformation
			$add_id=$this->product_model->retreve_address($user_id);
			//inserting data into order detail
            $address_id=$add_id->address_id;
            $cart_id=$_POST['cart_id'];
             // updating quantity in item table
              foreach ($item_id as $k1 => $value) { 
              	$qty = $this->product_model->item_details(@$value,@$user_id);
		    	 $quantity = $qty[0]['quantity'];
		     	 $item_quantity=$qty[0]['item_quantity'];
		    	 $new_quantity=$item_quantity-$quantity;
		    	 $this->product_model->update_quantity($value,$new_quantity);

		    }
            
                   

                  
              if($its==2){
                     
                   foreach ($item_id as $k1 => $value) {        	# code...
                      

		    	$data['order_details']=$this->product_model->item_details(@$value,@$user_id);
               }
		         }
		    else{
		    	 
		    	 $data['order_details']=$this->product_model->cart_details(@$user_id);

		    }

           foreach($cart_id as $key  => $value ){
          //$id=$this->product_model->order_details($value,$address_id,$user_id);
           	$order_numbers[]=$this->product_model->order_details($value,$address_id,$user_id);
           $this->product_model->update_status($value,$item_id[$key],$user_id);
        }
       /* print_r($order_numbers);
        exit;*/
        $numbers=$this->product_model->retrieveOids($order_numbers);
       /* print_r($ids);
        exit;*/

		    //updating status in cart_detail based on itemid and userid
          

		     // retreving data basedon itemid and userid
        $email_id=$this->product_model->getemail_id($_SESSION['user_id']);
        $data['flg']=1;

       
        	$from='rajender.jakka@gmail.com';
        	$to=array('maruthibabu.tirupati@gmail.com',$email_id);
        	
        		$i = 0;
				$ids = '';
        	foreach ($numbers as $nos) 
			 	{ 
			 		if($i > 0) $ids .= ', ';  
					$ids .= $nos['order_number'];
					$i++;
			   	}
		$body='your order successful with order number- '.$ids;
	
        	

        	

        	$subject='My first Mail';
        	$attachments=array('abc.png','xyx.png' );
         	 entransys_send_email($from, $to,$body, $cc=NULL, $bcc=NULL, $replyto=NULL, $subject,  $attachments);
			$this->load->view('cart/order_summary.php',$data);
          
		}
		
	}
	
	

		public function deleteItem()
		{
			   # Delete Functionality
				if(isset($_REQUEST['del']))
				{						
						$cart_id=@$_REQUEST['del'];
				

						$this->product_model->deleteItem($cart_id);
		
			}  
            
                 $user_id = @$_SESSION['user_id'];

				 $cart_details = $this->product_model->retrieveItemDetails($user_id);
				 $data['cart_details'] = $cart_details[0];
	              $data['count'] = $cart_details[1];
				 $this->load->view('cart/customerCartSaveDetails.php',$data);
		}	
	
	public function view_cart_details()
	{
		$this->load->view('cart/customer_cart_details.php');

	}
	public function update_quantity()
	{
		if(isset($_POST['quantity']))
		{
			 $user_id = @$_SESSION['user_id'];
			 $quantity=@$_POST['quantity'];
			  $item_id=@$_POST['item_id'];
			 $discounted_price=@$_POST['discounted_price'];
			  $total_price=$discounted_price*$quantity;
			   // foreach($item_id as $key  => $value ){
          $this->product_model->update_qty($item_id,$quantity,$total_price,$user_id);
		//}
	}
}
	public function view_cart_details1()
	{
		if(@$_SESSION['role_name']=='')
         {
         	 header('Location: '.SITE_URL.'account?flg=4');exit;
         }
          else
         {
			$user_id = @$_SESSION['user_id'];
		  	$cart_details = $this->product_model->retrieveItemDetails($user_id);
		 	$data['cart_details'] = $cart_details[0];
	     	$data['count'] = $cart_details[1];
			$this->load->view('cart/customerCartSaveDetails.php',$data);
		}
	}

	function remove($rowid) 
	{
        // Check rowid value.
		$data = array();
			if ($rowid=="all")
			{
				// Destroy data which store in  session.
				$this->cart->destroy();
			}
			else
			{
               // Destroy selected rowid in session.			
				$data = array(
							'rowid'   => $rowid,
							'qty'     => 0
							);
            // Update cart data, after cancle.
			$this->cart->update($data);
			}	
        
		$this->load->view('cart/view_cart.php');
	}
	
	 public function update_cart()
	{                
        // Recieve post values,calcute them and update
        $cart_info =  $_POST['cart'] ;
 		foreach( $cart_info as $id => $cart)
		{	
		        $rowid = $cart['rowid'];
                $price = $cart['price'];
                $amount = $price * $cart['qty'];
                $qty = $cart['qty'];                    
                $data = array(
							'rowid'   => $rowid,
                            'price'   => $price,
                            'amount'  => $amount,
							'qty'     => $qty
						);            
             
			$this->cart->update($data);
		}
		$this->load->view('cart/view_cart.php');    
	}


	
	public function save_cart()
	{	

		if(@$_SESSION['role_name']=='')
         {
         	 header('Location: '.SITE_URL.'account?flg=4');exit;
         }
          else
         {
         	if(isset($_POST['save']))
			{		 
			     $user_id= @$_SESSION['user_id']; 
			     $id=@$_POST['id']; 
			     $category_id=@$_POST['category_id']; 
				$names = $_POST['name'];
				$descriptions = $_POST['description'];
				$prices = $_POST['price'];
				$qtys = $_POST['qty'];
				 $color_id=@$_POST['color_id']; 

			foreach ($names as $key => $value) 
			{ 
               
		
				//if($keys['id']&&$keys['category_id']!=$id[$key]&&$category_id[$key])
				//{
				$this->product_model->saveCart($value,$descriptions[$key],$prices[$key],$qtys[$key],$user_id,$id[$key],$category_id[$key],$color_id[$key]);
				$data['cartDetails'] = $this->product_model->cartDetails($value,$descriptions[$key],$prices[$key],$qtys[$key]);
              // }
            }
      //  }
        
			
		
			//print_r($name);exit();
			//$this->product_model->saveCart($name,$description,$price);
			//$data['cartDetails'] = $this->product_model->cartDetails($name,$description,$price);
	        $this->load->view('cart/customer_cart_details.php',$data);
	         }	
		     		 
	}
}
}
?>