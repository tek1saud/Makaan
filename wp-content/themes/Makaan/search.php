<?php get_header(); ?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-12">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Search Results for "<?php echo esc_html(get_search_query()); ?>"</h1>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    $property_image = get_field('photo');
                                    if ($property_image) :
                                        echo '<img class="img-fluid" src="' . esc_url($property_image['url']) . '" alt="' . esc_attr($property_image['alt']) . '">';
                                    endif;
                                    ?>
                                </a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo get_field('category'); ?></div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo get_field('type'); ?></div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3"><?php echo get_field('cost'); ?></h5>
                                <a class="d-block h5 mb-2" href="<?php the_permalink(); ?>"><?php echo get_field('title'); ?></a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo get_field('address'); ?></p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo get_field('area'); ?></small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo get_field('number_of_bedrooms'); ?></small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo get_field('number_of_bathrooms'); ?></small>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No results found. Please try again with different criteria.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
