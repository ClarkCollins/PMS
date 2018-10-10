
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
        public function register_dependent_view($meg1)
        {
                $dataMember = array(
                'meg1' => $meg1,);
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
         
            $form_policy = $this->input->post('PolicyNumber');
            $data['info'] = $this->pmsModel->getPolicy($form_policy);
        foreach ($data['info']->result() as $row) {
            $db_policy = $row->PolicyNumber;
        }
            if($db_policy == $form_policy)
        { 
                if($this->input->post('MembershipID')==1){
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
        else{
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('LastName');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $add_client['MembershipID'] = $this->input->post('MembershipID');
            $this->pmsModel->add_person2($form_policy,$add_client);
        }
            
        }
        $client="Client Added";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
        }
    }
          
                
        
}










