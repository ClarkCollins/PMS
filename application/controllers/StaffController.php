
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffController extends CI_Controller {
     public function __construct() {
        parent::__construct();
      
    }
	public function index()
	{
	}
        public function add_consultant_view()
	{
            $id = $this->session->userdata('StaffID');
            if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->StaffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->StaffModel->get_staff_details($id);
                }
                $data['info2'] = $this->StaffModel->get_office();
		$this->load->view('layout/header',$data);
                $this->load->view('dashboard/register_consultant',$data);
                $this->load->view('layout/footer');
	}
         public function profile_view()
	{
             $id = $this->session->userdata('StaffID');
             if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->StaffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->StaffModel->get_staff_details($id);
                }
		$this->load->view('layout/header',$data);
                $this->load->view('dashboard/staff_profile',$data);
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
            $this->form_validation->set_rules('email', 'Email', 'trim|callback_checkUser');
            if ($this->form_validation->run() == FALSE) {
            $this->add_consultant_view();
        }
        else{

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
        $this->StaffModel->add_consultant_($add_client_policy,$add_client,$staff,$consultant);

        $staff_suc="Consultant Added";
        $this->session->set_flashdata('flash_Success', $staff_suc);
        redirect("/home");
        }

        }
         Public function checkUser($requested_email) {
        $email_available = $this->StaffModel->checkUserExist($requested_email);
        if ($email_available) {
            return TRUE;
        } else {
         $this->form_validation->set_message('checkUser', '<p style="color:red; align:center">Sorry. This email belongs to another user</p>');
            return FALSE;
        }
    }
         public function Update_profile()
	{
            if (isset($_POST['upload'])) {
            $imgFile = $_FILES['userfile']['name'];
            $tmp_dir = $_FILES['userfile']['tmp_name'];
            $imgSize = $_FILES['userfile']['size'];
            $userpic = '';
            if ($imgFile) {
                $upload_dir = 'files/client_photo/'; // upload directory
                $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                $userpic = rand(1000, 1000000) . "." . $imgExt;

                if (in_array($imgExt, $valid_extensions)) {
                    if ($imgSize < 5000000) {
                        $upload_result = move_uploaded_file($tmp_dir, $upload_dir . $userpic);
                    } else {
                        $this->session->set_flashdata('flash_error_large', 'photo exceeds required limit');
                        redirect('/profile');
                    }
                } else {
                    $this->session->set_flashdata('flash_error', 'Only: jpeg, jpg, png, gif');
                    redirect('/profile');
                }
            } else {

            }
            if ($userpic == NULL) {
                $userpic = $this->input->post('photo2');
            }
        $id = $this->session->userdata('StaffID');
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('Lastname');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $email = array();
        $email['Username']=$this->input->post('email');
        $this->StaffModel->update_profile($id,$add_client, $email);

        $staff_suc="Profile Updated";
        $this->session->set_flashdata('flash_Success', $staff_suc);
        redirect("/profile");

        }
            }

}
