<?php get_header(); ?>
<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>
            <p class="animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet
                sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
            <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/carousel-1.jpg" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/carousel-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form action="<?php echo site_url();?>" method="GET">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword" name="s" id="s" value="<?php echo get_search_query(); ?>">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3" name="property_type" id="property_type" value="<?php echo get_search_query(); ?>">
                                <option selected disabled>Property Type</option>
                                <?php
                                    $property_types_args = array(
                                        'post_type'      => 'type',
                                        'posts_per_page' => -1,
                                    );
                                    $property_types_query = new WP_Query($property_types_args);

                                    if ($property_types_query->have_posts()) :
                                        while ($property_types_query->have_posts()) : $property_types_query->the_post();
                                            $selected = (get_query_var('property_type') == get_the_ID()) ? 'selected' : '';
                                            echo '<option value="' . get_the_ID() . '" ' . $selected . '>' . get_field('title') . '</option>';
                                        endwhile;
                                        wp_reset_postdata();
                                    else :
                                        echo '<option value="">No property types available</option>';
                                    endif;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0 py-3"  value="<?php echo get_search_query(); ?>" name="location" id="location">
                                <option selected disabled>Location</option>
                                <?php
                                    $property_location_args = array(
                                        'post_type'      => 'listing',
                                        'posts_per_page' => -1,
                                    );
                                    $property_location_query = new WP_Query($property_location_args);

                                    if ($property_location_query->have_posts()) :
                                        while ($property_location_query->have_posts()) : $property_location_query->the_post();
                                            $selected = (get_query_var('location') == get_the_ID()) ? 'selected' : '';
                                            echo '<option value="' . get_the_ID() . '" ' . $selected . '>' . get_field('address') . '</option>';
                                        endwhile;
                                        wp_reset_postdata();
                                    else :
                                        echo '<option value="">No locations available</option>';
                                    endif;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- Search End -->


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Types</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <?php
            $property_types_args = array(
                'post_type'      => 'type', // Adjust the post type name to 'type'
                'posts_per_page' => -1,  // Display all posts
            );
            $property_types_query = new WP_Query($property_types_args);

            if ($property_types_query->have_posts()) :
                while ($property_types_query->have_posts()) : $property_types_query->the_post();
            ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr(get_post_field('menu_order', get_the_ID()) * 0.2); ?>s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="<?php the_permalink(); ?>">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <?php
                                    $icon_image = get_field('icon');
                                    if ($icon_image) :
                                        echo '<img class="img-fluid" src="' . esc_url($icon_image['url']) . '" alt="' . esc_attr($icon_image['alt']) . '">';
                                    endif;
                                    ?>
                                </div>
                                <h6><?php echo get_field('title'); ?></h6>
                                <span><?php echo esc_html(get_field('number_of_properties')); ?> Properties</span>
                            </div>
                        </a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No property types available';
            endif;
            ?>
        </div>
    </div>
</div>


<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/img/about.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">#1 Place To Find The Perfect Property</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Property Listing</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <!-- tab featured -->

            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <?php
                    // Query to retrieve 'Listing' custom post type
                    $args = array(
                        'post_type'      => 'listing',
                        'posts_per_page' => 6, // Adjust the number of posts per page as needed
                    );
                    $query = new WP_Query($args);

                    // Check if there are any posts
                    if ($query->have_posts()) :
                        // Loop through the posts
                        while ($query->have_posts()) : $query->the_post();
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
                        wp_reset_postdata(); // Reset post data to the main query
                    else :
                        echo 'No listings found';
                    endif;
                    ?>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="#">Browse More Property</a>
                    </div>
                </div>
            </div>

            <!-- tab sell -->

            <div id="tab-2" class="tab-pane fade show p-0">
                <div class="row g-4">
                    <?php
                    $for_sell_args = array(
                        'post_type'      => 'listing',
                        'posts_per_page' => 6,
                    );
                    $for_sell_query = new WP_Query($for_sell_args);

                    if ($for_sell_query->have_posts()) :
                        while ($for_sell_query->have_posts()) : $for_sell_query->the_post();
                            // Get the category from ACF field
                            $listing_category = get_field('category');

                            // Check if the category matches 'for_sell'
                            if ($listing_category === 'sell') :
                    ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <!-- Rest of your code remains unchanged -->
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
                            endif;
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'No listings available for sell';
                    endif;
                    ?>
                </div>
            </div>


            <!-- tab rent -->



            <div id="tab-3" class="tab-pane fade show p-0">
                <div class="row g-4">
                    <?php
                    $for_rent_args = array(
                        'post_type'      => 'listing',
                        'posts_per_page' => 6,
                    );
                    $for_rent_query = new WP_Query($for_rent_args);

                    if ($for_rent_query->have_posts()) :
                        while ($for_rent_query->have_posts()) : $for_rent_query->the_post();
                            // Get the category from ACF field
                            $listing_category = get_field('category');

                            // Check if the category matches 'for_rent'
                            if ($listing_category === 'rent') :
                    ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <!-- Rest of your code remains unchanged -->
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
                            endif;
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'No listings available for rent';
                    endif;
                    ?>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- Property List End -->


<!-- Call to Action Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="<?php echo get_template_directory_uri(); ?>/img/call-to-action.jpg" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <h1 class="mb-3">Contact With Our Certified Agent</h1>
                            <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam justo sed vero dolor duo.</p>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Make A Call</a>
                        <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Property Agents</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <?php
            // Query for team custom post type
            $team_query = new WP_Query(array('post_type' => 'team'));

            // Loop through team posts
            while ($team_query->have_posts()) : $team_query->the_post();
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <?php
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            ?>
                            <img class="img-fluid" src="<?php echo esc_url($thumbnail_url); ?>" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <!-- Add your social media links here if available -->
                                <?php
                                $facebook_link = get_post_meta(get_the_ID(), 'facebook_link', true);
                                if ($facebook_link) {
                                    echo '<a class="btn btn-square mx-1" href="' . esc_url($facebook_link) . '"><i class="fab fa-facebook-f"></i></a>';
                                }

                                $twitter_link = get_post_meta(get_the_ID(), 'twitter_link', true);
                                if ($twitter_link) {
                                    echo '<a class="btn btn-square mx-1" href="' . esc_url($twitter_link) . '"><i class="fab fa-twitter"></i></a>';
                                }

                                $instagram_link = get_post_meta(get_the_ID(), 'instagram_link', true);
                                if ($instagram_link) {
                                    echo '<a class="btn btn-square mx-1" href="' . esc_url($instagram_link) . '"><i class="fab fa-instagram"></i></a>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0"><?php the_title(); ?></h5>
                            <small><?php echo get_post_meta(get_the_ID(), 'designation', true); ?></small>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            // Reset post data to restore the original query
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>


<!-- Team End -->


<!-- Testimonial Start -->


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Our Clients Say!</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php
            // Query for testimonial custom post type
            $testimonial_query = new WP_Query(array('post_type' => 'testimonial'));

            // Loop through testimonial posts
            while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
            ?>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p><?php the_content(); ?></p>
                        <div class="d-flex align-items-center">
                            <?php
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                            ?>
                            <img class="img-fluid flex-shrink-0 rounded" src="<?php echo esc_url($thumbnail_url); ?>" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1"><?php the_title(); ?></h6>
                                <small><?php echo get_post_meta(get_the_ID(), 'profession', true); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            // Reset post data to restore the original query
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<!-- Testimonial End -->


<?php get_footer(); ?>