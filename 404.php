<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
?>

<div class="content-area">

    <div class="site-content not-found">
        <h1><?php _e('404 - Page Not Found', 'banglapress'); ?></h1>
        <p><?php _e('Sorry, the page you are looking for does not exist or has been moved.', 'banglapress'); ?></p>
        
        <div class="search-box">
            <?php get_search_form(); ?>
        </div>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="back-home">
            <?php _e('← Back to Homepage', 'banglapress'); ?>
        </a>
    </div>

</div>

<?php get_footer(); ?>
