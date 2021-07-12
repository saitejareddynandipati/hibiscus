<?php
$this->load->view('commons/maintemplate',$nestedView); 

// to show User Interface Based on Level Id
switch(@$_SESSION['role_id'])
{
	case 1:
		header('Location: '.SITE_URL.'admin');exit;
		break;
	case 2:
		header('Location: '.SITE_URL.'products');exit;
		break;
	

	default:
		header('Location: '.SITE_URL.'products');exit;
		break;
}


$this->load->view('commons/mainfooter',$nestedView); 

?>