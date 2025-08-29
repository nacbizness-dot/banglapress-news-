<?php
/**
 * The front page template (Homepage)
 * Displays Hero + Category sections like a news portal
 */

get_header();
?>

<div class="content-area">

    <!-- Main Content -->
    <div class="site-content">

        <!-- Hero Section -->
        <section class="hero">
            <div class="featured">
                <?php
                $hero = new WP_Query(array('posts_per_page' => 1));
                if ($hero->have_posts()) :
                    while ($hero->have_posts()) : $hero->the_post(); ?>
                        <article>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
            <div class="hero-small">
                <?php
                $hero_small = new WP_Query(array('posts_per_page' => 4, 'offset' => 1));
                if ($hero_small->have_posts()) :
                    while ($hero_small->have_posts()) : $hero_small->the_post(); ?>
                        <article>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); ?>
                                <div>
                                    <h4><?php the_title(); ?></h4>
                                </div>
                            </a>
                        </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </section>

        <!-- Category Sections -->
        <?php
        $sections = array('national','politics','economy','international','sports','entertainment','technology','lifestyle');
        foreach ($sections as $slug) :
            $cat = get_category_by_slug($slug);
            if ($cat) :
        ?>
        <section class="section">
            <div class="section-header">
                <h3 class="section-title"><?php echo esc_html($cat->name); ?></h3>
                <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php _e('More', 'banglapress'); ?> »</a>
            </div>
            <div class="post-grid">
                <?php
                $posts = new WP_Query(array(
                    'cat' => $cat->term_id,
                    'posts_per_page' => 3
                ));
                if ($posts->have_posts()) :
                    while ($posts->have_posts()) : $posts->the_post(); ?>
                        <article class="post-card">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) { the_post_thumbnail('medium'); } ?>
                                <div class="p">
                                    <h3><?php the_title(); ?></h3>
                                    <div class="meta"><?php echo get_the_date(); ?></div>
                                </div>
                            </a>
                        </article>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </section>
        <?php endif; endforeach; ?>

    </div><!-- .site-content -->

    <!-- Sidebar -->
    <aside class="sidebar">
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <?php dynamic_sidebar('sidebar-1'); ?>
        <?php endif; ?>
    </aside>

</div><!-- .content-area -->

<?php get_footer(); ?>
