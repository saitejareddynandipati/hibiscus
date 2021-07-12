<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (__DIR__).'/../libraries/globalFunctions.php';

class products extends CI_Controller
 {
 	/* function for landing page */
	public function items()
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

	/* function to get all sub item(clothing,accessories) */
	public function sub_items()
	{	
		/* get item id from url */
		if(isset($_REQUEST['value']))      
		{
			$_SESSION['subcat_id'] = $_REQUEST['value'];
		}
			$subcat_id = @$_SESSION['subcat_id'];

			$ob = new globalFunctions();
		    $len = $ob->getDefaultPerPageRecords();
		    $page = 'sub_items?l=1';
		    $start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;
		    # Two query results - Available store Locations details and count of rows - are returned
		   
		    $data['start'] = $start;
		    $data['length'] = $len;
		    $data['page'] = $page;

      		//to get colors
         	$data['colors']=$this->product_model->get_colors();
         		$data['latest'] =$this->product_model->searchbylatestdesigns($subcat_id);
         	
         	$data['popular'] =$this->product_model->searchbypopulardesigns($subcat_id);


         	
         	

		/* get all banner images*/	
		$sub_banner = $this->product_model->get_sub_banner($subcat_id);
		$data['sub_banner'] = $sub_banner[0];
		$data['count'] = $sub_banner[1];



		/* Get sub items */
		$sub_item_details = $this->product_model->sub_items_details($subcat_id,$start,$len);		
		$data['sub_item_details'] = $sub_item_details[0];
		$data['count'] = $sub_item_details[1];

		/* get all sub categories*/	
		$data['subcategory'] = $this->product_model->get_subitems();

		$this->load->view('products/subItems_view',$data);
	}

	/* function to get item details */
	public function item_details()
	{
		$subcat_id = @$_SESSION['subcat_id'];

		/* get product id from url */
		if(isset($_REQUEST['value']))      
		{
			$item_id = $_REQUEST['value'];
		}
		
		//to get colors
        $data['size']=$this->product_model->get_size();
                
		$data['item_details'] = $this->product_model->product_details($item_id);
		          


		  $data['qty']  =$this->product_model->product_details($item_id);

		//$data['sub_item_details'] = $this->product_model->sub_items_details($id);
		//$data['item_details'] = $item_details[0];
		$data['main_content'] = 'details';
		$this->load->view('products/item_details_view',$data);	
	}

	public function search()
	{
		if(isset($_POST['submit']))
		{ 

		  $values=$_POST['search'];
		  if($values)
		  {
		  $searchitems=$this->product_model->get_searchdetails($values);

		  $data['value']=$searchitems[0];
		  $data['counts']=$searchitems[1];

		  $subcat_id = @$_SESSION['subcat_id'];
		  //to get colors
         $data['colors']=$this->product_model->get_colors();
         $data['latest'] =$this->product_model->searchbylatestdesigns($subcat_id);

         $ob = new globalFunctions();
		    $len = $ob->getDefaultPerPageRecords();
		    $page = 'sub_items?l=1';
		    $start = (isset($_REQUEST['start']))?$_REQUEST['start']:0;
		    # Two query results - Available store Locations details and count of rows - are returned

         $data['start'] = $start;
		    $data['length'] = $len;
		    $data['page'] = $page;

      		//to get colors
         	$data['colors']=$this->product_model->get_colors();
         	$data['latest'] =$this->product_model->searchbylatestdesigns($subcat_id);
         	$data['popular'] =$this->product_model->searchbypopulardesigns($subcat_id);



		/* Get sub items */
		$sub_item_details = $this->product_model->sub_items_details($subcat_id,$start,$len);		
		$data['sub_item_details'] = $sub_item_details[0];
		$data['count'] = $sub_item_details[1];

		/* get all sub categories*/	
		$data['subcategory'] = $this->product_model->get_subitems();
		

		 
		   $this->load->view('products/search_view',$data);
		  }
		  else
		  {
		  	
		  	redirect('portalcon/index');
		  }
		}
		else
		{
			redirect('portalcon/index');
		}
	}


	public function loadProduct_BasedOnPrice()
	{
		//return 1;
		if(isset($_POST['price']))
		{
			//$output = '';
			$subcat_id = @$_SESSION['subcat_id'];
			$price = $_POST['price'];
			 
			 $color=$_POST['color'];	

         
				
		
			$this->load->model('product_model');
			# Two query results - Available product details and count of rows - are returned
			$searchBycost = array();
			$data['searchBycost'] = $this->product_model->loadProduct_BasedOnPrice_model($price,$color,$subcat_id);
			# Loading the data array to send to View
			$data['count'] = $data['searchBycost'][1];
			$data['searchBycost'] = $data['searchBycost'][0];
					
			$this->load->view('products/product_search',$data);	
		
		}
	}
	public function load_color()
	{
		$subcat_id = @$_SESSION['subcat_id'];
		if(isset($_POST['color']))
		{   

			 $color=$_POST['color'];
			 $price=$_POST['price'];

	      if($color==0)
	      {
	      	$searchbycolor=array();
			$data['searchbycolor']=$this->product_model->load_bycolors($price,$subcat_id);
			$data['count']=$data['searchbycolor'][1];
			$data['searchbycolor']=$data['searchbycolor'][0];
	      	$this->load->view('products/color_search',$data);
	      }
		

   else{
			$searchbycolor=array();
			$data['searchbycolor']=$this->product_model->load_bycolor($color,$price,$subcat_id);
			$data['count']=$data['searchbycolor'][1];
			$data['searchbycolor']=$data['searchbycolor'][0];

			
			$this->load->view('products/color_search',$data);
         }
		}
	}

public function contactus()
	{
		$this->load->view('contactus');
	}
	
}
?>