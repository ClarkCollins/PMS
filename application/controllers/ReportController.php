
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('StaffID', 'Type')) {
            $allowed = array(
            );
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('/');
            }
        }
    }

    public function index() {
        
    }

    public function reports_view() {
        $this->form_validation->set_rules('e_date', 'End Date', 'trim|callback_compareDates');
        if ($this->form_validation->run() == false) {
            $this->reports_view_();
        } else {
            $this->reports_view_();
        }
    }

    public function reports_view_() {
       $id = $this->session->userdata('StaffID');
            if ($this->session->userdata('Type') == 'Supervisor') {
                $data['info'] = $this->staffModel->get_staff_details2($id);
            } else {
                $data['info'] = $this->staffModel->get_staff_details($id);
            }
            $data['info2'] = $this->staffModel->get_office();
            $s_date = $this->input->post('s_date');
            $e_date = $this->input->post('e_date');
            $data['info3'] = $this->paymentModel->get_count_location_payment1($s_date,$e_date);
            $data['info4'] = $this->paymentModel->get_count_location_payment2($s_date,$e_date);
            $data['info5'] = $this->paymentModel->get_count_location_payment3($s_date,$e_date);
            $this->load->view('layout/header', $data);
            $this->load->view('reports/reports_location', $data);
            $this->load->view('layout/footer');
    }
    public function reports_view_staff() {
       $this->form_validation->set_rules('e_date', 'End Date', 'trim|callback_compareDates');
        if ($this->form_validation->run() == false) {
            $this->reports_view_staff2();
        } else {
            $this->reports_view_staff2();
        }
    }
    public function reports_view_staff2() {
       $id = $this->session->userdata('StaffID');
            if ($this->session->userdata('Type') == 'Supervisor') {
                $data['info'] = $this->staffModel->get_staff_details2($id);
            } else {
                $data['info'] = $this->staffModel->get_staff_details($id);
            }
            $data['info2'] = $this->staffModel->get_office();
            $s_date = $this->input->post('s_date');
            $e_date = $this->input->post('e_date');
            $data['staff'] = $this->paymentModel->get_staff_payment($s_date,$e_date);
            $data['total'] = $this->paymentModel->get_staff_payment_total($s_date,$e_date);
            $this->load->view('layout/header', $data);
            $this->load->view('reports/reports_staff', $data);
            $this->load->view('layout/footer');
    }

    function compareDates() {
        $start = $this->input->post('s_date');
        $end = $this->input->post('e_date');
        if ($start > $end) {
            $this->form_validation->set_message('compareDates', 'Your start date must be earlier than your end date');
            return false;
        }
    }

}
