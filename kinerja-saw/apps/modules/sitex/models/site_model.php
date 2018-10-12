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
	public function get_hasil_promatch()
	{
		
		$result = $this->db->get('06-hasil-profile-matching');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
	}

}

/* End of file site_model.php */
/* Location: ./ */
 ?>