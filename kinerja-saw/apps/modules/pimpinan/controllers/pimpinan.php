<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class pimpinan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('pimpinan_model','pimpinandb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','pimpinan');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Pimpinan');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'pimpinan/";','embed');  
        $this->template->add_js('modules/pimpinan.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('pimpinan_view',array(
                        'title'=>'Kelola Data Pimpinan',
                        'subtitle'=>'Pengelolaan Pimpinan',
                        'breadcrumb'=>array(
                            'Pimpinan'),
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
        $this->datatables->select('id_pimpinan,kode,nama_pimpinan,jabatan,datetime,')
                        ->from('pimpinan');
        echo $this->datatables->generate();
    }

   

    public function get($id_pimpinan=null){
        if($id_pimpinan!==null){
            echo json_encode($this->pimpinandb->get_one($id_pimpinan));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_pimpinan')){
            $this->pimpinandb->update($this->input->post('id_pimpinan'));
          }else{
            $this->pimpinandb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_pimpinan')){
                $this->pimpinandb->update($this->input->post('id_pimpinan'));
              }else{
                $this->pimpinandb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pimpinandb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
