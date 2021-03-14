<?php

class Agents_m  extends CI_Model
{
  public function getavailabletimings($date)
  {
    $day = strtolower(date("l", strtotime($date)));
    $time = date('H:i:s', strtotime($date));
    $today = $day == strtolower(date("l", time())) ? " AND  available_from <= '$time' " : '';
    // $query =  $this->db->query("SELECT * FROM agent_availability LEFT JOIN agent_profiles ON agent_availability.agent_profiles_id = agent_profiles.id WHERE day = '$day' AND  available_from <= '$time' AND available_till >= curtime()");
    $query =  $this->db->query("SELECT * FROM agent_availability LEFT JOIN agent_profiles ON agent_availability.agent_profiles_id = agent_profiles.id WHERE day = '$day' $today");
    //  echo $this->db->last_query();
    return $query->result();
  }
}
