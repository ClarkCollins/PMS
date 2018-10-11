
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {
	public function index()
	{
            $this->load->view('layout/header');
        $this->load->view('dashboard/register_client', array('error' => ' '));
        $this->load->view('layout/footer');
    }
        public function register_view()
	{
                $dataMember['mType'] = $this->pmsModel->getMemberType();
		$this->load->view('layout/header');
                $this->load->view('dashboard/register_client',$dataMember);
                $this->load->view('layout/footer');
	}
        public function register_dependent_view($meg1,$meg2)
        {
                $dataMember = array(
                'meg1' => $meg1,'meg2' => $meg2,);
                $dataMember['mType'] = $this->pmsModel->getMemberType();
		$this->load->view('layout/header');
                $this->load->view('dashboard/register_client_dependent',$dataMember);
                $this->load->view('layout/footer');
	}
        public function all_client_view()
	{
                $data['allClient'] = $this->pmsModel->getClient();
		$this->load->view('layout/header');
                $this->load->view('dashboard/view_all_clients',$data);
                $this->load->view('layout/footer');
	}
        public function all_payment_view()
	{
		$this->load->view('layout/header');
                $this->load->view('dashboard/view_all_payments');
                $this->load->view('layout/footer');
	}
        public function add_client()
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
                        redirect('add_client');
                    }
                } else {
                    $this->session->set_flashdata('flash_error', 'error');
                    redirect('add_client');
                }
            } else {
                
            }
            if ($userpic == NULL) {
                $userpic = 'no_profile.jpeg';
            }
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('LastName');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $add_client['MembershipID'] = "1";  
        $add_client_policy = array();
        $date = date('Y-m-d');
        $add_client_policy['InceptionDate'] = $date;
         $this->pmsModel->add_person($add_client_policy,$add_client);
        
            
        }
        $client="Client Added";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
        }
          
          public function add_client_dependent()
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
                        redirect('add_client');
                    }
                } else {
                    $this->session->set_flashdata('flash_error', 'error');
                    redirect('add_client');
                }
            } else {
                
            }
            if ($userpic == NULL) {
                $userpic = 'no_profile.jpeg';
            }
       
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('LastName');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $add_client['MembershipID'] = $this->input->post('MembershipID');
        $add_client['PolicyNumber'] = $this->input->post('PolicyNumber');
            $this->pmsModel->add_person2($add_client);
        
        }
        $client="Dependent Added";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
        }   
        public function delete_client()
        {
            $policyNumber = $this->uri->segment(2);
            $this->pmsModel->delete_client($policyNumber);
            $client="Client Deleted";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
        }
        public function delete_client_dependent()
        {
            $id = $this->uri->segment(2);
            $policyNumber = $this->uri->segment(3);
            $this->pmsModel->delete_client_dependent($policyNumber,$id);
            $client="Dependent Deleted";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
        }
        
        public function update_client_view($meg1,$meg2,$meg3,$meg4,$meg5,$meg6,$meg7)
        {
            $update_client = array(
                'meg1' => $meg1,
                'meg2' => $meg2,
                'meg3' => $meg3,
                'meg4' => $meg4,
                'meg5' => $meg5,
                'meg6' => $meg6,
                'meg7' => $meg7,
                );
            $this->load->view('layout/header');
                $this->load->view('dashboard/edit_client',$update_client);
                $this->load->view('layout/footer');
            
        }
        
         public function update_client()
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
                        redirect('add_client');
                    }
                } else {
                    $this->session->set_flashdata('flash_error', 'error');
                    redirect('add_client');
                }
            } else {
                
            }
            if ($userpic == NULL) {
                $userpic = 'no_profile.jpeg';
            }
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('LastName');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $add_client['MembershipID'] = "1";  
        $add_client_policy = array();
        $date = date('Y-m-d');
        $add_client_policy['InceptionDate'] = $date;
         $this->pmsModel->add_person($add_client_policy,$add_client);
        
            
        }
        $client="Client Added";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
        }
}










