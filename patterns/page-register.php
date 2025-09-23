<?php
/**
 * Template Name: Register Page
 * Template Post Type: page
 */

if (is_user_logged_in()) {
    wp_redirect(home_url('/my-account/'));
    exit;
}

get_header();
?>

<div class="woocommerce-register-page">
    <div class="register-container">
        <?php echo do_blocks('<!-- wp:group {"layout":{"type":"constrained"}} -->
        <div class="wp-block-group">
            <!-- wp:heading {"textAlign":"center"} -->
            <h2 class="has-text-align-center">Create an Account</h2>
            <!-- /wp:heading -->
            
            <!-- wp:shortcode -->
            [woocommerce_my_account]
            <!-- /wp:shortcode -->
        </div>
        <!-- /wp:group -->'); ?>
    </div>
</div>

<?php
get_footer();
?>