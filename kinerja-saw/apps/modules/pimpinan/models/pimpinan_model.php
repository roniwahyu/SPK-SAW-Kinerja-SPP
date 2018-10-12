<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Pimpinan_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('pimpinan', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_pimpinan(){
        $result = $this->db->get('pimpinan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_one($id_pimpinan) {
        $this->db->where('id_pimpinan', $id_pimpinan);
        $result = $this->db->get('pimpinan');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'kode' => $this->input->post('kode', TRUE),
            'nama_pimpinan' => $this->input->post('nama_pimpinan', TRUE),
            'jabatan' => $this->input->post('jabatan', TRUE),
            'datetime' => date('Y-m-d H:i:s'),           
        );
        $this->db->insert('pimpinan', $data);
    }

    function update($id_pimpinan) {
        $data = array(
        'id_pimpinan' => $this->input->post('id_pimpinan',TRUE),
        'kode' => $this->input->post('kode', TRUE),
        'nama_pimpinan' => $this->input->post('nama_pimpinan', TRUE),
        'jabatan' => $this->input->post('jabatan', TRUE),
        'datetime' => date('Y-m-d H:i:s'),       
        );
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->update('pimpinan', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_pimpinan) {
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->delete('pimpinan'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_pimpinan, '.$value.' from pimpinan order by id_pimpinan asc');
        $result[0]="-- Pilih Urutan id_pimpinan --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_pimpinan]= $row->$value;
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
