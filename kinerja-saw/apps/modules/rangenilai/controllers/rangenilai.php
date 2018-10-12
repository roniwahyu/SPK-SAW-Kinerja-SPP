<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class rangenilai extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('rangenilai_model','rangenilaidb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','rangenilai');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Rangenilai');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'rangenilai/";','embed');  
        $this->template->add_js('modules/rangenilai.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('rangenilai_view',array(
                        'title'=>'Kelola Data Rangenilai',
                        'subtitle'=>'Pengelolaan Rangenilai',
                        'breadcrumb'=>array(
                            'Rangenilai'),
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
        $this->datatables->select('id_range_nilai,range,nilai,bobot,minvalue,maxvalue,method,datetime,')
                        ->from('rangenilai');
        echo $this->datatables->generate();
    }

   

    public function get($id_range_nilai=null){
        if($id_range_nilai!==null){
            echo json_encode($this->rangenilaidb->get_one($id_range_nilai));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_range_nilai')){
            $this->rangenilaidb->update($this->input->post('id_range_nilai'));
          }else{
            $this->rangenilaidb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_range_nilai')){
                $this->rangenilaidb->update($this->input->post('id_range_nilai'));
              }else{
                $this->rangenilaidb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->rangenilaidb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
