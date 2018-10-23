<?php

Class staffModel extends CI_Model 
{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
   public function get_staff_pwd($email) {
        $sql = "SELECT *
    FROM staff
    WHERE username=?";
        $query = $this->db->query($sql, array($email));

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->Password;
        }
    }
    public function add_consultant_( $policy,$person,$staff,$consultant) {
        $this->db->insert('policy', $policy);
        $policyNumber = $this->db->insert_id();
        
        $person['PolicyNumber'] = $policyNumber;
        $this->db->insert('person', $person);
        $personID = $this->db->insert_id();
        
        $staff['StaffID'] = $personID;
        $this->db->insert('staff', $staff);
        
        $consultant['ConsultantID'] = $personID;
        $this->db->insert('consultant', $consultant);
        return $consultant;
    }
    public function get_staff_details($id) 
        {
        $this->db->select('person.*,staff.*, consultant.*');
        $this->db->from('person,staff,consultant,supervisor');
        $where = "staff.StaffID='$id' AND person.IDNo='$id' AND (consultant.ConsultantID='$id')";
        $this->db->where($where);
        return $this->db->get();
    }
     public function get_staff_details2($id) 
        {
        $this->db->select('person.*,staff.*,supervisor.*');
        $this->db->from('person,staff,supervisor');
        $where = "staff.StaffID='$id' AND person.IDNo='$id' AND supervisor.SupervisorID='$id'";
        $this->db->where($where);
        return $this->db->get();
    }
    public function get_staff_detail($email) 
        {
        $this->db->select('staff.*');
        $this->db->from('staff');
        $this->db->where('staff.Username',$email);
        return $this->db->get();
    }
    public function get_office() 
        {
        $this->db->select('*');
        $this->db->from('office');
        $this->db->order_by('City');
        return $this->db->get();
    }
//    public function check_email_exist() 
//        {
//        $this->db->select('*');
//        $this->db->from('staff');
//        return $this->db->get();
//    }
//    public function check_email_exist2($email) 
//        {
//        $this->db->select('*');
//        $this->db->from('staff');
//        $this->db->where('Username',$email);
//        $where = "Type='Consultant' Or Type='Supervisor'";
//        $this->db->where($where);
//        return $this->db->get();
//    }
    public function update_profile($id,$data,$email) {
        $this->db->where('StaffID', $id);
        $this->db->update('staff', $email);
        
        $this->db->where('IDNo', $id);
        return $this->db->update('person', $data);
    }
     public function checkUserExist($email) {
        $this->db->where('Username', $email);
        $query = $this->db->get('staff');

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
    
}
























































































































































































