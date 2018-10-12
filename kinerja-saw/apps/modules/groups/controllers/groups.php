<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class groups extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('groups_model','groupsdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','groups');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Groups');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'groups/";','embed');  
        $this->template->add_js('modules/groups.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
        $this->ckeditor();
        $this->template->load_view('groups_view',array(
                        'title'=>'Kelola Data Groups',
                        'subtitle'=>'Pengelolaan Groups',
                        'breadcrumb'=>array(
                            'Groups'),
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
        $this->datatables->select('id,name,description,')
                        ->from('groups');
        echo $this->datatables->generate();
    }

   

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->groupsdb->get_one($id));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->groupsdb->update($this->input->post('id'));
          }else{
            $this->groupsdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->groupsdb->update($this->input->post('id'));
              }else{
                $this->groupsdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->groupsdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}
