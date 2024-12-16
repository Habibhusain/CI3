<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class M_Users extends CI_Model
{
    public function pengguna()
    {
        $query = $this->db->query("SELECT * FROM users ORDER BY id ASC");
        return $result = $query->result();
    }

    public function editPengguna($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function get_data_pengguna($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row(); 
    }

    public function delete_pengguna($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}