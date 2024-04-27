<?php
/*
Plugin Name: ChihuAPI for Elementor
Plugin URI: https://github.com/
Description: Replaces Elementor placeholder image with a random dog image from dog.ceo API
Version: 1.0
Author: Pau Riba Queijas
Author URI: https://pauriba.cat/
Requires Plugins: elementor
*/

// Add the JavaScript script to the footer
function dog_ceo_placeholder_script() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Find all images with Elementor placeholder
        $('img').each(function() {
            var $img = $(this);

            // Check if the image src attribute contains /wp-content/plugins/elementor/assets/images/placeholder.png
            if ($img.attr('src').indexOf('/wp-content/plugins/elementor/assets/images/placeholder.png') !== -1) {
                // Make a call to Dog CEO API to get a new image
                $.get('https://dog.ceo/api/breed/chihuahua/images/random', function(data) {
                    // Replace the src of the image with the new image URL
                    $img.attr('src', data.message);
                });
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'dog_ceo_placeholder_script');