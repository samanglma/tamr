<?php

class Images_m  extends CI_Model
{

    public function saveImage($data)
    {
        $this->db->insert('gallery_images', $data);
        return true;
    }

    public function getAllImages()
    {
        $this->db->select('gallery_images.*, gallery.id as gid, gallery.title as gtitle');
        $this->db->from('gallery_images');
        $this->db->join('gallery', 'gallery.id = gallery_images.gallery_id');
        $query = $this->db->get()->result();
        return $query;

    }

    public function getImageById($id)
    {
        $this->db->select('*');
        $this->db->from('gallery_images');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateImage($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('gallery_images', $data['data']);
    }

    public function deleteImage($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('gallery_images');
        return true;
    }

    public function getAllGalleries()
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $q = $this->db->get()->result();

        return $q;

    }
}