<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Tim_player_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('tim_player', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    function get_one($id_player) {
        $this->db->where('id_player', $id_player);
        $result = $this->db->get('tim_player');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    function save() {
           $data = array(
        
            'id_tim' => $this->input->post('id_tim', TRUE),
           
            'nama' => $this->input->post('nama', TRUE),
           
            'deskripsi' => $this->input->post('deskripsi', TRUE),
           
            'posisi1' => $this->input->post('posisi1', TRUE),
           
            'posisi2' => $this->input->post('posisi2', TRUE),
           
            'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
           
            'usia' => $this->input->post('usia', TRUE),
           
            'alamat' => $this->input->post('alamat', TRUE),
           
            'kota' => $this->input->post('kota', TRUE),
           
            'no_punggung' => $this->input->post('no_punggung', TRUE),
           
            'tinggi' => $this->input->post('tinggi', TRUE),
           
            'berat' => $this->input->post('berat', TRUE),
           
            'total_score' => $this->input->post('total_score', TRUE),
           
            'datetime' => $this->input->post('datetime', TRUE),
           
        );
        $this->db->insert('tim_player', $data);
    }

    function update($id_player) {
        $data = array(
        'id_player' => $this->input->post('id_player',TRUE),
       'id_tim' => $this->input->post('id_tim', TRUE),
       
       'nama' => $this->input->post('nama', TRUE),
       
       'deskripsi' => $this->input->post('deskripsi', TRUE),
       
       'posisi1' => $this->input->post('posisi1', TRUE),
       
       'posisi2' => $this->input->post('posisi2', TRUE),
       
       'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
       
       'usia' => $this->input->post('usia', TRUE),
       
       'alamat' => $this->input->post('alamat', TRUE),
       
       'kota' => $this->input->post('kota', TRUE),
       
       'no_punggung' => $this->input->post('no_punggung', TRUE),
       
       'tinggi' => $this->input->post('tinggi', TRUE),
       
       'berat' => $this->input->post('berat', TRUE),
       
       'total_score' => $this->input->post('total_score', TRUE),
       
       'datetime' => $this->input->post('datetime', TRUE),
       
        );
        $this->db->where('id_player', $id_player);
        $this->db->update('tim_player', $data);
        /*'datetime' => date('Y-m-d H:i:s'),*/
    }

    function delete($id_player) {
        $this->db->where('id_player', $id_player);
        $this->db->delete('tim_player'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_player, '.$value.' from tim_player order by id_player asc');
        $result[0]="-- Pilih Urutan id_player --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_player]= $row->$value;
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
