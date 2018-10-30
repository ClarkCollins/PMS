
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends CI_Controller {
	public function index()
	{
	}
        public function login()
	{  
		$this->load->view('auth/login');
	}
        function is_valid_password($password, $dbpassword) {
        $rotations = 1;
        $salt = substr($dbpassword, 0, 64);
        $hash = $salt . $password;

        for ($i = 0; $i < $rotations; $i ++) {
            $hash = hash('sha256', $hash);
        }

        //Sleep a bit to prevent brute force
        time_nanosleep(0, 400000000);
        $hash = $salt . $hash;
        return $hash == $dbpassword;
    }
        public function staff_validation() {

        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
        } else {
            $email = $this->input->post('email');
            $dbpassword = $this->staffModel->get_staff_pwd($email);

            if ($this->is_valid_password($this->input->post('password'), $dbpassword)) {
                $data['info'] = $this->staffModel->get_staff_detail($email);
                foreach ($data['info']->result() as $row) {
                    $staffID = $row->StaffID;
                    $type = $row->Type;
                }
                $this->session->set_userdata(
                        array('StaffID' => $staffID,
                            'Type' => $type,
                ));
                redirect('/home');
            }  
           else {
                $this->session->set_flashdata('flashDanger', 'Email or password do not match.');
                redirect("/");
            }
        }}
        
                
        public function logout() {
        $this->session->unset_userdata('StaffID','Type');
        $this->session->sess_destroy();
        redirect('/');
    }
}



















