<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class rapat extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','Ion_auth/Ion_auth'));
        $this->load->model('rapat_model','rapatdb',TRUE);
        $this->load->model('pimpinan/pimpinan_model','pimdb',TRUE);
        $this->load->model('rapat_pimpinan/rapat_pimpinan_model','rapimdb',TRUE);
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','rapat');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
    }

    public function index() {
        $this->template->set_title('Kelola Rapat');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'rapat/";','embed');  
        $this->template->add_js('modules/rapat.js');
        $this->template->add_js('modules/crud.js');
        $this->template->add_js('plugins/interface/datatables.min.js');
        $this->template->add_js('modules/datatables-setup.min.js');
         $this->template->add_css('datepicker3.css');
         $this->template->add_js('bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        
        $this->template->load_view('rapat_view',array(
                        'title'=>'Kelola Data Rapat',
                        'subtitle'=>'Pengelolaan Rapat',
                        'breadcrumb'=>array(
                            'Rapat'),
                        ));
        
    }
   

    public function getdatatables(){
        $this->datatables->select('rapat_id,tgl_rapat,semester,thn_ajaran,status,keterangan,datetime,')
                        ->from('rapat');
        echo $this->datatables->generate();
    }

   

    public function get($rapat_id=null){
        if($rapat_id!==null){
            echo json_encode($this->rapatdb->get_one($rapat_id));
        }
    }

    public function submit(){
        $data=$this->pimdb->get_pimpinan();
        if ($this->input->post('ajax')){
          if ($this->input->post('rapat_id')){
            $this->rapatdb->update($this->input->post('rapat_id'));

          }else{
            $this->rapatdb->save();
          }
          if($this->input->post('checkit')){
            $checkit=$this->input->post('checkit');
            $count=count($checkit);
            for ($i=0; $i <$count ; $i++) { 
                # code...
                $data_rapat[]=array(
                    'id_pimpinan'=>$checkit[$i],
                    'id_rapat'=>$this->input->post('rapat_id'),
                    'datetime'=>date('Y-m-d H:m:s'),
                    );
            }
            $this->rapimdb->delete_pimpinan($this->input->post('rapat_id'));
            echo $this->rapimdb->insert_batch($data_rapat);

          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('rapat_id')){
                $this->rapatdb->update($this->input->post('rapat_id'));
              }else{
                $this->rapatdb->save();
              }
          }
        }
    }

    function show_pimpinan($id=null){
      
        $data=$this->pimdb->get_pimpinan();
        $div="";
        $div.='
        <div class="pimpinan" style="background:#ffffff;">
            <form class="" action="" method="POST" id="peserta">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width:40px"><input type="checkbox" name="checkall" class="checkall" id="checkall"></th>
                        <th style="width:40px">ID</th>
                        <th style="width:80px">Kode</th>
                        <th style="width:200px">Nama Pimpinan</th>
                        <th style="width:300px">Jabatan</th>
                       
                       
                        
                    </tr>
                </thead>
                <tbody>';
        if($id!==null){
            $datax=$this->rapimdb->get_all_pimpinan($id);
            $count=count($datax);
        }
        $i=0;
        foreach ($data as $key => $value) {
            $div.='<tr>';
            if($datax<>null and ($i<$count)){
                if($datax[$i]['id_pimpinan']==$value['id_pimpinan']){
                    /*echo $value['id_pimpinan']."<br>";
                    echo $datax[$i]['id_pimpinan']."<br>";
                    echo "checked";*/
                   
                    $div.='<th><input type="checkbox" name="checkit[]" value="'.$value['id_pimpinan'].'" class="check" id="check" checked="checked"></th>';
                    $i++;
                }else{
                    $div.='<th><input type="checkbox" name="checkit[]" value="'.$value['id_pimpinan'].'" class="check" id="check"></th>';

                }
            }else{
                $div.='<th><input type="checkbox" name="checkit[]" value="'.$value['id_pimpinan'].'" class="check" id="check"></th>';

            }
            
            $div.='<th>'.$value['id_pimpinan'].'</th>';
            $div.='<th>'.$value['kode'].'</th>';
            $div.='<th>'.$value['nama_pimpinan'].'</th>';
            $div.='<th>'.$value['jabatan'].'</th>';
          
            $div.='</tr>';

            # code...
        }
        $div.='
                </tbody>
            </table>
            <button type="button" name="submit_pimpinan" id="submit-pimpinan" class="btn btn-primary" value="submit_pimpinan">Submit</button>
            </form>
        </div>';
        echo $div;
    }
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->rapatdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    

}

/** Module rapat Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
