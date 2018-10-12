<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class rapat_pimpinan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('rapat_pimpinan_model','rapat_pimpinandb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','rapat_pimpinan');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Rapat_pimpinan');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'rapat_pimpinan/";','embed');  
        $this->template->add_js('modules/rapat_pimpinan.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('rapat_pimpinan_view',array(
                        'title'=>'Kelola Data Rapat_pimpinan',
                        'subtitle'=>'Pengelolaan Rapat_pimpinan',
                        'breadcrumb'=>array(
                            'Rapat_pimpinan'),
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
        $this->datatables->select('rapat_pim_id,id_pimpinan,id_rapat,datetime,')
                        ->from('rapat_pimpinan');
        echo $this->datatables->generate();
    }

   

    public function get($rapat_pim_id=null){
        if($rapat_pim_id!==null){
            echo json_encode($this->rapat_pimpinandb->get_one($rapat_pim_id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('rapat_pim_id')){
            $this->rapat_pimpinandb->update($this->input->post('rapat_pim_id'));
          }else{
            $this->rapat_pimpinandb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('rapat_pim_id')){
                $this->rapat_pimpinandb->update($this->input->post('rapat_pim_id'));
              }else{
                $this->rapat_pimpinandb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->rapat_pimpinandb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module rapat_pimpinan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
