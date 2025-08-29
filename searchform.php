<?php
/**
 * Custom search form template
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', 'banglapress'); ?></span>
        <input type="search" class="search-field" 
               placeholder="<?php echo esc_attr_x('Search news…', 'placeholder', 'banglapress'); ?>" 
               value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        🔍
    </button>
</form>
