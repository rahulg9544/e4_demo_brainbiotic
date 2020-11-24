<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Babies Moments</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>Babies Moments English/images/favicon.png">

    <!-- CSS
	============================================ -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>Babies Moments English/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Babies Moments English/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Babies Moments English/css/style.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Babies Moments English/css/flaticon.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>Babies Moments English/css/coustom.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>Babies Moments English/css/side-menu.css">

</head>

<body>

<?php 

    if(!isset($_SESSION['cusername'])) 
    {

       if(!isset($_SESSION['cgustid']))
       {
          if(isset($_COOKIE["userid"]))
          {

                $guistuserid = $_COOKIE["userid"];
                           

                           $gustlogindata = array(         
                              'cgustid' =>base64_encode($guistuserid),
                              'usertp' => 'user',
                              'userlogged_in' => FALSE           
                            );
                            
                            $this->session->set_userdata($gustlogindata);

                            // echo $guistuserid;
          }
          else
          {
              $userid=rand(1000,10000);
              $expiry = time()+ (10*365*24*60*60);

              if($this->input->set_cookie("userid", $userid, $expiry))       
                {                      
                       $guistuserid = $_COOKIE["userid"];
                    
                           $gustlogindata = array(         
                              'cgustid' => base64_encode($guistuserid),
                              'usertp' => 'user',
                              'userlogged_in' => FALSE           
                            );  
                           $this->session->set_userdata($gustlogindata);

                           // echo $guistuserid;

                }           
                           
           }
       }
       // else
       // {
       //  echo $_SESSION['cgustid'];
       // }

    }
 ?>


    <!-- Topbar Section Start -->
     <div class="topbar-section section border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col d-none d-md-block">
                    <div class="topbar-menu">
                        <ul>
                            <li><a href="#App" data-toggle="modal" class="product-button hintT-right" data-hint="IOS & Android APP"><i class="fa fa-mobile" aria-hidden="true"></i> Download Application </a></li>
                            <li><a href="<?php echo base_url(); ?>Comming-soon"> <i class="fa fa-th-large" aria-hidden="true"></i>Coming Soon Products</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col d-md-none d-lg-block">
                    <p class="text-center my-2"><a href="<?php echo base_url(); ?>Discount-offer"><i class="fa fa-certificate" aria-hidden="true"></i> Discount & Offers</a></p>
                </div>

                <!-- Header Language & Currency Start -->
                <div class="col  d-md-block">
                    <div class="topbar-menu">
                    <ul class="text-white justify-content-end">
                
                <?php if(!isset($_SESSION['cusername'])) { ?>   
                         <li class="mob_display_none"><a href="<?php echo base_url(); ?>Login-Register"><i class="fa fa-user"></i> Login|Register</a>
                        </li>
                  
                  <?php } else { ?>     

                         <li class="mob_display_none"><a href="<?php echo base_url(); ?>BabiesController/logoutuser"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li>
                
                  <?php } ?>

						 <li><a href="#"><img src="<?php echo base_url(); ?>Babies Moments English/images/ar.png" data-toggle="tooltip" data-placement="top" title="Arabic"></a></li>
                        
                        
                       
                    </ul>
                    </div>
                </div>
                <!-- Header Language & Currency End -->
            </div>
        </div>
    </div>
    <!-- Topbar Section End -->
    <!-- Header Section Start -->
    <div class="header-section section bg-white d-none d-xl-block">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <!-- Header Logo Start -->
                <div class="col-auto">
                    <div class="header-logo justify-content-center">
                        <a href="<?php echo base_url(); ?>Home"><img src="<?php echo base_url(); ?>Babies Moments English/images/logo/logo.png" alt=" Logo"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Search Start -->
                <div class="col">
                    <div class="header6-search">
                        <form action="#">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                   <div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Shop By Brands   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>Shop By Brands  </a></li>
											<li><a>Clevamama</a></li>
											<li><a>PaperClip</a></li>
											<li><a>MatchstickMonkey</a></li>
											<li><a>Ubbi</a></li>
											<li><a>Little Unicorn </a></li>
										</ul>
									</div>
                                </div>
									
									<div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Shop by Age   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>Shop by Age  </a></li>
											<li><a>0 - 6 Months</a></li>
											<li><a>6 - 12 Months</a></li>
											<li><a>12 - 18 Months</a></li>
											<li><a>18 - 24 Months</a></li>
											<li><a>18 - 36 Months</a></li>
											<li><a>More than 36 months </a></li>
										</ul>
									</div>
                                </div>
                                </div>
								
								<div class="col">
                                    <input type="text" placeholder="Search Products...">
                                </div>
                                <button type="submit"><i class="fal fa-search"></i></button>
                               
								 
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Header Search End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login">
              
                 <?php if(isset($_SESSION['cusername'])) { ?>

                            <a href="<?php echo base_url(); ?>My-account" data-toggle="tooltip" data-placement="top" title="My Account"><i class="flaticon-user"></i></a>

                    <?php } else { ?>

                            <a href="<?php echo base_url(); ?>Login-Register" data-toggle="tooltip" data-placement="top" title="My Account"><i class="flaticon-user"></i></a>

                     <?php } ?>       

                        </div>
                        <div class="header-wishlist">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle" data-toggle="tooltip" data-placement="top" title="My Wishlist"><span class="wishlist-count">3</span><i class="flaticon-heart"></i></a>
                        </div>
						<div class="header-wishlist">
                            <a href="#offcanvas-reserv" class="offcanvas-toggle" data-toggle="tooltip" data-placement="top" title="Reserved Products
