<?php


class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('settings_m');
	}

	public function index($slug = '')
	{
		$data['meta'] = [
			'canonical_tag' => '',
			'meta_title' => lang() == 'english' ? '' : '',
			'meta_description' => lang() == 'english' ? '' : '',
			'schema' => '',
			'robots' => ''
		];

		$data['contents'] = $this->Page_m->getPageBySlug($slug);

		$this->load->view('frontend/includes/header', $data);
		$this->load->view('frontend/includes/navigation');
		$this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar');
		if ($slug != 'about' && $slug != 'contact' && $slug != 'cart') {

			

			$data['breadcrumb'] = [
				'Home' => base_url(),
				$slug => base_url('page/'.$slug),
			];
			$this->load->view('frontend/page', $data);
		} else {

			

			$data['info'] = $this->Settings_m->getInfo();

			$data['breadcrumb'] = [
				'Home' => base_url(),
				$slug => base_url('page/'.$slug),
			];
			$this->load->view('frontend/' . $slug, $data);
		}
		$data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);
		$this->load->view('frontend/includes/footer');
	}



	public function submit()
	{

		$this->load->model('contact_m');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == FALSE) {

			if (lang() == 'arabic') {



				$this->session->set_flashdata('error', ' يرجى ملء جميع الحقول المطلوبة وحاول مرة أخرى...');
				redirect(base_url('ar/contact'));
			} else {
				$this->session->set_flashdata('error', 'Fill All the Required Fields and Try again..');
				redirect(base_url('en/contact'));
			}
		} else {
			$data = array(

				'name' => strip_tags($this->security->xss_clean($this->input->post('name'))),
				'email' => strip_tags($this->security->xss_clean($this->input->post('email'))),
				'phone' => strip_tags($this->security->xss_clean($this->input->post('phone'))),
				'message' => strip_tags($this->security->xss_clean($this->input->post('message')))
			);


			$from_email = 'saman@glmaagency.com';
			$to_email = $this->security->xss_clean($this->input->post('email'));

			$this->email->from($from_email, 'Tamr');
			$this->email->to($to_email);
			$this->email->subject('Contact Us');
			$name = $this->security->xss_clean($this->input->post('name'));

			$message2 = "
            <html>
            <head>
            <title>DepaChika</title>
            </head>
            <body>
            Dear " . $name . ", <br/> <br/> 
            We have received your inquiry and we will get back to you within 24hrs.
            
            <br/><br/>
            Regards, <br/>
			Depachika Customer Service Team<br>
			<img src='" . base_url() . "assets/frontend/images/invoiceLogo.png'  width='200' style='width:200px'>
            </body>
            </html>
            ";


			$this->email->set_mailtype("html");
			$this->email->message($message2);
			//Send mail
			// $this->email->send();


			$this->load->library('email');
			$name = $this->security->xss_clean($this->input->post('name'));
			$msg = $this->security->xss_clean($this->input->post('message'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$phone = $this->security->xss_clean($this->input->post('phone'));

			$message = "
            <html>
            <head>
            <title>DepaChika</title>
            </head>
            <body>
            <table>
            <tr>
            <td><b>Name: </b></td>
            <td>" . $name . "</td>
            </tr>
            <tr>
            <td><b>Email: </b></td>
            <td>" . $email . "</td>
            </tr>
            <tr>
            <td><b>Phone: </b></td>
            <td>" . $phone . "</td>
            </tr>
            <tr>
            <td><b>Request: </b></td>
            <td>" . $msg . "</td>
            </tr>
            </table>
            </body>
            </html>
            ";

			$this->email->from($from_email, 'Depachika');
			$this->email->to(['Rubi.AlChaer@nakheel.com', 'depachika@nakheel.com', 'Bregandel.Manalo@nakheel.com']);
			$this->email->subject('Contact Us');
			$this->email->set_mailtype("html");
			$this->email->message($message);
			if(!$this->email->send())
{
die($this->email->print_debugger());
}
			$this->contact_m->submit($data);

			if ($_SESSION['site_lang'] == 'arabic') {

				echo 'arabic';

				die();
				echo json_encode(array('success' => "true", 'message' => 'لقد تمّ إرسال اِستفسارك بنجاح. '));
			// } else {


				echo 'english';

				die();



				echo json_encode(array('success' => "true", 'message' => 'Your inquiry is sent successfully!'));
			}
		}
	}
}
