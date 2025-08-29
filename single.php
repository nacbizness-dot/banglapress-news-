<?php
/**
 * Template for displaying single posts (Articles)
 */

get_header();
?>

<div class="content-area">

    <!-- Main Article -->
    <div class="site-content single">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
                    <header class="article-header">
                        <h1 class="post-title"><?php the_title(); ?></h1>
                        <div class="post-meta">
                            <span><?php echo get_the_date(); ?></span> | 
                            <span><?php the_author(); ?></span>
                        </div>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php endif; ?>
                    </header>

                    <!-- Social Share -->
                    <div class="share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank">Twitter</a>
                        <a href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>" target="_blank">WhatsApp</a>
                    </div>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                </article>

                <!-- Related Posts -->
                <section class="related">
                    <h3><?php _e('Related News', 'banglapress'); ?></h3>
                    <div class="post-grid">
                        <?php
                        $related = new WP_Query(array(
                            'category__in' => wp_get_post_categories(get_the_ID()),
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 3
                        ));
                        if ($related->have_posts()) :
                            while ($related->have_posts()) : $related->the_post(); ?>
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