"><span class="wishlist-count">3</span><i class="fal fa-clock"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"  data-toggle="tooltip" data-placement="top" title="My Cart"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>

        <!-- Site Menu Section Start -->
        <div class="site-menu-section section border-top" id="sitemenudiv">

          <div class="container">
                
                <nav class="site-main-menu justify-content-start menu-height-60">
                    <ul>

                      <?php

                      $this->db->from('category');
                      $this->db->order_by('category_id','desc');
                      $cats = $this->db->get()->result();
                      
                       foreach($cats as $row) { ?>


                        <li class="has-children"><a href="<?php echo base_url();?>BabiesController/Categoryproducts"><span class="menu-text"><?php echo $row->category_label ?></span></a>
                        
                         <ul class="sub-menu mega-menu">

                        <?php  $this->db->where('subcategory_category',$row->category_id);
                          $this->db->order_by("subcategory_id", "asc"); 
                          $subcat= $this->db->get('subcategory')->result();
                           if(!empty($subcat)){ 
                           foreach($subcat as $subs)
                             { ?>



                             <li>
                                    <a href="<?php echo base_url();?>BabiesController/Categoryproducts" class="mega-menu-title"><span class="menu-text"><?php echo $subs->subcategory_name ?></span></a>

                                    <ul>  
                                      
                                      <?php  $this->db->where('division_subcat',$subs->subcategory_id);
                                      $this->db->order_by("division_id", "desc"); 
                                      $division= $this->db->get('division')->result();
                                       if(!empty($division)){ 
                                       foreach($division as $dvsns)
                                         { ?>

                                          <li><a href="<?php echo base_url();?>BabiesController/Categoryproducts"><span class="menu-text"></span><?php echo $dvsns->division_name ?></span></a></li>


                                        <?php } } ?>

                             
                                    </ul>

                             </li>

                             <?php } } ?>      

                          </ul>

                        </li>


                      <?php } ?>

                    </ul>  

              </nav> 
           
           </div>        

        </div>
        <!-- Site Menu Section End -->

    </div>
    <!-- Header Section End -->

    <!-- Header Sticky Section Start -->
    <div class="sticky-header header-menu-center section bg-white d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">

                <div class="col">
                    <div class="header-logo">
                        <a href="<?php echo base_url(); ?>Home"><img src="<?php echo base_url(); ?>Babies Moments English/images/logo/logo-2.png" alt=" Logo"></a>
                    </div>
                </div>
				 <div class="col d-none d-xl-block">
                  
                </div>
				<!--<div class="col"></div>
                <div class="col-auto">
                                   <div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Shop By Brands   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>Shop By Brands  </a></li>
											<li><a>Clevamama</a></li>
											<li><a>PaperClip</a></li>
											<li><a>MatchstickMonkey</a></li>
											<li><a>Ubbi</a></li>
											<li><a>HybridEzyFold</a></li>
										</ul>
									</div>
                                </div>
									
									<div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Shop by Age   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>0 - 6 Months</a></li>
											<li><a>6 - 12 Months</a></li>
											<li><a>12 - 18 Months</a></li>
											<li><a>18 - 24 Months</a></li>
											<li><a>18 - 36 Months</a></li>
											<li><a>More than 36 months </a></li>
										</ul>
									</div>
                                </div>
                                </div>
								
								 <div class="col">
                                    <input type="text" placeholder="Search Products...">
                                </div>
                                <button type="submit"><i class="fal fa-search"></i></button>-->
                               
                <!-- Search End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                       <div class="header-login">
                            <a href="<?php echo base_url(); ?>My-account" data-toggle="tooltip" data-placement="top" title="My Account"><i class="flaticon-user"></i></a>
                        </div>
                        <div class="header-wishlist">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle" data-toggle="tooltip" data-placement="top" title="My Wishlist"><span class="wishlist-count">3</span><i class="flaticon-heart"></i></a>
                        </div>
						<div class="header-wishlist">
                            <a href="#offcanvas-reserv" class="offcanvas-toggle" data-toggle="tooltip" data-placement="top" title="Reserved Products
