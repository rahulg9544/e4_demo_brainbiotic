

     <!-- Slider main container Start -->
    <div class="home2-slider swiper-container">
        <div class="swiper-wrapper">

<?php
if($slider->num_rows()!=0)
{
$i=1;

$scount = $slider->num_rows();

 foreach($slider->result() as $row) { ?>

            <div style="background-image: url('<?php echo base_url(); ?>uploads/<?php echo $row->banner_image; ?>')!important;" class="home2-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="<?php echo base_url(); ?>uploads/<?php echo $row->banner_image; ?>" >
                
                <div class="home2-slide-content">
                    <h5 class="sub-title"><?php echo $row->banner_title; ?></h5>
                    <h2 class="title"><?php echo $row->banner_shortdesc; ?></h2>
                    <div class="link"><a href="<?php echo base_url(); ?>Babies Moments English/nursery-bed-moment.html">shop collection</a></div>
                </div>
                <div class="home2-slide-pages">
                    <span class="current"><?php echo $i; ?></span>
                    <span class="border"></span>
                    <span class="total"><?php echo $scount; ?></span>
                </div>
            </div>

<?php $i++; }

}
 ?>

        </div>
        <div class="home2-slider-prev swiper-button-prev"><i class="ti-angle-left"></i></div>
        <div class="home2-slider-next swiper-button-next"><i class="ti-angle-right"></i></div>
    </div>
    <!-- Slider main container End -->

    <!-- Category Banner Section Start -->
    <div class="section section-fluid learts-pt-30">
        <div class="container" id="catshowslids">
            

               
		<div class="category-banner1-carousel" >
              
