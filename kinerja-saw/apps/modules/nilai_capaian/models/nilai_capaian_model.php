<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Nilai_capaian_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('nilai_capaian', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($capaian_id) {
        $this->db->where('capaian_id', $capaian_id);
        $result = $this->db->get('nilai_capaian');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'metode' => $this->input->post('metode', TRUE),
            'logika' => $this->input->post('logika', TRUE),
            'nilai_capaian' => $this->input->post('nilai_capaian', TRUE),
            'datetime' => date('Y-m-d H:i:s'),            
        );
        $this->db->insert('nilai_capaian', $data);
    }

    function update($capaian_id) {
        $data = array(
        'capaian_id' => $this->input->post('capaian_id',TRUE),
       'metode' => $this->input->post('metode', TRUE),
       
       'logika' => $this->input->post('logika', TRUE),
       
       'nilai_capaian' => $this->input->post('nilai_capaian', TRUE),
       'datetime' => date('Y-m-d H:i:s'),       
        );
        $this->db->where('capaian_id', $capaian_id);
        $this->db->update('nilai_capaian', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($capaian_id) {
        $this->db->where('capaian_id', $capaian_id);
        $this->db->delete('nilai_capaian'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select capaian_id, '.$value.' from nilai_capaian order by capaian_id asc');
        $result[0]="-- Pilih Urutan capaian_id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->capaian_id]= $row->$value;
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
