
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {
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
            $this->load->view('layout/header');
        $this->load->view('dashboard/register_client', array('error' => ' '));
        $this->load->view('layout/footer');
    }
        public function register_view()
	{
                $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $dataMember['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $dataMember['info'] = $this->staffModel->get_staff_details($id);  
                }
                $dataMember['mType'] = $this->pmsModel->getMemberType();
		$this->load->view('layout/header',$dataMember);
                $this->load->view('dashboard/register_client',$dataMember);
                $this->load->view('layout/footer');
	}
        public function register_dependent_view($meg1,$meg2)
        {
            $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
                $dataMember = array(
                'meg1' => $meg1,'meg2' => $meg2,);
                $dataMember['mType'] = $this->pmsModel->getMemberType();
		$this->load->view('layout/header',$data);
                $this->load->view('dashboard/register_client_dependent',$dataMember);
                $this->load->view('layout/footer');
	}
        public function all_client_view()
	{
            $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
                $data['allClient'] = $this->pmsModel->getClient();
		$this->load->view('layout/header',$data);
                $this->load->view('dashboard/view_all_clients',$data);
                $this->load->view('layout/footer');
	}
        public function all_payment_view()
	{
            $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
                $data['payment'] = $this->paymentModel->get_payment(); 
                
		$this->load->view('layout/header',$data);
                $this->load->view('dashboard/view_all_payments',$data);
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
            $pol = $this->input->post('PolicyNumber');
       $no_dep['dp'] = $this->pmsModel->getPolicy($pol);
       foreach ($no_dep['dp']->result() as $row) {
            $dep = $row->NoDependent;
            $pre = $row->Premium;
        }
        $cal = $dep + 1;
        $cal2 = $pre + 10;
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('LastName');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $add_client['MembershipID'] = $this->input->post('MembershipID');
        $add_client['PolicyNumber'] = $this->input->post('PolicyNumber');
        $p_num = $this->input->post('PolicyNumber');
        $update_policy = array();
        $update_policy['NoDependent'] = $cal;
        $update_policy['Premium'] = $cal2;
            $this->pmsModel->add_person2($add_client,$update_policy,$p_num);
        
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
            $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
            $update_client = array(
                'meg1' => $meg1,
                'meg2' => $meg2,
                'meg3' => $meg3,
                'meg4' => $meg4,
                'meg5' => $meg5,
                'meg6' => $meg6,
                'meg7' => $meg7,
                );
            $this->load->view('layout/header',$data);
                $this->load->view('dashboard/edit_client',$update_client);
                $this->load->view('layout/footer');
            
        }
        public function view_client_detail($meg1,$meg2,$meg3,$meg4,$meg5,$meg6,$meg7)
        {
            $id = $this->session->userdata('StaffID');
                if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
            $update_client = array(
                'meg1' => $meg1,
                'meg2' => $meg2,
                'meg3' => $meg3,
                'meg4' => $meg4,
                'meg5' => $meg5,
                'meg6' => $meg6,
                'meg7' => $meg7,
                );
            $data['mType'] = $this->pmsModel->getMemberType();
            $this->load->view('layout/header',$data);
                $this->load->view('dashboard/view_client_detail',$update_client);
                $this->load->view('layout/footer');
            
        }
        public function update_client_dependent_view($meg1,$meg2,$meg3,$meg4,$meg5,$meg6,$meg7,$meg8)
        {
            $id = $this->session->userdata('StaffID');
               if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
            $update_client = array(
                'meg1' => $meg1,
                'meg2' => $meg2,
                'meg3' => $meg3,
                'meg4' => $meg4,
                'meg5' => $meg5,
                'meg6' => $meg6,
                'meg7' => $meg7,
                'meg8' => $meg8,
                );
            $update_client['mType'] = $this->pmsModel->getMemberType();
            $this->load->view('layout/header',$data);
                $this->load->view('dashboard/edit_client_dependent',$update_client);
                $this->load->view('layout/footer');
            
        }
         public function update_client_dependent()
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
                $userpic = $this->input->post('db_photo');
            }
       
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('LastName');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $add_client['MembershipID'] = $this->input->post('MembershipID');
        $id = $this->input->post('IDNo');
            $this->pmsModel->update_client($id,$add_client);
        
        }
        $client="Dependent Updated";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
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
                        redirect('update_client_page');
                    }
                } else {
                    $this->session->set_flashdata('flash_error', 'error');
                    redirect('update_client_page');
                }
            } else {
                
            }
            if ($userpic == NULL) {
                $userpic = $this->input->post('db_photo');
            }
            $id = $this->input->post('IDNo');
        $add_client = array();
        $add_client['FirstName'] = $this->input->post('FirstName');
        $add_client['LastName'] = $this->input->post('LastName');
        $add_client['ContactNo'] = $this->input->post('ContactNo');
        $add_client['DOB'] = $this->input->post('DOB');
        $add_client['Gender'] = $this->input->post('Gender');
        $add_client['PicturePath'] = $userpic;
        $add_client['MembershipID'] = "1";  
         $this->pmsModel->update_client($id,$add_client);
        
            
        }
        $client="Client Updated";
        $this->session->set_flashdata('flash_Success', $client);
        redirect("/all_client");
        }
        
        public function pay_premium_view($meg1,$meg2,$meg3,$meg4)
        {
            $id = $this->session->userdata('StaffID');
               if($this->session->userdata('Type')== 'Supervisor'){
                $data['info'] = $this->staffModel->get_staff_details2($id);
                }
                else{
                  $data['info'] = $this->staffModel->get_staff_details($id);  
                }
            $update_client = array(
                'meg1' => $meg1,
                'meg2' => $meg2,
                'meg3' => $meg3,
                'meg4' => $meg4,
                );
            $this->load->view('layout/header',$data);
                $this->load->view('dashboard/pay_premium',$update_client);
                $this->load->view('layout/footer');
            
        }
         public function make_payment()
        {
             $id = $this->session->userdata('StaffID');
             if($this->session->userdata('Type')== 'Supervisor')
             {
                 $location['data'] =  $this->staffModel->get_staff_details2($id);
              foreach ($location['data']->result() as $row) {
                   $officeID = $row->OfficeID;
              }
              $policyNum = $this->input->post('PolicyNumber');
              $premium['Premium'] = $this->input->post('Amount');
        $add_payment = array();
        $add_payment['ClientID'] = $this->input->post('ClientID');
        $add_payment['OfficeID'] = $officeID;
        $add_payment['StaffID'] = $this->session->userdata('StaffID');
        $add_payment['Date'] = date('Y-m-d');
        $add_payment['Amount'] = $this->input->post('Amount');  
         $this->paymentModel->add_payment($add_payment,$policyNum,$premium);
         
         $client="Payment added";
        $this->session->set_flashdata('flash_Success', $client);
        redirect('all_payment');
             }else{
                $location['data'] =  $this->staffModel->get_staff_details($id);
                  foreach ($location['data']->result() as $row) {
                   $officeID = $row->Location; 
             }
              $policyNum = $this->input->post('PolicyNumber');
              $premium['Premium'] = $this->input->post('Amount');
        $add_payment = array();
        $add_payment['ClientID'] = $this->input->post('ClientID');
        $add_payment['OfficeID'] = $officeID;
        $add_payment['StaffID'] = $this->session->userdata('StaffID');
        $add_payment['Date'] = date('Y-m-d');
        $add_payment['Amount'] = $this->input->post('Amount');  
         $this->paymentModel->add_payment($add_payment,$policyNum,$premium);
         
         $client="Payment added";
        $this->session->set_flashdata('flash_Success', $client);
        redirect('all_payment');
            
        }
}
public function view_pay($meg1,$meg2,$meg3,$meg4,$meg5,$meg6,$meg7,$meg8, $meg9,$meg10, $meg11)
        {
    $values = array(
                'meg1' => $meg1,
            'meg2' => $meg2,
            'meg3' => $meg3,
            'meg4' => $meg4,
            'meg5' => $meg5,
            'meg6' => $meg6,
            'meg7' => $meg7,
            'meg8' => $meg8,
            'meg9' => $meg9,
            'meg10' => $meg10,
            'meg11' => $meg11,
        );
                $this->load->view('dashboard/payment_receipt',$values);
            
        }


}







