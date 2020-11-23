<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		// Load the database library
		$this->load->database();

		$this->userTbl = '';
	}

	function gettopselprods()
	{
		//$squery = "SELECT * FROM product WHERE product_iconic = 1 LIMIT 15";

		$squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory WHERE product_iconic=1 ORDER BY product_date DESC";

		$query = $this->db->query($squery);
		return $query->result();
	}


	function getblog_details()
	{
		$squery = "SELECT * FROM blog_posts";

		$query = $this->db->query($squery);
		return $query->result();
	}

	//search

	function getsearchprds($searchkey)
	{
		$squery = "SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND (product_name LIKE '%$searchkey%' OR product_desc LIKE '%$searchkey%' OR subcategory_name LIKE '%$searchkey%' OR brand_name LIKE '%$searchkey%') ORDER BY product_date DESC LIMIT 30";
		$query = $this->db->query($squery);
		return $query;
	}

	public function get_categories()
	{
		$this->db->from('category');
		// $this->db->order_by("cat_priority", "DESC");
		$query = $this->db->get();

		$return = array();

		foreach ($query->result() as $category) {
			$return[$category->category_id] = $category;
			$return[$category->category_id]->subs = $this->get_sub_categories($category->category_id);

			//	$a[] = $return;

			// Get the categories sub categories
		}

		return $return;
	}

	public function get_sub_categories($category_id)
	{
		$this->db->where('subcategory_category', $category_id);
		$query = $this->db->get('subcategory');
		return $query->result();
	}

	function getuserdtls($userid)
	{
		$this->db->where('user_id', $userid);
		$query = $this->db->get('user');
		return $query->row();
	}

	function getnewprodshome()
	{
		$sevenday = date('Y-m-d', strtotime('-10 days'));

		// $squery="SELECT * FROM product WHERE product_priority=0 ORDER BY product_date DESC LIMIT 15";

		// $squery="SELECT * FROM product LEFT JOIN category ON category_id=product_category LEFT JOIN subcategory ON subcategory_id = product_subcategory LEFT JOIN division ON division_id=product_division LEFT JOIN brand ON brand_id=product_brand WHERE product_priority=0 ORDER BY product_date DESC LIMIT 15";

		$squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory WHERE product_priority=0 ORDER BY product_date DESC";

		$query = $this->db->query($squery);
		return $query->result();
	}

	function getsameprodwishcount($prodid, $userid)
	{
		$this->db->where('wishlist_prod_id', $prodid);
		$this->db->where('wishlist_user_id', $userid);
		$query = $this->db->get('wishlist');
		return $query->num_rows();
	}

	function insertwishlist($data)
	{
		$query = $this->db->insert('wishlist', $data);
		return $query;
	}


	function getwishlistitems($userid)
	{
		$squery = "SELECT * FROM product LEFT JOIN wishlist ON product.product_id=wishlist.wishlist_prod_id WHERE wishlist.wishlist_user_id='$userid' ORDER BY wishlist_date DESC";
		$query = $this->db->query($squery);
		$product = array();
		foreach ($query->result() as $product) {

			$product->product_image = explode(',', $product->product_image);
			$product->product_sizeno = explode(',', $product->product_sizeno);
			$product->product_sizeletter = explode(',', $product->product_sizeletter);
			$product->product_quantity = explode(',', $product->product_quantity);
			$product->product_mrpwise = explode(',', $product->product_mrpwise);
			$product->product_sellpricewise = explode(',', $product->product_sellpricewise);
			$product->product_discountwise = explode(',', $product->product_discountwise);
			$product->product_color = explode(',', $product->product_color);
			$a[] = $product;
		}

		return $a;
	}

	function getwishcount($userid)
	{
		$this->db->where('wishlist_user_id', $userid);
		$query = $this->db->get('wishlist');
		return $query->num_rows();
	}

	function removewishitem($userid, $wishid)
	{
		$this->db->where('wishlist_user_id', $userid);
		$this->db->where('wishlist_id', $wishid);
		$query = $this->db->delete('wishlist');

		return $query;
	}


	// homepage
	function getslides()
	{
		$this->db->order_by('banner_id', 'ASC');
		$query = $this->db->get('banner');
		return $query->result();
	}
}
