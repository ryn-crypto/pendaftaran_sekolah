<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }



    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['table'] = $this->db->get_where('user')->result_object();
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data['user']);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function manage() {
        $url = $this->uri->segment(3);
        $mng = $this->db->get_where('user', ['id' => $url])->row_array();

        if($mng['role_id'] == 1){
            $new_id = 2;
        } else {
            $new_id = 1;
        }

        $this->db->set('role_id', $new_id);
        $this->db->where('id', $url);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Level has been updated !</div>');
        redirect('admin');
    }

    public function freeze() {
        $url = $this->uri->segment(3);
        $mng = $this->db->get_where('user', ['id' => $url])->row_array();

        if($mng['is_active'] == 1){
            $new = 0;
        } else {
            $new = 1;
        }

        $this->db->set('is_active', $new);
        $this->db->where('id', $url);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Configuration has been update!</div>');
        redirect('admin');
    }

    public function profile() {

        $data['title'] = 'Profile';
        $url = $this->uri->segment(3);
        $data['show'] = $this->db->get_where('user', ['id' => $url])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data['user']);
        $this->load->view('Admin/user_profile', $data['show']);
        $this->load->view('templates/footer');

    }

    public function delete() {
        $url = $this->uri->segment(3);

        $this->db->where('id', $url);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data has been Delete!</div>');
        redirect('admin');
    }


}