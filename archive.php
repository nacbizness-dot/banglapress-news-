<?php
/**
 * The template for displaying archive pages (categories, tags, authors, dates)
 */

get_header();
?>

<div class="content-area">

    <!-- Archive Content -->
    <div class="site-content">
        <header class="archive-header">
            <h1 class="archive-title">
                <?php the_archive_title(); ?>
            </h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
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
            <p><?php _e('No posts found.', 'banglapress'); ?></p>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <?php if
