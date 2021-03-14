<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 4/30/2019
 * Time: 12:22 PM
 */

class Home_m extends CI_Model
{

    public function getEvents()
    {
        $today = date("Y-m-d");
        if(lang() == 'arabic')
        {
            $this->db->select('events.title_ar as title,events.description_ar as description,events.image,events.alt,events.start_date,events.end_date,events.slug');
        }
        else
        {
            $this->db->select('events.title,events.description,events.image,events.alt,events.start_date,events.end_date,events.slug');
        }

        $this->db->where('status', 1);
        $this->db->where("end_date >=",$today);
        $this->db->order_by('id', 'desc');
        $this->db->from('events');
        $q = $this->db->get()->result();

        return $q;
    }

    public function getTopBrand()
{
    if(lang() == 'arabic')
    {
        $this->db->select('top_brands.*, top_brands.image as backimage, footprints.title_ar as title,footprints.color_logo,footprints.description_ar as description,footprints.slug');
    }
    else
    {
        $this->db->select('top_brands.*, top_brands.image as backimage, footprints.title,footprints.color_logo,footprints.description,footprints.slug');
    }

    $this->db->where('top_brands.status', 1);
    /*$this->db->order_by('top_brands.id', 'RANDOM');*/
    $this->db->from('top_brands');
    $this->db->join('shops', 'footprints.id = top_brands.shop_id');
    $q = $this->db->get()->result();

    return $q;
}

    public function getFeatureShops()
    {
        if(lang() == 'arabic')
        {
            $this->db->select('hospitality.*, enjoy.image as backimage, enjoy.title_ar as title,hospitality.logo as color_logo,enjoy.description_ar as description, sub_categories.slug');
        }
        else
        {
            $this->db->select('hospitality.*, enjoy.image as backimage, enjoy.title,hospitality.logo as color_logo,enjoy.description, sub_categories.slug');
        }

        $this->db->where('hospitality.status', 1);
        /*$this->db->order_by('top_brands.id', 'RANDOM');*/
        $this->db->from('feature_shops');
        $this->db->join('enjoy', 'enjoy.id = hospitality.shop_id');
        $this->db->join('sub_categories', 'sub_categories.id = enjoy.cat_id');
        $q = $this->db->get()->result();

        return $q;
    }

    public function search()
    {
        $search = $this->input->post('search');

        // Query #1

        if(lang() == 'english')
        {
            $this->db->select('blog.title,blog.description,blog.slug as blogSlug');
            $this->db->from('blog');
            $this->db->or_like('blog.title', $search);
            $this->db->or_like('blog.description', $search);
            $this->db->where('status', 1);
            $query1 = $this->db->get()->result();
        }

       // Query #2

        if(lang() == 'arabic')
        {
            $this->db->select('malls.title_ar as title,malls.description_ar as description,malls.slug as mallsSlug');
            $this->db->or_like('malls.title_ar', $search);
            $this->db->or_like('malls.description_ar', $search);
            $this->db->or_like('malls.sub_title_ar', $search);
        }
        else
        {
            $this->db->select('malls.title,malls.description,malls.slug as mallsSlug');
            $this->db->or_like('malls.title', $search);
            $this->db->or_like('malls.description', $search);
            $this->db->or_like('malls.sub_title_ar', $search);
        }

        $this->db->from('malls');
        $this->db->where('status', 1);
        $query2 = $this->db->get()->result();




        // Query #4

        if(lang() == 'arabic')
        {
            $this->db->select('hospitality.name_ar as title_ar,hospitality.description_ar as description,hospitality.link as hospitalitySlug');
            $this->db->from('hospitality');
            $this->db->or_like('hospitality.name_ar', $search);
            $this->db->or_like('hospitality.description_ar', $search);
        }
        else
        {
            $this->db->select('hospitality.name as title,hospitality.description,hospitality.link as hospitalitySlug');
            $this->db->from('hospitality');
            $this->db->like('hospitality.name', $search);
            $this->db->or_like('hospitality.description', $search);
        }
        $this->db->where('status', 1);
        $query4 = $this->db->get()->result();



        // Query #5

        if(lang() == 'arabic')
        {
            $this->db->select('communities.title_ar as title,communities.description_ar as description,communities.link as communitySlug');
            $this->db->from('communities');
            $this->db->like('communities.title_ar', $search);
            $this->db->or_like('communities.description_ar', $search);
        }
        else
        {
            $this->db->select('communities.title,communities.description,communities.slug as communitySlug');
            $this->db->from('communities');
            $this->db->like('communities.title', $search);
            $this->db->like('communities.description', $search);
        }
        $this->db->where('status', 1);
        $query5 = $this->db->get()->result();



        // Merge both query results
        if(lang() == 'english')
        {
            $query = array_merge($query1, $query2,$query4,$query5);
        }
        else
        {
            $query = array_merge($query2, $query4,$query5);
        }

        return $query;

    }


}