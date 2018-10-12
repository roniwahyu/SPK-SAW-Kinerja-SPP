<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Gap_pm_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('gap_pm', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_gap) {
        $this->db->where('id_gap', $id_gap);
        $result = $this->db->get('gap_pm');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'kriteria' => $this->input->post('kriteria', TRUE),
           
            'a_prestasi' => $this->input->post('a_prestasi', TRUE),
           
            'b_keaktifan' => $this->input->post('b_keaktifan', TRUE),
           
            'c_kehadiran' => $this->input->post('c_kehadiran', TRUE),
           
'datetime' => date('Y-m-d H:i:s'),            
        );
        $this->db->insert('gap_pm', $data);
    }

    function update($id_gap) {
        $data = array(
        'id_gap' => $this->input->post('id_gap',TRUE),
       'kriteria' => $this->input->post('kriteria', TRUE),
       
       'a_prestasi' => $this->input->post('a_prestasi', TRUE),
       
       'b_keaktifan' => $this->input->post('b_keaktifan', TRUE),
       
       'c_kehadiran' => $this->input->post('c_kehadiran', TRUE),
       
'datetime' => date('Y-m-d H:i:s'),        
        );
        $this->db->where('id_gap', $id_gap);
        $this->db->update('gap_pm', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_gap) {
        $this->db->where('id_gap', $id_gap);
        $this->db->delete('gap_pm'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_gap, '.$value.' from gap_pm order by id_gap asc');
        $result[0]="-- Pilih Urutan id_gap --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_gap]= $row->$value;
        }
        return $result;
    }

    //Update 30122014 SWI
    //untuk Array Dropdown dari database yang lain
    function get_drop_array($db,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from '.$db.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
