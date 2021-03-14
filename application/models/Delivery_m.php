<?php

class Delivery_m  extends CI_Model
{

  public function getAll()
  {
    $this->db->select('delivery_charges.*,state.name as state_name,city.name as city_name');
    $this->db->from('delivery_charges');
    $this->db->join('state', "state.ID = delivery_charges.state_id");
    $this->db->join('city', "city.ID = delivery_charges.city_id");

    return $this->db->get()->result();
  }

  public function getDelivery($state, $city)
  {
    $this->db->select('*');
    $this->db->where(['city_id' => $city, 'state_id' => $state]);
    $this->db->from('delivery_charges');

    return $this->db->get()->row();
  }
}
