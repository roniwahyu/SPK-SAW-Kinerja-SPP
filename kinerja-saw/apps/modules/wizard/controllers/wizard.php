<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Wizard extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('Datatables','template','Ion_auth/Ion_auth'));
		$this->load->model('kriteria/kriteria_model','kriteriadb',TRUE);
		$this->load->model('nilai/nilai_model','nilaidb',TRUE);
		$this->load->model('pimpinan_user/pimpinan_user_model','pimuserdb',TRUE);
		// $this->load->model('rapat_nilai/rapat_nilai_model','rnilaidb',TRUE);

	
        $this->load->helper(array('form','url'));
        $this->session->set_userdata('lihat','rapat');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
	}
	public function nilai($id=null,$rapatid=null){
		$user = $this->ion_auth->user()->row();
		$userid=$user->user_id;
		if($userid<>$id){
			redirect('auth/login','refresh');
		}
		$this->template->add_js('plugins/knob/jquery.knob.min.js');
		$this->template->add_js('
        var uiKnob = function(){
            
            if($(".knob").length > 0){
                $(".knob").knob();
                $(".knob").trigger("configure", {
				    max: 100,
				    min:55
				});  
            }          

        }
        uiKnob();','embed');
        $pimuser= $this->pimuserdb->get_pim_user($id);
        
		$this->template->load_view('slider',array(
			'saw'=>$this->kriteriadb->get_kriteria('SAW'),
			'promatch'=>$this->kriteriadb->get_kriteria('PM'),
			'id_pimpinan'=>$pimuser['id_pimpinan'],
			'id_rapat'=>$rapatid,
			));
	}

	//Untuk Penilaian
	function penilaian(){
		if(!is_null($this->input->post('knob'))){
			$knob=$this->input->post('knob');
			$id=$this->input->post('id_pimpinan');
			$idrapat=$this->input->post('id_rapat');
			// print_r($knob);
			$saw=$this->kriteriadb->get_kriteria('SAW');
			$promatch=$this->kriteriadb->get_kriteria('PM');
			// print_r($saw);
			$i=0;
			foreach ($knob as $key => $value) {
				# code...
				// echo $value;
				$id_kriteria=$saw[$key]['id_kriteria'];
				$data1[]=array(
					'id_pimpinan'=>$id,
					'id_kriteria'=>$id_kriteria,
					'nilai'=>$value,
					'datetime'=>date('Y-m-d H:m:s'),
					);
				
				//Berikut ini adalah Nilai Profile Matching,Dari Nilai SAW
				// if($i<3):
					$id_kriteria2=$promatch[$key]['id_kriteria'];
					// print_r($id_kriteria2);
					if($value>=55 and $value <65){
						$nilai_promatch=$value-45;
					}elseif($value>=65 and $value<70){
						$nilai_promatch=$value-25;
					}elseif($value>=70 and $value<75){
						$nilai_promatch=$value-10;
					}elseif($value>=75 and $value<80){
						$nilai_promatch=$value-4;
					}elseif($value>=80 and $value<100){
						$nilai_promatch=$value-1;
					}elseif($value==100){
						$nilai_promatch=$value;
					}else{
						$nilai_promatch=0;
					}
					// print_r($nilai_promatch);
					$data2[]=array(
					'id_pimpinan'=>$id,
					'id_kriteria'=>$id_kriteria2,
					'nilai'=>$nilai_promatch,
					'datetime'=>date('Y-m-d H:m:s'),
					);
					$data3[]=array(
					'pimpinan_id'=>$id,
					'kriteria_id'=>$id_kriteria,
					'rapat_id'=>$idrapat,
					'nilai'=>$value,
					'datetime'=>date('Y-m-d H:m:s'),	
					);
					$data4[]=array(
					'pimpinan_id'=>$id,
					'kriteria_id'=>$id_kriteria2,
					'rapat_id'=>$idrapat,
					'nilai'=>$nilai_promatch,
					'datetime'=>date('Y-m-d H:m:s'),	
					);
				// endif;
				$i++;
			}
			// print_r($data2);
			$this->nilaidb->delete_nilai($id);
			$sawok=$this->nilaidb->insert_batch($data1);
			$promatchok=$this->nilaidb->insert_batch($data2);
			$this->check_rapat_nilai($idrapat,$id);
			$nilaiok=$this->nilaidb->insert_rapatnilai_batch($data3);
			$nilaiok=$this->nilaidb->insert_rapatnilai_batch($data4);
			if($promatchok!==null){
				$this->template->load_view('sukses',array(
				'error'=>TRUE,
				'msg'=>'Terima kasih..',
				
				));
			}
		}else{
			$this->template->load_view('404',array(
				'error'=>TRUE,
				'msg'=>'Tidak ada masukan nilai, silakan lakukan penilaian',
				
				));
		}
	}


	function check_rapat_nilai($idrapat,$idpimpinan){
		$data=$this->nilaidb->check_rapat_nilai($idrapat,$idpimpinan);
		if(count($data)>0){
			$this->nilaidb->reset_rapat_nilai($idrapat,$idpimpinan);
		}
		// print_r($data);

	}
}

/* End of file wizard.php */
/* Location: ./ */ ?>