<?php

class Pages_m  extends CI_Model
{

    public function savePage($data)
    {
        $this->db->insert('pages', $data);

        return true;
    }

    public function getAllPages()
    {
        $this->db->select('pages.*, pages_template.page_template_code,pages_template.page_template_title');
        $this->db->from('pages');
        $this->db->join('pages_template', 'pages_template.page_template_code = pages.page_template_code');

        $query = $this->db->get()->result();

        return $query;
    }

    public function editPage($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('pages');
        $query = $this->db->get()->row();

        return $query;
    }

    public function updatePage($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('pages', $data['data']);

        return true;

    } 


/*/////////////////////////////  Privacy Policy and Term Condition   //////////////////////////////////////////////*/



   public function getAllPages1()
    {
        $this->db->select('*');
        $this->db->from('pages');
       
        $query = $this->db->get()->result();

        return $query;
    }


     public function editPage1($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('pages');
        $query = $this->db->get()->row();

        return $query;
    }


  public function updatePage1($data, $id)
    {

		

        $this->db->where('id', $id);
        $this->db->update('pages', $data);

        return true;

    }

public function getPrivacyPage()
{


     if($_SESSION['site_lang'] == 'arabic'){ 

      $this->db->select('pages.*, title_ar as title, content_ar as content');

    }else

    {
      $this->db->select('pages.*');
    }
        $this->db->where('slug', 'privacy-policy');
        $this->db->from('pages');
        $query = $this->db->get()->row();

        return $query;
}
 


public function getRefundPage()
{


     if($_SESSION['site_lang'] == 'arabic'){ 

      $this->db->select('pages.*, title_ar as title, content_ar as content');

    }else

    {
      $this->db->select('pages.*');
    }
        $this->db->where('slug', 'refund-policy');
        $this->db->from('pages');
        $query = $this->db->get()->row();

        return $query;
}
 

 public function getTermAndConditionPage()
 {


 if($_SESSION['site_lang'] == 'arabic'){ 

      $this->db->select('pages.*, title_ar as title, content_ar as content');

    }else

    {
      $this->db->select('pages.*');
    }
        $this->db->where('slug', 'term-conditions');
        $this->db->from('pages');
        $query = $this->db->get()->row();

        return $query;


 }





/*/////////////////////////////////////////////////////////////////////////////////*/

    public function deletePage($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pages');

        return true;
    }


    public function getAllPagesTemplates()
    {
        $this->db->select('*');
        $this->db->from('pages_template');
        $query = $this->db->get()->result();

        return $query;
    }


    /*/////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

    public function save($data)
    {
        $this->db->insert('pages', $data);

        return true;

    }

    public function select()
    {
        $this->db->select('*');
        $this->db->from('pages');
        $query = $this->db->get()->result();

        return $query;
    }

    public function ById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('pages');
        $q = $this->db->get()->row();
    }

    public function update($data)
    {
        $this->db->where('id', $data['data']);
        $this->db->update('pages', $data['data']);

        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pages');

        return true;
    }

    public function pages()
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->join('page_tem', 'pages.page_tem_id = page_tem.id');
        $this->db->join('page_template', 'pages.page_template_id = page_template.id');
        $query = $this->db->get()->result();

        return $query;
    }
}
