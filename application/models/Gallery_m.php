<?php

class Gallery_m  extends CI_Model
{

    public function saveGallery($data)
    {
        $this->db->insert('gallery', $data);
        return true;
    }

    public function getAllGallery()
    {
        $query = $this->db->get('gallery')->result();
        return $query;

    }

    public function getGalleryById($id)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateGallery($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('gallery', $data['data']);
    }

    public function deleteGallery($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('gallery');
        return true;
    }

    public function getImagesForHome(){
		$query = $this->db->where('status',1)->get('gallery')->result();
		return $query;
	}
}
