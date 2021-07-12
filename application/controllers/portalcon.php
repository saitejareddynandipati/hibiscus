<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class portalcon extends CI_Controller {
	public function home()
	{
		$data['pageTitle'] = 'Home';
		$this->load->view('portal/portalhome');
	}
	public function index()
	{

		$data['nestedView']['heading']="Hibiscus Home Page ";
		
		$data['nestedView']['cur_page'] = 'index';
		$data['nestedView']['parent_page'] = 'home';
		

		
		$data['nestedView']['js_includes'] = array();
		$data['nestedView']['css_includes'] = array();	
		$data['nestedView']['pageTitle'] = 'Home Page';



		
		$this->load->view('portal/index', $data);

	}

	}
	?>