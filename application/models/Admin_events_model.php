<?php 
class Admin_events_model extends CI_Model 
{
	function get_events()
   {
      $selqry = 'SELECT * FROM `events`';
      $query = $this->db->query($selqry);  
      return $query->result(); 
      
   }
 

   function update_events($id,$data1)
   {
   	$this->db->where('id',$id);
   	$query = $this->db->update('events',$data1);
   	return $query;
   }

   function insert_events($data)
      {
         $query = $this->db->insert('events',$data);
         return $query;
      }

      function get_eventsidedit($id)
   {
      $squery="SELECT * FROM events WHERE id='$id'";
      $query=$this->db->query($squery);
      return $query->row();
   }
   
    function delete_events($id)
   {
      $this->db->where('id',$id);
      $query = $this->db->delete('events');
      return $query;
   }

  

    

}
?>