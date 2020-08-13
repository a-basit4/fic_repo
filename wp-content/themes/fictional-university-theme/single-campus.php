<?php
get_header();
while (have_posts()) {
    the_post();
    pageBanner();
?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> All Campuses</a> <span class="metabox__main">
                    <?php the_title(); ?></span></p>
        </div>
        <div class="generic-content"><?php the_content(); ?></div>
        <div class="acf-map">
            <?php
            $mapLocation = get_field('map_location');
            if (!$mapLocation['lat']) {
                $mapLocation['lat'] = '30.068556';
            }
            if (!$mapLocation['lng']) {
                $mapLocation['lng'] = '71.600926';
            }
            if (!$mapLocation['address']) {
                $mapLocation['address'] = 'This is custom address I will fix it later.';
            }
            ?>
            <div class="marker" data-lat="<?php echo $mapLocation['lat']; ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
                <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                <?php echo $mapLocation['address']; ?>
            </div>
        </div>
        <?php
        $relatedcampuses = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type'      => 'program',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'related_campus',
                    'compare' => 'like',
                    'value' => '"' . get_the_ID() . '"',
                )
            )
        ));
        if ($relatedcampuses->have_posts()) { ?>
            <hr class="section-break">
            <h2 class="headline headline--medium">Programs Available At This Campus</h2>
            <ul class="min-list link-list">
                <?php
                while ($relatedcampuses->have_posts()) {
                    $relatedcampuses->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php }
                wp_reset_postdata(); ?>
            </ul>
        <?php
        }
        ?>
    </div>

<?php }
get_footer();
?>