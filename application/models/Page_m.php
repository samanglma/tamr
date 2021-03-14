<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 5/8/2019
 * Time: 10:08 AM
 */

class Page_m extends CI_Model
{

    public function getPageBySlug($slug)
    {
        if(lang() == 'arabic')
        {
            $this->db->select('pages.*, pages.title_ar as pageTitle, pages.content_ar as pageDesc, pages.mtitle_ar as mtitle, pages.mdesc_ar as mdesc');
        }
        else
        {
            $this->db->select('pages.*, pages.title as pageTitle, pages.content as pageDesc');
        }

        $this->db->where('slug', $slug);
        $this->db->from('pages');
        $q = $this->db->get()->row();

        return $q;
    }

    public function getBanner($slug)
    {
        $this->db->select('sliders.*, pages.id as pageid, pages.slug as slug');
        $this->db->where('sliders.status', 1);
        $this->db->where('slug', $slug);
        $this->db->from('sliders');
        $this->db->join('pages_template', 'pages_template.id = sliders.page_tempalet_id');
        $this->db->join('pages', 'pages.page_template_code = pages_template.page_template_code');

        $slider = $this->db->get()->result();

        return $slider;

    }

}