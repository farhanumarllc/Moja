<link rel="stylesheet" href="https://use.typekit.net/knz2xkd.css">

<?php
defined( 'ABSPATH' ) || exit;

global $product;

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form();
    return;
} ?>
<style>

.woocommerce .loader::before{
    background:none !important;
}
.loader-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff; /* Background color for loader */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Set a high z-index to ensure it's on top of other elements */
}

.loader {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #000000;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@media (max-width: 768px) {
    
    .subtitle {
   font-size: 17px !important;
}
.shipping-boxes h4{
    font-size: 20px !important;
}
.title{
    font-size: 17px !important; 
}
.radio-right span{
    font-size:17px !important;
}
span.woocommerce-Price-amount.amount {
    font-size: 17px !important;
}
.price span {
    font-size: 17px !important;
}
span.price {
    font-size: 17px !important;
}
.delivery-title h3 {
    font-size: 17px !important;
}

.delivery-option label {
  padding-top: 15px;
  padding-bottom: 15px;
  padding-left: 20px;
  padding-right: 20px;

}
.box-card-content {
    padding: 30px 25px !important;
}
.shipping-boxes {
    padding: 20px 20px !important;
    background-color: #000000;
    border-radius: 13px;
    width: 50%;
    text-align: center !important;
    display: flex !important;
    justify-content: center !important;
    flex-direction: column !important;
}
}
.disable-button {
    pointer-events: none; /* Prevent clicks */
    opacity: 0.5; /* Make it look disabled */
    cursor: not-allowed; /* Change cursor to indicate unavailability */
}
.subscribtion-delivery {
    display: none; /* Hidden by default */
    transition: opacity 0.3s ease, height 0.3s ease; /* Smooth transition */
}
.display-none {
    display: none; /* Explicitly hidden when this class is added */
    transition: opacity 0.3s ease, height 0.3s ease; /* Smooth transition */
}
</style>


<div class="loader-container">
        <div class="loader"></div>
    </div>
    
<script>
jQuery(document).ready(function() {
    // Hide loader and show page content when the DOM is ready
    jQuery('.loader-container').fadeOut('slow', function() {
        jQuery('body').css('overflow', 'visible'); // Show scrollbars
        jQuery(this).remove(); // Remove the loader element from the DOM
    });
});

jQuery(window).on('load', function() {
    // Ensure that the loader is hidden even if the load event doesn't fire (e.g., cached resources)
    jQuery('.loader-container').fadeOut('slow', function() {
        jQuery('body').css('overflow', 'visible'); // Show scrollbars
        jQuery(this).remove(); // Remove the loader element from the DOM
    });
});
</script>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
<?php
$product_id = get_the_ID();
$product = wc_get_product($product_id);
$product_title = $product->get_title();
$short_description = $product->get_short_description($product_id);
$product_border_color = get_field('product_border_color', $product_id);
$product_background_color = get_field('product_background_color', $product_id);
$product_kicker_text = get_field('product_kicker_text', $product_id);
$product_box_image = get_field('product_box_image', $product_id);
$product_content_boxes = get_field('product_content_boxes', $product_id);
$product_delivery = get_field('product_delivery', $product_id);
$product_free_shipping = get_field('product_free_shipping', $product_id);



