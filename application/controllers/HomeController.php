
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class HomeController extends CI_Controller {

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
	public function index()
	{
	}
        public function home_view()
	{
                $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
		$this->load->view('layout/header',$data);
                $this->load->view('dashboard/home');
                $this->load->view('layout/footer');
	}
                
        
}






















