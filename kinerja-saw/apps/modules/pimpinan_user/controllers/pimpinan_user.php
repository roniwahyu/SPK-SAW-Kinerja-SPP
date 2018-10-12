<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class pimpinan_user extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('pimpinan_user_model','pimpinan_userdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','pimpinan_user');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Pimpinan_user');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'pimpinan_user/";','embed');  
        $this->template->add_js('modules/pimpinan_user.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('pimpinan_user_view',array(
                        'title'=>'Kelola Data Pimpinan_user',
                        'subtitle'=>'Pengelolaan Pimpinan_user',
                        'userid'=>$this->pimpinan_userdb->get_drop_user(),
                        'pimpinan'=>$this->pimpinan_userdb->get_drop_pimpinan(),
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
        $this->datatables->select('id_user_pimpinan,kode,nama_pimpinan,username,email,datetime,')
                        ->from('01-view-pimpinan-user');
        echo $this->datatables->generate();
    }

   

    public function get($id_user_pimpinan=null){
        if($id_user_pimpinan!==null){
            echo json_encode($this->pimpinan_userdb->get_one($id_user_pimpinan));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_user_pimpinan')){
            $this->pimpinan_userdb->update($this->input->post('id_user_pimpinan'));
          }else{
            $this->pimpinan_userdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_user_pimpinan')){
                $this->pimpinan_userdb->update($this->input->post('id_user_pimpinan'));
              }else{
                $this->pimpinan_userdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pimpinan_userdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module pimpinan_user Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