"><span class="wishlist-count">3</span><i class="fal fa-clock"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"  data-toggle="tooltip" data-placement="top" title="My Cart"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>

    </div>
    <!-- Header Sticky Section End -->
    <!-- Mobile Header Section Start -->
    <div class="mobile-header bg-white section d-xl-none">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="<?php echo base_url(); ?>Home"><img src="<?php echo base_url(); ?>Babies Moments English/images/logo/logo-2.png" alt=" Logo"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login d-none d-sm-block">
                            <a href="<?php echo base_url(); ?>My-account"><i class="flaticon-user"></i></a>
                        </div>
                        <div class="header-search d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <!--<div class="header-wishlist d-none d-sm-block">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="flaticon-heart"></i></a>
                        </div>-->
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span class="cart-count">3</span><i class="flaticon-shopping-cart"></i></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->

    <!-- Mobile Header Section Start -->
    <div class="mobile-header sticky-header bg-white section d-xl-none">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="index.html"><img src="<?php echo base_url(); ?>Babies Moments English/images/logo/logo-2.png" alt=" Logo"></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="header-login d-none d-sm-block">
                            <a href="<?php echo base_url(); ?>My-account"><i class="fal fa-user"></i></a>
                        </div>
                        <div class="header-search d-sm-block">
                            <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fal fa-search"></i></a>
                        </div>
                        <!--<div class="header-wishlist d-none d-sm-block">
                            <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                        </div>-->
                        <div class="header-cart">
                            <a href="#offcanvas-cart" class="offcanvas-toggle"><span class="cart-count">3</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->
    <!-- OffCanvas Search Start -->
    <div id="offcanvas-search" class="offcanvas offcanvas-search">
        <div class="inner">
            <div class="offcanvas-search-form">
                <button class="offcanvas-close">×</button>
                <form action="#">
                    <div class="row mb-n3">
                       
                        <div class="col-lg-12 col-12 mb-3">
                            <div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Shop By Brands   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>Shop By Brands  </a></li>
											<li><a>Clevamama</a></li>
											<li><a>PaperClip</a></li>
											<li><a>MatchstickMonkey</a></li>
											<li><a>Ubbi</a></li>
											<li><a>Little Unicorn </a></li>
										</ul>
									</div>
                                </div>								
								 </div>
								 
								  <div class="col-lg-12 col-12 mb-3">	
									<div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Shop by Age   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>0 - 6 Months</a></li>
											<li><a>6 - 12 Months</a></li>
											<li><a>12 - 18 Months</a></li>
											<li><a>18 - 24 Months</a></li>
											<li><a>18 - 36 Months</a></li>
											<li><a>More than 36 months </a></li>
										</ul>
									</div>
                                </div>
                        </div>
						
						 <div class="col-lg-12 col-12 mb-2"><input type="text" placeholder="Search Products..."></div>
						 <div class="col-lg-12 col-12 mt-2 text-center"><a href="#" class="btn btn-sm btn-primary">Search</a></div>
                    </div>
                </form>
            </div>
            <!--<p class="search-description text-body-light mt-2"> <span># Type at least 1 character to search</span> <span># Hit enter to search or ESC to close</span></p>-->

        </div>
    </div>
    <!-- OffCanvas Search End -->

    <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">Wishlist</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/Squeezetoys.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Squeeze toys </a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/StarfishSuctionToys.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Starfish Suction Toys </a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/BathToyDryingBin.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Bath Toy Drying Bin </a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="<?php echo base_url(); ?>My-account" class="btn btn-dark btn-hover-primary">view wishlist</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Wishlist End -->
	
	 <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-reserv" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">My Reserved products
