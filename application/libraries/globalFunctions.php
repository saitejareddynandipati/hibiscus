<?php

class globalFunctions
{
	public function encode_sctm($str)
	{
	$adstr = "stARt=";
	$en1=base64_encode($str);
	$en1=strrev($en1);
	$en11=$en1.$adstr;
	$en2=base64_encode($en11);
	$en2=strrev($en2);
	return $en2;
	}

	public function decode_sctm($str)
	{
	$der=strrev($str);
	$de1=base64_decode($der);
	$de11=str_replace("stARt=","",$de1);
	$de1=strrev($de11);
	$de2=base64_decode($de1);
	return $de2;
	}

	public function getyymmddFormat($dat)
	 {
	     if(!empty($dat))
	        {
	            list( $day,$month, $year) = explode('-', $dat);
	            $date= $year."-".$month."-".$day;
	            return $date;
	        }
	        else
	        {
	            return "";
	        }
	 }
	 
	 public function getddmmyyFormat($dat)
	 {
	     if(!empty($dat))
	        {
	            list( $year,$month,$day) = explode('-', $dat);
	            $date= $day."-".$month."-".$year;
	            return $date;
	        }
	        else
	        {
	            return "";
	        }
	 }
	 
	 public function get_months()
	 {
		 $months = array(1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December');
		 return $months;
	 }


	public function draw_pagination($start,$total,$link,$len=10) {

	   $en = $start +$len;
		if($start==0)
		{
			if($total>0)
			{
				$start1=1;
			}
			else 
			{
				$start1=0;
			}
		}
		else 
		{
			$start1=$start+1;
		}
		if($en>$total)
			$en = $total;
		if($total!=0)
				$pagecount=($total % $len)?(intval($total / $len)+1):($total / $len);
		else
		{
			//print("<span align=center class='bodytext' ><br>No Results found<br></span>");
			$pagecount=0;
			return;
		}
		print "<div class='row'><div class='col-sm-8'><div class='col-sm-4'>";
		print "<div class='pull-left'><div class='dataTables_info' id='datatable_info'></div></div></div>";
		print "<div class='pull-right'><div class='dataTables_paginate paging_bs_normal'><ul class='pagination'>";
			if($en>$len)
			{
			$en1=$start-$len;
			print "<li class='prev'><a href='$link&start=$en1'><span class='fa fa-angle-left'></span>&nbsp;Previous</a></li>" ;
			}
			else
				print "<li class='prev disabled'><a href='#'><span class='fa fa-angle-left'></span>&nbsp;Previous</a></li>" ;
			
			// Caliculating Page Values
			$numstr="";
			$curpage=intval(($start+1)/$len)+1;
			if($pagecount > 10)
			{
				
				$istart=(intval($curpage/10) * 10)+1;
				if($istart + 10 > $pagecount)
					$istart=$pagecount - 9;
				$pagecount=10;
			}
			else
				$istart=1;
			for($i=$istart;$i<$pagecount+$istart;$i++)
			{
				$ed=($i-1)*$len;
				if($start!=$ed)
				{
					$numstr.= " <li><a href='$link&start=$ed'> $i </a></li>";
					
				}
				else { 
					//if($i >1 )
						$numstr.= "<li class='active'><a href='#'> $i </a></li>";
					//else
						//$numstr.= "<span class='bodytext'> | </span>";
				}
			}
			print $numstr;
			if($en<$total)
			{
				$en2=$start+$len;
				print "<li class='next'><a href='$link&start=$en2'>Next&nbsp;<span class='fa fa-angle-right'></span></a></li>" ;
			}
			else
				print "<li class='next disabled'><a href='#'>Next&nbsp;<span class='fa fa-angle-right'></span></a></li>" ;
		print "</ul></div></div><div class='clearfix'></div></div></div>";
			
	}

	public function getDefaultPerPageRecords()
	{
		return 9;
	}

	public function DateFormatAM($timestamp)
	{
		$time = strtotime($timestamp);
		return date('d M Y h:i A',$time);
	}

	public function DateFormat($timestamp)
	{
		$time = strtotime($timestamp);
		return date('d M Y',$time);
	}

	public function getStatus($s)
	{
		switch($s)
		{
			case 'O':
				$status = 'Pending with Store';
				break;
			case 'D':
				$status = 'Cancelled';
				break;
			case 'C':
				$status = 'Closed';
				break;
			case 'S':
				$status = 'Added to Repair Bay';
				break;
		}	
		return $status;
	}

	public function getMStatus($s)
	{
		switch($s)
		{
			case 'O':
				$status = 'Issue - Pending with Store';
				break;
			case 'D':
				$status = 'Cancelled';
				break;
			case 'C':
				$status = 'Closed';
				break;
			case 'S':
				$status = 'Added to Repair Bay';
				break;
			case 'R':
				$status = 'Return - Pending with Store';
				break;
			case 'W':
				$status = 'Return/Waiting for Closure';
				break;			
			case 'PC':
				$status = 'Some Tools are Calibrated';
				break;				
		}	
		return $status;
	}

	public function getNStatus($s)
	{
		switch($s)
		{
			case 'O':
				$status = 'Issue - Pending with Store';
				break;
			case 'A':
				$status = 'Issue Pending from EE';
				break;
			case 'D':
				$status = 'Cancelled';
				break;
			case 'C':
				$status = 'Closed';
				break;
			case 'CA':
				$status = 'All Transactions are Cancelled';
				break;
			case 'R':
				$status = 'Return - Pending with Store';
				break;
			case 'W':
				$status = 'Waiting for Resolved';
				break;		
			case 'OR':
				$status = 'Issue & Return - Pending with Store';
				break;
			case 'RA':
				$status = 'Pending Action';
				break;
			case 'RR':
				$status = 'Waiting for closure';
				break;		
			case 'CB':
				$status = 'Pending Action from stores';
				break;
			case 'CC':
				$status = 'Closed';
				break;			
		}	
		return $status;
	}

	public function getRStatus($s)
	{
		switch($s)
		{
			case 'O':
				$status = 'Pending with Store';
				break;
			case 'P':
				$status = 'Pending for Action';
				break;
			case 'D':
				$status = 'Cancelled';
				break;
			case 'C':
				$status = 'Closed';
				break;
			case 'CA':
				$status = 'All Transactions are Cancelled';
				break;
			case 'R':
				$status = 'Return - Pending with Store';
				break;
			case 'W':
				$status = 'Waiting for Resolved';
				break;		
			case 'OR':
				$status = 'Issue & Return - Pending with Store';
				break;
			case 'RA':
				$status = 'Pending Action';
				break;
			case 'RR':
				$status = 'Waiting for closure';
				break;		
			case 'CB':
				$status = 'Pending Action from stores';
				break;
			case 'CC':
				$status = 'Closed';
				break;	
			case 'S':
				$status = 'Pending for Return';
				break;	
			default:
				$status = 'A';
				break;
		}	
		return $status;
	}

	# To get all the calibration options
	public function getCalOptions()
	{
		$cOptions = array('Y'=>'Yes','N'=>'No');
		return $cOptions;
	}
	# To get all the Component Material Class options
	public function getCompMatClassOptions()
	{
		$mcOptions = array('A','B','C');
		return $mcOptions;
	}
	public function _component_image_path()
	{
		return 'uploads/';
	}

	public function generatePartNumber($shop,$equipTypeTag,$componentId)
	{
		$partNum = '';
		if($shop!=''&&$componentId>0)
	 	{
			$partNum.=$shop;
			if($equipTypeTag!='')
			{
				$partNum.='-'.$equipTypeTag;
		 	}
		 	$partNum.='-'.$componentId;
	 	}
	 	return $partNum;	
	}

	public function getComponentsImagePath() 
 	{
		$url = SITE_URL.'application/uploads/components';
		return $url;
 	}

 	public function getComponentLabel($componentType)
	{
		switch($componentType)
		{
			case 1:
				$componentLabel = 'Spare';
			break;
			case 2:
				$componentLabel = 'Consumable';
			break;
			case 3:
				$componentLabel = 'Tool';
			break;
			default:
				$componentLabel = 'Component';
			break;
		}
		return $componentLabel;
	}



}

?>