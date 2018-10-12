<?php 

class Site extends MX_Controller{
	function __construct(){
		parent::__construct();
		
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','template','Ion_auth/Ion_auth'));
        $this->load->library('form_validation');
        $this->load->helper('url','form');
     
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
        $this->lang->load('auth');
        $this->load->helper('language');
	}
	function index(){
		$this->template->set_title('Aplikasi Basket');
        $this->template->set_layout('home');
        $this->template->add_css('datepicker3.css');
        $this->template->add_js('bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');

		$this->template->load_view('site',array(
			'element'=>'register',
            'jadwal'=>'jadwal'
			));

	}

    
}

 ?>