</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/pillow/cleva-sleep-pod.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Cleva Sleep Pod </a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/pillow/soft-gray.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Soft Grey  </a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/pillow/Infantpillow.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Infant pillow </a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="<?php echo base_url(); ?>My-account" class="btn btn-dark btn-hover-primary">view my Reserv</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Wishlist End -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-22.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">ClevaSleep® Pod Cover</a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-23.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Bamboo Baby Washcloth</a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="nursery-bed-moment-details.html" class="image"><img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/StarfishSuctionToys.jpg" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="nursery-bed-moment-details.html" class="title">Starfish Suction Toys </a>
                            <span class="quantity-price">1 x <span class="amount">KD 0.00</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Subtotal :</strong>
                    <span class="amount">KD 0.00</span>
                </div>
                <div class="buttons">
                    <a href="<?php echo base_url(); ?>Cart" class="btn btn-dark btn-hover-primary">view cart</a>
                    <a href="<?php echo base_url(); ?>Checkout" class="btn btn-outline-dark">checkout</a>
                </div>
                <p class="minicart-message">Free Shipping on All Orders Over KD 0.00!</p>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
	<button class="offcanvas-close">×</button>
        <div class="inner customScroll">
		
            <div class="offcanvas-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fal fa-search"></i></button>
                </form>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="index.html"><span class="menu-text">Home</span></a></li>





 <?php

                      $this->db->from('category');
                      $this->db->order_by('category_id','desc');
                      $cats = $this->db->get()->result();
                      
                       foreach($cats as $row) { ?>


                        

                          <li><a href="#"><span class="menu-text"><?php echo $row->category_label ?></span></a>
                        
                         <ul class="sub-menu">

                        <?php  $this->db->where('subcategory_category',$row->category_id);
                          $this->db->order_by("subcategory_id", "asc"); 
                          $subcat= $this->db->get('subcategory')->result();
                           if(!empty($subcat)){ 
                           foreach($subcat as $subs)
                             { ?>



                             <li>
                                    <a href="#"><span class="menu-text"><?php echo $subs->subcategory_name ?></span></a>

                                 <ul class="sub-menu">  
                                      
                                      <?php  $this->db->where('division_subcat',$subs->subcategory_id);
                                      $this->db->order_by("division_id", "desc"); 
                                      $division= $this->db->get('division')->result();
                                       if(!empty($division)){ 
                                       foreach($division as $dvsns)
                                         { ?>

                                          <li><a href="#"><span class="menu-text"></span><?php echo $dvsns->division_name ?></span></a></li>


                                        <?php } } ?>

                             
                                    </ul>

                             </li>

                             <?php } } ?>      

                          </ul>

                        </li>


                      <?php } ?>






                     <li><a href="<?php echo base_url(); ?>Comming-soon"><span class="menu-text">Coming Soon Products</span></a></li>
                    
                </ul>
            </div>
            <div class="offcanvas-buttons">
                <div class="header-tools">
                    <div class="header-login">
                            <a href="<?php echo base_url(); ?>My-account" data-toggle="tooltip" data-placement="top" title="My Account"><i class="flaticon-user"></i></a>
                        </div>
                        <div class="header-wishlist">
                            <a href="<?php echo base_url(); ?>My-account" data-toggle="tooltip" data-placement="top" title="My Wishlist"><span class="wishlist-count">3</span><i class="flaticon-heart"></i></a>
                        </div>
						<div class="header-wishlist">
                            <a href="<?php echo base_url(); ?>My-account" data-toggle="tooltip" data-placement="top" title="Reserved Products
"><span class="wishlist-count">3</span><i class="fal fa-clock"></i></a>
                        </div>
                        <div class="header-cart">
                            <a href="<?php echo base_url(); ?>Cart" title="My Cart"><span class="cart-count">1</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                </div>
            </div>
            <div class="offcanvas-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->

    <div class="offcanvas-overlay"></div>














<?php

 $this->load->view($content);

