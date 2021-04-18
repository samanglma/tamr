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


    public function verify_code($id)
    {

        $this->db->select('*');
        $this->db->from('users');
      //  $this->db->where('activation_code', $code);
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verify_code_password($id)
    {
         $this->db->select('*');
        $this->db->from('users');
      //  $this->db->where('activation_code', $code);
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword($id,$data)
    {

        $this->db->where('id', $id);
        $this->db->update('users', $data);

        return true;
    }

	public function verifyUser($code, $id)
	{
		// $this->db->select('*');
        // $this->db->from('users');
        // $this->db->where('activation_code', $code);
        // $this->db->where('id', $id);


        // $query = $this->db->get();

		$update = array(
			'active' => 1,
		);

		//$this->db->where('activation_code', $code);
		$this->db->where('id', $id);
		$this->db->update('users', $update);

		return true;

        // if ($query->num_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
	}

    public function save($data)
    {
        $this->db->insert('users', $data);
        return true;
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->where('role', 3);
        $this->db->order_by("id", "asc"); 
        $query = $this->db->get('users')->result();
        return $query;

    }

     public function edit($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('users')->row();
        return $query;
    }


    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data['data']);
        return true;
    }


// public function get()
// {
//     $this->db->select('*');
//     $this->db->from('users');
//     $q = $this->db->get()->result();

//     return $q;
// }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        
        return true;
    }


}
