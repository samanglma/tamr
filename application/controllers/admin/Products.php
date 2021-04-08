<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Products_m');
        $this->load->model('Brands_m');
        $this->load->model('Categories_m');
		$this->load->model('sub_categories_m');
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

    public function myformAjax($id)
    {

        $result = $this->db->where("cat_id", $id)->get("sub_categories")->result();
        echo json_encode($result);
    }

    public function save()
    {

        $discounted_price = 'NULL';
        // $this->form_validation->set_rules('title', 'Brand Name', 'required');
        //$this->form_validation->set_rules('description', 'Description', 'required');
        //$this->form_validation->set_rules('brand_id', 'Brand', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('vat_price', 'Price Including VAT', 'required');
        $this->form_validation->set_rules('alt', 'Alt', 'required');
        $title = $this->input->post('title');
        $slugs = url_title($title);
        $slug = strtolower($slugs);
        $dataArray = array(
            
            'title' => $this->input->post('title'),
            'title_ar' => $this->input->post('title_ar'),
            'description' => $this->input->post('description'),
            'description_ar' => $this->input->post('description_ar'),
            //'discounted_price' => $discounted_price,
            'price' => $this->input->post('price'),
            'vat_price' => $this->input->post('vat_price'),
            'alt' => $this->input->post('alt'),
           // 'alt_ar' => $this->input->post('alt_ar'),
           
            //'brand_id' => $this->input->post('brand_id'), 
            //'status' => $this->input->post('status'),
            //'mark_as_new'=>$this->input->post('markAsNew'),
            //'top_seller'=>$this->input->post('topSeller'),
            //'out_of_stock'=>$this->input->post('outofStock'),
            'cat_id' => $this->input->post('cat_id'),

        );
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Fill all the Required Fields and try again.. ');
            redirect('admin/products/add', array('data' => $dataArray));
        } else {

			   //thumbnail 1
			   if ($_FILES['thumb1']['name'] != "") {
                $config2['upload_path'] = './uploads/products/';
                $config2['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
           		$config['max_width'] = 321;
           		$config['max_height'] = 282;
				$config['min_width'] = 321;
           		$config['min_height'] = 282;

				$this->load->library('upload', $config2);


                if (!$this->upload->do_upload('thumb1')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors() . "thbmnail 1");
                    //$error = array('error' => $this->upload->display_errors());
                    redirect('admin/products/add', $dataArray);
                } else {
                    $uploadData = $this->upload->data();

                    $thumb1 = $uploadData['file_name'];
                }
            }


			 //thumbnail 2
			 if ($_FILES['thumb2']['name'] != "") {
                $config3['upload_path'] = './uploads/products/';
                $config3['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
           		$config['max_width'] = 508;
           		$config['max_height'] = 391;
				$config['min_width'] = 508;
           		$config['min_height'] = 391;

				$this->load->library('upload', $config3);


                if (!$this->upload->do_upload('thumb2')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors() . "thbmnail 2");
                    //$error = array('error' => $this->upload->display_errors());
                    redirect('admin/products/add', $dataArray);
                } else {
                    $uploadData = $this->upload->data();

                    $thumb2 = $uploadData['file_name'];
                }
            }

            $config['upload_path']          = './uploads/products/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';
             $config['encrypt_name']          = TRUE;
			 $config['min_width']       = '1374';      
			 $config['min_height']      = '1030';      
			 $config['max_width']       = '1374';       
			 $config['max_height']      = '1030'; 

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image1')) {
                // $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors() . "image1");

                redirect('admin/products/add', $dataArray);
            } else {
                $uploadData = $this->upload->data();

                $image1 = $uploadData['file_name'];
            }
           

            if ($_FILES['image2']['name'] != "") {

                if ($this->upload->do_upload('image2')) {
                    $uploadData = $this->upload->data();

                    $image2 = $uploadData['file_name'];
                }
            }
            else{
                $image2 = '';
            }

            if ($_FILES['image3']['name'] != "") {

                if ($this->upload->do_upload('image3')) {
                    $uploadData = $this->upload->data();

                    $image3 = $uploadData['file_name'];
                }
            }
            else
            {
                $image3 = '';
            }

            if ($_FILES['image4']['name'] != "") {

                if ($this->upload->do_upload('image4')) {
                    $uploadData = $this->upload->data();

                    $image4 = $uploadData['file_name'];
                }
            }
            else{
                $image4 = '';
            }
            	
            // if ($_FILES['thumb_ar']['name'] != "") {
            //     $config['upload_path'] = './uploads/products/';
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
            //     /*$config['encrypt_name'] = TRUE;*/
            //     /*$config['max_width'] = 225;
			// 	$config['max_height'] = 210;*/
            //     if (!$this->upload->do_upload('thumb_ar')) {
            //         //$error = array('error' => $this->upload->display_errors());
            //         $this->session->set_flashdata('error', $this->upload->display_errors() . "thbmnailar");
            //         redirect('admin/products/add', $dataArray);
            //     } else {
            //         $uploadData = $this->upload->data();

            //         $thumb_ar = $uploadData['file_name'];
            //     }
            // }

            $desc = $this->input->post('description');
            $desc_ar = $this->input->post('description_ar');

           // $variants = $this->input->post('variants');

            // $ex_val = implode(',', $variants);

            $user = $_SESSION["username"];

			$now = date('Y-m-d H:i:s');

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'title_ar' => $this->input->post('title_ar'),
                'description' => $desc,
                'description_ar' => $desc_ar,
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4,
               // 'image_ar' => $image_ar,
                'thumbnail1' => $thumb1,
				'thumbnail2' => $thumb2,
               // 'thumbnail_ar' => $thumb_ar,
               // 'discounted_price' => $discounted_price,
                'price' => $this->input->post('price'),
                'vat_price' => $this->input->post('vat_price'),
                'alt' => $this->input->post('alt'),
             //   'alt_ar' => $this->input->post('alt_ar'),
                // 'brand_id' => $this->input->post('brand_id'),  
				'cat_id' => $this->input->post('cat_id'),
				'child_cat' => $this->input->post('child_cat'),
               // 'cat_id' => $this->input->post('cat_id'),
                'status' => $this->input->post('status'),
                'mark_as_new' => $this->input->post('markAsNew'),
                'top_seller' => $this->input->post('topSeller'),
                'out_of_stock' => $this->input->post('outofStock'),
                'updated_by' => $user,
				'updated_at' => $now
                // 'variants' =>  $ex_val,
            );

            $id = $this->Products_m->save($data);

            $variants = $this->input->post('variants');
       
            foreach ($variants as $v_value) {
                $variant = $this->Variant_m->getVariantValueByID($v_value);
                $variantData = array(
                    'variant_id' => $variant->variant_id,
                    'variant_value_id' => $variant->id,
                    'product_id' =>  $id,
                );
                $this->Common_model->save($variantData, 'product_variants');
            }
    
            
            $this->session->set_flashdata('success', 'Product added successfully');
            redirect('admin/products');
        }
    }

    public function edit($id)
    {
        $data['row'] = $this->Products_m->edit($id);
        $data['product_variants'] = $this->db->get_Where('product_variants', ['product_id'=> $id])->result();
        $data['brands'] = $this->Brands_m->getAll();
        //$data['categories'] = $this->Categories_m->getAllCategory(); 
        $data['categories'] = $this->Categories_m->getAllParentCategory();
        $data['chlid_categories'] = $this->sub_categories_m->getAllSubCategoryForProduct();
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

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Fill all the Required Fields.');
            redirect('admin/products/edit/' . $id);
        } else {


            if ($_FILES['image1']['name'] != "") {
                $config['upload_path'] = './uploads/products/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
				$config['min_width']       = '1374';      
				$config['min_height']      = '1030';      
				$config['max_width']       = '1374';       
				$config['max_height']      = '1030'; 

				$this->load->library('upload', $config);  

                if (!$this->upload->do_upload('image1')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    redirect('admin/products/edit/' . $id);
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
                $config['encrypt_name'] = TRUE;
				$config['min_width']       = '1374';      
				$config['min_height']      = '1030';      
				$config['max_width']       = '1374';       
				$config['max_height']      = '1030'; 

				
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image2')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    redirect('admin/products/edit/' . $id);
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
                $config['encrypt_name'] = TRUE;
				$config['min_width']       = '1374';      
				$config['min_height']      = '1030';      
				$config['max_width']       = '1374';       
				$config['max_height']      = '1030'; 


                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image3')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    redirect('admin/products/edit/' . $id);
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
                $config['encrypt_name'] = TRUE;
				$config['min_width']       = '1374';      
				$config['min_height']      = '1030';      
				$config['max_width']       = '1374';       
				$config['max_height']      = '1030'; 

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image4')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    redirect('admin/products/edit/' . $id);
                } else {
                    $uploadData = $this->upload->data();

                    $image4 = $uploadData['file_name'];
                }
            } else {
                $image4 = $this->input->post('image4_2');
            }


            // if ($_FILES['image_ar']['name'] != "") {


            //     $config['upload_path'] = './uploads/products/';
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
            //     /*$config['encrypt_name'] = TRUE;*/
            //     $config['max_width'] = 700;
            //     $config['max_height'] = 1000;


            //     $this->load->library('upload', $config);

            //     $id = $this->input->post('id');

            //     if (!$this->upload->do_upload('image_ar')) {

            //         $this->session->set_flashdata('error', 'There is a Problem Uploading Your Arabic Image. Please upload correct Image');
            //         redirect('admin/products/edit/' . $id);
            //     } elseif ($this->upload->do_upload('image_ar')) {

            //         $uploadData = $this->upload->data();

            //         $image_ar = $uploadData['file_name'];
            //     }
            // } else {
            //     $image_ar = $this->input->post('image_ar2');
            // }
        }


        //thumbnail 1
        if ($_FILES['thumb1']['name'] != "") {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['max_width'] = 321;
            $config['max_height'] = 282;
			$config['min_width'] = 321;
            $config['min_height'] = 282;


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumb1')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());

                redirect('admin/products/edit/' . $id);
            } else {
                $uploadData = $this->upload->data();

                $thumb1 = $uploadData['file_name'];
            }
        } else {
            $thumb1 = $this->input->post('thumb12');
        }

		//thumbnail 2
        if ($_FILES['thumb2']['name'] != "") {
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['max_width'] = 508;
            $config['max_height'] = 391;
			$config['min_width'] = 508;
            $config['min_height'] = 391;


            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumb2')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());

                redirect('admin/products/edit/' . $id);
            } else {
                $uploadData = $this->upload->data();

                $thumb2 = $uploadData['file_name'];
            }
        } else {
            $thumb2 = $this->input->post('thumb22');
        }

        // if (!empty($_FILES['thumb']['thumb_ar'])) {
        //     $config['upload_path'] = './uploads/products/';
        //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
        //     /*$config['encrypt_name'] = TRUE;*/
        //     $config['max_width'] = 225;
        //     $config['max_height'] = 210;

        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('thumb_ar')) {
        //         $error = array('error' => $this->upload->display_errors());
        //         $this->session->set_flashdata('error', $this->upload->display_errors());
        //         redirect('admin/products/edit/' . $id);
        //     } else {
        //         $uploadData = $this->upload->data();

        //         $thumb_ar = $uploadData['file_name'];
        //     }
        // }

        $data['id'] = $this->input->post('id');

        $desc = $this->input->post('description');
        $desc_ar = $this->input->post('description_ar');

        if (strlen($desc) > 165) {
            $desc = substr($desc, 0, 165);
        }

        if (strlen($desc_ar) > 165) {
            $desc_ar = substr($desc_ar, 0, 165);
        }

        $title = $this->input->post('title');
        $slugs = url_title($title);
         $slug = strtolower($slugs);

        $user = $_SESSION["username"];

        $now = date('Y-m-d H:i:s');

        $data['data'] = array(
            'slug' => $slug,
            'title' => $this->input->post('title'),
            'title_ar' => $this->input->post('title_ar'),
            'description' => $desc,
            'description_ar' => $desc_ar,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
           // 'image_ar' => $image_ar,
            'thumbnail1' => $thumb1,
			'thumbnail2' => $thumb2,
            //'thumbnail_ar' => $thumb_ar,
            'alt' => $this->input->post('alt'),
            'discounted_price' => $discounted_price,
            'price' => $this->input->post('price'),
            'vat_price' => $this->input->post('vat_price'),
           // 'alt_ar' => $this->input->post('alt_ar'),
            // 'brand_id' => $this->input->post('brand_id'),  child_cat
            'cat_id' => $this->input->post('cat_id'),
			'child_cat' => $this->input->post('child_cat'),
            'status' => $this->input->post('status'),
            'mark_as_new' => $this->input->post('markAsNew'),
            'top_seller' => $this->input->post('topSeller'),
            'out_of_stock' => $this->input->post('outofStock'),
            'updated_by' => $user,
            'updated_at' => $now
        );

        if ($this->input->post('outofStock') !== 1 && $this->input->post('outofStock') != $old->out_of_stock) {
            $brand = $this->db->get_where('brands', ['id' => $this->input->post('brand_id')])->row_array();

            $subscribers = $this->db->get_where('out_of_stock_subscribers', ['product_id' => $id, 'notified' => 0])->result();
            foreach ($subscribers as $sub) {
                $this->email->from('saman@glmaagency.com', 'Tamr');
                $this->email->to($sub->email);
                $this->email->subject($this->input->post('title') . ' is back on stock at Tamr');
                $name = 'Dear Subscriber';

                $message2 = "
				<html>
				<head>
				<title>DepaChika</title>
				</head>
				<body>
				<p style='margin-bottom:0'>We’d like to notify you that the product you wanted from " . $brand['brand_name'] . " is back on stock!</p><p> Visit our <a href='" . base_url() . "'>website</a> to purchase it now.</p>
				<br><table border='0' width='200px'>
				<tr>
				<td><a href='" . base_url() . "'><img src='" . base_url() . "uploads/products/$thumb1'><p>" . $this->input->post('title') . "</p></td></td>
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
        $this->db->where('product_id', $data['id']);
        $this->db->delete('product_variants');
        $variants = $this->input->post('variants');

       
        foreach ($variants as $v_value) {
            $variant = $this->Variant_m->getVariantValueByID($v_value);
            $variantData = array(
                'variant_id' => $variant->variant_id,
                'variant_value_id' => $variant->id,
                'product_id' => $data['id'],
            );
            $this->Common_model->save($variantData, 'product_variants');
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