?>














    <div class="footer8-section section section-padding bg-light">
        <div class="container">
            <div class="row learts-mb-n40">
                <div class="col-lg-4 col-sm-6 col-12 learts-mb-40">
                    <h4 class="widget-title">Contact us</h4>
                    <div class="widget-contact2">
                        <p>P.O. Box 2117, Postal Code 92400, ALARDIYA, KUWAIT. <br> info@babiesmoments.com <br> <span class="text-heading">+965 6665 0677</span> </p>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6 col-12 learts-mb-40">
                    <h4 class="widget-title">Other Links</h4>
                    <ul class="widget-list">
                         <li><a href="<?php echo base_url(); ?>About">About us</a></li>
                        <li><a href="<?php echo base_url(); ?>Contact">Contact Us</a></li>
                        <li><a href="<?php echo base_url(); ?>BabiesController/Track_order">Track my order</a></li>
                        <li><a href="<?php echo base_url(); ?>Faq">Faq's</a></li>
                       
                    </ul>
                </div>
                <div class="col-lg-2 col-sm-6 col-12 learts-mb-40">
                    <h4 class="widget-title">Useful Links</h4>
                    <ul class="widget-list">
                       
                        <li><a href="<?php echo base_url(); ?>Delivery-policy">Delivery Policy</a></li>
                        <li><a href="<?php echo base_url(); ?>Return-policy">Return Policy</a></li>
                        <li><a href="<?php echo base_url(); ?>Terms-of-sales">Terms of Sale</a></li>
                        
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 learts-mb-40">
                    <h5 class="widget-title">Instagram</h5>
                    <div id="instagram-feed221" class="instagram-carousel instagram-carousel2 instagram-feed">
                    </div>
                </div>

            </div>

            <div class="row align-items-end learts-mb-n40 learts-mt-40">

                <div class="col-md-4 col-12 learts-mb-40 order-md-2">
                    <div class="widget-about text-center">
                        <img src="<?php echo base_url(); ?>Babies Moments English/images/logo/logo.png" alt="">
                    </div>
                </div>

                <div class="col-md-4 col-12 learts-mb-40 order-md-3">
                    <div class="widget-payment text-center text-md-right">
                        <img src="<?php echo base_url(); ?>Babies Moments English/images/others/pay.png" alt="">
                    </div>
                </div>

                <div class="col-md-4 col-12 learts-mb-40 order-md-1">
                    <div class="widget-copyright"> <p class="copyright text-center text-md-left">&copy; 2020 Babies Moments. All Rights Reserved </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
	
	
	
	
	
	 <!-- Modal -->
    <div class="quickViewModal modal fade bs-example-modal-sm" id="App">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
			<h5>Download Application</h5>
                <button class="close" data-dismiss="modal">&times;</button>
                <div class="row learts-mb-n30">
					<div class="app"><a href="#"><img src="<?php echo base_url(); ?>Babies Moments English/images/app1.png"></a></div>
                     <div class="app"><a href="#"><img src="<?php echo base_url(); ?>Babies Moments English/images/app1.png"></a></div>

                </div>
            </div>
        </div>
		<div class="clear-fix"></div>
    </div>
	
	
	
	
    <!-- Modal -->
    <div class="quickViewModal modal fade" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="close" data-dismiss="modal">&times;</button>
                <div class="row learts-mb-n30">

                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-30">
                        <div class="product-images">
                            <div class="product-gallery-slider-quickview">
                                <div class="product-zoom" data-image="<?php echo base_url(); ?>Babies Moments English/images/product/product-zoon-1.jpg">
                                    <img src="<?php echo base_url(); ?>Babies Moments English/images/product/product-zoon-1.jpg" alt="">
                                </div>
                                <div class="product-zoom" data-image="<?php echo base_url(); ?>Babies Moments English/images/product/product-zoon-2.jpg">
                                    <img src="<?php echo base_url(); ?>Babies Moments English/images/product/product-zoon-2.jpg" alt="">
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class="col-lg-6 col-12 overflow-hidden learts-mb-30">
                        <div class="product-summery customScroll">
                            <div class="product-ratings">
                                <span class="star-rating">
                                <span class="rating-active" style="width: 100%;">ratings</span>
                                </span>
                                <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a>
                            </div>
                            <h3 class="product-title">Baby travel containers stackable</h3>
                            <div class="product-price">KD 0.000</div>
                            <div class="product-description">
                                <p>Ideal for carrying extra formula or food in your changing bag when you are out and about. Convenient stackable container for feeding your infant on-the-go.

