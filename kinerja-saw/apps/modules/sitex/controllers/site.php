<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Site extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('Ion_auth/Ion_auth'));
		$this->load->model('site_model','sitedb',TRUE);
	}
	public function index()
	{
		$this->template->set_title('Aplikasi Gudang');
		$this->template->add_css('stokgudang.css');
		$this->template->load_view('site',array(
			'home'=>true,
			));
	}
	
	function laporan(){
		$this->template->set_title('Step');
        $this->template->set_layout('default');
        $this->template->add_js('var baseurl="'.base_url().'site/";','embed');  
		
	
		$this->template->load_view('site',array(
			'saw'=>$this->show_hasil_saw(),
			'promatch'=>$this->show_hasil_promatch(),
			));
		
	}

	function show_hasil_saw(){
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

 		foreach ($data as $key => $value) {
 			$div.='<tr>';
 			$div.='<td>'.$value['id_pimpinan'].'</td>';
 			$div.='<td>'.$value['kode'].'</td>';
 			$div.='<td>'.$value['nama_pimpinan'].'</td>';
 			$div.='<td>'.$value['jabatan'].'</td>';

 			$div.='<td>'.$value['sum_all'].'</td>';
 			if($value['sum_all']>=4):
 			$div.='<td><a href="" class="btn btn-danger btn-xs"> Naik <icon class="icon icon-arrow-up11"></icon></a></td>';
 			else:
 			$div.='<td><a href="" class="btn btn-success btn-xs"> Tidak <i class="icon icon-checkmark3"></i></a></td>';
 			endif;
 			$div.='</tr>';

 			# code...
 		}
 		$div.='
 				</tbody>
 			</table>
 		</div>';
 		return $div;
 	}
 	function show_hasil_promatch(){
 		$data=$this->sitedb->get_hasil_promatch();
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

 		foreach ($data as $key => $value) {
 			$div.='<tr>';
 			$div.='<td>'.$value['id_pimpinan'].'</td>';
 			$div.='<td>'.$value['kode'].'</td>';
 			$div.='<td>'.$value['nama_pimpinan'].'</td>';
 			$div.='<td>'.$value['jabatan'].'</td>';
 			/*$div.='<td>'.$value['ncf'].'</td>';
 			$div.='<td>'.$value['scf'].'</td>';*/
 			$div.='<td>'.$value['n'].'</td>';
 			if($value['n']>=3):
 			$div.='<td><a href="" class="btn btn-danger btn-xs"> Naik <i class="icon icon-arrow-up11"></i></a> </td>';
 			else:
 			$div.='<td><a href="" class="btn btn-success btn-xs">Tidak</a></td>';

 			endif;
 			$div.='</tr>';

 			# code...
 		}
 		$div.='
 				</tbody>
 			</table>
 		</div>';
 		return $div;
 	}
    
	function build_matrix(){
		$metode="SAW";
		$saw=$this->sitedb->get_kriteria_saw($metode);
		$sql='SELECT
			a.id_nilai,
			a.id_pimpinan,
			sum(case when a.id_kriteria=1 then a.nilai end) as C1,
			sum(case when a.id_kriteria=2 then a.nilai end) as C2,
			sum(case when a.id_kriteria=3 then a.nilai end) as C3,
			sum(case when a.id_kriteria=4 then a.nilai end) as C4,
			sum(case when a.id_kriteria=5 then a.nilai end) as C5,
			sum(case when a.id_kriteria=6 then a.nilai end) as C6,
			sum(case when a.id_kriteria=7 then a.nilai end) as C7,
			a.datetime
			FROM
			nilai AS a
			group by id_pimpinan';
	}
	
	
}

/* End of file site.php */
/* Location: ./ */
 ?>