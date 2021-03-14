<?php
/**
 * Created by PhpStorm.
 * User: Amin
 * Date: 14/07/2019
 * Time: 03:38 PM
 */

class Common_model extends CI_Model
{

    public function save($data, $table)
    {
        $this->db->insert($table, $data);

        return $this->db->insert_id();;
    }

    public function getAllRecords($table, $status)
    {
        $this->db->select('*');

        if($status != "")
        {
            $this->db->where('status', $status);
        }
        $this->db->from($table);
        $q = $this->db->get()->result();

        return $q;

    }

    public function getAllRecordsByJoin($table1, $table2, $table1_key, $table2_key, $columns, $status)
    {
        $this->db->select($columns);

        if($status != "")
        {
            $this->db->where('status', $status);
        }
        $this->db->from($table1);
        $this->db->join($table2, "$table1.$table1_key = $table2.$table2_key");

       $q = $this->db->get()->result();

       return $q;
    }

    public function getRecordById($id, $table)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from($table);
        $q = $this->db->get()->row();

        return $q;

    }

    public function update($id,$table, $data)
    {
       $this->db->where('id', $id);
       $this->db->update($table,$data);

       return true;

    }

    public function delete($id, $table)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);

        return true;

    }

}