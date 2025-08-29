<?php
/**
 * The template for displaying search results
 */

get_header();
?>

<div class="content-area">

    <!-- Search Results -->
    <div class="site-content">
        <header class="archive-header">
            <h1 class="archive-title">
                <?php printf(__('Search Results for: %s', 'banglapress'), get_search_query()); ?>
            </h1>
        </header>

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
            <p><?php _e('Sorry, no results found. Try again with different keywords.', 'banglapress'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <?php get_sidebar();
