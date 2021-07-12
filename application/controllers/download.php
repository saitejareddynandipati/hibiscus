<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once (__DIR__).'/../libraries/globalFunctions.php';
require_once (__DIR__).'/../libraries/curl-operations.php';

class download extends CI_Controller 
{
public function export_orders()
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
		$order_number = @$_REQUEST['order_number'];
		$status_id = @$_REQUEST['status_id'];
		$phone_number = @$_REQUEST['phone_number'];
		$customer_name = @$_REQUEST['customer_name'];
		$ordered_date = @$_REQUEST['ordered_date'];
		$ordered_date2 = @$_REQUEST['ordered_date2'];

		$this->load->model('downloadmodel');
		$result = $this->downloadmodel->orders($order_number,$status_id,$phone_number,$customer_name,$ordered_date,$ordered_date2);
		$count = $result['count'];
		$res = $result['res'];


		$header = '';
		$data ='';
		$titles = array('S.NO','Order Number','Customer Name','Phone Number','E-Mail ID','Ordered Date','Status Name');
		$data = '<table border="1">';
		$data.='<thead>';
		$data.='<tr>';
		foreach ( $titles as $title)
		{
		    $data.= '<th>'.$title.'</th>';
		}
		$data.='</tr>';
		$data.='</thead>';
		$data.='<tbody>';
		$j=1;

		if($count > 0)
		{
			foreach($res as $row)
			{
				$data.='<tr>';
				$data.='<td align="center">'.$j.'</td>';
				$data.='<td>'.$row['order_number'].'</td>';
				$data.='<td>'.$row['user_name'].'</td>';
				$data.='<td>'.$row['phone_number'].'</td>';
				$data.='<td>'.$row['email'].'</td>';

				$data.='<td>'.$row['ordered_date'].'</td>';

				$data.='<td>'.$row['status_name'].'</td>';

				$data.='</tr>';
				$j++;
			}
		}
		else
		{
			$data.='<tr><td colspan="3" align="center">No Shops Found</td></tr>';
		}
		$data.='</tbody>';
		$data.='</table>';
		$time = date("Ymdhis");
		$xlFile='orders_'.$time.'.xls'; 
		header("Content-type: application/x-msdownload"); 
		# replace excelfile.xls with whatever you want the filename to default to
		header("Content-Disposition: attachment; filename=".$xlFile."");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $data;
	}
}