Our Travel container can be used to store formula milk powder and also hold fruits, solid baby food, snacks or accessories such as pacifiers, bottle teats and so on.</p>
<p><b>Delivery in 1-2 days | Free Delivery</b></p>
                            </div>
                            <div class="product-variations">
                            <table>
                                <tbody>
                                    <tr>
                                        <td >
										
											<div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Select Size   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>Select Size  </a></li>
											<li><a>Small</a></li>
											<li><a>Medium</a></li>
											<li><a>Large</a></li>
											<li><a>30</a></li>
											<li><a>32</a></li>
											<li><a>48</a></li>
										</ul>
									</div>
                                </div>
										
										</td>
										
                                        <td >
                                            
											<div class="product-sorting">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Select Age   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>Select Age  </a></li>
											<li><a>0 - 6 Months</a></li>
											<li><a>6 - 12 Months</a></li>
											<li><a>12 - 18 Months</a></li>
											<li><a>18 - 24 Months</a></li>
											<li><a>18 - 36 Months</a></li>
											<li><a>More than 36 months </a></li>
										</ul>
									</div>
                                </div>
											
                                        </td>
                                    </tr>
									
                                   </tbody>
                            </table>
							</div>
							
							<div class="clear-fix"></div>
							 <div class="color_sec">
							
                                            <div class="custom-radios2">
								
<p class="color">Select Color</p>
  <div>
    <input type="radio" id="color-01" name="color" value="color-01" checked>
    <label for="color-01">
      <span>
      </span>
    </label>
  </div>
  
  <div>
    <input type="radio" id="color-02" name="color" value="color-02">
    <label for="color-02">
      <span>
      </span>
    </label>
  </div>
  
  <div>
    <input type="radio" id="color-03" name="color" value="color-03">
    <label for="color-03">
      <span>
      </span>
    </label>
  </div>
  
  <div>
    <input type="radio" id="color-05" name="color" value="color-05">
    <label for="color-05">
      <span>
      </span>
    </label>
  </div>
  
  <div>
    <input type="radio" id="color-06" name="color" value="color-06">
    <label for="color-06">
      <span>
      </span>
    </label>
  </div>
  
  
  
  
