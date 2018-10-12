<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class gap_pm extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('gap_pm_model','gap_pmdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','gap_pm');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Gap_pm');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'gap_pm/";','embed');  
        $this->template->add_js('modules/gap_pm.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('gap_pm_view',array(
                        'title'=>'Kelola Data Gap_pm',
                        'subtitle'=>'Pengelolaan Gap_pm',
                        'breadcrumb'=>array(
                            'Gap_pm'),
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
        $this->datatables->select('id_gap,kriteria,a_fasilitas,b_gaji,c_bbm,d,e,f,g,datetime,')
                        ->from('gap_pm');
        echo $this->datatables->generate();
    }

   

    public function get($id_gap=null){
        if($id_gap!==null){
            echo json_encode($this->gap_pmdb->get_one($id_gap));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_gap')){
            $this->gap_pmdb->update($this->input->post('id_gap'));
          }else{
            $this->gap_pmdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_gap')){
                $this->gap_pmdb->update($this->input->post('id_gap'));
              }else{
                $this->gap_pmdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->gap_pmdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

