<?php 

class Site extends MX_Controller{
	function __construct(){
		parent::__construct();
		 if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            //redirect('login', 'refresh');
        }
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','template','Ion_auth/Ion_auth'));
        $this->load->model('site_model','sitedb',TRUE);
        $this->load->library('form_validation');
        $this->load->helper('url','form');
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
	}
	function index(){
        // echo frontend_url();
		$this->template->set_title('Aplikasi Rekomendasi');
        $this->template->set_layout('default');
        $this->template->add_js('stokgudang.js');
        $this->template->add_css('stokgudang.css');
		$this->template->load_view('site',array(
			'element'=>'register',
          
			));

	}
    
    function sukses(){
        $this->template->set_title('Aplikasi Rekomendasi');
        $this->template->set_layout('home');
        $this->template->load_view('sukses',array(
            // 'element'=>'sukses',
            'message'=>$this->session->userdata('message'),
            'link'=>$this->session->userdata('prev_url'),
            ));
    }
    function gagal(){
        $this->template->set_title('Aplikasi Rekomendasi');
        $this->template->set_layout('home');
        $this->template->load_view('gagal',array(
            // 'element'=>'sukses',
            'message'=>$this->session->userdata('message'),
            'link'=>$this->session->userdata('prev_url'),
            ));
    }
    
    function registrasi(){
        $tables = $this->config->item('tables','ion_auth');

        //validate form input

        $this->form_validation->set_rules('username', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
        $this->form_validation->set_rules('password1', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            // $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $username = strtolower($this->input->post('username'));
            $email    = strtolower($this->input->post('email'));
            $password = $this->input->post('password1');

            $additional_data = array(
                'first_name' => $this->input->post('firstname'),
                'last_name'  => $this->input->post('lastname'),
            );
            $groups=array('4');
        }
        // }else{
        //     redirect('site','refresh');
        // }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data,$groups))
        {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_userdata('message', $this->ion_auth->messages());
            $this->session->set_userdata('prev_url',base_url('site'));
            redirect("site/sukses", 'refresh');
        }else{
           $this->session->set_userdata('message',(validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))));
           $this->session->set_userdata('prev_url',base_url('site'));
           redirect("site/gagal", 'refresh');
        }
    }

    //tampilkan laporan profile matching
    function laporan(){
        $this->template->set_title('Laporan');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
        
    
        $this->template->load_view('site',array(
            'saw'=>$this->show_hasil_saw(),
            'promatch'=>$this->show_hasil_promatch(),
            'rapat'=>$this->sitedb->get_drop_rapat(),
            ));
        
    }
    //tampilkan laporan profile matching
    function laporan_periode(){
        $this->template->set_title('Laporan');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
       
        if($this->input->post('rapat_id')){
             $id=$this->input->post('rapat_id');
         }else{
            $id=1;
         }
        $this->template->load_view('site',array(
            'saw'=>$this->show_hasil_rapat_saw($id),
            'promatch'=>$this->show_hasil_rapat_promatch($id),
            'rapat'=>$this->sitedb->get_drop_rapat(),
            ));
        
    }
    function laporan_promatch(){

    }

    //pembobotan profile matching
    function weighted_promatch(){
        $matrix=$this->sitedb->get_matrix_promatch();
         $data_a=$this->sitedb->get_nilai_weighted('weight_a','wa');
         $data_b=$this->sitedb->get_nilai_weighted('weight_b','wb');
         $data_c=$this->sitedb->get_nilai_weighted('weight_c','wc');
         $data_d=$this->sitedb->get_nilai_weighted('weight_d','wd');
         $data_e=$this->sitedb->get_nilai_weighted('weight_e','we');
         $data_f=$this->sitedb->get_nilai_weighted('weight_f','wf');
         $data_g=$this->sitedb->get_nilai_weighted('weight_g','wg');
         // $data=array();
         foreach ($matrix as $key => $value) {
             # code...
            $data[]=array(
                'id_pimpinan'=>$value['id_pimpinan'],
                'wc1'=>$data_a[$key]['wa'],
                'wc2'=>$data_b[$key]['wb'],
                'wc3'=>$data_c[$key]['wc'],
                'wc4'=>$data_d[$key]['wd'],
                'wc5'=>$data_e[$key]['we'],
                'wc6'=>$data_f[$key]['wf'],
                'wc7'=>$data_g[$key]['wg'],
                );
         }
        return $data;

    }

    //proses profile matching
    function proses_promatch(){
        $matrix=$this->sitedb->get_matrix_promatch();
        $datax=$this->weighted_promatch();
        foreach ($matrix as $key => $value) {
            $a=$datax[$key]['wc1'];
            $b=$datax[$key]['wc2'];
            $c=$datax[$key]['wc3'];
            $d=$datax[$key]['wc4'];
            $e=$datax[$key]['wc5'];
            $f=$datax[$key]['wc6'];
            $g=$datax[$key]['wc7'];
        
            $ncf=(($a+$d+$e+$f+$g)/5);
            $scf=(($b+$c)/2);
            $n=((60/100)*($ncf))+((40/100)*($scf));
            // echo $n;

            $data[$key]=array(
                'id_pimpinan'=>$value['id_pimpinan'],
                'ncf'=>$ncf,
                'scf'=>$scf,
                'hasil_n'=>$n,
                );
        }

        $this->sitedb->insert_batch($data);
        return $data;
    }
    function get_kriteria_promatch(){
        $data=$this->sitedb->get_kriteria_promatch();

        $count=count($data);
        // print_r($count);
        for ($i=0; $i <$count ; $i++) { 
            # code...
            print_r($data[$i]);
            print_r($data1[$i]);
        }
    }

    //tampilkan laporan berupa matriks SAW dan PROMATCH
    function matriks(){
        $this->template->set_title('Matriks Nilai');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
        
    
        $this->template->load_view('site',array(
            'saw'=>$this->show_matrix_saw(),
            'promatch'=>$this->show_matrix_promatch(),
            'rapat'=>$this->sitedb->get_drop_rapat(),
            ));
        
    }
   
    //tampilkan hasil SAW
    function show_hasil_saw(){
        //Ambil data hasil Profile Matching pada VIEW
        //Proses SAW ini sepenuhnya dilakukan pada VIEW MYSQL 
        //Detail dapat dilihat pada model Site_model --> hasil_promatching
        $data=$this->sitedb->get_hasil_saw();
        $div="";
        $div.='
        <div class="stok" style="background:#ffffff;">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        
                        <th style="width:40px">ID</th>
                        <th style="width:80px">Kode</th>
                        <th style="width:200px">Nama Pimpinan</th>
                        <th style="width:300px">Jabatan</th>
                        <th style="width:200px">Hasil SAW</th>
                        <th>Rekomendasi</th>
                    
                    </tr>
                </thead>
                <tbody>';
        $x=0;
        $y=count($data);
        foreach ($data as $key => $value) {
            $div.='<tr>';
            $div.='<td>'.$value['id_pimpinan'].'</td>';
            $div.='<td>'.$value['kode'].'</td>';
            $div.='<td>'.$value['nama_pimpinan'].'</td>';
            $div.='<td>'.$value['jabatan'].'</td>';

            $div.='<td>'.$value['sum_all'].'</td>';
            
            if($value['sum_all']>=4):
                $div.='<td><a href="" class="btn btn-danger btn-xs"> Naik <icon class="icon icon-arrow-up11"></icon></a></td>';
                $x++;
            else:
                $div.='<td><a href="" class="btn btn-success btn-xs"> Tidak <i class="icon icon-checkmark3"></i></a></td>';
            endif;

            $div.='</tr>';

            # code...
        }
        $div.='<tfoot><tr>';
        $kesimpulan=($x/$y)*100;
        $sisa=$y-$x;
        
            $div.='<th colspan="9" class="text-center">
            <h3>Berdasarkan kelompok rapat yang diikuti '.$y.' peserta, dengan hasil musyawarah '.$x.' peserta merekomendasi naik dan '.$sisa.' peserta tidak naik, dengan persentase '.$x.'/'.$y.' x 100 = '.round($kesimpulan,2).'%</h3>';
        if($kesimpulan>50):
            $div.='<h2><span class="label label-primary">Hasil Metode SAW: '.round($kesimpulan,2).'% SPP NAIK</span></h2> <h2> <i class="icon icon-arrow-down11"></i> </h2>
            <h1><span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-danger">NAIK </span></h1></th>';
        else:
             $div.='<h2><span class="label label-primary">Hasil Metode SAW: '.round($kesimpulan,2).'% SPP TIDAK NAIK</span> </h2><h2> <i class="icon icon-arrow-down11"></i></h2>
            <h1> <span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-success">TIDAK NAIK </span></h1></th>';
        endif;
        $div.='</tr></tfoot>';
        $div.='
                </tbody>
            </table>
        </div>';
        return $div;
    }

    //tampilkan hasil PROFILE MATCHING
    //Proses Profile Matching dilakukan dengan metode hard coding php dan metove view MySQL
    function show_hasil_promatch(){
        //Ambil data hasil Profile Matching pada VIEW
        //Detail dapat dilihat pada model Site_model --> hasil_promatching
        $data=$this->sitedb->hasil_promatching();
        $div="";
        $div.='
        <div class="stok" style="background:#ffffff;">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width:40px">ID</th>
                        <th style="width:80px">Kode</th>
                        <th style="width:200px">Nama Pimpinan</th>
                        <th style="width:300px">Jabatan</th>
                        <th style="width:200px">Hasil Profile Matching</th>
                        <th>Rekomendasi</th>
                    
                    </tr>
                </thead>
                <tbody>';
        $x=0;
        $y=count($data);
          //urutkan nilai hasil
        $datax=$this->proses_promatch();
           
        
        foreach ($data as $key => $value) {
            // $alt=$this->sitedb->get_pimpinan_alt($value['id_pimpinan']);
            $div.='<tr>';
            $div.='<td>'.$value['id_pimpinan'].'</td>';
            $div.='<td>'.$value['kode'].'</td>';
            $div.='<td>'.$value['nama_pimpinan'].'</td>';
            $div.='<td>'.$value['jabatan'].'</td>';
            /*$div.='<td>'.$value['ncf'].'</td>';
            $div.='<td>'.$value['scf'].'</td>';*/
            $div.='<td>'.round($value['hasil_n'],2).'</td>';
            if($value['hasil_n']>=3):
            $div.='<td><a href="" class="btn btn-danger btn-xs"> Naik <i class="icon icon-arrow-up11"></i></a> </td>';
                $x++;
            else:
            $div.='<td><a href="" class="btn btn-success btn-xs">Tidak</a></td>';

            endif;
            $div.='</tr>';

            # code...
        }
        $div.='<tfoot><tr>';
        $kesimpulan=($x/$y)*100;
        $sisa=$y-$x;
        
            $div.='<th colspan="9" class="text-center">
            <h3>Berdasarkan kelompok rapat yang diikuti '.$y.' peserta, dengan hasil musyawarah '.$x.' peserta merekomendasi naik dan '.$sisa.' peserta tidak naik, dengan persentase '.$x.'/'.$y.' x 100 = '.round($kesimpulan,2).'%</h3>';
        if($kesimpulan>50):
            $div.='<h2><span class="label label-primary">Hasil Metode Profile Matching: '.round($kesimpulan,2).'% SPP NAIK</span> </h2><h2> <i class="icon icon-arrow-down11"></i></h2>
            <h1> <span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-danger">NAIK </span></h1></th>';
        else:
            $div.='<h2><span class="label label-primary">Hasil Metode Profile Matching: '.round($kesimpulan,2).'% SPP TIDAK NAIK</span> </h2><h2> <i class="icon icon-arrow-down11"></i></h2>
            <h1> <span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-success">TIDAK NAIK </span></h1></th>';
       
        endif;
        $div.='</tr></tfoot>';
        $div.='
                </tbody>
            </table>
        </div>';
        return $div;
    }
    //tampilkan hasil PROFILE MATCHING - RAPAT PERIODIK
    //Proses Profile Matching dilakukan dengan metode hard coding php dan metove view MySQL
    function show_hasil_rapat_promatch($id){
        //Ambil data hasil Profile Matching pada VIEW
        //Detail dapat dilihat pada model Site_model --> hasil_promatching
        $data=$this->sitedb->get_hasil_rapat_pimpinan_promatch($id);
        $div="";
        $div.='
        <div class="stok" style="background:#ffffff;">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width:40px">ID</th>
                        <th style="width:80px">Kode</th>
                        <th style="width:200px">Nama Pimpinan</th>
                        <th style="width:300px">Jabatan</th>
                        <th style="width:200px">Hasil Profile Matching</th>
                        <th>Rekomendasi</th>
                    
                    </tr>
                </thead>
                <tbody>';
        $x=0;
        $y=count($data);
          //urutkan nilai hasil
     
           
        
        foreach ($data as $key => $value) {
            // $alt=$this->sitedb->get_pimpinan_alt($value['id_pimpinan']);
            $div.='<tr>';
            $div.='<td>'.$value['pimpinan_id'].'</td>';
            $div.='<td>'.$value['kode'].'</td>';
            $div.='<td>'.$value['nama_pimpinan'].'</td>';
            $div.='<td>'.$value['jabatan'].'</td>';
            /*$div.='<td>'.$value['ncf'].'</td>';
            $div.='<td>'.$value['scf'].'</td>';*/
            $div.='<td>'.round($value['hasil_n'],2).'</td>';
            if($value['hasil_n']>=3):
            $div.='<td><a href="" class="btn btn-danger btn-xs"> Naik <i class="icon icon-arrow-up11"></i></a> </td>';
                $x++;
            else:
            $div.='<td><a href="" class="btn btn-success btn-xs">Tidak</a></td>';

            endif;
            $div.='</tr>';

            # code...
        }
        $div.='<tfoot><tr>';
        $kesimpulan=($x/$y)*100;
        $sisa=$y-$x;
        
            $div.='<th colspan="9" class="text-center">
            <h3>Berdasarkan kelompok rapat yang diikuti '.$y.' peserta, dengan hasil musyawarah '.$x.' peserta merekomendasi naik dan '.$sisa.' peserta tidak naik, dengan persentase '.$x.'/'.$y.' x 100 = '.round($kesimpulan,2).'%</h3>';
        if($kesimpulan>50):
            $div.='<h2><span class="label label-primary">Hasil Metode Profile Matching: '.round($kesimpulan,2).'% SPP NAIK</span> </h2><h2> <i class="icon icon-arrow-down11"></i></h2>
            <h1> <span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-danger">NAIK </span></h1></th>';
        else:
            $div.='<h2><span class="label label-primary">Hasil Metode Profile Matching: '.round($kesimpulan,2).'% SPP TIDAK NAIK</span> </h2><h2> <i class="icon icon-arrow-down11"></i></h2>
            <h1> <span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-success">TIDAK NAIK </span></h1></th>';
       
        endif;
        $div.='</tr></tfoot>';
        $div.='
                </tbody>
            </table>
        </div>';
        return $div;
    }
    //tampilkan hasil SAW - RAPAT PERIODIK
    //Proses SAW dilakukan dengan metode hard coding php dan metove view MySQL
    function show_hasil_rapat_saw($id){
        //Ambil data hasil SAW pada VIEW
        //Detail dapat dilihat pada model Site_model
        $data=$this->sitedb->get_hasil_rapat_pimpinan_saw($id);
        $div="";
        $div.='
        <div class="stok" style="background:#ffffff;">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width:40px">ID</th>
                        <th style="width:80px">Kode</th>
                        <th style="width:200px">Nama Pimpinan</th>
                        <th style="width:300px">Jabatan</th>
                        <th style="width:200px">Hasil Profile Matching</th>
                        <th>Rekomendasi</th>
                    
                    </tr>
                </thead>
                <tbody>';
        $x=0;
        $y=count($data);
          //urutkan nilai hasil
     
           
        
        foreach ($data as $key => $value) {
            // $alt=$this->sitedb->get_pimpinan_alt($value['id_pimpinan']);
            $div.='<tr>';
            $div.='<td>'.$value['pimpinan_id'].'</td>';
            $div.='<td>'.$value['kode'].'</td>';
            $div.='<td>'.$value['nama_pimpinan'].'</td>';
            $div.='<td>'.$value['jabatan'].'</td>';
            /*$div.='<td>'.$value['ncf'].'</td>';
            $div.='<td>'.$value['scf'].'</td>';*/
            $div.='<td>'.round($value['sum_all'],2).'</td>';
            if($value['sum_all']>=4):
            $div.='<td><a href="" class="btn btn-danger btn-xs"> Naik <i class="icon icon-arrow-up11"></i></a> </td>';
                $x++;
            else:
            $div.='<td><a href="" class="btn btn-success btn-xs">Tidak</a></td>';

            endif;
            $div.='</tr>';

            # code...
        }
        $div.='<tfoot><tr>';
        $kesimpulan=($x/$y)*100;
        $sisa=$y-$x;
        
            $div.='<th colspan="9" class="text-center">
            <h3>Berdasarkan kelompok rapat yang diikuti '.$y.' peserta, dengan hasil musyawarah '.$x.' peserta merekomendasi naik dan '.$sisa.' peserta tidak naik, dengan persentase '.$x.'/'.$y.' x 100 = '.round($kesimpulan,2).'%</h3>';
        if($kesimpulan>50):
            $div.='<h2><span class="label label-primary">Hasil Metode SAW: '.round($kesimpulan,2).'% SPP NAIK</span> </h2><h2> <i class="icon icon-arrow-down11"></i></h2>
            <h1> <span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-danger">NAIK </span></h1></th>';
        else:
            $div.='<h2><span class="label label-primary">Hasil Metode SAW: '.round($kesimpulan,2).'% SPP TIDAK NAIK</span> </h2><h2> <i class="icon icon-arrow-down11"></i></h2>
            <h1> <span class="label label-default"> Kesimpulan Akhir:</span> <span class="label label-success">TIDAK NAIK </span></h1></th>';
       
        endif;
        $div.='</tr></tfoot>';
        $div.='
                </tbody>
            </table>
        </div>';
        return $div;
    }

    //Untuk Menampilkan Matriks Penilaian SAW
    function show_matrix_saw(){
        //Ambil data matriks SAW dari VIEW. 
        //Lebih detail dapat dilihat didalam model Site_model --> get_matrix_saw
        $data=$this->sitedb->get_matrix_saw();
        $div="";
        $div.='
        <div class="stok" style="background:#ffffff;">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width:40px">ID</th>
                        <th style="width:80px">Kode</th>
                        <th style="width:200px">Nama Pimpinan</th>
                        <th style="width:300px">Jabatan</th>
                        <th style="">C1</th>
                        <th style="">C2</th>
                        <th style="">C3</th>
                        <th style="">C4</th>
                        <th style="">C5</th>
                        <th style="">C6</th>
                        <th style="">C7</th>
                        <th style="">SAW</th>
                        
                    </tr>
                </thead>
                <tbody>';

        foreach ($data as $key => $value) {
            $hasilsaw=$this->sitedb->get_output_saw($value['id_pimpinan']);
            $div.='<tr>';
            $div.='<th>'.$value['id_pimpinan'].'</th>';
            $div.='<th>'.$value['kode'].'</th>';
            $div.='<th>'.$value['nama_pimpinan'].'</th>';
            $div.='<th>'.$value['jabatan'].'</th>';
            $div.='<td>'.$value['C1'].'</td>';
            $div.='<td>'.$value['C2'].'</td>';
            $div.='<td>'.$value['C3'].'</td>';
            $div.='<td>'.$value['C4'].'</td>';
            $div.='<td>'.$value['C5'].'</td>';
            $div.='<td>'.$value['C6'].'</td>';
            $div.='<td>'.$value['C7'].'</td>';
            $div.='<th>'.$hasilsaw['sum_all'].'</th>';
            $div.='</tr>';

            # code...
        }
        $div.='
                </tbody>
            </table>
        </div>';
        return $div;
    }
    function show_matrix_promatch(){
        $data=$this->sitedb->get_matrix_promatch();
        $div="";
        $div.='
        <div class="stok" style="background:#ffffff;">
            <table id="dt-tables" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="width:40px">ID</th>
                        <th style="width:80px">Kode</th>
                        <th style="width:200px">Nama Pimpinan</th>
                        <th style="width:300px">Jabatan</th>
                        <th style="">C1</th>
                        <th style="">C2</th>
                        <th style="">C3</th>
                        <th style="">C4</th>
                        <th style="">C5</th>
                        <th style="">C6</th>
                        <th style="">C7</th>
                        <th style="">Hasil</th>
                    </tr>
                </thead>
                <tbody>';
        // $datax=$this->proses_promatch();
        foreach ($data as $key => $value) {
            // $hasilpromatch=$this->sitedb->get_output_promatch($value['id_pimpinan']);
            $div.='<tr>';
            $div.='<th>'.$value['id_pimpinan'].'</th>';
            $div.='<th>'.$value['kode'].'</th>';
            $div.='<th>'.$value['nama_pimpinan'].'</th>';
            $div.='<th>'.$value['jabatan'].'</th>';
            $div.='<td>'.$value['C1'].'</td>';
            $div.='<td>'.$value['C2'].'</td>';
            $div.='<td>'.$value['C3'].'</td>';
            $div.='<td>'.$value['C4'].'</td>';
            $div.='<td>'.$value['C5'].'</td>';
            $div.='<td>'.$value['C6'].'</td>';
            $div.='<td>'.$value['C7'].'</td>';
            $div.='<th>'.$value['hasil_n'].'</th>';
           
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