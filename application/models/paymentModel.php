<?php

Class paymentModel extends CI_Model 
{

   public function get_payment() 
        {
        $this->db->select('p.*,s.*, pa.*,of.*,pe.FirstName as fname, pe.Lastname as lname');
        $this->db->from('person p,staff s,payment pa,office of');
        $this->db->join('person pe', 'pe.IDNo = s.StaffID', 'left');
        $this->db->where('s.StaffID=pa.StaffID');
        $this->db->where('p.IDNo=pa.ClientID');
        $this->db->where('of.OfficeID=pa.OfficeID');

        return $this->db->get();
    }
    public function add_payment($payment,$policyNum,$premium) {
        $this->db->where('PolicyNumber', $policyNum);
        $this->db->update('policy', $premium);
        
        $this->db->insert('payment', $payment);
        return $payment;
    }
    public function get_total()
    {
        
        
    }
    public function get_count_location_payment1($s_date,$e_date) {
       $this->db->select('count(officeID) as location1');
        $this->db->from('payment');
        $this->db->where("date BETWEEN '$s_date' AND '$e_date'");
        $this->db->where("OfficeID", 1);
        
        $data = $this->db->get();
        return $data;
    }
    public function get_count_location_payment2($s_date,$e_date) {
       $this->db->select('count(officeID) as location2');
        $this->db->from('payment');
        $this->db->where("date BETWEEN '$s_date' AND '$e_date'");
        $this->db->where("OfficeID", 2);
        
        $data = $this->db->get();
        return $data;
    }
    public function get_count_location_payment3($s_date,$e_date) {
       $this->db->select('count(officeID) as location3');
        $this->db->from('payment');
        $this->db->where("date BETWEEN '$s_date' AND '$e_date'");
        $this->db->where("OfficeID", 3);
        
        $data = $this->db->get();
        return $data;
    }
    public function get_staff_payment($s_date,$e_date) {
        $this->db->distinct('person.IDNo');
        $this->db->distinct('payment.StaffID');
       $this->db->select('*, sum(Amount) as total');
        $this->db->from('person, payment');
        $this->db->where("date BETWEEN '$s_date' AND '$e_date'");
         $this->db->where("person.IDNo = payment.StaffID");
         $this->db->group_by("person.FirstName");
        
        $data = $this->db->get();
        return $data;
    }
    public function get_staff_payment_total($s_date,$e_date) {
       $this->db->select('sum(Amount) as total');
        $this->db->from('person, payment');
        $this->db->where("date BETWEEN '$s_date' AND '$e_date'");
        $this->db->where("person.IDNo = payment.StaffID");
        
        $data = $this->db->get();
        return $data;
    }
}










































































































































































































































































































