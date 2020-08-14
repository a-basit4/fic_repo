<?php
get_header();
while (have_posts()) {
    the_post();
    pageBanner();
?>
    <p class="hit">Only logged in user can hit a like, please log In first. </p>
    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row group">
                <div class="one-third">
                    <?php the_post_thumbnail('professorportrait'); ?>
                </div>
                <div class="two-thirds">
                    <?php
                    $likeCount = new WP_Query(array(
                        'post_type' => 'like',
                        'meta_query' => array(array(
                            'key' => 'liked_professor_id',
                            'compare' => '=',
                            'value' => get_the_ID()
                        ))
                    ));

                    $existStatus = 'no';

                    if (is_user_logged_in()) {
                        $check_likeCount = new WP_Query(array(
                            'author' => get_current_user_id(),
                            'post_type' => 'like',
                            'meta_query' => array(array(
                                'key' => 'liked_professor_id',
                                'compare' => '=',
                                'value' => get_the_ID()
                            ))
                        ));
                        if ($check_likeCount->found_posts) {
                            $existStatus = 'yes';
                        }
                    }

                    ?>
                    <span class="like-box" data-like="<?php echo $check_likeCount->posts[0]->ID; ?>" data-professor="<?php echo the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
                    </span>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <?php $relatedprograms = get_field('related_programs');
        if ($relatedprograms) { ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Subject(s) Taught</h2>
            <ul class="link-list min-list">
                <?php
                foreach ($relatedprograms as $program) { ?>

                    <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>

<?php }
get_footer();
?>