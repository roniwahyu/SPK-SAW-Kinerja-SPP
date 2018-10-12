<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Tim_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all($limit, $uri) {

        $result = $this->db->get('tim', $limit, $uri);
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_one_turnamen($id_turnamen) {
        $this->db->where('id_turnamen', $id_turnamen);
        $result = $this->db->get('turnamen');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_one($id_tim) {
        $this->db->where('id_tim', $id_tim);
        $result = $this->db->get('tim');
        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }
    function get_tim($id_tim) {
        $this->db->where('id_tim', $id_tim);
        $result = $this->db->get('tim');
        if ($result->num_rows() == 1) {
            return $result->result_array();
        } else {
            return array();
        }
    } 
    function get_user_tim($userid) {
        $this->db->where('userid', $userid);
        $result = $this->db->get('tim');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_myteam_turnamen($userid) {
        $this->db->where(array('userid'=>$userid,'is_granted'=>1));
        $result = $this->db->get('09-view-tournament-tim');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_allplayer($id_tim=null,$userid=null){
        if(!empty($id_tim)):
            $this->db->where('id_tim', $id_tim);
        else:
            $this->db->where('userid',$userid);
        endif;
        if(!empty($userid)):
            $this->db->where('userid',$userid);
        endif;
        $result = $this->db->get('08-view-tim-players');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_one_player($id_pemain=null){
        $this->db->where('id_pemain', $id_pemain);
        $result = $this->db->get('tim_pemain');
        if ($result->num_rows()==1) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_all_match($tourid){
        $this->db->where('id_tournamen',$tourid);
        $result = $this->db->get('01-3-view-game');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_my_match($id_tim){
        $this->db->where('idhome',$id_tim);
        $this->db->or_where('idaway',$id_tim);
        $result = $this->db->get('01-3-view-game');
        if ($result->num_rows() >0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function get_all_turnamen() {

        $result = $this->db->get('01-4-view-tournament-status');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    function save() {
           $data = array(
        
            'nama' => $this->input->post('nama', TRUE),
           
            'deskripsi' => $this->input->post('deskripsi', TRUE),
           
            'instansi' => $this->input->post('instansi', TRUE),
           
            'kota' => $this->input->post('kota', TRUE),
           
            'level' => $this->input->post('level', TRUE),
           
            'leader' => $this->input->post('leader', TRUE),
           
            'coach' => $this->input->post('coach', TRUE),
           
            'datetime' => date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('tim', $data);
    }
    function save_player    () {
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
           
            'tinggi_cm' => $this->input->post('tinggi_cm', TRUE),
           
            'berat_gram' => $this->input->post('berat_gram', TRUE),
           
                  
            'datetime' =>date('Y-m-d H:i:s'),
           
        );
        $this->db->insert('tim_pemain', $data);
    }

    function update_player($id_pemain) {
        $data = array(
        'id_pemain' => $this->input->post('id_pemain',TRUE),
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
       
       'tinggi_cm' => $this->input->post('tinggi_cm', TRUE),
       
       'berat_gram' => $this->input->post('berat_gram', TRUE),
                
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id_pemain', $id_pemain);
        $this->db->update('tim_pemain', $data);
    }
    function signup_tim($data){
        $this->db->insert('tim_turnamen',$data);
        return $this->db->insert_id();
    }
    function update($id_tim) {
        $data = array(
        'id_tim' => $this->input->post('id_tim',TRUE),
       'nama' => $this->input->post('nama', TRUE),
       
       'deskripsi' => $this->input->post('deskripsi', TRUE),
       
       'instansi' => $this->input->post('instansi', TRUE),
       
       'kota' => $this->input->post('kota', TRUE),
       
       'level' => $this->input->post('level', TRUE),
       
       'leader' => $this->input->post('leader', TRUE),
       
       'coach' => $this->input->post('coach', TRUE),
       
       'datetime' => date('Y-m-d H:i:s'),
       
        );
        $this->db->where('id_tim', $id_tim);
        $this->db->update('tim', $data);
    }

    function delete($id_tim) {
        $this->db->where('id_tim', $id_tim);
        $this->db->delete('tim'); 
       
    }
    function delete_player($id_pemain) {
        $this->db->where('id_pemain', $id_pemain);
        $this->db->delete('tim_pemain'); 
       
    }

    //Update 07122013 SWI
    //untuk Array Dropdown
    function get_dropdown_array($value){
        $result = array();
        $array_keys_values = $this->db->query('select id_tim, '.$value.' from tim order by id_tim asc');
        $result[0]="-- Pilih Urutan id_tim --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id_tim]= $row->$value;
        }
        return $result;
    }
    //Update 07122013 SWI
    //untuk Array Dropdown
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
    //untuk Array Dropdown
    function get_myteam($userid,$key,$value){
        $result = array();
        $array_keys_values = $this->db->query('select '.$key.','.$value.' from tim where userid='.$userid.' order by '.$key.' asc');
        $result[0]="-- Pilih ".$value." --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->$key]= $row->$value;
        }
        return $result;
    }
    
}
?>
