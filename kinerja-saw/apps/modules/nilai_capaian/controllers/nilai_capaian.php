<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class nilai_capaian extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('nilai_capaian_model','nilai_capaiandb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','nilai_capaian');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Nilai_capaian');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'nilai_capaian/";','embed');  
        $this->template->add_js('modules/nilai_capaian.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('nilai_capaian_view',array(
                        'title'=>'Kelola Data Nilai_capaian',
                        'subtitle'=>'Pengelolaan Nilai_capaian',
                        'breadcrumb'=>array(
                            'Nilai_capaian'),
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
        $this->datatables->select('capaian_id,metode,logika,nilai_capaian,datetime,')
                        ->from('nilai_capaian');
        echo $this->datatables->generate();
    }

   

    public function get($capaian_id=null){
        if($capaian_id!==null){
            echo json_encode($this->nilai_capaiandb->get_one($capaian_id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('capaian_id')){
            $this->nilai_capaiandb->update($this->input->post('capaian_id'));
          }else{
            $this->nilai_capaiandb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('capaian_id')){
                $this->nilai_capaiandb->update($this->input->post('capaian_id'));
              }else{
                $this->nilai_capaiandb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->nilai_capaiandb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

