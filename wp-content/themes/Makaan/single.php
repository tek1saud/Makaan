<?php get_header(); ?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-12">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3"><?php echo get_field('title'); ?></h1>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <div class="col-lg-12">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <?php
                                $property_image = get_field('photo');
                                if ($property_image) :
                                    echo '<img class="img-fluid" src="' . esc_url($property_image['url']) . '" alt="' . esc_attr($property_image['alt']) . '">';
                                endif;
                                ?>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">Price:Rs.<?php echo get_field('cost'); ?></h5>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Address:<?php echo get_field('address'); ?></p>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>Area:<?php echo get_field('area'); ?></small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>Number Of BedRooms:<?php echo get_field('number_of_bedrooms'); ?></small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>Number Of BathRooms:<?php echo get_field('number_of_bathrooms'); ?></small>
                                </div>
                                <div class="mt-3">
                                    <p>Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
                                    <p><?php the_content(); ?></p>
                                </div>
                                <div class="mt-3">
                                    <h5>Reviews</h5>
                                    <!-- Include your review display logic here -->
                                </div>
                                <div class="mt-3">
                                    <h5>Comments</h5>
                                    <?php
                                    comment_form();
                                    ?>
                                </div>
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
