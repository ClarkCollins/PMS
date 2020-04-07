
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class HomeController extends CI_Controller {

	 public function __construct() {
        parent::__construct();
				
    }
	public function index()
	{
	}
        public function home_view()
	{
                $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->StaffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->StaffModel->get_staff_details($id);
                }
                $data['info1'] = $this->PaymentModel->total_payment();
		$this->load->view('layout/header',$data);
                $this->load->view('dashboard/home');
                $this->load->view('layout/footer');
	}


}
