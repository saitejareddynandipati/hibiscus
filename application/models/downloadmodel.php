<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once (__DIR__).'/../libraries/globalFunctions.php';
require_once (__DIR__).'/../libraries/curl-operations.php';

class downloadmodel extends CI_Model {

	public function orders($order_number,$status_id,$phone_number,$customer_name,$ordered_date,$ordered_date2)
		{			
			$qry="SELECT c.*,o.order_id,o.status_id,o.order_number as order_number,ui.*,
			l.phone_number as phone_number,l.email as email,o.date_add as ordered_date,l.user_name as user_name,s.status as status_name
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

					/*$num_qry = $qry;
					$qry.=" LIMIT ".$start." , ".$len;	*/
				/*echo $qry;
				die();	*/			
					$res = $this->db->query($qry);
				$result['count'] = $res->num_rows();
				$result['res'] = $res->result_array();

				return $result;


		}
}