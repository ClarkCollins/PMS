
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {
	public function index()
	{
	}
        public function register_view()
	{
                $dataMember['mType'] = $this->pmsModel->getMemberType();
		$this->load->view('layout/header');
                $this->load->view('dashboard/register_client',$dataMember);
                $this->load->view('layout/footer');
	}
        public function all_client_view()
	{
		$this->load->view('layout/header');
                $this->load->view('dashboard/view_all_clients');
                $this->load->view('layout/footer');
	}
        public function all_payment_view()
	{
		$this->load->view('layout/header');
                $this->load->view('dashboard/view_all_payments');
                $this->load->view('layout/footer');
	}
          
                
        
}