// Get the currency code
$currency_code = get_woocommerce_currency();
// Get the currency symbol
$currency_symbol = get_woocommerce_currency_symbol($currency_code);
?>
    <section class="banner-section">
        <div class="main-section-banner">
            <div class="auto-container">
            <div class="flex-items-two">
                <div class="flex-item">
                <?php
                    global $product; // Ensure you have access to the global product object
                    $product_id = $product->get_id();
                    
                    // Get the featured image
                    $featured_image_id = $product->get_image_id();
                    $featured_image_url = wp_get_attachment_image_url($featured_image_id, 'full');
                    
                    // Get the gallery images
                    $gallery_image_ids = $product->get_gallery_image_ids();
                    ?>
                    
                    <div class="featured-img">
                        <div class="slider-for">
                            <div class="item">
                                <img src="<?php echo esc_url($featured_image_url); ?>" alt="Featured image" draggable="false" />
                            </div>
                            <?php foreach ($gallery_image_ids as $gallery_image_id) : 
                                $gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full'); ?>
                                <div class="item my-slider-main-one">
                                    <img src="<?php echo esc_url($gallery_image_url); ?>" alt="Gallery image" draggable="false" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="position">
                            <div class="slider-nav">
                                <div class="item my-slider-main-two">
                                    <img src="<?php echo esc_url($featured_image_url); ?>" alt="Featured image thumbnail" draggable="false" />
                                </div>
                                <?php foreach ($gallery_image_ids as $gallery_image_id) : 
                                    $gallery_image_url = wp_get_attachment_image_url($gallery_image_id, 'full'); ?>
                                    <div class="item my-slider-main-two">
                                        <img src="<?php echo esc_url($gallery_image_url); ?>" alt="Gallery image thumbnail" draggable="false" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="slick-arrows">
                                <div class="prev">
                                    <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/icons/left-arrow.png" alt="Previous">
                                </div>
                                <div class="next">
                                    <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/icons/arrow-right.png" alt="Next">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="flex-item">
                <div class="main-box-content">
                    <?php if($product_kicker_text){ ?>
                        <div class="purity">
                            <h4 style="padding: 1px 12px; <?php if($product_background_color){ ?> background-color: <?php echo esc_html($product_background_color); ?>; <?php } ?> font-size: 19px; font-weight: 700; display: inline-block; border-radius: 13px; font-family: 'Eurostile_Bold'; Sans-serif;"><?php echo esc_html($product_kicker_text); ?></h4>
                        </div>
                    <?php } ?>
                    <div class="heading-title">
                        <h2><?php echo esc_html($product_title); ?></h2>
                    </div>
                    <?php if($short_description){ ?>
                    <div class="content">
                        <?php echo $short_description; ?>
                    </div>
                    <?php } ?>
                </div>
                
                <div class="purchase-content">
                    <div class="radio-wrapper-new originial-price-value" style="border: 2px solid #e0e0e0; background-color: #fff; border-radius: 12px; padding: 15px; margin-bottom: 10px;">
                        <label class="radio-label">
                        <input type="radio" name="purchase" class="radio-input" />
                        <div class="radio-content">
                            <div class="radio-left">
                            <span class="title">One-time Purchase</span>
                            <span class="subtitle">(Pack of 12)</span>
                            </div>
                            <div class="radio-right">
                            <span class="price"> <?php 
                            $product = wc_get_product($product_id); 
                                if ($product) { 
                                    if($product->get_price()){
                                    echo  wc_price($product->get_price()); 
                                    }
                                } ?> 
                                </span>
                            </div>
                        </div>
                        </label>
                    </div>
                    
                    <div class="radio-wrapper-new less-price-value" style="border: 2px solid #e0e0e0; background-color: #fff; border-radius: 12px; padding: 15px; margin-bottom: 10px;">
                        <label class="radio-label">
                        <input type="radio" name="purchase" class="radio-input" />
                        <div class="radio-content">
                            <div class="radio-left">
                            <span class="title">Subscribe & Save</span>
                            <span class="subtitle">(Pack of 12)</span>
                            </div>
                            <div class="radio-right">
                            <span class="price new-price-after-less">
                            <?php 
                                    $product = wc_get_product($product_id); 
                                    if ($product) { 
                                        $original_price = $product->get_price();
                                        $discount_percentage = 10; // 10% discount
                                        if($original_price){
                                        $discounted_price = $original_price - ($original_price * ($discount_percentage / 100));
                                        echo  wc_price($discounted_price); 
                                        }
                                    } 
                                    ?>

                                </span>
                            </div>
                        </div>
                        </label>
                    </div>
                    
                    <style>
                    
                    
                    nav.woocommerce-breadcrumb {
                            display: none;
                        }
                        /* When the active class is added, change the border and background color */
                        
                    .radio-wrapper-new.active {
                       <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?> !important; <?php } ?> 
                       <?php if($product_background_color){ ?> background-color:<?php echo esc_html($product_background_color); ?>!important;<?php } ?> 
                    }
                    .radio-wrapper-new:hover{
                        <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?> !important; <?php } ?> 
                       <?php if($product_background_color){ ?> background-color:<?php echo esc_html($product_background_color); ?>!important;<?php } ?> 
                    }
                    .radio-wrapper-new-dev.active {
                      <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?>!important; <?php } ?> 
                       <?php if($product_background_color){ ?> background-color:<?php echo esc_html($product_background_color); ?>!important;<?php } ?> 
                    }
                    .radio-wrapper-new-dev:hover{
                        <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?> !important; <?php } ?> 
                       <?php if($product_background_color){ ?> background-color:<?php echo esc_html($product_background_color); ?>!important;<?php } ?> 
                    }
                    
                    </style>
                    
                    </div>
                    <div class="dilevery-box">
                    <div class="delivery-title subscribtion-delivery">
                        <h3>Delivery every</h3>
                    </div>
                <form action="#" method="GET">
                    <div class="delivery-options subscribtion-delivery">
                        <div class="delivery-option radio-wrapper-new-dev">
                        <input type="radio" id="option-2" name="delivery" value="2_week" class="radio-input"  data-product-id="<?php echo $product_id; ?>"/>
                        <label for="option-2" class="radio-content">
                            <span class="icon">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/delivery-logo/delivery-logo.png" alt="">
                            </span>
                            <span class="text">2 Weeks</span>
                        </label>
                        </div>
                        <div class="delivery-option radio-wrapper-new-dev">
                        <input type="radio" id="option-4" name="delivery" value="4_week" class="radio-input" data-product-id="<?php echo $product_id; ?>" />
                        <label for="option-4" class="radio-content">
                            <span class="icon">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/delivery-logo/delivery-logo.png" alt="">
                            </span>
                            <span class="text">4 Weeks</span>
                        </label>
                        </div>
                        <div class="delivery-option radio-wrapper-new-dev">
                        <input type="radio" id="option-8" name="delivery"  value="2_month" class="radio-input" data-product-id="<?php echo $product_id; ?>" />
                        <label for="option-8" class="radio-content">
                            <span class="icon">
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/delivery-logo/delivery-logo.png" alt="">
                            </span>
                            <span class="text">2 Months</span>
                        </label>
                        </div>
                        <div class="product-item" data-product-id="<?php echo $product_id; ?>"></div>
                    </div>
                    <div class="basket-button">
                        <style>
                            .single_add_to_cart_button_custom:hover {
                               <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?> !important; <?php } ?> 
                                <?php if($product_background_color){ ?> background-color:<?php echo esc_html($product_background_color); ?>!important;<?php } ?> 
                                color:#000 !important;
                                
                            }
                            .single_add_to_cart_button_custom:hover img {
                                filter: brightness(0) invert(0); /* Changes the color to black */
                            }
                        </style>
                        
                        <button type="submit" value="<?php echo $product_id; ?>" class="single_add_to_cart_button_custom" name="add-to-cart">
                        <span>
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/icons/basket-icon.svg" alt="">
                        </span>Add to Basket </button>
                    </div>
                </form>
                <div class="shipping-two-cols">
                    <?php if($product_delivery){ ?>
                    <div class="shipping-boxes">
                        <h4>
                            <span>
                            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/logoes/clock-new.svg" alt="" style="background-color:#ffffff; border-radius:50px; border: 1px solid #fff;">
                            </span>Delivery
                        </h4>
                        <h5><?php echo esc_html($product_delivery); ?></h5>
                    </div>
                    <?php } ?>
                    
                    <?php if($product_free_shipping){ ?>
                        <div class="shipping-boxes">
                            <h4>
                                <span>
                                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/logoes/cargo.svg" alt="">
                                </span>Free Shipping
                            </h4>
                            <h5><?php echo esc_html($product_free_shipping); ?></h5>
                        </div>
                    <?php } ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <section class="middle-banner">
      <div class="auto-container">
          <?php 
          if ($product_box_image) { $image_url = wp_get_attachment_image_url($product_box_image, 'full');
          ?>
        <div class="banner">
          <img src="<?php echo $image_url; ?>" alt="Banner Image">
        </div>
        <?php } ?>
      </div>
    </section>
    <section class="health-cards">
      <div class="main-card-health">
        <div class="auto-container">
        <?php if($product_content_boxes){ ?>
          <div class="flex-column-six">
            <?php foreach($product_content_boxes as $boxes){ 
            $product_box_options = ( isset( $boxes['product_box_options'] ) && '' !== $boxes['product_box_options'] ) ? $boxes['product_box_options'] : null;
            $product_text_box_options = ( isset( $boxes['product_text_box_options'] ) && '' !== $boxes['product_text_box_options'] ) ? $boxes['product_text_box_options'] : null;
            
            
            ?>
            <!-- Card 1 -->
            <?php if($product_box_options == 'text' && $product_text_box_options == 'text'){
            $product_text_box = ( isset( $boxes['product_text_box'] ) && '' !== $boxes['product_text_box'] ) ? $boxes['product_text_box'] : null;
            ?>
            <div class="flex-box-card-column" style="<?php if($product_background_color){ ?> background-color:<?php echo esc_html($product_background_color); ?>;  <?php } ?> <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?>; <?php } ?> ">
              <div class="box-card-content">
                 <?php if($product_text_box){ echo html_entity_decode($product_text_box); }?> 
                  
                
              </div>
            </div>
           <?php } ?>
           <?php if($product_box_options == 'image'){
            $box_image_option = ( isset( $boxes['box_image_option'] ) && '' !== $boxes['box_image_option'] ) ? $boxes['box_image_option'] : null;
            if ($box_image_option) { $image_url = wp_get_attachment_image_url($box_image_option, 'full');
            ?>
            <!-- Card 4 -->
            <div class="flex-box-card-column" style="border: none; background: transparent;">
              <div class="box-card-content card-img" style="background-image: url('<?php echo esc_url($image_url); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%; height: 100%; border-radius: 31px; object-fit: cover; min-height: 627px; object-fit: cover;"></div>
            </div>
            <?php }
           }
            ?>
            
            <!-- Card 5 -->
            
            <?php if($product_box_options == 'text' && $product_text_box_options == 'list'){
            $product_list_box_title = ( isset( $boxes['product_list_box_title'] ) && '' !== $boxes['product_list_box_title'] ) ? $boxes['product_list_box_title'] : null;
            $product_list_box = ( isset( $boxes['product_list_box'] ) && '' !== $boxes['product_list_box'] ) ? $boxes['product_list_box'] : null;
            $product_list_after_text = ( isset( $boxes['product_list_after_text'] ) && '' !== $boxes['product_list_after_text'] ) ? $boxes['product_list_after_text'] : null;
            ?>
            <div class="flex-box-card-column" style="<?php if($product_background_color){ ?> background-color:<?php echo esc_html($product_background_color); ?>;  <?php } ?> <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?>; <?php } ?> ">
              <div class="box-card-content">
                 <?php if($product_list_box_title){ ?>
                    <div class="box-title">
                      <h3><?php echo esc_html($product_list_box_title); ?></h3>
                    </div>
                <?php } ?>
               
                <div class="detail-box">
                     <?php if($product_list_box){ 
                    foreach($product_list_box as $list_box){ 
                    $title = ( isset( $list_box['title'] ) && '' !== $list_box['title'] ) ? $list_box['title'] : null;
                    $text = ( isset( $list_box['text'] ) && '' !== $list_box['text'] ) ? $list_box['text'] : null;
                    if($title || $text){
                    ?>
                  <div class="detail-content">
                    <p class="flex-detail"><?php echo html_entity_decode($title); ?> <span><?php echo html_entity_decode($text); ?></span>
                    </p>
                  </div>
                  <?php }
                    }
                  ?>
                </div>
                <?php } ?>
                <?php if($product_list_after_text){
                    echo html_entity_decode($product_list_after_text);
                }?>
              </div>
            </div>
            
            <?php } ?>
            <!-- Card 6 -->
            <?php if($product_box_options == 'logos'){
            $product_title_logo_box = ( isset( $boxes['product_title_logo_box'] ) && '' !== $boxes['product_title_logo_box'] ) ? $boxes['product_title_logo_box'] : null;
            $product_logos_box = ( isset( $boxes['product_logos_box'] ) && '' !== $boxes['product_logos_box'] ) ? $boxes['product_logos_box'] : null;
            ?>
            <div class="flex-box-card-column" style="background: transparent; <?php if($product_border_color){ ?> border:3px solid <?php echo esc_html($product_border_color); ?>; <?php } ?> ">
              <div class="box-card-content">
                  <?php if($product_title_logo_box){ ?>
                <div class="box-title">
                  <h3><?php echo esc_html($product_title_logo_box); ?></h3>
                </div>
                <?php } 
                if($product_logos_box){
                ?>
                <div class="brand-logoes">
                  <div class="brand-six-cols">
                     <?php foreach($product_logos_box as $logo_box){
                     $logo = ( isset( $logo_box['Logo'] ) && '' !== $logo_box['Logo'] ) ? $logo_box['Logo'] : null;
                     ?> 
                    <div class="brand-flex-column">
                      <div class="brand-logo-img">
                          <?php
                          if ($logo) { $image_url = wp_get_attachment_image_url($logo, 'full');
                          ?>
                          <img src="<?php echo esc_url($image_url); ?>" alt="">
                          <?php } ?>
                      </div>
                    </div>
                <?php } ?>    
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            
          <?php } ?>
            
            
          <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
      </div>
    </section>
</div>
<script>

  document.addEventListener("DOMContentLoaded", function () {
  // Function to reset styles for all radio-wrapper-new
  function resetStyles() {
    document.querySelectorAll(".radio-wrapper-new").forEach((wrapper) => {
      wrapper.classList.remove("active"); // Remove active class
    });
  }

  // Add event listener to each radio-wrapper-new
  document.querySelectorAll(".radio-wrapper-new").forEach((wrapper) => {
    wrapper.addEventListener("click", function () {
      // Reset all wrappers to remove active class
      resetStyles();

      // Add active class to the clicked wrapper
      this.classList.add("active");

      // Find the radio input inside the clicked wrapper
      const radioInput = this.querySelector(".radio-input");

      // Check the radio button
      radioInput.checked = true;
    });
  });
  

  // Apply active class for pre-checked radios
  document.querySelectorAll(".radio-input").forEach((radio) => {
    const wrapper = radio.closest(".radio-wrapper-new");
    if (radio.checked) {
      wrapper.classList.add("active");
    }
  });
});
    jQuery(document).ready(function() {
        jQuery('#main').removeClass('site-main').addClass('container-fluid');
    // Replace the class of the single product container with a full-width class
    
 jQuery('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.slider-nav',
  autoplay: true,
  prevArrow: jQuery('.slick-arrows .prev'), // Your custom prev arrow
  nextArrow: jQuery('.slick-arrows .next'), // Your custom next arrow
  responsive: [
    {
      breakpoint: 1024, // Tablet breakpoint
      settings: {
        slidesToShow: 1, // Show 1 slide
        slidesToScroll: 1, // Scroll 1 slide at a time
        arrows: true, // Keep arrows
      }
    },
    {
      breakpoint: 768, // Mobile breakpoint
      settings: {
        slidesToShow: 1, // Show 1 slide
        slidesToScroll: 1, // Scroll 1 slide at a time
        arrows: false, // Hide arrows on mobile
        autoplay: true, // Enable autoplay
      }
    },
    {
      breakpoint: 480, // Extra small mobile breakpoint
      settings: {
        slidesToShow: 1, // Show 1 slide
        slidesToScroll: 1, // Scroll 1 slide at a time
        arrows: false, // Hide arrows
        autoplay: true, // Enable autoplay
      }
    }
  ]
});

jQuery('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  centerMode: true,
  focusOnSelect: true,
  infinite: true,
  centerPadding: '0px',
  responsive: [
    {
      breakpoint: 1024, // Tablet breakpoint
      settings: {
        slidesToShow: 2, // Show 2 slides on tablets
        slidesToScroll: 1, // Scroll 1 slide at a time
      }
    },
    {
      breakpoint: 768, // Mobile breakpoint
      settings: {
        slidesToShow: 3, // Show 1 slide on mobile
        slidesToScroll: 1, // Scroll 1 slide at a time
      }
    },
    {
      breakpoint: 480, // Extra small mobile breakpoint
      settings: {
        slidesToShow: 3, // Show 1 slide
        slidesToScroll: 1, // Scroll 1 slide at a time
      }
    }
  ]
});


    // When .originial-price-value is clicked
    jQuery('.originial-price-value').on('click', function() {
        // Trigger a click event on .wcsatt-options-prompt-label-one-time
        jQuery('.wcsatt-options-prompt-label-one-time').click();
    });
     jQuery('.less-price-value').on('click', function() {
        // Trigger a click event on .wcsatt-options-prompt-label-one-time
        jQuery('.wcsatt-options-prompt-label-subscription').click();
    });
    jQuery('.single_add_to_cart_button_custom').on('click', function() {
          jQuery('.single_add_to_cart_button').click();
    });
    jQuery('.radio-wrapper-new-dev').on('click', function() {
        // Remove 'active' class from all radio-wrapper-new-dev elements
        jQuery('.radio-wrapper-new-dev').removeClass('active');
        
        // Add 'active' class to the parent div of the clicked radio button
        jQuery(this).closest('.radio-wrapper-new-dev').addClass('active');
    });
});


jQuery(document).ready(function() {
    // Initially disable the add to cart button
    jQuery('.single_add_to_cart_button_custom').prop('disabled', true);
    jQuery('.single_add_to_cart_button_custom').addClass('disable-button');

    // Monitor the change event on all radio buttons inside .purchase-content and .delivery-options
    jQuery('.purchase-content .radio-input').on('click', function() {
        // Check if at least one radio button in both groups is selected
        let purchaseChecked = jQuery('.purchase-content .radio-input:checked').length > 0;
        // let deliveryChecked = jQuery('.delivery-options .radio-input:checked').length > 0;

        // Enable the button if both are selected, otherwise disable it
        if (purchaseChecked) {
            jQuery('.single_add_to_cart_button_custom').prop('disabled', false).removeClass('disable-button');
        } else {
            jQuery('.single_add_to_cart_button_custom').prop('disabled', true).addClass('disable-button');
        }
    });

    jQuery('.less-price-value').on('click', function() {
        var subscriptionDelivery = jQuery('.subscribtion-delivery');
        
       if (subscriptionDelivery.hasClass('display-none')) {
            // If it has the 'display-none' class, remove it, set display to flex, and slide down
            subscriptionDelivery.removeClass('display-none').css('display', 'flex');
        } else {
            // If it does not have the 'display-none' class, add it and slide up
            subscriptionDelivery.addClass('display-none');
        }
    });
    
     jQuery('.originial-price-value').on('click', function() {
         var subscriptionDelivery = jQuery('.subscribtion-delivery');
          subscriptionDelivery.css('display', 'none');
     });
});


</script>


<?php do_action( 'woocommerce_after_single_product' ); ?>
