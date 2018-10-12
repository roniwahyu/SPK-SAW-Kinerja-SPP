<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class kriteria extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('kriteria_model','kriteriadb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','kriteria');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Kriteria');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'kriteria/";','embed');  
        $this->template->add_js('modules/kriteria.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('kriteria_view',array(
                        'title'=>'Kelola Data Kriteria',
                        'subtitle'=>'Pengelolaan Kriteria',
                        'breadcrumb'=>array(
                            'Kriteria'),
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
        $this->datatables->select('id_kriteria,nama_kriteria,kode_kriteria,bobot,metode,datetime,')
                        ->from('kriteria');
        echo $this->datatables->generate();
    }

   

    public function get($id_kriteria=null){
        if($id_kriteria!==null){
            echo json_encode($this->kriteriadb->get_one($id_kriteria));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_kriteria')){
            $this->kriteriadb->update($this->input->post('id_kriteria'));
          }else{
            $this->kriteriadb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_kriteria')){
                $this->kriteriadb->update($this->input->post('id_kriteria'));
              }else{
                $this->kriteriadb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->kriteriadb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

