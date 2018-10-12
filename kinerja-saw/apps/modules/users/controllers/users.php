<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class users extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('users_model','usersdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','users');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        elseif (!$this->ion_auth->is_admin()): //remove this elseif if you want to enable this for non-admins
        
            //redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Users');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'users/";','embed');  
        $this->template->add_js('var authurl="'.base_url().'auth/";','embed');  
        $this->template->add_js('modules/users.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('users_view',array(
                        'title'=>'Kelola Data Users',
                        'subtitle'=>'Pengelolaan Users',
                        'breadcrumb'=>array(
                            'Users'),
                        ));
        
    }
     
    public function ckeditor(){
        session_start();
            $_SESSION['KCFINDER']=array();
            $_SESSION['kcfinder'] = FALSE;
            $_SESSION['KCFINDER']['disabled'] = false;
            $_SESSION['KCFINDER']['uploadURL'] = "../uploads";
            // $this->template->load_view('ckeditor/admin');

    }
    //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('id,username,first_name,last_name,email,active')
                        ->from('users');
        echo $this->datatables->generate();
    }
    public function getdatatablesx(){
        $this->datatables->select('id,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,phone,')
                        ->from('users');
        echo $this->datatables->generate();
    }

   

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->usersdb->get_one($id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->usersdb->update($this->input->post('id'));
          }else{
            $this->usersdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->usersdb->update($this->input->post('id'));
              }else{
                $this->usersdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->usersdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module users Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
