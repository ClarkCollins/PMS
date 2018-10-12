
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffController extends CI_Controller {
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
         function encrypt_password($password, $email) {
        $rotations = 1;
        $salt = hash('sha256', uniqid(mt_rand(), true) . "somesalt" . strtolower($email));
        $hash = $salt . $password;
        for ($i = 0; $i < $rotations; $i ++) {
            $hash = hash('sha256', $hash);
        }
        return $salt . $hash;
    }
        public function add_consultant()
	{
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('Lastname');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = "0000-00-00";
        $add_client['Gender'] = "Nil";
        $add_client['PicturePath'] = 'no_profile.jpeg';
        $add_client['MembershipID'] = "1";  
        
        $add_client_policy = array();
        $date = date('Y-m-d');
        $add_client_policy['InceptionDate'] = $date;
        
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $staff = array();
        $staff['Username'] = $this->input->post('email');
        $staff['Password'] = $this->encrypt_password($password, $email);
        $staff['Type'] = "Consultant";
        
        $consultant = array();
        $consultant['Location'] = $this->input->post('location');
        $this->staffModel->add_consultant_($add_client_policy,$add_client,$staff,$consultant);
        
        $staff_suc="Consultant Added";
        $this->session->set_flashdata('flash_Success', $staff_suc);
        redirect("/home");
        }
        
          
        
    }
                
        










