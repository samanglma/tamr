<?php
class User_model extends CI_model
{



    public function register_user($user)
    {


        $this->db->insert('users', $user);
        return $this->db->insert_id();
    }

    public function getUserById($id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $this->db->where('role',2);
        $this->db->where('active',1);
        $query  = $this->db->get();

        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    
    public function login_user($email, $pass)
    {
        //$email,$pass
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $this->db->where('password',$pass);
        $this->db->where('role',2);
        $this->db->where('active',1);
        $query  = $this->db->get();

        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function email_check($email)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }


    public function verify_code($code, $id)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('activation_code', $code);
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
