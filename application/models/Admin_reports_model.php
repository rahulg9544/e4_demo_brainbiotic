<?php 
class Admin_reports_model extends CI_Model 
{
	function getsalesreport()
	{
		$squery="SELECT * FROM orders LEFT JOIN user ON orders_user_id=user_id WHERE orders_status=3 AND orders_cancel_status=0";
		$query = $this->db->query($squery);
		return $query->result();
	}

	function getsalesreport_datewise($from,$to)
	{

		$squery="SELECT * FROM orders LEFT JOIN user ON orders_user_id=user_id WHERE orders_status=3 AND orders_cancel_status=0 AND orders_date >= '$from' AND orders_date <= '$to'";
		$query = $this->db->query($squery);
		return $query->result();

	}
}