<?php

class Login_m  extends CI_Model
{

    public function auth($data)
    {
        $this->db->where('username', $data['username']);
        $this->db->where('password', sha1($data['password']));
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {

            $username = $data['username'];
            $ip = $this->get_ip->getUserIP();

            // user_agent is helper function in common_helper file
            $user_agent = $username . user_agents();

            $user_info = array(

                'ip' => $ip,
                'user_info' => $user_agent
            );
            $this->db->insert('logs', $user_info);

            return $query->row();

        } else {
            return false;
        }
    }
}
