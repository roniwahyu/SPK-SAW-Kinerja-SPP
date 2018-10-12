<?php 

class Members extends MX_Controller{
	function __construct(){
		parent::__construct();
		
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','template','Ion_auth/Ion_auth'));
        $this->load->library('form_validation');
        $this->load->model('rapat_pimpinan/rapat_pimpinan_model','rapimdb',TRUE);
        $this->load->model('rapat/rapat_model','rapatdb',TRUE);
        $this->load->model('pimpinan_user/pimpinan_user_model','pimuserdb',TRUE);
        $this->load->helper('url','form');
     
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        if ( !$this->ion_auth->logged_in()): 
                    redirect('auth/login', 'refresh');
        else:
            //Officers
            if(!$this->ion_auth->in_group(4)){
                redirect('auth/login', 'refresh');
            }
        endif;
        $this->lang->load('auth');
        $this->load->helper('language');
	}
	function index(){
        $this->template->set_title('Aplikasi Rekomendasi');
        $this->template->set_layout('home');
        $this->template->add_css('datepicker3.css');
        $this->template->add_js('bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('modules/crud.js');
        $user = $this->ion_auth->user()->row();
        $data_user=$this->pimuserdb->get_pim_user($user->user_id);
        // print_r();
        if($data_user!=null){
            // $data_user['id_pimpinan']!=null
            $datax=$this->show_rapat($data_user['id_pimpinan']);
        }else{
            $datax="";
            $datax='
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Perhatian!!</strong> Akun Anda belum terdaftar di Manajemen Data Pimpinan
            </div>';
        }
        $this->template->load_view('site',array(
            'element'=>'register',
            'data'=>$datax,
            'heading_data'=>'Anda Terdaftar Pada Rapat Berikut',
            ));

    }

    function show_rapat($id){
        $data=$this->rapimdb->get_where_pimpinanid($id);
        $user = $this->ion_auth->user()->row();
        $div="";
        $div.='
        <div class="stok" style="background:#ffffff;">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="">ID</th>
                        
                        
                        <th style="">Tanggal Rapat</th>
                        <th style="">Semester</th>
                        <th style="">Tahun Ajaran</th>
                        <th style="">Status Rapat</th>
                        
                    </tr>
                </thead>
                <tbody>';

        foreach ($data as $key => $value) {
            
            $div.='<tr>';
            $div.='<td>'.$value['id_rapat'].'</td>';
            $div.='<td>'.$value['tgl_rapat'].'</td>';
            $div.='<td>'.$value['semester'].'</td>';
            $div.='<td>'.$value['thn_ajaran'].'</td>';
            $div.='<td>'.$value['status'].'</td>';
         
            $div.='<th>';
            $div.='<a href="'.base_url('wizard/nilai').'/'.$user->id.'/'.$value["id_rapat"].'" class="btn btn-info btn-md">Nilai Kenaikan SPP</a>';
            $div.='</th>';
            $div.='</tr>';

            # code...
        }
        $div.='
                </tbody>
            </table>
        </div>';
        return $div;
    }

    

    
}

 ?>