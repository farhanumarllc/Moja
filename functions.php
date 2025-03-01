<?php
// Enqueue parent theme styles
function hello_elementor_child_enqueue_styles() {
    wp_enqueue_style('hello-elementor-parent', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('hello-elementor-child', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');

// Enqueue custom scripts and styles
function enqueue_custom_scripts_and_styles() {
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/new-css/new-style.css');
    wp_enqueue_style('responsive-style-new', get_stylesheet_directory_uri() . '/new-css/responsive.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles');

function enqueue_slick_files() {
    // Enqueue Slick CSS
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1');
    wp_enqueue_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), '1.8.1');

    // Enqueue Slick JavaScript
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

    // Enqueue your custom Slick initialization script
    wp_enqueue_script('slick-init', get_template_directory_uri() . '/js/slick-init.js', array('slick-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_files');

function custom_enqueue_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');

function custom_jquery_script() {
    ?>
    <script type="text/javascript">
 
 
        jQuery(document).ready(function () {
            
        if (jQuery('.woocommerce-message:contains("Basket updated.")').length > 0) {
            return; // Exit and do nothing if the message is present
        }    
    // Save the selected delivery option to local storage
    jQuery('.delivery-options .radio-input').on('change', function () {
        let selectedValue = jQuery(this).val();
        localStorage.setItem('selectedDeliveryOption', selectedValue);
    });

    // On page load, check if a value exists in local storage
    let savedValue = localStorage.getItem('selectedDeliveryOption');
    if (savedValue) {
        // Flag to track if a match is found
        let matchFound = false;

        // Match the saved value with the radio buttons in the second block
        jQuery('ul.wcsatt-options .subscription-option input').each(function () {
            if (jQuery(this).val() === savedValue) {
                jQuery(this).prop('checked', true); // Check the matched radio button
                matchFound = true; // Set the flag to true
                return false; // Stop the loop when the value matches
            }
        });

        // If a match is found, enable and click the Update Cart button
        if (matchFound) {
            jQuery('button[name="update_cart"]').prop('disabled', false).trigger('click');
        }
    }

    // Re-enable Update Cart button if the selection changes manually
    jQuery('ul.wcsatt-options .subscription-option input').on('change', function () {
        jQuery('button[name="update_cart"]').prop('disabled', false);
    });

    // Re-enable Update Cart button if the selection changes manually
    jQuery('ul.wcsatt-options .subscription-option input').on('change', function () {
        jQuery('button[name="update_cart"]').prop('disabled', false);
    });
});

// jQuery(document).ready(function () {
//      if (jQuery('.woocommerce-message:contains("Basket updated.")').length > 0) {
//           return; // Exit and do nothing if the message is present
//         }  
//     // Save the selected delivery option to localStorage with product ID as key
//     jQuery('.delivery-options .radio-input').on('change', function () {
//         let productId = jQuery(this).data('product-id'); // Get product ID
//         let selectedValue = jQuery(this).val(); // Get selected value
//         let timestamp = new Date().getTime(); // Current timestamp

//         // Save data as an object in localStorage
//         let data = {
//             value: selectedValue,
//             timestamp: timestamp
//         };

//         // Store in localStorage with product ID as part of the key
//         localStorage.setItem(`deliveryOption_${productId}`, JSON.stringify(data));
//     });

//     // On page load, iterate through localStorage to find saved delivery options
//     for (let key in localStorage) {
//         if (key.startsWith('deliveryOption_')) {
//             let savedData = JSON.parse(localStorage.getItem(key));
//             let productId = key.split('_')[1]; // Extract product ID from the key
//             let savedValue = savedData.value;
//             let savedTimestamp = savedData.timestamp;

//             // Check if the saved data is older than a day (86400000 ms)
//             if (new Date().getTime() - savedTimestamp > 86400000) {
//                 localStorage.removeItem(key); // Remove stale entry
//                 continue; // Skip further processing for this item
//             }

//             // Flag to track if a match is found
//             let matchFound = false;

//             // Match the saved value with the radio buttons in the second block
//             jQuery('ul.wcsatt-options .subscription-option input').each(function () {
//                 if (jQuery(this).val() === savedValue) {
//                     jQuery(this).prop('checked', true); // Check the matched radio button
//                     matchFound = true; // Set the flag to true
//                     return false; // Stop the loop when the value matches
//                 }
//             });

//             // If a match is found, enable and click the Update Cart button
//             if (matchFound) {
//                 jQuery('button[name="update_cart"]').prop('disabled', false).trigger('click');
//             }
//         }
//     }

//     // Re-enable Update Cart button if the selection changes manually
//     jQuery('ul.wcsatt-options .subscription-option input').on('change', function () {
//         jQuery('button[name="update_cart"]').prop('disabled', false);
//     });
// });



    </script>
    <?php
}
add_action('wp_footer', 'custom_jquery_script');



function enqueue_custom_scripts() {
    // CSS files
    wp_enqueue_style('widget-style', get_stylesheet_directory_uri() . '/css/widget.css');
    wp_enqueue_style('responsive-style', get_stylesheet_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
    wp_enqueue_style('animate-style', get_stylesheet_directory_uri() . '/css/animate.css');

    // JavaScript files
    wp_enqueue_script('jquery'); // WordPress ki default jQuery
    wp_enqueue_script('slick-script', get_stylesheet_directory_uri() . '/css/slick.js', array('jquery'), null, true);
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/css/js.js', array('jquery'), null, true);
}



if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Product Slider Options',
        'menu_title'    => 'Product Slider',
        'menu_slug'     => 'product-slider-options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
    ));
}


// Shortcode function
function custom_shortcode_function($atts) {
    // Ensure scripts are loaded
    enqueue_custom_scripts();
 // Ensure scripts are loaded
    enqueue_custom_scripts();
     $product_select_products = get_field('product_select_products', 'option');
    // Shortcode ka content yahan likhein

     $tabs_content = ''; // Start an empty string to store the generated HTML

    // Check if there are selected products
    if ($product_select_products) {
        $index = 1; // Counter for tab numbers
        foreach ($product_select_products as $product) {
            // Get the tab_icon image ID for each product
            $tab_icon_id = get_field('tab_icon', $product->ID);

            if ($tab_icon_id) {
                // Get the image URL from the attachment ID
                $tab_icon_url = wp_get_attachment_url($tab_icon_id);
            } else {
                // Set a default image URL if tab_icon is empty
                $tab_icon_url = get_stylesheet_directory_uri() . '/img/default-icon.png';
            }

            // Generate the tab button dynamically and append to $tabs_content
            $tabs_content .= '<button class="tab-link' . ($index === 1 ? ' active' : '') . '" data-tab="tab' . $index . '">';
            $tabs_content .= '<img src="' . esc_url($tab_icon_url) . '" alt="Tab ' . $index . ' Icon">';
            $tabs_content .= '</button>';

            $index++; // Increment the tab counter
        }
    }


      $tabs_content_slider = ''; // Start an empty string to store the generated HTML

    // Check if there are selected products
    if ($product_select_products) {
        $index = 1; // Counter for tab numbers
        foreach ($product_select_products as $product) {
            // Get the tab_icon image ID for each product
            $product_background_color = get_field('product_border_color', $product->ID);
            $tab_icon_id = get_field('tab_icon', $product->ID);
            if ($tab_icon_id) {
                // Get the image URL from the attachment ID
                $tab_icon_url = wp_get_attachment_url($tab_icon_id);
            } 
            // Get the product featured image
            $featured_image = get_the_post_thumbnail($product->ID, 'full');
            
            $gallery_images_html = '';
            $product_gallery_ids = get_post_meta($product->ID, '_product_image_gallery', true);

            if ($product_gallery_ids) {
                // Convert the comma-separated string into an array
                $gallery_image_ids = explode(',', $product_gallery_ids);
            // Loop through the image IDs
                foreach ($gallery_image_ids as $attachment_id) {
                    // Get the URL of the image by attachment ID
                    $image_url = wp_get_attachment_url($attachment_id);
                      if ($image_url) {
                                  // Generate the gallery image HTML
                                  $gallery_images_html .= '<div class="item new-shape"><img src="' . esc_url($image_url) . '" alt="image" style="background-color:'.$product_background_color.'" /></div>';
                              }
                          }
                      }

            // If there are no gallery images, you can fallback to the featured image or any default behavior
            if (!empty($gallery_images_html)) {
                $featured_image_url = get_the_post_thumbnail_url($product->ID, 'full');
                if ($featured_image_url) {
                    $gallery_images_html .= '<div class="item new-shape"><img src="' . esc_url($featured_image_url) . '" alt="Featured Image" style="background-color:'.$product_background_color.'" /></div>';
                }
            }


            // Get the custom field 'slider_title'
            $slider_title = get_field('slider_title', $product->ID);
            $slider_text = get_field('slider_text', $product->ID);
            
            if (!$slider_title) {
                $slider_title = get_the_title($product->ID); // Fallback if no custom field value
            }

            // Get the product permalink
            $product_permalink = get_permalink($product->ID);

            // Generate the tab button dynamically
            $tabs_content_slider .= '
            <div id="tab' . $index . '" class="tab-content' . ($index === 1 ? ' active' : '') . '">
                <div class="inner-slider-two-columns">
                    <div class="heading-flex-item-col wow fadeInUp">
                        <div class="heading-tab'.$index.' slider-box-heading">
                            <h2>' . esc_html($slider_title) . '</h2>
                            <h3>' . esc_html($slider_text) . '</h3>
                            <div class="btn-learn">
                                <a href="' . esc_url($product_permalink) . '">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="slider-flex-item-col wow fadeInUp">
                        <div class="slider'.$index.' ">
                            <div class="slider-for">
                                ' . $featured_image . '
                                ' . $gallery_images_html . '
                            </div>
                            <div class="slider-nav my-csutom-slider-nav">
                                ' . $gallery_images_html . '
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

            $index++; // Increment the tab counter
        }
    }


    return '
       <div class="main-content-tabs">
      <div class="auto-container">
        <div class="main-two-columns">
          <div class="left-main-slider-content">
            <div class="vertical-tabs">
              <div class="tabs-content">
              ' . $tabs_content_slider . '
              </div>
            </div>
          </div>
          <div class="right-column-tabs-content">
            <div class="tabs-menu">
                 ' . $tabs_content . '
            </div>
          </div>
        </div>
      </div>
    </div>

    ';
}

// Shortcode register karna
function register_custom_shortcode() {
    add_shortcode('custom_tabs', 'custom_shortcode_function');
}
add_action('init', 'register_custom_shortcode');

// add_filter('woocommerce_add_cart_item_data', 'add_delivery_option_to_cart', 10, 2);
// function add_delivery_option_to_cart($cart_item_data, $product_id) {
//     if (isset($_GET['delivery'])) {
//         $cart_item_data['delivery_option'] = sanitize_text_field($_GET['delivery']);
//     }
//     return $cart_item_data;
// }

// add_filter('woocommerce_get_item_data', 'display_delivery_option_in_cart', 10, 2);
// function display_delivery_option_in_cart($item_data, $cart_item) {
//     if (isset($cart_item['delivery_option'])) {
//         $item_data[] = array(
//             'name' => __(' ', 'text-domain'),
//             'value' => esc_html($cart_item['delivery_option']),
//         );
//     }
//     return $item_data;
// }

add_action('woocommerce_checkout_create_order_line_item', 'save_delivery_option_to_order_items', 10, 4);
function save_delivery_option_to_order_items($item, $cart_item_key, $values, $order) {
    if (isset($values['delivery_option'])) {
        $item->add_meta_data(__('Delivery ', 'text-domain'), $values['delivery_option']);
    }
}

add_action('woocommerce_email_order_meta', 'customize_delivery_option_email', 10, 3);
function customize_delivery_option_email($order, $sent_to_admin, $plain_text) {
    foreach ($order->get_items() as $item_id => $item) {
        if ($item->get_meta('Delivery Option')) {
            echo '<p><strong>' . __('Delivery :', 'text-domain') . '</strong> ' . $item->get_meta('Delivery Option') . '</p>';
        }
    }
}

add_filter('woocommerce_return_to_shop_redirect', 'custom_return_to_shop_url');

function custom_return_to_shop_url() {
    return home_url('/our-flavours/'); // Replace '/your-custom-page/' with your desired URL
}

add_action('woocommerce_proceed_to_checkout', 'add_text_above_checkout_button', 5);

function add_text_above_checkout_button() {
    echo '<p style="text-align: center; margin-bottom: 10px; color: #333;"><strong>Free Shipping</strong> orders only apply to UK Mainland and does not include Scottish Highlands and Offshore Islands.</p>';
}

