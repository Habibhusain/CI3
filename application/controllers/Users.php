<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Users');
    }
    
    public function index()
    {
        // $result = $query->result_array();

        $data['title'] = 'Daftar Pengguna';
        $data['result'] = $this->M_Users->pengguna();

        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view("users/users", $data);
        $this->load->view('inc/footer');
    }

    public function users_tambah()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('first_name', 'Nama depan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === TRUE)
        {
            $username = $this->input->post('username');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $phone = $this->input->post('phone');
            $level_users = $this->input->post('level_users');

            $array_insert = array(
                'username' => $this->input->post('username'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'phone' => $this->input->post('phone'),
                'level_users' => $this->input->post('level_users'),
                'ip_address' => '127.0.0.1'
            );
            $inser_data = $this->db->insert('users', $array_insert);

           if($inser_data == TRUE);
           {
                $this->session->set_flashdata('action_status', '<div class="alert alert-success">Tambah data user berhasil</div>');
                redirect('users');
           }

        }
        else
        {
            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view("users/users_tambah");
            $this->load->view('inc/footer');
        }
    }

    public function users_edit($id)
    {
        $data['result'] = $this->M_Users->get_data_pengguna($id);

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === TRUE) {
            $username = $this->input->post('username');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $level_users = $this->input->post('level_users');

            $array_update = [
                'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'level_users' => $level_users,
            ];

            $update_data = $this->M_Users->editPengguna($array_update,$id);

            if ($update_data == TRUE) {
                $this->session->set_flashdata('action_status', '<div class="alert alert-info">Data user berhasil diperbarui</div>');
                redirect('users');
            } 
        } 
        $this->load->view('inc/header');
        $this->load->view('inc/sidebar');
        $this->load->view("users/users_edit", $data);
        $this->load->view('inc/footer');
    }

    public function users_delete($id)
    {
        $this->M_Users->delete_pengguna($id);
        $this->session->set_flashdata('action_status', '<div class="alert alert-danger">Data user berhasil dihapus</div>');
		redirect (site_url('users'));
    }
}
