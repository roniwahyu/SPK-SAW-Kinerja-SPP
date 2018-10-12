<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kriteria_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('kriteria', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_kriteria($metode) {
        $this->db->where('metode',$metode);
        $result = $this->db->get('kriteria');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        $result = $this->db->get('kriteria');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'nama_kriteria' => $this->input->post('nama_kriteria', TRUE),
            'kode_kriteria' => $this->input->post('kode_kriteria', TRUE),
            'bobot' => $this->input->post('bobot', TRUE),
            'metode' => $this->input->post('metode', TRUE),
            'datetime' => date('Y-m-d H:i:s'),            
        );
        $this->db->insert('kriteria', $data);
    }

    function update($id_kriteria) {
        $data = array(
        'id_kriteria' => $this->input->post('id_kriteria',TRUE),
       'nama_kriteria' => $this->input->post('nama_kriteria', TRUE),
       'kode_kriteria' => $this->input->post('kode_kriteria', TRUE),
       'bobot' => $this->input->post('bobot', TRUE),
       'metode' => $this->input->post('metode', TRUE),
       'datetime' => date('Y-m-d H:i:s'),        
        );
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_kriteria) {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_kriteria, '.$value.' from kriteria order by id_kriteria asc');
        $result[0]="-- Pilih Urutan id_kriteria --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_kriteria]= $row->$value;
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
