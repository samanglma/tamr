<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends My_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Products_m');
        $this->load->model('Brands_m');
         $this->load->model('Categories_m');
         $this->load->model('Variant_m');

    }
    public function index()
	{
        $data['rcd'] = $this->Products_m->getAll();
	    $this->load->view('admin/products/view', $data);
	}

	public function add()
    {
        $data['brands'] = $this->Brands_m->getAll();

         $data['categories'] = $this->Categories_m->getAllParentCategory();

         $data['variants'] = $this->Variant_m->getAll();

        $this->load->view('admin/products/add', $data);

    }

    public function myformAjax($id) { 

        
        $result = $this->db->where("parent_id",$id)->get("categories")->result();
        echo json_encode($result);
    }

	public function save()
    {


       
        $discounted_price = 'NULL';
       // $this->form_validation->set_rules('title', 'Brand Name', 'required');
        $this->form_validation->set_rules('description', 'Description|max_length[170]', 'required');
        //$this->form_validation->set_rules('brand_id', 'Brand', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('vat_price', 'Price Including VAT', 'required');
        $this->form_validation->set_rules('alt', 'Alt', 'required');

		$dataArray = array(
			'title' => $this->input->post('title'),
			//'title_ar' => $this->input->post('title_ar'),
			'description' => $this->input->post('description'),
			//'description_ar' => $this->input->post('description_ar'),
			//'discounted_price' => $discounted_price,
			'price' => $this->input->post('price'),
			'vat_price' => $this->input->post('vat_price'),
			'alt' => $this->input->post('alt'),
			'alt_ar' => $this->input->post('alt_ar'),
           // 'alt_ar' => $this->input->post('alt_ar'),
			//'brand_id' => $this->input->post('brand_id'),   child_cat
			//'status' => $this->input->post('status'),
			//'mark_as_new'=>$this->input->post('markAsNew'),
			//'top_seller'=>$this->input->post('topSeller'),
			//'out_of_stock'=>$this->input->post('outofStock'),
            'cat_id' => $this->input->post('cat_id'),
            
		);
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields and try again.. ');
            redirect('admin/products/add',array('data'=>$dataArray));
        }
        else{

            $config['upload_path']          = './uploads/products/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
           /* $config['encrypt_name']          = TRUE;*/
           /* $config['max_width']            = 700;
            $config['max_height']           = 1000;*/

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image1'))
            {
               // $error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $this->upload->display_errors()."image1");

                redirect('admin/products/add',$dataArray);
            }
            else
            {
                $uploadData = $this->upload->data();

                $image1 = $uploadData['file_name'];
            }
			if ($_FILES['image_ar']['name'] != "") {

				if ($this->upload->do_upload('image_ar')) {
					$uploadData = $this->upload->data();

					$image_ar = $uploadData['file_name'];
				}
			}

            if ($_FILES['image2']['name'] != "") {

                if ($this->upload->do_upload('image2')) {
                    $uploadData = $this->upload->data();

                    $image2 = $uploadData['file_name'];
                }
            }

            if ($_FILES['image3']['name'] != "") {

                if ($this->upload->do_upload('image3')) {
                    $uploadData = $this->upload->data();

                    $image3 = $uploadData['file_name'];
                }
            }

            if ($_FILES['image4']['name'] != "") {

                if ($this->upload->do_upload('image4')) {
                    $uploadData = $this->upload->data();

                    $image4 = $uploadData['file_name'];
                }
            }
//thumbnail

			//thumbnail
			if ($_FILES['thumb']['name'] != "") {
				$config['upload_path'] = './uploads/products/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				/*$config['encrypt_name'] = TRUE;*/
				/*$config['max_width'] = 225;
				$config['max_height'] = 210;*/
				if (!$this->upload->do_upload('thumb')) {
					$this->session->set_flashdata('error', $this->upload->display_errors()."thbmnail");
					//$error = array('error' => $this->upload->display_errors());
					redirect('admin/products/add',$dataArray);
				} else {
					$uploadData = $this->upload->data();

					$thumb = $uploadData['file_name'];
				}
			}
			if ($_FILES['thumb_ar']['name'] != "") {
				$config['upload_path'] = './uploads/products/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				/*$config['encrypt_name'] = TRUE;*/
				/*$config['max_width'] = 225;
				$config['max_height'] = 210;*/
				if (!$this->upload->do_upload('thumb_ar')) {
					//$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $this->upload->display_errors()."thbmnailar");
					redirect('admin/products/add',$dataArray);
				} else {
					$uploadData = $this->upload->data();

					$thumb_ar = $uploadData['file_name'];
				}
			}

			$desc = $this->input->post('description');
			$desc_ar = $this->input->post('description_ar');

            if(strlen($desc) > 165){
                $desc = substr($desc,0,165);
            }

            if(strlen($desc_ar) > 165){
                $desc_ar = substr($desc_ar,0,165);
            }


        $variants = $this->input->post('variants');

        $ex_val = implode(',',$variants);

            $data = array(
                'title' => $this->input->post('title'),
                'title_ar' => $this->input->post('title_ar'),
                'description' => $desc,
                'description_ar' => $desc_ar,
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4,
                'image_ar' => $image_ar,
				'thumbnail' => $thumb,
				'thumbnail_ar' => $thumb_ar,
                'discounted_price' => $discounted_price,
                'price' => $this->input->post('price'),
                'vat_price' => $this->input->post('vat_price'),
                'alt' => $this->input->post('alt'),
                'alt_ar' => $this->input->post('alt_ar'),
               // 'brand_id' => $this->input->post('brand_id'),  
                'cat_id' => $this->input->post('cat_id'),
                'weight' => $this->input->post('weight'),
                'cat_id' => $this->input->post('cat_id'),
                'status' => $this->input->post('status'),
				'mark_as_new'=>$this->input->post('markAsNew'),
				'top_seller'=>$this->input->post('topSeller'),
                'out_of_stock'=>$this->input->post('outofStock'),
                'variants' =>  $ex_val,
               );

             $this->Products_m->save($data);
             $this->session->set_flashdata('success', 'Product added successfully');
             redirect('admin/products');
        }
    }

    public function edit($id)
    {
        $data['row'] = $this->Products_m->edit($id);
        $data['brands'] = $this->Brands_m->getAll();
        //$data['categories'] = $this->Categories_m->getAllCategory(); 
        $data['categories'] = $this->Categories_m->getAllParentCategory();
        $data['chlid_categories'] = $this->Categories_m->getAllChildCategory();
         $data['variantss'] = $this->Variant_m->getAll();
        $this->load->view('admin/products/edit', $data);
    }

    public function update()
    {

        $discounted_price = 'NULL';
        $id = $this->input->post('id');
        $old = $this->Products_m->edit($id);
       // $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('alt', 'Alt', 'required');
      //  $this->form_validation->set_rules('page_tempalet_id', 'Page Template', 'required');

        if($this->form_validation->run() == False)
        {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/products/edit/'. $id);

        }
        else{


            if ($_FILES['image1']['name'] != "") {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            /*$config['encrypt_name'] = TRUE;*/
          /*  $config['max_width'] = 225;
            $config['max_height'] = 210;*/


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image1')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());

                redirect('admin/products/edit/'. $id);
            } else {
                $uploadData = $this->upload->data();

                $image1 = $uploadData['file_name'];
            }
        } else {
                $image1 = $this->input->post('image1_2');
            }

            if ($_FILES['image2']['name'] != "") {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            /*$config['encrypt_name'] = TRUE;*/
          /*  $config['max_width'] = 225;
            $config['max_height'] = 210;*/


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image2')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());

                redirect('admin/products/edit/'. $id);
            } else {
                $uploadData = $this->upload->data();

                $image2 = $uploadData['file_name'];
            }
        } else {
                $image2 = $this->input->post('image2_2');
            }

            if ($_FILES['image3']['name'] != "") {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            /*$config['encrypt_name'] = TRUE;*/
          /*  $config['max_width'] = 225;
            $config['max_height'] = 210;*/


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image3')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());

                redirect('admin/products/edit/'. $id);
            } else {
                $uploadData = $this->upload->data();

                $image3 = $uploadData['file_name'];
            }
        } else {
                $image3 = $this->input->post('image3_2');
            }


            if ($_FILES['image4']['name'] != "") {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            /*$config['encrypt_name'] = TRUE;*/
          /*  $config['max_width'] = 225;
            $config['max_height'] = 210;*/
            /*$config['max_width'] = 700;
                $config['max_height'] = 1000;*/


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image4')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());

                redirect('admin/products/edit/'. $id);
            } else {
                $uploadData = $this->upload->data();

                $image4 = $uploadData['file_name'];
            }
        } else {
                $image4 = $this->input->post('image4_2');
            }


            if ($_FILES['image_ar']['name'] != "") {


                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                /*$config['encrypt_name'] = TRUE;*/
                $config['max_width'] = 700;
                $config['max_height'] = 1000;


                $this->load->library('upload', $config);

                $id = $this->input->post('id');

                if (!$this->upload->do_upload('image_ar')) {

                    $this->session->set_flashdata('error', 'There is a Problem Uploading Your Arabic Image. Please upload correct Image');
                    redirect('admin/products/edit/'. $id);
                }
                elseif($this->upload->do_upload('image_ar'))
                {

                    $uploadData = $this->upload->data();

                    $image_ar = $uploadData['file_name'];
                }

            }

            else{
                $image_ar = $this->input->post('image_ar2');
            }
        }

            
		//thumbnail
		if ($_FILES['thumb']['name'] != "") {
			$config['upload_path'] = './uploads/products/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			/*$config['encrypt_name'] = TRUE;*/
			$config['max_width'] = 225;
			$config['max_height'] = 210;


			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('thumb')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $this->upload->display_errors());

				redirect('admin/products/edit/'. $id);
			} else {
				$uploadData = $this->upload->data();

				$thumb = $uploadData['file_name'];
			}
		} else {
                $thumb = $this->input->post('thumb2');
            }

		if (!empty($_FILES['thumb']['thumb_ar'] )) {
			$config['upload_path'] = './uploads/products/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			/*$config['encrypt_name'] = TRUE;*/
			$config['max_width'] = 225;
			$config['max_height'] = 210;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('thumb_ar')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/products/edit/' . $id);
			} else {
				$uploadData = $this->upload->data();

				$thumb_ar = $uploadData['file_name'];
			}
		}

		$data['id'] = $this->input->post('id');

        $desc = $this->input->post('description');
        $desc_ar = $this->input->post('description_ar');

        if(strlen($desc) > 165){
            $desc = substr($desc,0,165);
        }

        if(strlen($desc_ar) > 165){
            $desc_ar = substr($desc_ar,0,165);
        }


        $variants = $this->input->post('variants');

        $ex_val = implode(',',$variants);


            $data['data'] = array(
                'title' => $this->input->post('title'),
                'title_ar' => $this->input->post('title_ar'),
                'description' => $desc,
                'description_ar' => $desc_ar,
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4,
                'image_ar' => $image_ar,
				'thumbnail' => $thumb,
				'thumbnail_ar' => $thumb_ar,
                'alt' => $this->input->post('alt'),
                'discounted_price' => $discounted_price,
                'price' => $this->input->post('price'),
                'vat_price' => $this->input->post('vat_price'),
                'alt_ar' => $this->input->post('alt_ar'),
               // 'brand_id' => $this->input->post('brand_id'), 
                'cat_id' => $this->input->post('cat_id'),
                'child_cat' => $this->input->post('child_cat'),
                'weight' => $this->input->post('weight'),
                'status' => $this->input->post('status'),
                'mark_as_new'=>$this->input->post('markAsNew'),
				'top_seller'=>$this->input->post('topSeller'),
                'out_of_stock'=>$this->input->post('outofStock'),
                'variants'=>$ex_val,
            );
            
            if($this->input->post('outofStock') !== 1 && $this->input->post('outofStock') != $old->out_of_stock)
            {
                $brand = $this->db->get_where('brands',['id'=> $this->input->post('brand_id')])->row_array();
                
                $subscribers = $this->db->get_where('out_of_stock_subscribers',['product_id'=> $id, 'notified' => 0])->result();
                foreach($subscribers as $sub) {


                    $this->email->from('no-reply@depachika.ae', 'Depachika');
			$this->email->to($sub->email);
			$this->email->subject($this->input->post('title').' is back on stock at Depachika');
			$name = 'Dear Subscriber';

			$message2 = "
            <html>
            <head>
            <title>DepaChika</title>
            </head>
            <body>
            <p style='margin-bottom:0'>We’d like to notify you that the product you wanted from " . $brand['brand_name'] ." is back on stock!</p><p> Visit our <a href='".base_url()."'>website</a> to purchase it now.</p>
            <br><table border='0' width='200px'>
            <tr>
            <td><a href='".base_url()."'><img src='".base_url()."uploads/products/$thumb'><p>".$this->input->post('title')."</p></td></td>
            </tr>
            </table>
            <table border='0' width='600px'>
            <tr>
            <td>
            <br><p><strong>Regards,</strong></p>
            <p><strong>Depachika Food Hall Customer Service Team</strong></p>
            <img src='" . base_url() . "assets/frontend/images/invoiceLogo.png' width='200' style='width:200px'>
            </td></td>
            </tr>
            </table>
            
            </body>
            </html>
            ";

			$this->email->set_mailtype("html");
			$this->email->message($message2);
			//Send mail
            $this->email->send();
            $this->db->set('notified', '1', FALSE);
            $this->db->where('id', $sub->id);
            $this->db->update('out_of_stock_subscribers'); 

                }

            }

            $this->Products_m->update($data);
            $this->session->set_flashdata('success', 'Product updated successfully');
            redirect('admin/products');
    }


    public function delete($id)
    {
        $this->Products_m->delete($id);
        $this->session->set_flashdata('success', 'Product Deleted Successfully');
        redirect('admin/products');
    }
}
