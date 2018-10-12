<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Rapat_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('rapat', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($rapat_id) {
        $this->db->where('rapat_id', $rapat_id);
        $result = $this->db->get('rapat');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'tgl_rapat' => $this->input->post('tgl_rapat', TRUE),
           
            'semester' => $this->input->post('semester', TRUE),
           
            'thn_ajaran' => $this->input->post('thn_ajaran', TRUE),
            'status' => $this->input->post('status', TRUE),
           
            'keterangan' => $this->input->post('keterangan', TRUE),
           
            'datetime' =>  date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('rapat', $data);
    }

    function update($rapat_id) {
        $data = array(
        'rapat_id' => $this->input->post('rapat_id',TRUE),
       'tgl_rapat' => $this->input->post('tgl_rapat', TRUE),
       
       'semester' => $this->input->post('semester', TRUE),
       
       'thn_ajaran' => $this->input->post('thn_ajaran', TRUE),
       'status' => $this->input->post('status', TRUE),
       
       'keterangan' => $this->input->post('keterangan', TRUE),
       
       'datetime' =>  date('Y-m-d H:i:s'),
       
        );
        $this->db->where('rapat_id', $rapat_id);
        $this->db->update('rapat', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($rapat_id) {
        $this->db->where('rapat_id', $rapat_id);
        $this->db->delete('rapat'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select rapat_id, '.$value.' from rapat order by rapat_id asc');
        $result[0]="-- Pilih Urutan rapat_id --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->rapat_id]= $row->$value;
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
