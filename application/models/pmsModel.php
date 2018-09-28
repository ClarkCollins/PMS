<?php

Class pmsModel extends CI_Model 
{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    public function login($username, $password) 
        {

            $this->db->select('StaffID, Password');
            $this->db->from('consultant');
            $this->db->where('Username', $username);
            $this->db->where('Password', MD5($password));
            $this->db->limit(1);

            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
        
    public function getMemberType() 
        {
        $this->db->select('*');
        $this->db->from('member_type');

        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return false;
        }
    }

}

