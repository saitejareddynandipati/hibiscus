<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model 
{

	public function get_salwars()
	{ 
		$qry = 'SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id where isc.subcat_id=1 and i.status_id!=2';
		$num_qry = $qry;
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}
	public function get_kurties()
	{ 
		$qry = 'SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id where isc.subcat_id=2 and i.status_id!=2 ';
		$num_qry = $qry;
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}
	public function get_leggings()
	{ 
		$qry = 'SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id where isc.subcat_id=3 and i.status_id!=2';
		$num_qry = $qry;
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}
	public function get_earrings()
	{ 
		$qry = 'SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id where isc.subcat_id=4 and i.status_id!=2';
		$num_qry = $qry;
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}
	public function get_bangles()
	{ 
		$qry = 'SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id where isc.subcat_id=5  and i.status_id!=2 AND s.status_id!=2';
		$num_qry = $qry;
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}
	public function get_necklace()
	{ 
		$qry = 'SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id where isc.subcat_id=6 and i.status_id!=2';
		$num_qry = $qry;
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}

	/* get all categories */
	public function get_cat_items()
	{ 
		$qry = ' SELECT * from category where status_id!=2';
		$num_qry = $qry;
		
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}

	/* get all sub categories */
	public function get_subcat_items()
	{ 
		$qry = ' SELECT * from subcategory where status_id!=2';
		$num_qry = $qry;
		
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}
public function get_subitems()
	{ 
		$qry = ' SELECT * from subcategory';
		$res=$this->db->query($qry);
		
		# Return multiple values - Query Result and No. of Rows
		return $res->result_array();
		
	}
	/* get all sub banner */
	public function get_sub_banner($subcat_id)
	{ 
		$qry = ' SELECT * from subcategory where subcat_id="'.$subcat_id.'"';
		$num_qry = $qry;

		
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		
	}

	/* get all items */
	public function sub_items_details($subcat_id,$start,$len)
	{
		$qry = ' SELECT * from subcategory sc inner join item_subcategory ic on ic.subcat_id=sc.subcat_id inner join item i on i.itemsubcat_id=ic.itemsubcat_id  where sc.subcat_id="'.$subcat_id.'" AND i.status_id!=2';
		$num_qry = $qry;
		$qry.=" LIMIT ".$start." , ".$len;
		
		$res1 = $this->db->query($qry);
		$res2 = $this->db->query($num_qry);
        $qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
	}
	public function product_details($item_id)
	{
		$query = 'SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id inner join size as d on i.size_id =d.size_id where i.item_id="'.$item_id.'" and i.status_id!=2 ';
		$res= $this->db->query($query);	
		return $res->row();
	}

	public function get_size()
	{
		$qry='SELECT * FROM size ';
		$res=$this->db->query($qry);
		return $res->result_array();
	}



	public function get_category_name()
	{
		$qry='SELECT * FROM category ';
		$res=$this->db->query($qry);
		return $res->result_array();
	}

	public function get_colors()
	{
		$qry='SELECT * FROM color ';
		$res=$this->db->query($qry);
		return $res->result_array();
	}

	public function searchbylatestdesigns($subcat_id)
	{
		$query='SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id where isc.subcat_id="'.$subcat_id.'" and i.status_id!=2 order by i.date_added desc limit 3';
		$res=$this->db->query($query);
		return $res->result_array();
	}

	public function searchbypopulardesigns($subcat_id)
	{
		$query='SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id inner join cart_detail as lat on i.item_id=lat.item_id where isc.subcat_id="'.$subcat_id.'" and i.status_id!=2  order by lat.date_added desc limit 3';
		$res=$this->db->query($query);
		return $res->result_array();
	}

	/* get single product details */
	public function get_product_details($id)
	{
		$query = ' SELECT * from products where id='.$id.'';
		$res= $this->db->query($query);	
		return $res->row();
	}
	

	public function loadProduct_BasedOnPrice_model($price,$color,$subcat_id){
		$qry='SELECT *  FROM subcategory as s inner join item_subcategory as isc  on s.subcat_id=isc.subcat_id inner join   item  as i on isc.itemsubcat_id=i.itemsubcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id where isc.subcat_id=$subcat_id  AND  i.actual_price<="'.@$price.'" and i.status_id!=2';
		      if($color!=''){
		      	$qry='AND search_color="'.@$color.'"';
		      }
		$num_qry = $qry;


		$res1 = $this->db->query($qry); 
		$res2 = $this->db->query($num_qry);

		$qry_data = $res1->result();
		$count = $res2->num_rows();
		# Return multiple values - Query Result and No. of Rows
		return array($qry_data,$count);
		}
	public function load_bycolors($price,$subcat_id)
	{
		$qry='SELECT *  FROM subcategory as s inner join item_subcategory as isc  on s.subcat_id=isc.subcat_id inner join   item  as i on isc.itemsubcat_id=i.itemsubcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id where isc.subcat_id="'.$subcat_id.'"  AND  i.actual_price<="'.@$price.'" and i.status_id!=2';
		$qry1=$qry;
		$res1=$this->db->query($qry);
		$res2=$this->db->query($qry1);
		$data=$res1->result();
		$count=$res2->num_rows();
		return array($data,$count);
	}

	public function load_bycolor($color,$price,$subcat_id)

	{
		
		
		$qry='SELECT *  FROM subcategory as s inner join item_subcategory as isc  on s.subcat_id=isc.subcat_id inner join   item  as i on isc.itemsubcat_id=i.itemsubcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id where isc.subcat_id="'.$subcat_id.'" AND i.color_id="'.@$color.'" AND  i.actual_price<="'.@$price.'" and i.status_id!=2';
		$qry1=$qry;
		$res1=$this->db->query($qry);
		$res2=$this->db->query($qry1);
		$data=$res1->result();
		$count=$res2->num_rows();
		return array($data,$count);
	}

	/* add to cart */
	public function saveCart($user_id,$item_id,$total_price,$quantity,$status)
	{
          $qry='SELECT * FROM cart_detail  WHERE  user_id="'.@$user_id.'" AND item_id="'.@$item_id.'"   AND status="7" ';
          $res=$this->db->query($qry);
          if($res->num_rows()>0)
          {
          	$qry= 'UPDATE cart_detail SET item_id="'.@$item_id.'" WHERE  user_id="'.@$user_id.'" AND item_id="'.@$item_id.'" AND status="7"';
          }
          else{
		$qry = 'INSERT  INTO cart_detail(user_id,item_id,total_price,quantity,status) VALUES("'.@$user_id.'","'.@$item_id.'","'.@$total_price.'","'.@$quantity.'","'.@$status.'") '; 
		//$qry = 'ON DUPLICATE KEY UPDATE cat_name="'.@$name.'" ';
		//$qry= 'select * from order_details WHERE NOT EXISTS(SELECT * FROM order_details  where user_id="'.@$user_id.'" )';
		$this->db->query($qry);
		}
	}
	/* retrieve cart details */
	public function retrieveItemDetails($user_id)
	{
		$qry='SELECT * from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id inner join cart_detail as cds on i.item_id=cds.item_id where cds.user_id= "'.@$user_id.'" and status=7';
		$qry1=$qry;
		$res1=$this->db->query($qry);
		$res2=$this->db->query($qry1);
		$data=$res1->result();
		$count=$res2->num_rows();
		return array($data,$count);
	}

	public function saveItemDetails($id,$category_id,$color_id,$name,$description,$price,$user_id)
	{
		$qry='SELECT * FROM cart_details WHERE  user_id="'.@$user_id.'" AND id="'.@$id.'" AND category_id="'.@$category_id.'" AND status="A" ';
          $res=$this->db->query($qry);
          if($res->num_rows()>0)
          {
          	$qry= 'UPDATE cart_details SET cat_name="'.@$name.'" WHERE  user_id="'.@$user_id.'" AND id="'.@$id.'" AND category_id="'.@$category_id.'"';
          }
          else{
		$qry = 'INSERT  INTO cart_details(cat_name,description,product_price,user_id,id,category_id,color_id) VALUES("'.@$name.'","'.@$description.'","'.@$price.'","'.@$user_id.'","'.@$id.'","'.@$category_id.'","'.@$color_id.'") '; 
		$res= $this->db->query($qry);
		}
	}
	public function saveBuyItemDetails($id,$category_id,$color_id,$name,$description,$price,$user_id)
	{
		$qry='SELECT * FROM order_details WHERE  user_id="'.@$user_id.'" AND id="'.@$id.'" AND category_id="'.@$category_id.'" AND status="A" ';
          $res=$this->db->query($qry);
          if($res->num_rows()>0)
          {
          	$qry= 'UPDATE order_details SET cat_name="'.@$name.'" WHERE  user_id="'.@$user_id.'" AND id="'.@$id.'" AND category_id="'.@$category_id.'"';
          }
          else{
		$qry = 'INSERT  INTO order_details(cat_name,description,product_price,user_id,id,category_id,color_id) VALUES("'.@$name.'","'.@$description.'","'.@$price.'","'.@$user_id.'","'.@$id.'","'.@$category_id.'","'.@$color_id.'") '; 
		$res= $this->db->query($qry);
		}
	}
	
public function cart_details($user_id)
	{

				$query = 'SELECT *,i.quantity as item_quantity,cds.quantity as quantity from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id inner join cart_detail as cds on i.item_id=cds.item_id where  cds.user_id= "'.$user_id.'" and cds.status="7"';
				$res= $this->db->query($query);	
		       return $res->result_array();


			}

	public function getids($user_id)
	{
		$query = ' SELECT id,category_id from order_details where user_id="'.@$user_id.'"';
		$res= $this->db->query($query);	
		return $res->result_array();
	}
	public function retrieveOrderItemDetails()
	{
		$query = ' SELECT * from order_details';
		$res= $this->db->query($query);	
		return $res->result();
	}
	public function deleteItem($cart_id)
	{
		$qry = 'DELETE FROM cart_detail WHERE cart_id="'.$cart_id.'"';
		$res = $this->db->query($qry);
		return 1;
	}
	public function saveAddress($user_id,$name,$phone,$address,$city,$country,$landmark,$state,$zip_code)
	{
		 $qry='SELECT * FROM user_information  WHERE  user_id="'.@$user_id.'" ';
          $res=$this->db->query($qry);
          if($res->num_rows()>0)
          {
          	$qry= 'UPDATE user_information SET name="'.@$name.'", phone="'.@$phone.'", address="'.@$address.'" ,city="'.@$city.'",country="'.@$country.'",landmark="'.@$landmark.'",state="'.@$state.'",zip_code="'.@$zip_code.'" WHERE  user_id="'.@$user_id.'"';
          	$this->db->query($qry);
          	return 1;
          }
          else
          { 
          	$res='INSERT INTO user_information(user_id,name,phone,address,city,country,landmark,state,zip_code) VALUES("'.@$user_id.'","'.@$name.'","'.@$phone.'","'.@$address.'","'.@$city.'","'.@$country.'","'.@$landmark.'","'.@$state.'","'.@$zip_code.'")';
          	$this->db->query($res);


		return 1; 
		
		}
	
	
	}

	public function item_details($item_id,$user_id)
	{

				$query = 'SELECT *,i.quantity as item_quantity,cds.quantity as quantity from category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as isc on s.subcat_id=isc.subcat_id inner join item_category as ic on ic.itemcat_id=isc.itemcat_id  inner join  item as i on  isc.itemsubcat_id=i.itemsubcat_id inner join cart_detail as cds on i.item_id=cds.item_id where cds.item_id="'.$item_id.'" and cds.user_id= "'.$user_id.'" and cds.status="7"';
				$res= $this->db->query($query);	
		       return $res->result_array();


			}
	public function retreve_address($user_id)
	{
		$query='SELECT * FROM user_information where user_id="'.@$user_id.'"';
		$res=$this->db->query($query);
		return $res->row();
	}

		public function order_details($cart_id,$address_id,$user_id)
	{

          $query='INSERT INTO order_detail(cart_id,address_id,user_id) VALUES("'.@$cart_id.'","'.@$address_id.'","'.@$user_id.'")';
          $res=$this->db->query($query);

 		 $old_order_number=$this->db->insert_id();
				$order_number="ODR".sprintf('%04d',$old_order_number);
				$qry12='UPDATE order_detail SET order_number="'.$order_number.'"
				  WHERE order_id="'.$old_order_number.'" ';
				$this->db->query($qry12);	

			return $old_order_number;
	}
	public function retrieveOids($order_numbers)
	{
		
					$i = 0;
				$ids = '';
				foreach($order_numbers as $p_id)
				{
					if($i > 0) $ids .= ', ';  
					$ids .= $p_id;
					$i++; 
				}

				
		$q='SELECT order_number from order_detail where order_id IN('.@$ids.') ';
			$r=$this->db->query($q);
			$data=$r->result_array();
			return $data;

	}
	public function getemail_id($user_id)
	{
		$qry='SELECT email from login where user_id="'.$user_id.'" ';
		$res=$this->db->query($qry);
		$roww=$res->row();

		return $roww->email;
	}
	public function update_status($cart_id,$item_id,$user_id)
	{
		$query='UPDATE cart_detail SET status=8 where cart_id="'.@$cart_id.'" and item_id="'.@$item_id.'" and user_id="'.@$user_id.'"';
		$this->db->query($query);
		return 1;
	}

	public function get_searchdetails($value)
	{ 
		$query="SELECT * FROM category as c inner join subcategory as s on c.category_id=s.category_id inner join item_subcategory as t on s.subcat_id=t.subcat_id inner join item_category as k on k.itemcat_id=t.itemcat_id  inner join item as m on t.itemsubcat_id=m.itemsubcat_id where c.category_name like '%".$value."%' or  s.subcat_name  like '%".$value."%' or k.itemcat_name like '%".$value."%' or m.product_name like '%".$value."%' and m.status_id!=2 ";
		$num_query=$query;
		$res1=$this->db->query($query);
		$res2=$this->db->query($num_query);
		$data1=$res1->result();
		$count=$res2->num_rows();
		return array($data1,$count);
		 
	 }
	 public function update_qty($item_id,$quantity,$total_price,$user_id)
	{
		          	$qry= 'UPDATE cart_detail SET quantity="'.@$quantity.'", total_price="'.@$total_price.'" WHERE cart_id="'.@$item_id.'" AND user_id="'.@$user_id.'"';
                 	$this->db->query($qry);
	}
	public function update_quantity($item_id,$new_quantity)
	{
		$query='UPDATE item SET quantity="'.@$new_quantity.'" where item_id="'.@$item_id.'"';
		$this->db->query($query);
	}

}
?>