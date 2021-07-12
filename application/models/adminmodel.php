<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class adminmodel extends CI_Model {
//manage color details


	public function searchproductlist($start,$len,$category_id,$subcategory_id,$description,$product_number,$color,$size,$discount,$price,$status_id)
		{
			$qry="SELECT idd.item_id as itemdetails_id,idd.status_id as status_id,st.status as status_name,idd.product_number as product_number,c.color as color_name,s.size as size_name,idd.discount as discount,
					idd.actual_price as price,idd.image as image,idd.discounted_price as price_after_discount, idd.description as description,idd.quantity as quantity 
					FROM category as ct
					INNER JOIN subcategory sc
					ON ct.category_id=sc.category_id
					INNER JOIN item_subcategory as iss
					 ON iss.subcat_id=sc.subcat_id
					INNER JOIN item as idd
					 ON idd.itemsubcat_id=iss.itemsubcat_id
					INNER JOIN color as c 
					ON c.color_id=idd.color_id
					INNER JOIN size as s 
					ON s.size_id=idd.size_id 
					INNER JOIN status st
					ON st.status_id=idd.status_id
					 ";
					 if(@$category_id!='')
					{
						$qry.=" WHERE  ct.category_id ='".$category_id."' ";
					}
					if(@$subcategory_id!='')
					{
						$qry.=" AND sc.subcat_id ='".$subcategory_id."' ";
					}

					if(@$product_number!='')
					{
						$qry.=" AND idd.product_number ='".$product_number."' ";
					}

					if($color!='')
					{
						$qry.=" AND c.color_id = '".$color."' ";
					}
					if($size!='')
					{
						$qry.=" AND s.size_id='".$size."' ";
					}
					if($price!='')
					{
						$qry.=" AND idd.actual_price=".$price." ";
					}
					if($discount!='')
					{
						$qry.=" AND idd.discount=".$discount." ";
					}
					if($description!='')
					{
						$qry.=" AND idd.description LIKE '%".$description."%' ";
					}
					if($status_id!='')
					{
						$qry.=" AND idd.status_id= ".$status_id." ";
					}

					$num_qry = $qry;
					$qry.="ORDER BY idd.product_number asc ";
					$qry.=" LIMIT ".$start." , ".$len;	
				/*echo $qry;
				die();*/				
					$res1 = $this->db->query($qry);
					$res2 = $this->db->query($num_qry);
			        $qry_data = $res1->result();
					$count = $res2->num_rows();
					# Return multiple values - Query Result and No. of Rows
					return array($qry_data,$count);

		}
		public function getallnotifications($start,$len)
		{

			$qry1='SELECT idmq.item_id from item idmq
					INNER JOIN item idq
					ON idq.item_id=idmq.item_id
					 where idq.quantity <= idmq.min_quantity AND idmq.status_id=1 ';
			$res1=$this->db->query($qry1);
			

			if($res1->num_rows()>0)
			{

				$count=$res1->num_rows();			
				$product_numbers=$res1->result_array();
				

				$i = 0;
				$ids = '';
				foreach($product_numbers as $p_id)
				{
					if($i > 0) $ids .= ', ';  
					$ids .= $p_id['item_id'];
					$i++; 
				}
				$qry = " SELECT item_id as itemdetails_id,status_id,product_number,quantity from item
						where item_id IN (".@$ids.") AND status_id=1 ";

						$num_qry = $qry;
						$qry.=" LIMIT ".$start." , ".$len;	
				////echo $qry;
				//die();				
					$res = $this->db->query($qry);
					$res2 = $this->db->query($num_qry);
			        $qry_data = $res->result();
					$count = $res2->num_rows();
					# Return multiple values - Query Result and No. of Rows
					return array($qry_data,$count);				

			}
			else
			{
				return 0;
			}



		}
		public function getSubcategorySearch($category_id)
	{
		$qry = 'SELECT sc.subcat_id as subcat_id,sc.subcat_name as subcat_name FROM subcategory sc INNER JOIN category c ON c.category_id=sc.category_id Where sc.category_id="'.@$category_id.'" ';

		$res = $this->db->query($qry);
		$qry_data = $res->result();
		

		$count = $res->num_rows();

		return array($qry_data,$count);
	}
		

		
		public function getTypeBySubCategoryId($subcategory_id)
		{	

			$qry = 'SELECT ic.itemcat_id as item_category_id,ic.itemcat_name as item_category_name FROM item_category ic INNER JOIN item_subcategory iss ON iss.itemcat_id=ic.itemcat_id  WHERE iss.subcat_id='.$subcategory_id.' ';

		$res1 = $this->db->query($qry);
		$res = $res1->result_array();
		$count = $res1->num_rows();
		$qry_data='';

		if($count>0)
		{
			$qry_data.='<option value="">-Select Type -</option>';
			foreach($res as $row1)
			{
				$qry_data.='<option value="'.$row1['item_category_id'].'">'.$row1['item_category_name'].'</option>';
			}
		} 
		else 
		{
			$qry_data.='<option value="">No Data Found</option>';
		}
		echo $qry_data;


		}

		public function addp_getTypeBySubCategoryId($subcategory_id)
		{	

			$qry = 'SELECT ic.itemcat_id as item_category_id,ic.itemcat_name as item_category_name
			 FROM item_category ic 
			 INNER JOIN item_subcategory iss
			  ON iss.itemcat_id=ic.itemcat_id  WHERE iss.subcat_id='.$subcategory_id.' AND ic.status_id!=2 ';

		$res1 = $this->db->query($qry);
		$res = $res1->result_array();
		$count = $res1->num_rows();
		$qry_data='';

		if($count>0)
		{
			$qry_data.='<option value="">-Select Type -</option>';
			foreach($res as $row1)
			{
				$qry_data.='<option value="'.$row1['item_category_id'].'">'.$row1['item_category_name'].'</option>';
			}
		} 
		else 
		{
			$qry_data.='<option value="">No Data Found</option>';
		}
		echo $qry_data;


		}

		public function insert_item_subcategory_id($product_number,$product_name,$subcat_id,$itemcat_id,$color_id,$size_id,$actual_price,$discount,$price_after_discount,$description,$min_quantity,$quantity,$image)
		{

			$Qry="SELECT * from item_subcategory where subcat_id='".$subcat_id."' AND itemcat_id='".$itemcat_id."' ";
			$res=$this->db->query($Qry);	
			if($res->num_rows()>0){		
						
					$roww=$res->row();
				
				$itemsubcat_id=$roww->itemsubcat_Id;
				

					$qry="SELECT * from item where status_id=3  ";
					
						if(@$itemsubcat_id!='')
						{
							$qry.=" AND itemsubcat_id = ".$itemsubcat_id." ";
						}

						if($color_id!='')
						{
							$qry.=" AND color_id = ".$color_id." ";
						}
						if($product_number!='')
						{
							$qry.=" AND product_number = '".$product_number."' ";
						}
						if($size_id!='')
						{
							$qry.=" AND size_id=".$size_id." ";
						}
						if($actual_price!='')
						{
							$qry.=" AND actual_price=".$actual_price." ";
						}
						if($discount!='')
						{
							$qry.=" AND discount=".$discount." ";
						}


						$res1 = $this->db->query($qry);

						if ($res1->num_rows() > 0)
						{
							$row=$res1->row();	
				  		$item_id= $row->item_id;
                 		$oldQuantity= $row->quantity;
							
						}
					
				if (@$item_id)
				{					
					$newquantity=($oldQuantity+$quantity);
					$qry11='UPDATE item SET quantity="'.$newquantity.'"
					  WHERE item_id="'.$item_id.'" ';
					$this->db->query($qry11);
				}
				else
				{		$qry2='INSERT INTO item(product_number,product_name,itemsubcat_id,color_id,size_id,actual_price,discount,discounted_price,description,min_quantity,quantity,image) VALUES("'.$product_number.'","'.@$product_name.'","'.$itemsubcat_id.'","'.$color_id.'","'.$size_id.'","'.$actual_price.'","'.$discount.'","'.$price_after_discount.'","'.$description.'","'.$min_quantity.'","'.$quantity.'","'.@$image.'")';
						$this->db->query($qry2);

						//$res=$this->db->query($qry2);
						/*$old_product_number=$this->db->insert_id();
						$product_number="KP".sprintf('%04d',$old_product_number);
						$qry12='UPDATE item SET product_number="'.$product_number.'"
						  WHERE item_id="'.$old_product_number.'" ';
						$this->db->query($qry12);*/
										
				}
			}
				

		}

			
		public function productnumberautofill()
		{

			$term=$_GET["term"];
		$qry = "SELECT * FROM item WHERE product_number LIKE '%".$term."%'  ";
		
		$stt = $this->db->query($qry);
		$json=array();
		    foreach($stt->result_array() as $row){
		         $json[]=array(
		                    'value'=> $row["product_number"],
		                    'label'=>$row["product_number"],
							'id'=>$row["product_number"]
		                        );
		    }
		 echo json_encode($json);

		}
		public function checkProductNumber($product_number)
	{
		$qry='SELECT product_number FROM item WHERE product_number="'.@$product_number.'"';
		$res=$this->db->query($qry);
		$count = $res->num_rows();
		
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
		

	}

			

		public function editProductCostAndPrice($product_name,$description,$actual_price,$discount,$price_after_discount,$edit_id,$quantity,$min_quantity,$image)
		{ 

			$qry='UPDATE item SET product_name="'.$product_name.'",description="'.$description.'",actual_price="'.$actual_price.'",discount="'.$discount.'",discounted_price="'.$price_after_discount.'",quantity="'.$quantity.'",min_quantity="'.$min_quantity.'",image="'.$image.'"
				  WHERE item_id="'.$edit_id.'" ';
			$this->db->query($qry);
			return 1;
		}
		public function notificationEdit($edit_id,$quantity,$min_quantity)
		{ 

			$qry='UPDATE item SET quantity="'.$quantity.'",min_quantity="'.$min_quantity.'"
				  WHERE item_id="'.$edit_id.'" ';
			$this->db->query($qry);
			return 1;
		}
		

		public function productTypeList($id)
		{
			$qry='SELECT idd.item_id as itemdetails_id,idd.product_name as product_name,ic.itemcat_name as itemcat_name,ct.category_name as category_name,sc.subcat_name as subcategory_name,idd.status_id as status,idd.product_number as product_number,idd.discount as discount,
					idd.actual_price as actual_price,idd.image as image,idd.discounted_price as price_after_discount,idd.min_quantity as min_quantity,idd.description as description,idd.quantity as quantity 
					FROM category as ct
					INNER JOIN subcategory sc
					ON ct.category_id=sc.category_id
					INNER JOIN item_subcategory as iss
					 ON iss.subcat_id=sc.subcat_id
					 INNER JOIN item_category as ic
					 ON iss.itemcat_id=ic.itemcat_id
					INNER JOIN item as idd
					 ON idd.itemsubcat_id=iss.itemsubcat_id
					 WHERE item_id="'.$id.'" ';
			//$qry='SELECT item_id as itemdetails_id,actual_price,discount,quantity,discounted_price as price_after_discount from item WHERE item_id="'.$id.'"	';
			$res=$this->db->query($qry);
			return $res->row();	
		}


		

		public function inactivatebatch($id)
		 {
	         $qry = 'UPDATE item SET status_id = 2 WHERE item_id='.@$id.''; 
			 $this->db->query($qry);
			 return 1;
		 }

		  public function activatebatch($id)
	     {
	         $qry = 'UPDATE item SET status_id = 1 WHERE item_id='.@$id.''; 
		     $this->db->query($qry);
		     return 1;
	     }
			
		
		public function getcolordetails()
		{		
			$qry='SELECT * from color ';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		
		public function getsizedetails()
		{
			$qry='SELECT * from size where size_id!=1';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
	
		public function getsubcategorydetails()
		{		
			$qry='SELECT * from subcategory ';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		public function getadddropdownsubcategorydetails()
		{		
			$qry='SELECT * from subcategory where status_id!=2 ';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		public function getproductstatusdetails()
		{
			$qry='SELECT * from status where status_id IN(1,2) ';
			$res=$this->db->query($qry);
			return $res->result_array();

		}

		public function getproductcatdetails()
		{
			$qry='SELECT * from category';
			$res=$this->db->query($qry);
			return $res->result_array();

		}




	public function searchColor($start,$len,$color_name,$status_id)
	{

			$qry="SELECT c.*,st.status as status_name 
			from color as c
			INNER JOIN status as st
			ON c.status_id=st.status_id ";	
				if(@$color_name!='')
				{
					$qry.=" where color ='".$color_name."' ";
				}

				if(@$status_id!='')
				{
					$qry.=" AND c.status_id ='".$status_id."' ";
				}
				$num_qry = $qry;				
				$qry.=" LIMIT ".$start." , ".$len;


				$res1 = $this->db->query($qry);
				$res2 = $this->db->query($num_qry);

		        $qry_data = $res1->result();
				$count = $res2->num_rows();
			
				# Return multiple values - Query Result and No. of Rows
				return array($qry_data,$count);
	}
	public function coloreditview($id)
	{
		$qry='SELECT * from color WHERE color_id="'.$id.'"	';
			$res=$this->db->query($qry);
			return $res->result_array();
	}
	
	public function insert_color($color_name,$dat1){
		 $qry='SELECT * from color WHERE color="'.$color_name.'"	';
			$res=$this->db->query($qry);
		 if($res->num_rows()>0)
		 {
			 return 1;
		 }
		 else
		 {
		 	$q='INSERT INTO color (color) values ("'.$color_name.'")';
		 	$r=$this->db->query($q);
		 	return 2;
		 }
	}

	public function update_color_details($edit_id,$color_name)
		     {

		     	  $qry='SELECT * from color WHERE color="'.$color_name.'"  AND color_id NOT IN("'.$edit_id.'")	';
					$res=$this->db->query($qry);
				 if($res->num_rows()>0)
				 {
					 return 1;
				 }
				 else
				 {
				$qry='UPDATE color SET color="'.$color_name.'"
				      WHERE color_id="'.$edit_id.'" ';
					$this->db->query($qry);
					
		         return 2;
				 }

             }

 //end of manage color details

// Start of manage Users details

public function getuserdetails()
		{		
			$qry='SELECT * from login ';
			$res=$this->db->query($qry);
			return $res->result_array();
		}

public function searchUser($start,$len,$user_name,$email,$role_id,$status_id,$phone_number)
	{

			$qry="SELECT l.*,r.role_name as role_name,s.status as status_name from login l INNER JOIN role r ON r.role_id=l.role_id INNER JOIN status s
			ON s.status_id=l.status_id 

			INNER JOIN status as st
			ON l.status_id=st.status_id
			WHERE l.status_id!=0";
			if(@$role_id!='')
				{
					$qry.=" AND r.role_id ='".$role_id."' ";
				}	
				if(@$user_name!='')
				{
					$qry.=" AND user_name ='".$user_name."' ";
				}
				if(@$email!='')
				{
					$qry.=" AND email ='".$email."' ";
				}
				if(@$status_id!='')
				{
					$qry.=" AND l.status_id ='".$status_id."' ";
				}
				if(@$phone_number!='')
				{
					$qry.=" AND l.phone_number ='".$phone_number."' ";
				}
				
				$num_qry = $qry;				
				$qry.=" LIMIT ".$start." , ".$len;


				$res1 = $this->db->query($qry);
				$res2 = $this->db->query($num_qry);

		        $qry_data = $res1->result();
				$count = $res2->num_rows();
			
				# Return multiple values - Query Result and No. of Rows
				return array($qry_data,$count);
	}
	public function usereditview($id)
	{
		$qry='SELECT * from login WHERE user_id="'.$id.'"	';
			$res=$this->db->query($qry);
			return $res->result_array();
	}
	
	public function insert_user($email,$dat1){
		 $qry='SELECT * from login WHERE email="'.$email.'"	';
			$res=$this->db->query($qry);
		 if($res->num_rows()>0)
		 {
			 return 1;
		 }
		 else
		 {
		 	$this->db->insert('login',$dat1);
		 	
		 	return 2;
		 }
	}

	public function update_user_details($edit_id,$user_name,$password,$email,$phone_number)
		     {

		     	  $qry='SELECT * from login WHERE email="'.$email.'" AND user_id NOT IN("'.$edit_id.'")	';
					$res=$this->db->query($qry);
				 if($res->num_rows()>0)
				 {
					 return 1;
				 }
				
			 		else
					 {
					$qry='UPDATE login SET user_name="'.$user_name.'",password="'.$password.'",email="'.$email.'",phone_number="'.$phone_number.'"
					      WHERE user_id="'.$edit_id.'" ';
						$this->db->query($qry);
						
			         return 2;
					 }

             }

             //Inactivating user based on companyid
        public function deleteuser($user_id,$user_name)
	     {
		     $qry = 'UPDATE login SET status_id = "2" WHERE user_id='.@$user_id.''; 
		     $this->db->query($qry);
		     return 1;
	     }

	     
	      public function updateuser($user_id,$user_name)
	     {
		     $qry = 'UPDATE login SET status_id = "1" WHERE user_id='.@$user_id.''; 
		     $this->db->query($qry);
		     return 1;
	     }



	     public function getroledetails()
		{
			$qry='SELECT * from role';
			$res=$this->db->query($qry);
			return $res->result_array();

		}

		//category
	      public function deactivatecategory($cat_id)
	     {
		     $qry = 'UPDATE category SET status_id = "2" WHERE category_id='.@$cat_id.''; 
		     $this->db->query($qry);	     
			     
			     $qry1='SELECT subcat_id from subcategory WHERE category_id='.@$cat_id.'  ';
			     $res1=$this->db->query($qry1);
			     $subcatids=$res1->result_array();
			     $subcatscount=$res1->num_rows();
			     	if(@$subcatscount>0)
			     	{
			     		

			     		$subcatstatus='UPDATE subcategory set status_id="2" where category_id='.$cat_id.'';
			    		 $this->db->query($subcatstatus);
	    		    $i = 0;
					$ids = '';
					foreach($subcatids as $subcat_ids)
					{
						if($i > 0) $ids .= ', ';  
						$ids .= $subcat_ids['subcat_id'];
						$i++; 
					}		    		    
	    		     $qry2='SELECT itemsubcat_id from item_subcategory WHERE subcat_id IN('.$ids.')';
	    		     $res2=$this->db->query($qry2);
	    		     $itemsubcatids=$res2->result_array();
			    	 $iemcatcount=$res2->num_rows();
	    		     if(@$iemcatcount>0)
	    		     {

					/*echo '<pre>';print_r ($itemsubcatids);echo '</pre>';
	    		
	    		     exit;*/

	    		    $ii = 0;
					$iids = '';
					foreach($itemsubcatids as $itemsubcat_ids)
					{
						if($ii > 0) $iids .= ', ';  
						$iids .= $itemsubcat_ids['itemsubcat_id'];
						$ii++; 
					}
					$qry5='UPDATE item_subcategory set status_id=2 WHERE itemsubcat_id IN('.$iids.')';
						$this->db->query($qry5);

					 $qry3='SELECT item_id from item WHERE itemsubcat_id IN('.$iids.')';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=2 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}
				}
				
				
		 }
	     public function activatecategory($cat_id)
	     {
		     $qry = 'UPDATE category SET status_id = "1" WHERE category_id='.@$cat_id.''; 
		     $this->db->query($qry);	     
			     
			     $qry1='SELECT subcat_id from subcategory WHERE category_id='.@$cat_id.'  ';
			     $res1=$this->db->query($qry1);
			     $subcatids=$res1->result_array();
			     $subcatscount=$res1->num_rows();
			     	if(@$subcatscount>0)
			     	{
			     		

			     		$subcatstatus='UPDATE subcategory set status_id="1" where category_id='.$cat_id.'';
			    		 $this->db->query($subcatstatus);
	    		    $i = 0;
					$ids = '';
					foreach($subcatids as $subcat_ids)
					{
						if($i > 0) $ids .= ', ';  
						$ids .= $subcat_ids['subcat_id'];
						$i++; 
					}		    		    
	    		     $qry2='SELECT itemsubcat_id from item_subcategory WHERE subcat_id IN('.$ids.')';
	    		     $res2=$this->db->query($qry2);
	    		     $itemsubcatids=$res2->result_array();
			    	 $iemcatcount=$res2->num_rows();
	    		     if(@$iemcatcount>0)
	    		     {

					/*echo '<pre>';print_r ($itemsubcatids);echo '</pre>';
	    		
	    		     exit;*/

	    		    $ii = 0;
					$iids = '';
					foreach($itemsubcatids as $itemsubcat_ids)
					{
						if($ii > 0) $iids .= ', ';  
						$iids .= $itemsubcat_ids['itemsubcat_id'];
						$ii++; 
					}
					$qry5='UPDATE item_subcategory set status_id=1 WHERE itemsubcat_id IN('.$iids.')';
						$this->db->query($qry5);
					 $qry3='SELECT item_id from item WHERE itemsubcat_id IN('.$iids.')';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=1 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}
				}




	     }
 
 public function searchsize($start,$len,$size_name,$status_id)
	{
		$qry="SELECT s.*,st.status as status_name 
		from size as s 
		INNER JOIN status as st
		 ON st.status_id=s.status_id";	
				if(@$size_name!='')
				{
					$qry.=" where size ='".$size_name."' ";
				}
				if(@$status_id!='')
				{
					$qry.=" AND s.status_id ='".$status_id."' ";
				}
				$num_qry = $qry;				
				$qry.=" LIMIT ".$start." , ".$len;
			//die();				
				$res1 = $this->db->query($qry);
				$res2 = $this->db->query($num_qry);
		        $qry_data = $res1->result();
				$count = $res2->num_rows();
				# Return multiple values - Query Result and No. of Rows
				return array($qry_data,$count);
	}
	public function sizeeditview($id)
	{
		$qry='SELECT * from size WHERE size_id="'.$id.'"	';
			$res=$this->db->query($qry);
			return $res->result_array();
	}
	
	public function insert_size($size_name,$dat1){
		 $qry='SELECT * from size WHERE size="'.$size_name.'"	';
			$res=$this->db->query($qry);
		 if($res->num_rows()>0)
		 {
			 return 1;
		 }
		 else
		 {
		 	$q='INSERT INTO size (size) values ("'.$size_name.'")';
		 	$r=$this->db->query($q);
		 	return 2;
		 }
	}

	public function update_size_details($edit_id,$size_name)
		     {

		     	  $qry='SELECT * from size WHERE size="'.$size_name.'"	AND size_id NOT IN("'.$edit_id.'")';
					$res=$this->db->query($qry);
				 if($res->num_rows()>0)
				 {
					 return 1;
				 }
				 else
				 {
				$qry='UPDATE size SET size="'.$size_name.'"
				      WHERE size_id="'.$edit_id.'" ';
					$this->db->query($qry);
					
		         return 2;
				 }

             }




             public function searchcategory($start,$len,$category_name,$status_id,$category_id)
	{

			$qry="SELECT c.*,st.status as status_name
				 from category as c
				 INNER JOIN status as st
				ON c.status_id=st.status_id ";
				 	
				if(@$category_name!='')
				{
					$qry.=" where category_name LIKE '%".$category_name."%' ";
				}
				if(@$status_id!='')
				{
					$qry.=" AND c.status_id ='".$status_id."' ";
				}
				if(@$category_id!='')
				{
					$qry.=" AND c.category_id ='".$category_id."' ";
				}
				$num_qry = $qry;				
				$qry.=" LIMIT ".$start." , ".$len;


				$res1 = $this->db->query($qry);
				$res2 = $this->db->query($num_qry);

		        $qry_data = $res1->result();
				$count = $res2->num_rows();
			
				# Return multiple values - Query Result and No. of Rows
				return array($qry_data,$count);
	}



	public function categoryeditview($id)
		{
			$qry='SELECT * from category WHERE category_id="'.$id.'"	';
				$res=$this->db->query($qry);
				return $res->row();
		}

		public function insert_category($category_name,$image){
		 $qry='SELECT * from category WHERE category_name="'.$category_name.'"	';
			$res=$this->db->query($qry);
		 if($res->num_rows()>0)
		 {
			 return 1;
		 }
		 else
		 {
		 	$q='INSERT INTO category (category_name,cat_image) values ("'.$category_name.'","'.@$image.'")';
		 	$r=$this->db->query($q);
		 	return 2;
		 }
	}

	public function update_category_details($edit_id,$category_name,$image)
		     {

		     	  $qry='SELECT * from category WHERE category_name="'.$category_name.'" AND category_id NOT IN("'.$edit_id.'")	';
					$res=$this->db->query($qry);
				 if($res->num_rows()>0)
				 {
					 return 1;
				 }
				 else
				 {
				$qry='UPDATE category SET category_name="'.$category_name.'",cat_image="'.$image.'"
				      WHERE category_id="'.$edit_id.'" ';
					$this->db->query($qry);
					
		         return 2;
				 }

             }








             public function searchsubcat($start,$len,$category_id,$subcat_id,$status_id)
	{

			$qry="SELECT c.*,sc.subcat_id as subcat_id,st.status as status_name,sc.subcat_image as subcat_image,sc.subcat_name as subcat_name,sc.status_id as status_id
			 from subcategory as sc 
			 INNER JOIN category as c
			  ON c.category_id=sc.category_id
			  INNER JOIN status as st
			  ON sc.status_id=st.status_id
			   WHERE sc.status_id!=0";	
				if(@$subcat_id!='')
				{
					$qry.=" AND sc.subcat_id ='".$subcat_id."' ";
				}
				if(@$category_id!='')
				{
					$qry.=" AND sc.category_id ='".$category_id."' ";
				}
				if(@$status_id!='')
				{
					$qry.=" AND sc.status_id ='".$status_id."' ";
				}
				$num_qry = $qry;				
				$qry.=" LIMIT ".$start." , ".$len;


				$res1 = $this->db->query($qry);
				$res2 = $this->db->query($num_qry);

		        $qry_data = $res1->result();
				$count = $res2->num_rows();
			
				# Return multiple values - Query Result and No. of Rows
				return array($qry_data,$count);
	}


	public function insert_subcat($subcat_name,$category_id,$image,$image2){
		 $qry='SELECT * from subcategory WHERE subcat_name="'.$subcat_name.'"	';
			$res=$this->db->query($qry);
		 if($res->num_rows()>0)
		 {
			return 1;
		 }
		 else
		 {
		 	$Query='INSERT INTO subcategory (category_id,subcat_name,subcat_image,banner_image) values ("'.$category_id.'","'.$subcat_name.'","'.$image.'","'.@$image2.'")';
		 	$this->db->query($Query);
		 	return 2;
		 }
	}

		public function subcateditview($id)
		{
			$qry='SELECT c.category_id as category_id,c.category_name as category_name,sc.* from category c
					INNER JOIN subcategory sc
					ON c.category_id=sc.category_id
					 WHERE subcat_id="'.$id.'"	';
				$res=$this->db->query($qry);
				return $res->row();
				

		}

		public function update_subcat_details($edit_id,$subcat_name,$image,$banner_image)
		     {

		     	/*$Qry='SELECT iss.subcat_id from item_subcategory as iss INNER JOIN subcategory as s 
				 			ON iss.subcat_id=s.subcat_id WHERE i.subcat_id="'.@$edit_id.'" ';
				 	$ress=$this->db->query($Qry);
				 	if($ress->num_rows()>0)
				 	{
				 		return 1;
				 	}
		     	 	
				 	else
				 	{*/	
					 		 $qry='SELECT * from subcategory WHERE subcat_name="'.$subcat.'" AND subcat_id NOT IN("'.$edit_id.'")	';
					$res=$this->db->query($qry);
				 if($res->num_rows()>0)
				 {
					 return 1;
				 }
				 else
				 {
				$qry='UPDATE subcategory SET subcat_name="'.$subcat_name.'",subcat_image="'.$image.'",banner_image="'.$banner_image.'"
				      WHERE subcat_id="'.$edit_id.'" ';
					$this->db->query($qry);
					
		         return 2;
				 }
		        	}	     	 

             

 //end of manage size details
             //category_id="'.@$category_id.'"



public function searchType($start,$len,$itemcat_id,$status_id)
	{

			$qry="SELECT ic.*,st.status as status_name from item_category as ic INNER JOIN status as st 
					ON ic.status_id=st.status_id";	
				if(@$itemcat_id!='')
				{
					$qry.=" where itemcat_id ='".$itemcat_id."' ";
				}
				if(@$status_id!='')
				{
					$qry.=" AND ic.status_id ='".$status_id."' ";
				}
				$num_qry = $qry;				
				$qry.=" LIMIT ".$start." , ".$len;


				$res1 = $this->db->query($qry);
				$res2 = $this->db->query($num_qry);

		        $qry_data = $res1->result();
				$count = $res2->num_rows();
			
				# Return multiple values - Query Result and No. of Rows
				return array($qry_data,$count);
	}
	public function getSubcategorybycategoryId($category_id)
		{	

			$qry = 'SELECT sc.subcat_id as subcat_id,sc.subcat_name as subcat_name FROM subcategory sc INNER JOIN category c ON c.category_id=sc.category_id Where sc.category_id='.@$category_id.' ';

		$res1 = $this->db->query($qry);
		$res = $res1->result_array();
		$count = $res1->num_rows();
		$qry_data='';

		if($count>0)
		{
			$qry_data.='<option value="">-Select subcategory -</option>';
			foreach($res as $row1)
			{
				$qry_data.='<option value="'.$row1['subcat_id'].'">'.$row1['subcat_name'].'</option>';
			}
		} 
		else 
		{
			$qry_data.='<option value="">No Data Found</option>';
		}
		echo $qry_data;


		}

		public function addp_getSubcategorybycategoryId($category_id)
		{	

			$qry = 'SELECT sc.subcat_id as subcat_id,sc.subcat_name as subcat_name 
			FROM subcategory sc 
			INNER JOIN category c 
			ON c.category_id=sc.category_id 
			Where sc.category_id='.@$category_id.' AND sc.status_id!=2';

		$res1 = $this->db->query($qry);
		$res = $res1->result_array();
		$count = $res1->num_rows();
		$qry_data='';

		if($count>0)
		{
			$qry_data.='<option value="">-Select subcategory -</option>';
			foreach($res as $row1)
			{
				$qry_data.='<option value="'.$row1['subcat_id'].'">'.$row1['subcat_name'].'</option>';
			}
		} 
		else 
		{
			$qry_data.='<option value="">No Data Found</option>';
		}
		echo $qry_data;


		}

	public function getcategorydetails()
		{
			$qry='SELECT * from category';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		public function getaddcategorydetails()
		{
			$qry='SELECT * from category where status_id!=2';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		public function gettypedetails()
		{
			$qry='SELECT * from item_category';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		public function getadddropdowntypedetails()
		{
			$qry='SELECT * from item_category where status_id!=2';
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		



	

		public function update_type_details($edit_id,$type_name)
		     {

		     	  $qry='SELECT * from item_category WHERE itemcat_name="'.$type_name.'"	AND itemcat_id NOT IN("'.$edit_id.'")';
					$res=$this->db->query($qry);
				 if($res->num_rows()>0)
				 {
					 return 1;
				 }
				 else
				 {
				$qry='UPDATE item_category SET itemcat_name="'.$type_name.'"
				      WHERE itemcat_id="'.$edit_id.'" ';
					$this->db->query($qry);
					
		         return 2;
				 }

             }

 //end of manage color details





	public function typeeditview($id)
		{
			$qry='SELECT * from item_category WHERE itemcat_id="'.$id.'"	';
				$res=$this->db->query($qry);
				return $res->result_array();
		}

		public function insert_type($itemcat_name){
		 $qry='SELECT * from item_category WHERE itemcat_name="'.$itemcat_name.'"	';
			$res=$this->db->query($qry);
		 if($res->num_rows()>0)
		 {
			 return 1;
		 }
		 else
		 {
		 	$q='INSERT INTO item_category (itemcat_name) values ("'.$itemcat_name.'")';
		 	$r=$this->db->query($q);
		 	return 2;
		 }
	}

	public function update_relation_details($edit_id,$subcat_id,$itemcat_id)
		     {
		     	$Qry='SELECT i.itemsubcat_id from item as i INNER JOIN item_subcategory as iss 
				 			ON i.itemsubcat_id=iss.itemsubcat_id WHERE i.itemsubcat_id="'.@$edit_id.'" ';
				 	$ress=$this->db->query($Qry);
				 	if($ress->num_rows()>0)
				 	{
				 		return 1;
				 	}
		     	 /* $qry='SELECT * from item_subcategory WHERE subcat_id="'.$subcat_id.'" AND itemcat_id="'.$itemcat_id.'"	';
					$res=$this->db->query($qry);
				 if($res->num_rows()>0)
				 {
					 return 1;
				 }
				 else
				 {
				 	$row=$res->row();
				 	$itemsubcat_id=$row->itemsubcat_id;


				 	else{*/	
				 	else{	
					 		$qry='SELECT * from item_subcategory WHERE subcat_id="'.$subcat_id.'" AND itemcat_id="'.$itemcat_id.'"	';
							$res=$this->db->query($qry);
							 if($res->num_rows()>0)
							 {
								 return 1;
							 }
					 		else
					 		{

							$q='UPDATE item_subcategory SET subcat_id="'.$subcat_id.'", itemcat_id="'.$itemcat_id.'"
							      WHERE itemsubcat_id="'.$edit_id.'" ';
								$this->db->query($q);
								
					         return 2;
			       		 	 }
		        		}
				 

             }










             public function searchrelation($start,$len,$subcat_id,$itemcat_id,$status_id)
		{
			$qry="SELECT sc.subcat_id as subcat_id,iss.itemsubcat_id as itemsubcat_id,sc.subcat_name as subcat_name,st.status as status_name,iss.status_id as status_id,
					ic.itemcat_id as itemcat_id,ic.itemcat_name as itemcat_name
					FROM subcategory as sc
					INNER JOIN item_subcategory as iss
					ON sc.subcat_id=iss.subcat_id
					INNER JOIN item_category as ic
					 ON ic.itemcat_id=iss.itemcat_id 
					 INNER JOIN status as st
					 ON iss.status_id=st.status_id";
					 if(@$itemcat_id!='')
					{
						$qry.=" WHERE  iss.itemcat_id ='".$itemcat_id."' ";
					}
					if(@$subcat_id!='')
					{
						$qry.=" AND iss.subcat_id ='".$subcat_id."' ";
					}
					if(@$status_id!='')
					{
						$qry.=" AND iss.status_id ='".$status_id."' ";
					}

					

					$num_qry = $qry;
		
					$qry.=" LIMIT ".$start." , ".$len;	
				/*echo $qry;
				die();*/				
					$res1 = $this->db->query($qry);
					$res2 = $this->db->query($num_qry);
			        $qry_data = $res1->result();
					$count = $res2->num_rows();
					# Return multiple values - Query Result and No. of Rows
					return array($qry_data,$count);
				}



				public function insert_typerelation($itemcat_id,$subcategory_id){
		

			 $qry1='SELECT * from item_subcategory WHERE itemcat_id="'.$itemcat_id.'" AND subcat_id= "'.$subcategory_id.'"';
			$res1=$this->db->query($qry1);
			 if($res1->num_rows()>0)
		 	{
		 		return 1;
		 	}
		 	else
			 {
			 

			 	$Query='INSERT INTO item_subcategory (subcat_id,itemcat_id) values ("'.$subcategory_id.'","'.$itemcat_id.'")';
			 	$this->db->query($Query);
			 	return 2;
			 }		
	}

	public function relationeditview($id)
		{
			$qry="SELECT sc.subcat_id as subcat_id,iss.itemsubcat_id as itemsubcat_id,sc.subcat_name as subcat_name,
					ic.itemcat_id as itemcat_id,ic.itemcat_name as itemcat_name
					FROM subcategory as sc
					INNER JOIN item_subcategory as iss
					ON sc.subcat_id=iss.subcat_id
					INNER JOIN item_category as ic
					 ON ic.itemcat_id=iss.itemcat_id 

					 WHERE iss.itemsubcat_id='".@$id."' ";
				$res=$this->db->query($qry);
				return $res->result();
		}

		public function searchOrderlist($start,$len,$order_number,$status_id,$customer_name,$phone_number,$ordered_date,$ordered_date2)
		{
			
			$qry="SELECT c.*,o.order_id,o.status_id,o.order_number as order_number,ui.*,o.date_add as ordered_date,l.user_name as user_name,s.status as status_name
					FROM order_detail as o
					INNER JOIN cart_detail as c
					ON o.cart_id=c.cart_id
					INNER JOIN login as l
					 ON c.user_id=l.user_id
					INNER JOIN user_information as ui
					 ON l.user_id=ui.user_id
					 INNER JOIN status s
					 ON s.status_id=o.status_id
					 Where l.status_id!=0
					 ";
					

					if(@$order_number!='')
					{
						$qry.=" AND o.order_number ='".$order_number."' ";
					}
					if(@$phone_number!='')
					{
						$qry.=" AND l.phone_number ='".$phone_number."' ";
					}


					if($customer_name!='')
					{
						$qry.=" AND l.user_name LIKE '%".$customer_name."%' ";
					}
					if($status_id!='')
					{
						$qry.=" AND o.status_id= ".$status_id." ";
					}
					if($ordered_date!='')
					{
						$qry.=" AND DATE(o.date_add)>= '".$ordered_date." ' ";
					}
					if($ordered_date2!='')
					{
						$qry.=" AND DATE(o.date_add)<= '".$ordered_date2." ' ";
					}

					$num_qry = $qry;
					$qry.=" LIMIT ".$start." , ".$len;	
				/*echo $qry;
				die();	*/			
					$res1 = $this->db->query($qry);
					$res2 = $this->db->query($num_qry);
			        $qry_data = $res1->result();
					$count = $res2->num_rows();

					# Return multiple values - Query Result and No. of Rows
					return array($qry_data,$count);

		}
		public function getOrderStatusDetails()
		{
			$qry="SELECT * from status where status_id in(5,6)";
			$res=$this->db->query($qry);
			return $res->result_array();
		}
		public function orderDetails($id)
		{
			$qry='SELECT ui.*,i.image as image,i.product_number as product_number,
					c.total_price as price,c.quantity as quantity 
					from cart_detail as  c
					INNER JOIN item as i
					ON c.item_id=i.item_id 
					INNER JOIN login as l 
					ON l.user_id=c.user_id
					INNER JOIN user_information as ui
					ON l.user_id=ui.user_id
					 where address_id="'.@$id.'" ';
			$res=$this->db->query($qry);
			return $res->row();
		}
		public function deliverProduct($id)
		{
			$qry='UPDATE order_detail set status_id=5 WHERE order_id="'.@$id.'" ';
			$this->db->query($qry);
		}

		public function deactivatetype($cat_id)
	     {
		     $qry = 'UPDATE item_category SET status_id = "2" WHERE itemcat_id='.@$cat_id.''; 
		     $this->db->query($qry);   

	    		     $qry2='SELECT itemsubcat_id from item_subcategory WHERE itemcat_id='.@$cat_id.''; 
	    		     $res2=$this->db->query($qry2);
	    		     $itemsubcatids=$res2->result_array();
			    	 $iemcatcount=$res2->num_rows();
	    		     if(@$iemcatcount>0)
	    		     {

	    		    $ii = 0;
					$iids = '';
					foreach($itemsubcatids as $itemsubcat_ids)
					{
						if($ii > 0) $iids .= ', ';  
						$iids .= $itemsubcat_ids['itemsubcat_id'];
						$ii++; 
					}
					$qry5='UPDATE item_subcategory set status_id=2 WHERE itemsubcat_id IN('.$iids.')';
						$this->db->query($qry5);

					 $qry3='SELECT item_id from item WHERE itemsubcat_id IN('.$iids.')';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=2 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}
				
				
				
		 }
	     public function activatetype($cat_id)
	     {
		     $qry = 'UPDATE item_category SET status_id = "1" WHERE itemcat_id='.@$cat_id.''; 
		     $this->db->query($qry);   

	    		     $qry2='SELECT itemsubcat_id from item_subcategory WHERE itemcat_id='.@$cat_id.''; 
	    		     $res2=$this->db->query($qry2);
	    		     $itemsubcatids=$res2->result_array();
			    	 $iemcatcount=$res2->num_rows();
	    		     if(@$iemcatcount>0)
	    		     {

	    		    $ii = 0;
					$iids = '';
					foreach($itemsubcatids as $itemsubcat_ids)
					{
						if($ii > 0) $iids .= ', ';  
						$iids .= $itemsubcat_ids['itemsubcat_id'];
						$ii++; 
					}
					$qry5='UPDATE item_subcategory set status_id=1 WHERE itemsubcat_id IN('.$iids.')';
						$this->db->query($qry5);

					 $qry3='SELECT item_id from item WHERE itemsubcat_id IN('.$iids.')';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=1 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}
				
				
				
		 }


		 public function deactivatecolor($color_id)
	     {
		     $qry = 'UPDATE color SET status_id = "2" WHERE color_id='.@$color_id.''; 
		     $this->db->query($qry);   

	    		     

						$qry4='UPDATE item set status_id=2 WHERE color_id='.@$color_id.'';
						$this->db->query($qry4);	    		    
					}
				
				
				
				
		 
	     public function activatecolor($color_id)
	     {
		     $qry = 'UPDATE color SET status_id = "1" WHERE color_id='.@$color_id.''; 
		     $this->db->query($qry);   

	    		     

						$qry4='UPDATE item set status_id=1 WHERE color_id='.@$color_id.'';
						$this->db->query($qry4);
				
				
				
		 }
		  public function deactivatesize($size_id)
	     {
		     $qry = 'UPDATE size SET status_id = "2" WHERE size_id='.@$size_id.''; 
		     $this->db->query($qry);   

	    	$qry4='UPDATE item set status_id=2 WHERE size_id='.@$size_id.'';
			$this->db->query($qry4);	     
		}			
		 
	     public function activatesize($size_id)
	     {
		    $qry = 'UPDATE size SET status_id = "1" WHERE size_id='.@$size_id.''; 
		    $this->db->query($qry);		     

			$qry4='UPDATE item set status_id=1 WHERE size_id='.@$size_id.'';
			$this->db->query($qry4);				
		 }

		 public function deactivaterelation($cat_id)
	     {
		     $qry = 'UPDATE item_subcategory SET status_id = "2" WHERE itemsubcat_id='.@$cat_id.''; 
		     $this->db->query($qry); 	    		     

					 $qry3='SELECT item_id from item WHERE itemsubcat_id='.@$cat_id.'';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=2 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}
				
				
				
		 
	     public function activaterelation($cat_id)
	     {
		     $qry = 'UPDATE item_subcategory SET status_id = "1" WHERE itemsubcat_id='.@$cat_id.''; 
		     $this->db->query($qry);   

	    		     

					 $qry3='SELECT item_id from item WHERE itemsubcat_id='.@$cat_id.'';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=1 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}


				public function deactivatesubcategory($cat_id)
	     {
		     $qry = 'UPDATE subcategory SET status_id = "2" WHERE subcat_id='.@$cat_id.''; 
		     $this->db->query($qry);   

	    		     $qry2='SELECT itemsubcat_id from item_subcategory WHERE subcat_id='.@$cat_id.''; 
	    		     $res2=$this->db->query($qry2);
	    		     $itemsubcatids=$res2->result_array();
			    	 $iemcatcount=$res2->num_rows();
	    		     if(@$iemcatcount>0)
	    		     {

	    		    $ii = 0;
					$iids = '';
					foreach($itemsubcatids as $itemsubcat_ids)
					{
						if($ii > 0) $iids .= ', ';  
						$iids .= $itemsubcat_ids['itemsubcat_id'];
						$ii++; 
					}
					$qry5='UPDATE item_subcategory set status_id=2 WHERE itemsubcat_id IN('.$iids.')';
						$this->db->query($qry5);

					 $qry3='SELECT item_id from item WHERE itemsubcat_id IN('.$iids.')';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=2 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}
				
				
				
		 }
	     public function activatesubcategory($cat_id)
	     {
		     $qry = 'UPDATE subcategory SET status_id = "1" WHERE subcat_id='.@$cat_id.''; 
		     $this->db->query($qry);   

	    		     $qry2='SELECT itemsubcat_id from item_subcategory WHERE subcat_id='.@$cat_id.''; 
	    		     $res2=$this->db->query($qry2);
	    		     $itemsubcatids=$res2->result_array();
			    	 $iemcatcount=$res2->num_rows();
	    		     if(@$iemcatcount>0)
	    		     {

	    		    $ii = 0;
					$iids = '';
					foreach($itemsubcatids as $itemsubcat_ids)
					{
						if($ii > 0) $iids .= ', ';  
						$iids .= $itemsubcat_ids['itemsubcat_id'];
						$ii++; 
					}
								$qry5='UPDATE item_subcategory set status_id=1 WHERE itemsubcat_id IN('.$iids.')';
						$this->db->query($qry5);

					 $qry3='SELECT item_id from item WHERE itemsubcat_id IN('.$iids.')';
	    		     $res3=$this->db->query($qry3);
	    		     $itemids=$res3->result_array();
	    		     $itemcount=$res3->num_rows();
	    		     if(@$itemcount>0)
	    		     {
		    		    $iii = 0;
						$iiids = '';
						foreach($itemids as $item_ids)
						{
							if($iii > 0) $iiids .= ', ';  
							$iiids .= $item_ids['item_id'];
							$iii++; 
						}

						$qry4='UPDATE item set status_id=1 WHERE item_id IN('.$iiids.')';
						$this->db->query($qry4);	    		    
					}
				}
				
				
				
		 }
}
?>