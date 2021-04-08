<?php

class Sliders_m  extends CI_Model
{

    public function saveSlider($data)
    {
        $this->db->insert('sliders', $data);
        return true;
    }

    public function getAllSlider()
    {
        $this->db->select('*');
        $this->db->from('pages_template');
       // $this->db->join('pages_template', 'pages_template.id = sliders.page_tempalet_id');
        $query = $this->db->get()->result();

        return $query;

    }

    public function getSliders()
    {
          $this->db->select('*');
          $this->db->where('status', 1);
        $this->db->from('sliders');
        $query = $this->db->get()->result();

        return $query;

    }

    public function editSlider($id)
    {
        $this->db->select('sliders.*, sliders.id as sliderID');
        $this->db->from('sliders');
        $this->db->where('sliders.id', $id);
        $query = $this->db->get()->row();

        return $query;
    }

    public function updateSlider($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('sliders', $data['data']);
    }

    public function deleteSlider($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sliders');
        return true;
    }

    public function getAllTemplates($pagetemID)
    {
        $this->db->select('pages_template.*, pages_template.id as pageTempID');
        $this->db->where('id', $pagetemID);
        $this->db->from('pages_template');
       $query = $this->db->get()->row();

       return $query;
    }

    public function updateSliders($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('sliders', $data['data']);
    }

    public function addSliderImage($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('pages_template');
       $q = $this->db->get()->row();

       return $q;
    }

    public function saveSliderImage($data)
    {
        $this->db->insert('sliders', $data);
        return true;
    }

    public function getSliderImagById($id)
    {
        $this->db->select('sliders.*,sliders.updated_at as slider_updated_at, sliders.id as sliderID, pages_template.*, pages_template.id as pageTemID, page_template_code');
        $this->db->where('page_tempalet_id', $id);
        $this->db->from('sliders');
        $this->db->join('pages_template', 'pages_template.id = sliders.page_tempalet_id');

        $q = $this->db->get()->result();

        return $q;
    }

    public function getActiveHomeSlides(){
    	$this->db->where('status',1);
    	$this->db->where('page_tempalet_id', 2);
    	return $this->db->get('sliders')->result();
	}
}
