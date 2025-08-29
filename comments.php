<?php
/**
 * The template for displaying comments and the comment form
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $count = get_comments_number();
            if ($count === 1) {
                printf(__('One Comment on "%s"', 'banglapress'), get_the_title());
            } else {
                printf(_n('%s Comment on "%s"', '%s Comments on "%s"', $count, 'banglapress'), number_format_i18n($count), get_the_title());
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 50,
            ));
            ?>
        </ol>

        <div class="comments-pagination">
            <?php paginate_comments_links(); ?>
        </div>

    <?php endif; ?>

    <?php
    if (!comments_open() && get_comments_number()) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'banglapress'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply
