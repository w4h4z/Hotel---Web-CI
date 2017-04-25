<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Hotel extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('hotel_model');
    }
    
    public function index(){
        $data['pesan'] = $this->hotel_model->get_data_pesan();
        $data['main_view'] = 'home_view';
        $this->load->view('template',$data);
    }
    
    public function pesan(){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('nama','Nama','trim|required');
            $this->form_validation->set_rules('notelp','No Telp','trim|required');
            
            if($this->form_validation->run()==TRUE){
               if($this->hotel_model->pesan() == TRUE){
                $data['notif'] = 'Pemesanan berhasil';
                $data['main_view'] = 'pesan_view';
                $this->load->view('template',$data);
           } else {
               $data['notif'] = 'Pemesanan gagal';
               $data['main_view'] = 'pesan_view';
               $this->load->view('template',$data);
           }
        } } else {
           $data['main_view'] = 'pesan_view';
           $data['notif'] = validation_errors();
           $this->load->view('template',$data);
       }
    }
    
    public function daftar() {
       if($this->input->post('submit')){
            $this->form_validation->set_rules('username','Uername','trim|required');
            $this->form_validation->set_rules('nama','Nama Lengkap','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('password','Password','trim|required');
            
           if($this->form_validation->run()==TRUE){
               if($this->hotel_model->insert() == TRUE){
                $data['notif'] = 'Pendaftaran berhasil';
                $data['main_view'] = 'home_view';
                $this->load->view('template',$data);
           } else {
               $data['notif'] = 'Pendaftaran gagal';
               $data['main_view'] = 'home_view';
               $this->load->view('template',$data);
           }
       
       }} else {
           $data['main_view'] = 'home_view';
           $data['notif'] = validation_errors();
           $this->load->view('template',$data);
       }
    }
    
    public function masuk(){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            
            if($this->form_validation->run()==TRUE){
                if($this->hotel_model->cek_user()==TRUE){
                    redirect(base_url('index.php/hotel/'));
                } else {
                    $data['notif'] = 'Login Gagal';
                    $data['main_view'] = 'home_view';
                    $this->load->view('template',$data);
                }
            } else {
                $data['notif'] = validation_errors();
                $data['main_view'] = 'home_view';
                $this->load->view('template',$data);
            }
        }
    }
    
    public function logout(){
        $data = array('username'=>'','logged_in'=>FALSE);
        $this->session->sess_destroy();
        
        $data['main_view'] = 'home_view';
        $this->load->view('template',$data);
    }
    
    public function data_pesan(){
        $data['pesan'] = $this->hotel_model->get_data_pesan();
    }
    
    public function hapus($id_pesan){
         if($this->hotel_model->delete($id_pesan) == TRUE){
                $this->session->set_flashdata('notif','Pemesanan Dibatalkan');
                redirect('hotel');
            } else {
                $this->session->get_flashdata('notif','Pemesanan Gagal Dibatalkan');
                redirect('hotel');
            }
    }
    
}

?>