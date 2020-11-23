<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catsubcat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        // Load the database library
        $this->load->database();

        $this->userTbl = '';
    }
    public function get_categories()
    {
        //	$this->db->from('category');
        // $this->db->order_by("cat_priority", "DESC");
        //      $query = $this->db->get();

        //  $return = array();


        $squery = "SELECT category.*, COUNT(*) AS 'pro_cat_count' from product INNER join category on product.product_category=category.category_id GROUP BY product.product_category";

        // $squery = "SELECT * FROM category;";



        $query = $this->db->query($squery);

        foreach ($query->result() as $category) {


            $return = $category;

            //  $category->cat_img_url = $imgurl;

            $return->subs = $this->get_sub_categories($category->category_id);

            //   print_r($category);

            // print_r($return);

            $a[] = $return;
        }

        //  exit;


        return $a;
    }

    public function get_sub_categories($category_id)
    {
        // $this->db->where('subcategory_category', $category_id);
        // $query = $this->db->get('subcategory');

        $squery = "SELECT subcategory.*, COUNT(*) AS 'pro_subcat_count' from product inner join subcategory on product.product_subcategory=subcategory.subcategory_id GROUP BY product.product_subcategory HAVING subcategory.subcategory_category = $category_id";

        $query = $this->db->query($squery);

        return $query->result();
    }

    public function get_sub_pro_count()
    {


        $squery = "SELECT COUNT(*) AS 'pro_subcat_count' from product GROUP BY product.product_subcategory";

        $query = $this->db->query($squery);

        return $query->result();
    }

    function getsubcatprods($subcatid)
    {

        // $squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory INNER JOIN division ON division_id=product_division INNER JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' ORDER BY product_date DESC";

        $squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory WHERE product_priority=0 AND product_subcategory = '$subcatid' ORDER BY product_date DESC";
        $query = $this->db->query($squery);
        $category = array();
        foreach ($query->result() as $category) {

            $category->product_image = explode(',', $category->product_image);
            $category->product_sizeno = explode(',', $category->product_sizeno);
            $category->product_sizeletter = explode(',', $category->product_sizeletter);
            $category->product_quantity = explode(',', $category->product_quantity);
            $category->product_mrpwise = explode(',', $category->product_mrpwise);
            $category->product_sellpricewise = explode(',', $category->product_sellpricewise);
            $category->product_discountwise = explode(',', $category->product_discountwise);
            $category->product_color = explode(',', $category->product_color);
            $a[] = $category;
        }

        return $a;
    }

    function getcatsubcatprods($catid, $subcatid)
    {

        // $squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory INNER JOIN division ON division_id=product_division INNER JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_category = '$catid'ORDER BY product_date DESC";

        $squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory WHERE product_priority=0 AND product_subcategory = '$subcatid' AND product_category = '$catid'ORDER BY product_date DESC";

        $query = $this->db->query($squery);
        $category = array();
        foreach ($query->result() as $category) {

            $category->product_image = explode(',', $category->product_image);
            $category->product_sizeno = explode(',', $category->product_sizeno);
            $category->product_sizeletter = explode(',', $category->product_sizeletter);
            $category->product_quantity = explode(',', $category->product_quantity);
            $category->product_mrpwise = explode(',', $category->product_mrpwise);
            $category->product_sellpricewise = explode(',', $category->product_sellpricewise);
            $category->product_discountwise = explode(',', $category->product_discountwise);
            $category->product_color = explode(',', $category->product_color);
            $a[] = $category;
        }

        return $a;
    }

    function getcatprods($catid)
    {

        // $squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory INNER JOIN division ON division_id=product_division INNER JOIN brand ON brand_id=product_brand WHERE product_priority=0 AND product_category = '$catid' ORDER BY product_date DESC";

        $squery = "SELECT * FROM product INNER JOIN category ON category_id=product_category INNER JOIN subcategory ON subcategory_id = product_subcategory WHERE product_priority=0 AND product_category = '$catid' ORDER BY product_date DESC";

        $query = $this->db->query($squery);
        $category = array();
        foreach ($query->result() as $category) {

            $category->product_image = explode(',', $category->product_image);
            $category->product_sizeno = explode(',', $category->product_sizeno);
            $category->product_sizeletter = explode(',', $category->product_sizeletter);
            $category->product_quantity = explode(',', $category->product_quantity);
            $category->product_mrpwise = explode(',', $category->product_mrpwise);
            $category->product_sellpricewise = explode(',', $category->product_sellpricewise);
            $category->product_discountwise = explode(',', $category->product_discountwise);
            $category->product_color = explode(',', $category->product_color);
            $a[] = $category;
        }

        return $a;
    }


    function get_images($subcatid)
    {
        $query = "SELECT product_image FROM product WHERE product_subcategory = '$subcatid' ORDER BY product_date DESC";

        $query = $this->db->query($query);

        return $query->result();
    }
}
