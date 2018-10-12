<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Site_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_all() {

        $result = $this->db->get('rangenilai');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_output_saw($id) {
        $this->db->select('id_pimpinan,sum_all');
        $this->db->where('id_pimpinan', $id);
        $result = $this->db->get('08-1-hasil-saw');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_output_promatch($id) {
        $this->db->select('id_pimpinan,n');
        $this->db->where('id_pimpinan', $id);
        $result = $this->db->get('06-hasil-profile-matching');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
	public function get_kriteria($metode)
	{
		$this->db->where('metode',$metode);
		$result = $this->db->get('kriteria');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
	public function get_hasil_saw()
    {
        
        $result = $this->db->get('08-1-hasil-saw');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    public function get_matrix_saw()
	{
		$result = $this->db->get('04-0-view-matriks-kriteria');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
	public function get_hasil_promatch()
    {
        
        $result = $this->db->get('06-hasil-profile-matching');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_pimpinan_alt($id){
        $this->db->where('id_pimpinan',$id);
        $result = $this->db->get('01-view-pimpinan');
        if ($result->num_rows() ==1 ) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function get_matrix_promatch()
	{
		
		$result = $this->db->get('06-hasil-profile-matching');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}
    function get_kriteria_promatch(){
        $this->db->select('id_kriteria,kode_kriteria');
        $result = $this->db->get('04-0-view-kriteria-profile-matching');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_hasil_rapat_pimpinan_promatch($id){
      
        $this->db->where('rapat_id',$id);
        $result = $this->db->get('06-2-view-hasil-rapat-pimpinan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_hasil_rapat_pimpinan_saw($id){
      
        $this->db->where('rapat_id',$id);
        $result = $this->db->get('06-0-hasil-rapat-saw-ranking');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_hasil_promatch_sorted(){
       
        $result = $this->db->get('04-0-view-kriteria-profile-matching');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function hasil_promatching(){
       
        $result = $this->db->get('05-1-promatch-n');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_rapat(){
         $result = $this->db->get('01-view-rapat');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function insert_batch($data){
        $this->db->truncate('hasil_promatch');
        $this->db->insert_batch('hasil_promatch',$data);
        return $this->db->affected_rows();
    }
    function get_nilai_weighted($weight,$bobot){
        $sql="SELECT
                `a`.`id_pimpinan` AS `id_pimpinan`,
                `a`.`".$weight."` AS `".$weight."`,
                `b`.`bobot` AS `".$bobot."`
            FROM
                (
                    `04-2-view-weighted-promatch` `a`
                    JOIN `bobot_pm` `b`
                )
            WHERE
                (
                    `a`.`".$weight."` = `b`.`selisih`
                )";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
     //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_rapat(){
        $result = array();
        $array_keys_values = $this->db->query('select `rapat_id`,`tgl_rapat`,`semester`,`thn_ajaran` from `rapat` order by `rapat_id` asc');
        $result[0]="-- Pilih Hasil Rapat --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->rapat_id]= "[".$row->thn_ajaran."] ".$row->semester.", ".$row->tgl_rapat ;
        }
        return $result;
    }
}

/* End of file site_model.php */
/* Location: ./ */
 ?>