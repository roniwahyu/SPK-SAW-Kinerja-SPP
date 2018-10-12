<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class bobot_pm extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('bobot_pm_model','bobot_pmdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','bobot_pm');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Bobot_pm');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'bobot_pm/";','embed');  
        $this->template->add_js('modules/bobot_pm.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('bobot_pm_view',array(
                        'title'=>'Kelola Data Bobot_pm',
                        'subtitle'=>'Pengelolaan Bobot_pm',
                        'breadcrumb'=>array(
                            'Bobot_pm'),
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
        $this->datatables->select('id_bobot,selisih,bobot,keterangan,datetime,')
                        ->from('bobot_pm');
        echo $this->datatables->generate();
    }

   

    public function get($id_bobot=null){
        if($id_bobot!==null){
            echo json_encode($this->bobot_pmdb->get_one($id_bobot));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_bobot')){
            $this->bobot_pmdb->update($this->input->post('id_bobot'));
          }else{
            $this->bobot_pmdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_bobot')){
                $this->bobot_pmdb->update($this->input->post('id_bobot'));
              }else{
                $this->bobot_pmdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->bobot_pmdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

