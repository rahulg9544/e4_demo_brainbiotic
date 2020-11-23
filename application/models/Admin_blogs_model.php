<?php 
class Admin_blogs_model extends CI_Model 
{
	function get_blogs()
   {
      $selqry = 'SELECT * FROM `blog_posts`';
      $query = $this->db->query($selqry);  
      return $query->result(); 
      
   }

   function get_blogidedit($id)
   {
      $squery="SELECT * FROM blog_posts WHERE id='$id'";
      $query=$this->db->query($squery);
      return $query->row();
   }

   function update_blogs($id,$data1)
   {
   	$this->db->where('id',$id);
   	$query = $this->db->update('blog_posts',$data1);
   	return $query;
   }

   function insert_blogs($data)
      {
         $query = $this->db->insert('blog_posts',$data);
         return $query;
      }
   
    function delete_blogs($id)
   {
      $this->db->where('id',$id);
      $query = $this->db->delete('blog_posts');
      return $query;
   }


}
?>