<?php foreach($res as $row) { 

$cid = base64_encode($row->category_id); 

$subid = base64_encode(0);

$divid = base64_encode(0); 

    ?>

              <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="<?php echo base_url(); ?>BabiesController/Categoryproducts?cid=<?php echo $cid; ?>&&subid=<?php echo $subid; ?>&&divid=<?php echo $divid; ?>" class="image"><img src="<?php echo base_url(); ?>uploads/<?php echo $row->category_homepic ?>" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="<?php echo base_url(); ?>BabiesController/Categoryproducts?cid=<?php echo $cid; ?>"><?php echo $row->category_label ?></a>
                                    <!--<span class="number">16</span>-->
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

 <?php } ?>    


 </div>         		
				

            
        </div>
    </div>
    <!-- Category Banner Section End -->
    
	
	 <!-- Product Style Two Section Start -->
    <div class="section section-padding most_selling">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center mb-0">
                <h2 class="title title-icon-both">Most Selling Products</h2>
            </div>
            <!-- Section Title End -->

            <div class="product-carousel learts-mt-30">
                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                <span class="product-badges">
                                    <span class="onsale">-13%</span>
                                </span>
                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/Towels.jpg" alt="Product Image">
                            </a>
                            <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product2-info">
                             <h6 class="title"><a href="#">Cotton Apron baby bath towel  </a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                        </div>
                        <div class="product2-buttons">
                             <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                 <img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/BabySinkBath.jpg" alt="Product Image">
                            </a>
                            <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product2-info">
                            <h6 class="title"><a href="#">The Baby Sink Bath </a></h6>
                                        <span class="price">
                                            KD 10.00
                                        </span>
                        </div>
                        <div class="product2-buttons">
                             <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <span class="product-badges">
                                <span class="hot">hot</span>
                            </span>
                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/BathMatkneelingcushion.jpg" alt="Product Image">
                            </a>
                            <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product2-info">
                            <h6 class="title"><a href="#"> Bath Mat with kneeling...   </a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                        </div>
                        <div class="product2-buttons">
                             <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                <span class="product-badges">
                                    <span class="onsale">-27%</span>
                                </span>
                                 <img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/BathMat.jpg" alt="Product Image">
                            </a>
                            <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product2-info">
                            <h6 class="title"><a href="#">Bath Mat</a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                            </span>
                        </div>
                        <div class="product2-buttons">
                             <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                 <img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/Squeezetoys.jpg" alt="Product Image">
                            </a>
                            <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="product2-info">
                            <h6 class="title"><a href="#">Squeeze toys    </a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                        </div>
                        <div class="product2-buttons">
                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                            <a href="#" class="product-button hintT-top" data-hint="Compare"><i class="fal fa-random"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Product Style Two Section End -->
    
    
    <!-- Products Section Start -->
    <div class="section section-padding section-fluid">
        <div class="container">

          <div class="row learts-mb-50">
                <div class="col">
                    <!-- Section Title Start -->
                    <div class="section-title text-center mb-0">
                       
                        <h2 class="title title-icon-both">FEATURED PRODUCTS</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <!-- Product Tab Start -->
            <div class="row">
                <div class="col-12">
                    
                    <div class="prodyct-tab-content1 tab-content">
                        <div class="tab-pane fade show active" id="tab-new-sale">
                            <!-- Products Start -->
                            <div class="products row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2">

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <span class="product-badges">
                                                    <span class="onsale">-13%</span>
                                                </span>
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-1.jpg" alt="Product Image">
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">BUNDLE OF JOY GIFT SET</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-2.jpg" alt="Product Image">
                                                
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">SWADDLE BLANKET</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                                <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <span class="product-badges">
                                                <span class="hot">hot</span>
                                            </span>
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-3.jpg" alt="Product Image">
                                                
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">BABY SPA ECOCERT GIFT SET</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <span class="product-badges">
                                                    <span class="onsale">-27%</span>
                                                </span>
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-4.jpg" alt="Product Image">
                                               
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">BABY WASH & SHAMPOO 100ML</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-5.jpg" alt="Product Image">
                                                
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                            <div class="product-options">
                                                <ul class="colors">
                                                    <li style="background-color: #c2c2c2;">color one</li>
                                                    <li style="background-color: #374140;">color two</li>
                                                    <li style="background-color: #8ea1b2;">color three</li>
                                                </ul>
                                                <ul class="sizes">
                                                    <li>Large</li>
                                                    <li>Medium</li>
                                                    <li>Small</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">DANCING MONKEY TEETHER</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-6.jpg" alt="Product Image">
                                                
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">Baby Head & Neck Support</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <span class="product-badges">
                                                    <span class="hot">hot</span>
                                                </span>
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-7.jpg" alt="Product Image">
                                               
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">Pocket Sprung Baby Mattress Cot & Cot Bed</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                                <span class="product-badges">
                                                    <span class="outofstock"><i class="fal fa-frown"></i></span>
                                                <span class="hot">hot</span>
                                                </span>
                                                <img src="<?php echo base_url(); ?>Babies Moments English/images/product/s270/product-8.jpg" alt="Product Image">
                                                
                                            </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                            <div class="product-options">
                                                <ul class="colors">
                                                    <li style="background-color: #000000;">color one</li>
                                                    <li style="background-color: #b2483c;">color two</li>
                                                </ul>
                                                <ul class="sizes">
                                                    <li>Large</li>
                                                    <li>Medium</li>
                                                    <li>Small</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="title"><a href="<?php echo base_url(); ?>BabiesController/Product_Details">Baby travel containers stackable</a></h6>
                                            <span class="price">
                                                <span class="old">KD 0.000</span>
                                            <span class="new">KD 0.000</span>
                                            </span>
                                            <div class="product-buttons">
                                                <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Products End -->
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <!-- Product Tab End -->
            <div class="row no-gutters justify-content-center learts-mt-50">
                <a href="#" class="btn p-0"><i class="ti-plus"></i> load more ...</a>
            </div>

        </div>
    </div>
    <!-- Products Section End -->
    
    
     <div class="section section-fluid">
        <div class="container">
            <hr class="m-0">
        </div>
    </div>

    <!-- Product Section Start -->
    <div class="section section-padding ">
        <div class="container">

            <div class="row learts-mb-30">
                <div class="col-12 learts-mb-20">
                    <!-- Section Title Start -->
                    <div class="section-title2 text-center m-0">
                        <h2 class="title title-icon-both">New Arrivals</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
                
            </div>

            <!-- Products Start -->
            <div class="product-carousel">

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                                        <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                            <img src="<?php echo base_url(); ?>Babies Moments English/images/product/toy-moment/animal-teeth.jpg" alt="Product Image">
                                        </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
										<div class="product-options">
                                            <ul class="colors">
                                                <li style="background-color: #e7aa01;">Yellow</li>
                                                <li style="background-color: #ff0000;">Red</li>
												<li style="background-color: #ff5f67;">Coral </li>
												<li style="background-color: #0099ff;">Blue </li>
                                            </ul>
                                        </div>
									</div>
                        <div class="product-info">
                                        <h6 class="title"><a href="#"> Monkey Animals  </a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                        </div>
                            
                            
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                         <div class="product-thumb">
                                        <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                            <img src="<?php echo base_url(); ?>Babies Moments English/images/product/DiaperMore/DiaperPale.jpg" alt="Product Image">
                                        </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
										<div class="product-options">
                                            <ul class="colors">
                                                <li style="background-color: #fff;">White</li>
                                                <li style="background-color: #fe03b4;">Grey</li>
												<li style="background:url(<?php echo base_url(); ?>Babies Moments English/images/gray.png);">Grey Chevron </li>
												<li style="background-color: #cdcdcd;">Silver </li>
                                            </ul>
                                        </div>
									</div>
                        <div class="product-info">
                                        <h6 class="title"><a href="#">Diaper Pale  </a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                        </div>
                            
                           
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                                        <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                            <img src="<?php echo base_url(); ?>Babies Moments English/images/product/pillow/Infantpillow.jpg" alt="Product Image">
                                        </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                        <div class="product-info">
                                        <h6 class="title"><a href="#">Infant pillow </a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                        </div>
                            
                           
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                         <div class="product-thumb">
                                        <span class="product-badges">
                                            <span class="hot">hot</span>
                                        </span>
                                        <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                            <img src="<?php echo base_url(); ?>Babies Moments English/images/product/travel-moment/ClevaFoamBabyHeadnecksupport.jpg" alt="Product Image">
                                        </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
										
                                    </div>
                        <div class="product-info">
                                        <h6 class="title"><a href="#">ClevaFoam Baby Head & neck</a></h6>
                                        <span class="price">
                                            KD 15.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                        </div>
                            
                            
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                                        <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                            <img src="<?php echo base_url(); ?>Babies Moments English/images/product/bath-moment/BathMatkneelingcushion.jpg" alt="Product Image">
                                        </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
										<div class="product-options">
                                            <ul class="colors">
                                                <li style="background:url(<?php echo base_url(); ?>Babies Moments English/images/polkadot.png);">coral</li>
                                            </ul>
                                        </div>
                                    </div>
                        <div class="product-info">
                                        <h6 class="title"><a href="#"> Bath Mat with kneeling cushion   </a></h6>
                                        <span class="price">
                                            KD 12.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                        </div>
                            
                            
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="product">
                        <div class="product-thumb">
                                        <span class="product-badges">
                                            <span class="hot">hot</span>
                                        </span>
                                        <a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="image">
                                            <img src="<?php echo base_url(); ?>Babies Moments English/images/product/pillow/baby-pillow.jpg" alt="Product Image">
                                        </a> <a href="#" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                    </div>
                       <div class="product-info">
                                        <h6 class="title"><a href="#">Baby Pillow</a></h6>
                                        <span class="price">
                                            KD 15.00
                                        </span>
                                        <div class="product-buttons">
                                            <a href="#quickViewModal" data-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                            <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a><a href="<?php echo base_url(); ?>BabiesController/Product_Details" class="product-button hintT-top" data-hint="More Details"><i class="fa fa-external-link"></i></a>
                                        </div>
                            
                          
                        </div>
                    </div>
                </div>

                

                

            </div>
            <!-- Products End -->

        </div>
    </div>
    <!-- Product Section End -->

   

	
	
	 <!-- Product Style Two Section Start -->
    <div class="section section-padding most_selling">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center mb-0">
                <h2 class="title title-icon-both">Coming Soon Products</h2>
            </div>
			
			
            <!-- Section Title End -->

            <div class="testimonial-carousel learts-mt-30">
			
             <div class="col">
            <div class="product-grid5">
                <div class="product-image5">
                    <a href="#">
                        <img  src="<?php echo base_url(); ?>Babies Moments English/images/comming4.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="#comingsoonprdct" data-toggle="modal" class="product-button hintT-left" data-hint="Quick View"><i class="fal fa-search"></i></a></li>
                        <li><a href="" data-toggle="modal" class="product-button hintT-left" data-hint="Add to Wishlist" ><i class="far fa-heart "></i></a></li>
                        <li><a href="comming-zoon-detail.html" data-toggle="modal" class="product-button hintT-left" data-hint="Notify Me" ><i class="fal fa-bookmark"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fa fa-calendar"></i> Coming on 22.12.2020</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Swaddle to Sleep - Baby Swaddle Wrap </a></h3>
                    <div class="price">KD 12.000</div>
                </div>
            </div>
        </div>
		
		<div class="col">
            <div class="product-grid5">
                <div class="product-image5">
                    <a href="#">
                        <img  src="<?php echo base_url(); ?>Babies Moments English/images/comming2.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="#comingsoonprdct" data-toggle="modal" class="product-button hintT-left" data-hint="Quick View"><i class="fal fa-search"></i></a></li>
                        <li><a href="" data-toggle="modal" class="product-button hintT-left" data-hint="Add to Wishlist" ><i class="far fa-heart "></i></a></li>
                        <li><a href="comming-zoon-detail.html" data-toggle="modal" class="product-button hintT-left" data-hint="Notify Me" ><i class="fal fa-bookmark"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fa fa-calendar"></i> Coming on 18.11.2020</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Cotton Muslin Crib Sheet </a></h3>
                    <div class="price">KD 12.000</div>
                </div>
            </div>
        </div>
		
		<div class="col">
            <div class="product-grid5">
                <div class="product-image5">
                    <a href="#">
                       <img  src="<?php echo base_url(); ?>Babies Moments English/images/comming1.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="#comingsoonprdct" data-toggle="modal" class="product-button hintT-left" data-hint="Quick View"><i class="fal fa-search"></i></a></li>
                        <li><a href="" data-toggle="modal" class="product-button hintT-left" data-hint="Add to Wishlist" ><i class="far fa-heart "></i></a></li>
                        <li><a href="comming-zoon-detail.html" data-toggle="modal" class="product-button hintT-left" data-hint="Notify Me" ><i class="fal fa-bookmark"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fa fa-calendar"></i> Coming on 20.11.2020</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Baby Pillow - Select Range White</a></h3>
                    <div class="price">KD 12.000</div>
                </div>
            </div>
        </div>
		
		<div class="col">
            <div class="product-grid5">
                <div class="product-image5">
                    <a href="#">
                       <img  src="<?php echo base_url(); ?>Babies Moments English/images/sale-banner2-1.jpg">
                    </a>
                    <ul class="social">
                         <li><a href="#comingsoonprdct" data-toggle="modal" class="product-button hintT-left" data-hint="Quick View"><i class="fal fa-search"></i></a></li>
                        <li><a href="" data-toggle="modal" class="product-button hintT-left" data-hint="Add to Wishlist" ><i class="far fa-heart "></i></a></li>
                        <li><a href="comming-zoon-detail.html" data-toggle="modal" class="product-button hintT-left" data-hint="Notify Me" ><i class="fal fa-bookmark"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fa fa-calendar"></i> Coming on 20.11.2020</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Baby Pillow - Select Range White</a></h3>
                    <div class="price">KD 12.000</div>
                </div>
            </div>
        </div>
		
		<div class="col">
            <div class="product-grid5">
                <div class="product-image5">
                    <a href="#">
                       <img  src="<?php echo base_url(); ?>Babies Moments English/images/comming3.jpg">
                    </a>
                    <ul class="social">
                         <li><a href="#comingsoonprdct" data-toggle="modal" class="product-button hintT-left" data-hint="Quick View"><i class="fal fa-search"></i></a></li>
                        <li><a href="" data-toggle="modal" class="product-button hintT-left" data-hint="Add to Wishlist" ><i class="far fa-heart "></i></a></li>
                        <li><a href="comming-zoon-detail.html" data-toggle="modal" class="product-button hintT-left" data-hint="Notify Me" ><i class="fal fa-bookmark"></i></a></li>
                    </ul>
                    <a href="#" class="select-options"><i class="fa fa-calendar"></i> Coming on 20.11.2020</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">ClevaSleep Pod</a></h3>
                    <div class="price">KD 10</div>
                </div>
            </div>
        </div>

               

                
            </div>
			
			<div class="clear-fix"></div>
			
			 <div class="col-md-auto d-none d-md-block mt-20 text-center">
                    <a href="<?php echo base_url(); ?>Comming-soon" class="btn btn-light btn-hover-black">view all</a>
                </div>

        </div>
    </div>
    <!-- Product Style Two Section End -->
	
	
	
    
   <!-- Brands Section Start -->
    <div class="section section-padding section-fluid">
        <div class="container">

            <div class="section-title2 text-md-left text-center row justify-content-between align-items-center">
                <div class="col-md-auto col-12">
                    <!-- Section Title Start -->
                    <h2 class="title title-icon-right">Shop by brands</h2>
                    <!-- Section Title End -->
                </div>
                <div class="col-md-auto d-none d-md-block mt-4 mt-md-0">
                    <a href="<?php echo base_url(); ?>Brands" class="btn btn-light btn-hover-black">view all</a>
                </div>
            </div>

            <div class="row align-items-center row-cols-lg-5 row-cols-md-5 row-cols-sm-3 row-cols-2 learts-mb-n50">

                 <div class="col learts-mb-50">
                    <div class="brand-item">
                        <a href="<?php echo base_url(); ?>BabiesController/Brand_products"><img src="<?php echo base_url(); ?>Babies Moments English/images/brands/brand-5.png" alt="Brands Image"></a>
                    </div>
                </div>
				
				<div class="col learts-mb-50">
                    <div class="brand-item">
                        <a href="<?php echo base_url(); ?>BabiesController/Brand_products" ><img src="<?php echo base_url(); ?>Babies Moments English/images/brands/brand-3.png" alt="Brands Image"></a>
                    </div>
                </div>
				
				 <div class="col learts-mb-50">
                    <div class="brand-item">
                        <a href="<?php echo base_url(); ?>BabiesController/Brand_products"><img src="<?php echo base_url(); ?>Babies Moments English/images/brands/brand-2.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col learts-mb-50">
                    <div class="brand-item">
                        <a href="<?php echo base_url(); ?>BabiesController/Brand_products"><img src="<?php echo base_url(); ?>Babies Moments English/images/brands/brand-1.png" alt="Brands Image"></a>
                    </div>
                </div>

				<div class="col learts-mb-50">
                    <div class="brand-item">
                        <a href="<?php echo base_url(); ?>BabiesController/Brand_products"><img src="<?php echo base_url(); ?>Babies Moments English/images/brands/brand-6.png" alt="Brands Image"></a>
                    </div>
                </div>



            </div>

            <div class="row d-md-none learts-mt-50">
                <div class="col text-center">
                    <a href="<?php echo base_url(); ?>Brands" class="btn btn-light btn-hover-black">view all</a>
                </div>
            </div>

        </div>
    </div>
    <!-- Brands Section End -->


   
   

     <!-- Subscribe Section Start -->
    <div class="section learts-pt-60 learts-pb-60" data-bg-image="<?php echo base_url(); ?>Babies Moments English/images/bg/bg-3.jpg">
        <div class="container">
            <div class="row align-items-center learts-mb-n30">

                <div class="col-lg-5 learts-mb-30">
                    <!-- Section Title Start -->
                    <div class="section-title text-center mb-0">
                        <h3 class="sub-title">Stay connected <br> with us</h3>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col-lg-7 learts-mb-30">
                    <span class="d-block h4 text-heading learts-mb-10 text-center text-lg-left">Subscribe to our newsletter.</span>
                    <form id="mc-form" class="mc-form widget-subscibe m-lg-0">
                        <input id="mc-email" autocomplete="off" type="email" placeholder="Enter your e-mail address">
                        <button id="mc-submit" class="btn btn-dark">subscribe</button>
                    </form>
                    <!-- mailchimp-alerts Start -->
                    <div class="mailchimp-alerts text-centre">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                    </div><!-- mailchimp-alerts end -->
                </div>

            </div>
        </div>
    </div>
    <!-- Subscribe Section End -->

  

  <script src="<?php echo base_url(); ?>/templateadmin/assets/scripts/lib/jquery-1.11.3.min.js"></script>

  <script type="text/javascript">

   $( document ).ready(function() {

          // showcatslider();
          

      }); 
      
      // function showcatslider()
      // {
      //   $.ajax({
      //           method: "POST",
      //           url: "<?php echo base_url('index.php/BabiesController/getcategorieslides');?>/",
      //           data: '', // serializes the form's elements.
      //          success: function(data){
      //           // console.log(data);
      //           $('#catshowslids').html(data);
                                         
      //         }
      //        });
      // }

  </script>  