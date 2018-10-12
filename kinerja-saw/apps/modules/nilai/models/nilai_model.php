<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Nilai_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('nilai', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    } 
    function get_all_nilai() {

        $result = $this->db->get('02-1-view-nilai');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
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
    function get_one($id_nilai) {
        $this->db->where('id_nilai', $id_nilai);
        $result = $this->db->get('nilai');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
     function check_rapat_nilai($id,$idpim) {
        $this->db->where('rapat_id',$id);
        $this->db->where('pimpinan_id',$idpim);
        $result = $this->db->get('rapat_nilai');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function insert_batch($data){
        $this->db->insert_batch('nilai',$data);
        return $this->db->affected_rows();
    }
    function insert_rapatnilai_batch($data){
        $this->db->insert_batch('rapat_nilai',$data);
        return $this->db->affected_rows();
    }

    function save() {
           $data = array(
        
            'id_pimpinan' => $this->input->post('id_pimpinan', TRUE),
           
            'id_kriteria' => $this->input->post('id_kriteria', TRUE),
           
            'nilai' => $this->input->post('nilai', TRUE),
            'datetime' => date('Y-m-d H:i:s'),           
        );
        $this->db->insert('nilai', $data);
    }

    function update($id_nilai) {
        $data = array(
        'id_nilai' => $this->input->post('id_nilai',TRUE),
       'id_pimpinan' => $this->input->post('id_pimpinan', TRUE),
       
       'id_kriteria' => $this->input->post('id_kriteria', TRUE),
       
       'nilai' => $this->input->post('nilai', TRUE),
       'datetime' => date('Y-m-d H:i:s'),       
        );
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_nilai) {
        $this->db->where('id_nilai', $id_nilai);
        $this->db->delete('nilai'); 
       
    }
    function delete_nilai($id_pimpinan) {
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->delete('nilai'); 
       
    }
    function reset_rapat_nilai($idrapat,$id_pimpinan) {
        $this->db->where('rapat_id', $idrapat);
        $this->db->where('pimpinan_id', $id_pimpinan);
        $this->db->delete('rapat_nilai'); 
        return $this->db->affected_rows();
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_nilai, '.$value.' from nilai order by id_nilai asc');
        $result[0]="-- Pilih Urutan id_nilai --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_nilai]= $row->$value;
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
