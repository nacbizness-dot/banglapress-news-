<?php
/**
 * The sidebar template
 */
?>

<aside id="secondary" class="sidebar">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <div class="widget">
            <h3 class="widget-title"><?php _e('Sidebar Widget', 'banglapress'); ?></h3>
            <p><?php _e('Add widgets to the Sidebar in Appearance → Widgets.', 'banglapress'); ?></p>
        </div>
    <?php endif; ?>
</aside>
