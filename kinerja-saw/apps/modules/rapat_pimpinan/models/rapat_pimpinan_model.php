<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Rapat_pimpinan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('rapat_pimpinan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_all_pimpinan($id) {
        $this->db->where('id_rapat',$id);
        $result = $this->db->get('rapat_pimpinan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_where_pimpinanid($id) {
        $this->db->where('id_pimpinan',$id);
        $result = $this->db->get('01-view-rapat-pimpinan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($rapat_pim_id) {
        $this->db->where('rapat_pim_id', $rapat_pim_id);
        $result = $this->db->get('rapat_pimpinan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_pimpinan' => $this->input->post('id_pimpinan', TRUE),
           
            'id_rapat' => $this->input->post('id_rapat', TRUE),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('rapat_pimpinan', $data);
    }

    function insert_batch($data){
        $this->db->insert_batch('rapat_pimpinan',$data);
        // return $this->db->affected_rows();
    }
    function update($rapat_pim_id) {
        $data = array(
        'rapat_pim_id' => $this->input->post('rapat_pim_id',TRUE),
       'id_pimpinan' => $this->input->post('id_pimpinan', TRUE),
       
       'id_rapat' => $this->input->post('id_rapat', TRUE),
       
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('rapat_pim_id', $rapat_pim_id);
        $this->db->update('rapat_pimpinan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($rapat_pim_id) {
        $this->db->where('rapat_pim_id', $rapat_pim_id);
        $this->db->delete('rapat_pimpinan'); 
       
    }
    function delete_pimpinan($id) {
        $this->db->where('id_rapat', $id);
        $this->db->delete('rapat_pimpinan'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select rapat_pim_id, '.$value.' from rapat_pimpinan order by rapat_pim_id asc');
        $result[0]="-- Pilih Urutan rapat_pim_id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->rapat_pim_id]= $row->$value;
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
