<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class bobot_saw extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('bobot_saw_model','bobot_sawdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','bobot_saw');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Bobot_saw');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'bobot_saw/";','embed');  
        $this->template->add_js('modules/bobot_saw.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('bobot_saw_view',array(
                        'title'=>'Kelola Data Bobot_saw',
                        'subtitle'=>'Pengelolaan Bobot_saw',
                        'breadcrumb'=>array(
                            'Bobot_saw'),
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
        $this->datatables->select('id_bobot,bobot,keterangan,datetime,')
                        ->from('bobot_saw');
        echo $this->datatables->generate();
    }

   

    public function get($id_bobot=null){
        if($id_bobot!==null){
            echo json_encode($this->bobot_sawdb->get_one($id_bobot));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_bobot')){
            $this->bobot_sawdb->update($this->input->post('id_bobot'));
          }else{
            $this->bobot_sawdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_bobot')){
                $this->bobot_sawdb->update($this->input->post('id_bobot'));
              }else{
                $this->bobot_sawdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->bobot_sawdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
