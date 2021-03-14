<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 4/30/2019
 * Time: 5:33 PM
 */

class Blogs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('blog_m');
        $this->load->library('pagination');

        $currentURL = current_url();

        if($currentURL == base_url().'ar/blogs')
        {
            redirect(base_url().'en/blogs');
        }
    }

    public function index()
    {
        die();
        
        if(lang() == 'arabic')
        {
            $lang = 'ar/';
        }
        else
        {
            $lang = 'en/';
        }
        $config = array();
        $config["base_url"] = base_url() . $lang. "blogs";
        $config["total_rows"] = $this->blog_m->get_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;

        $config['full_tag_open'] = "<ul class='offer-pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="offer-active">';
        $config['cur_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i> <';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '<i class="fa fa-long-arrow-right"></i> >';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);
        $data["links"] = $this->pagination->create_links();

        $data['rcd'] = $this->blog_m->getAllBlogsWeb($config["per_page"], $page);
        $data['blog_cats'] = $this->blog_m->getAllBlogCats();
        $this->load->view('frontend/blogs', $data);
    }

    public function BlogByCat()
    {
         $slug = $this->uri->segment(4);

        $data['rcd'] = $this->blog_m->getBlogByCat($slug);
        $data['blog_cats'] = $this->blog_m->getAllBlogCats();
        $this->load->view('frontend/blogs', $data);
    }

    public function blog_details()
    {
        $currentURL = current_url();

        $slug = $this->uri->segment(3);

        if($currentURL == base_url().'ar/blog-details/'.$slug)
        {
            redirect(base_url().'en/blog-details/'.$slug);
        }

        $data['row'] = $this->blog_m->getBlogDetails($slug);
        $ID['cat_id'] = $data['row']->cat_id;
        $ID['blog_id'] = $data['row']->id;
        $data['related'] = $this->blog_m->getRelatedBlogs($ID);

        $this->load->view('frontend/blog_details', $data);
    }

}