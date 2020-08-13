<?php get_header();
pageBanner(array(
    'title' => 'Our Campuses',
    'subtitle' => 'We have several conveniently located campuses.',
))
?>
<div class="container container--narrow page-section">
    <div class="acf-map">
        <?php while (have_posts()) {
            the_post();
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
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>