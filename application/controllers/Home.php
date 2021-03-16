<?php


class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['meta'] = [
			'canonical_tag' => '',
			'meta_title' => lang() == 'english' ? '' : '',
			'meta_description' => lang() == 'english' ? '' : '',
			'schema' => '',
			'robots' => ''
		];

		$data['breadcrumb'] = [
			'Home' => base_url(),
		];

		$data['breadcrumb'] = $this->load->view('frontend/includes/breadcrumbs', $data, true);
		$data['categories'] = $this->Categories_m->getCategoriesByParent('dates');

		$this->load->view('frontend/includes/header', $data);
		$this->load->view('frontend/includes/navigation');
		$this->load->view('frontend/includes/right-sidebar');
		$this->load->view('frontend/includes/bottom-sidebar', $data);
		$this->load->view('frontend/home');
		$this->load->view('frontend/includes/footer');
	}

	public function submit()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if($this->form_validation->run() == FALSE)
        {

            if(lang() == 'arabic')
            {
                $this->session->set_flashdata('error', ' يرجى ملء جميع الحقول المطلوبة وحاول مرة أخرى...');
                redirect('ar/contact-us');
            }
            else
            {
                $this->session->set_flashdata('error', 'Fill All the Required Fields and Try again..');
                redirect('en/contact-us');
            }

        }
        else
        {
            $data = array(

                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'msg' => $this->input->post('msg')
            );

           // $from_email = 'no-reply@depachika.ae';
           //$from_email = 'amin@glmaagency.com';
           // $to_email = $this->input->post('email');

            //$this->email->from($from_email, 'Depachika');
            //$this->email->to($to_email);
           // $this->email->subject('Contact Us');
            //$name = $this->input->post('name');

           // $message2 = "
            //<html>
            //<head>
            //<title>Nakheel Mall</title>
            //</head>
            //<body>
            //Dear ".$name.", <br/> <br/> 
           // We have received your inquiry and we will get back to you within 24hrs.
            
            //<br/><br/>
            //Regards, <br/>
            //Nakheel Mall Customer Service Team
            //</body>
            //</html>
           // ";

           // $this->email->set_mailtype("html");
           // $this->email->message($message2);
            //Send mail
           // $this->email->send();

            //  $name = $this->input->post('name');
            //  $msg = $this->input->post('msg');
            //  $email = $this->input->post('email');
            //  $phone = $this->input->post('phone');

           // $message = "
           // <html>
           // <head>
          //  <title>Nakheel Mall</title>
          //  </head>
          //  <body>
         //   <table>
         //   <tr>
         //   <td><b>Name: </b></td>
         //   <td>".$name."</td>
         //   </tr>
         //   <tr>
         //   <td><b>Email: </b></td>
          //  <td>".$email."</td>
          //  </tr>
          //  <tr>
          //  <td><b>Phone: </b></td>
          //  <td>".$phone."</td>
          //  </tr>
          //  <tr>
          //  <td><b>Request: </b></td>
          //  <td>".$msg."</td>
          //  </tr>
          //  </table>
          //  </body>
           // </html>
           // ";

           // $this->email->from($from_email, 'Nakheel Mall');
          //  $this->email->to($from_email);
          //  $this->email->subject('Contact Us');
            //$this->email->set_mailtype("html");
            //$this->email->message($message);
            //$this->email->send();

            $this->contact_m->submit($data);

            if(lang() == 'arabic')
            {
                $this->session->set_flashdata('success', 'يتم إرسال استفسارك بنجاح!');
                redirect('ar/contact-us');
            }
            else
            {
                $this->session->set_flashdata('success', 'Your inquiry is sent successfully!');
                redirect('en/contact-us');
            }

        }
	}

}
