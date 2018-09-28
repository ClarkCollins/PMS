
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffController extends CI_Controller {
	public function index()
	{
	}
        public function add_consultant_view()
	{
		$this->load->view('layout/header');
                $this->load->view('dashboard/register_consultant');
                $this->load->view('layout/footer');
	}
         public function profile_view()
	{
		$this->load->view('layout/header');
                $this->load->view('dashboard/staff_profile');
                $this->load->view('layout/footer');
	}
                
        
}










