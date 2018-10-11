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
        
    public function getClient() 
        {
        $active = "Active";
        $delete = "No";
        $this->db->select('person.*, policy.*');
        $this->db->from('person, policy');
        $this->db->where('Status',$active);
        $this->db->where('Deleted',$delete);
        $this->db->where('person.PolicyNumber = policy.PolicyNumber');
        return $this->db->get();
    }
    public function getPolicy($policyNum) 
        {
        $this->db->select('policy.*');
        $this->db->from('policy');
        $this->db->where('policy.PolicyNumber',$policyNum);
        return $this->db->get();
    }
     public function getMemberType() 
        {
         $main = "Main member";
        $this->db->select('*');
        $this->db->from('member_type');
        $this->db->where('TypeName!=',$main);

        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return false;
        }
    }
    public function add_person( $policy,$person) {
        $this->db->insert('policy', $policy);
        $policyNumber = $this->db->insert_id();
        
        $person['PolicyNumber'] = $policyNumber;
        $this->db->insert('person', $person);
        return $person;
    }
    public function add_person2($person) {
        $this->db->insert('person', $person);
        return $person;
    }
    public function delete_client_dependent($policyNo,$id) {
        $deleted = "Yes";
         $data = array('Deleted' => $deleted);
        $this->db->where('PolicyNumber', $policyNo);
        $this->db->where('IDNo', $id);
        return $this->db->update('person', $data);
    }
    public function delete_client($policyNo) {
        $deleted = "Yes";
         $data = array('Deleted' => $deleted);
        $this->db->where('PolicyNumber', $policyNo);
        return $this->db->update('person', $data);
    }
}







































