</div>
                                      
							</div>
							
							
							<div class="product-variations">	   
								 <table>
                                <tbody>   
                                    <tr>
                                        <td class="label"><span>Quantity</span></td>
                                        <td class="value">
                                            <div class="product-quantity">
                                                <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                <input type="text" class="input-qty" value="1">
                                                <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
							
							<div class="clear-fix"></div>
							</div>
							
							<div class=" mt-20 ">
											<span data-toggle="collapse" data-target="#gift" aria-controls="collapseOne" aria-controls="gift"><input id="address" type="checkbox" " data-target="#gift" aria-controls="collapseOne" aria-controls="gift"/>
                                    <label for="address" >Gift Craft (KD:5.000)</label></span>
											
								
                                </div>
								<div id="gift" class="collapse one mt-10 mb-20" data-parent="#gift">
								<div class="recipient mb-40">
								
								 <div class="product-variations ">
                            <table>
                                <tbody>
                                    <tr>
                                        <td >
										
											<div class="product-sorting datepicker">
                                   <div class="input-group date" id="datetimepicker2">
                  <input type="text" class="" placeholder="Delivery Date"><span class="input-group-addon"><i class="fa fa-calendar" ></i></span>
                </div>
                                </div>
										
										</td>
										
                                        <td >
                                            
											<div class="product-sorting time">
                                    <div class="btn-group"><a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Delivery Time   <span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a>9AM to 11AM  </a></li>
											<li><a>11AM to 1PM</a></li>
											<li><a>1PM to 3PM</a></li>
											<li><a>3PM to 5PM</a></li>
											<li><a>5PM to 7PM</a></li>
										</ul>
									</div>
                                </div>
											
                                        </td>
                                    </tr>
									
                                   </tbody>
                            </table>
							</div>
								<div class="clear-fix"></div>
								
								 <div class="col-12 learts-mb-10"><textarea placeholder="Your message to the recipient*"></textarea></div>
                                    <div class="col-12  learts-mb-20 text-right"><button class="btn btn-sm btn-dark btn-outline-hover-dark">Submit</button></div>
									<div class="clear-fix"></div>
								
								</div>
								</div>
								
								<div class="clear-fix"></div>
								
								
							
							
                          <div class="clear-fix"></div>
                        <div class="product-buttons mt-20">
                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a>
                            <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Add to Cart</a>
                            
                        </div>
						  
						  
                            <div class="product-brands">
                                <span class="title">Brands</span>
                                <div class="brands">
                                    <a href="#"><img src="<?php echo base_url(); ?>Babies Moments English/images/brands/brand-5.png" alt=""></a>
                              
                                </div>
                            </div>
                            <div class="product-meta mb-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>SKU</span></td>
                                            <td class="value">0404019</td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Category</span></td>
                                            <td class="value">
                                                <ul class="product-category">
                                                    <li><a href="#">Kitchen</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Tags</span></td>
                                            <td class="value">
                                                <ul class="product-tags">
                                                    <li><a href="#">handmade</a></li>
                                                    <li><a href="#">learts</a></li>
                                                    <li><a href="#">mug</a></li>
                                                    <li><a href="#">product</a></li>
                                                    <li><a href="#">learts</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Share on</span></td>
                                            <td class="va">
                                                 <div id="socialHolder" class="mobile-social-share">
        		<div id="socialShare" class="btn-group share-group">
                    <a data-toggle="dropdown" class="btn btn-info">
                         <i class="fa fa-share-alt fa-inverse"></i>
                    </a>
    				<button href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle share">
    				</button>
    				<ul class="dropdown-menu">
						<li>
    						<a data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
								<i class="fab fa-facebook-f"></i>
							</a>
    					</li>					
    					<li>
    						<a data-original-title="Google+" rel="tooltip"  href="#" class="btn btn-google" data-placement="left">
								<i class="fab fa-instagram"></i>
							</a>
    					</li>
        				<li>
    					    <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
								<i class="fab fa-twitter"></i>
							</a>
    					</li>
    					
    				    <li>
    						<a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn btn-linkedin" data-placement="left">
								<i class="fab fa-linkedin"></i>
							</a>
    					</li>
    					<li>
    						<a data-original-title="Pinterest" rel="tooltip"  class="btn btn-pinterest" data-placement="left">
								<i class="fab fa-pinterest"></i>
							</a>
    					</li>
                        <li>
    						<a  data-original-title="Email" rel="tooltip" class="btn btn-mail" data-placement="left">
								<i class="fa fa-envelope"></i>
							</a>
    					</li>
                    </ul>
    			</div>
            </div>
        </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
	

    <!-- JS
============================================ -->
    <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>
    

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="<?php echo base_url(); ?>Babies Moments English/js/vendor/vendor.min.js"></script>
    <script src="<?php echo base_url(); ?>Babies Moments English/js/plugins/plugins.min.js"></script>

    <!-- Main Activation JS -->
    <script src="<?php echo base_url(); ?>Babies Moments English/js/main.js"></script>
	<script type="text/javascript">	$(document).ready(function() {
    $('.dropdown-menu li a').click(function(event) {
        var option = $(event.target).text();
        $(event.target).parents('.btn-group').find('.dropdown-toggle').html(option+' <span class="caret"></span>');
    });
});

	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>Babies Moments English/js/bootstrap-datepicker.min.js"></script>
<script >
$('#datetimepicker2').datepicker({
    weekStart: 0,
    todayBtn: "linked",
    language: "es",
    orientation: "bottom auto",
    keyboardNavigation: false,
    autoclose: true
});

   $(document).ready(function(){
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })       
   });
    // I would import this from a file or pull this array from a db -- this is just a demo
    var quotes = new Array("This is a test tool-tip","More testing", "Blah Blah Blah", "can import from csv text file for this", "Text Text TESTING Text");
    var randno = quotes[Math.floor( Math.random() * quotes.length )];
    $("#hints").attr('data-original-title', randno);
    function updateHints(){
        newquote = quotes[Math.floor( Math.random() * quotes.length )];
        $("#hints").attr('data-original-title', newquote);
        $("#hints").tooltip();
        // uncomment to have tooltips show up automatically every 10 seconds
        //$("#hints").mouseover();
    }
    //Interval is set to 10 seconds; 1000 - 1 second
    setInterval(updateHints, 10000); 
</script>



</body>


</html>