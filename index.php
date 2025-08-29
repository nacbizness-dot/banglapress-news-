<?php
/**
 * The main template file (fallback)
 * Used if no other template matches
 */

get_header();
?>

<div class="content-area">

    <!-- Main Content -->
    <div class="site-content">
        <?php if (have_posts()) : ?>
            <div class="post-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) { the_post_thumbnail('medium'); } ?>
                            <div class="p">
                                <h3><?php the_title(); ?></h3>
                                <div class="meta"><?php echo get_the_date(); ?></div>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>

        <?php else : ?>
            <p><?php _e('No posts found.', 'banglapress'); ?></p>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
        <?php endif; ?>
    </aside>

</div>

<?php get_footer(); ?>
