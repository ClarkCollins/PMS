<?php

Class PmsModel extends CI_Model 
{
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    public function getPolicy($policyNum)
        {
        $this->db->select('policy.*');
        $this->db->from('policy');
        $this->db->where('policy.PolicyNumber',$policyNum);
        return $this->db->get();
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
    public function getMemberType2()
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
    public function add_person( $policy,$person) {
        $this->db->insert('policy', $policy);
        $policyNumber = $this->db->insert_id();

        $person['PolicyNumber'] = $policyNumber;
        $this->db->insert('person', $person);
        return $person;
    }
    public function add_person2($person, $policy, $p_num) {
        $this->db->where('PolicyNumber', $p_num);
        $this->db->update('policy', $policy);

        $this->db->insert('person', $person);
        return $person;
    }
    public function delete_client_dependent($policyNo,$id,$cal_dep,$cal_pre) {
        $deleted = "Yes";
         $data = array('Deleted' => $deleted);
         $policy = array('NoDependent' => $cal_dep,
                         'Premium' => $cal_pre);
        $this->db->where('PolicyNumber', $policyNo);
        $this->db->update('policy', $policy);
        $this->db->where('IDNo', $id);
        return $this->db->update('person', $data);
    }
    public function delete_client($policyNo) {
        $deleted = "Yes";
         $data = array('Deleted' => $deleted);
        $this->db->where('PolicyNumber', $policyNo);
        return $this->db->update('person', $data);
    }
    public function update_client($id,$data) {
        $this->db->where('IDNo', $id);
        return $this->db->update('person', $data);
    }
    public function update_client_dependent($id,$data) {
        $this->db->where('IDNo', $id);
        return $this->db->update('person', $data);
    }
}
