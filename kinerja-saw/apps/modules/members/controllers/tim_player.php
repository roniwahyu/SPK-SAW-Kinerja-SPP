<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class tim_player extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','ion_auth/ion_auth'));
        $this->load->model('tim_player_model','tim_playerdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','tim_player');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Tim_player');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'tim_player/";','embed');  
        $this->template->add_js('modules/tim_player.js');
        $this->template->add_js('modules/crud.min.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
        
     
        $this->template->load_view('tim_player_view',array(
                        'title'=>'Kelola Data Tim_player',
                        'subtitle'=>'Pengelolaan Tim_player',
                        'breadcrumb'=>array(
                            'Tim_player'),
                        ));
        
    }
     
    
    //<!-- Start Primary Key -->
    

    public function getdatatables(){
        $this->datatables->select('id_player,id_tim,nama,deskripsi,posisi1,posisi2,tgl_lahir,usia,alamat,kota,no_punggung,tinggi,berat,total_score,datetime,')
                        ->from('tim_player');
        echo $this->datatables->generate();
    }

   

    public function get($id_player=null){
        if($id_player!==null){
            echo json_encode($this->tim_playerdb->get_one($id_player));
        }
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_player')){
            $this->tim_playerdb->update($this->input->post('id_player'));
          }else{
            $this->tim_playerdb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_player')){
                $this->tim_playerdb->update($this->input->post('id_player'));
              }else{
                $this->tim_playerdb->save();
              }
          }
        }
    }

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->tim_playerdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module tim_player Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
