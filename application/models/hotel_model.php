<?php
    defined('BASEPATH') OR ecit ('No direct script acces allowed');

class Hotel_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    public function insert(){
        $data = array(
                'id'        => NULL,
                'username'  => $this->input->post('username'),
                'nama'      => $this->input->post('nama'),
                'email'     => $this->input->post('email'),
                'password'  => $this->input->post('password')
        );
        
        $this->db->insert('tb_akun',$data);
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    
    public function pesan(){
        $data = array(
                'id'        => NULL,
                'nama'      => $this->input->post('nama'),
                'kamar'     => $this->input->post('kamar'),
                'checkin'   => $this->input->post('checkin'),
                'lamainap'  => $this->input->post('lamainap'),
                'notelp'    => $this->input->post('notelp')
        ); 
        
        $this->db->insert('tb_pesan',$data);
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function cek_user(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $query = $this->db->where('username',$username)
                          ->where('password',$password)
                          ->get('tb_akun');
        
        if($query->num_rows()>0){
            $data = array(
                    'username' => $username,
                    'logged_in'=> TRUE
                );
            $this->session->set_userdata($data);
            
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function total_records(){
        return $this->db->from('tb_pesan')
                        ->count_all_results();
    }
    
    public function get_data_pesan(){
        return $this->db->order_by('id','ASC')
                        ->get('tb_pesan')
                        ->result();
    }
    
    public function delete($id_pesan){
        $this->db->where('id',$id_pesan)
                 ->delete('tb_pesan');
        
        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
}

?>